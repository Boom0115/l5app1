<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App;
use Aws;
use Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class GameController extends Controller {

    private $bucket;
    private $key;


    public function __construct()
    {
        $this->bucket = env('BUCKET_NAME');
        $this->key = $this->getSaveKey();
        if (!Session::has('monster')) {
            Session::put('monster', $this->createMonster());
        }
    }

    private function createMonster()
    {
        $level = Session::get('savedata')['level'];
        $names = ['スライム', 'ゴブリン', 'スケルトン'];
        $monster = [
            'name' => $names[rand(0,2)],
            'max_hp' => rand(4, 8) + $level,
            'gold' => floor((rand(5, 10) + $level)),
            'exp' => rand(1, 2),
            'time' => time(),
        ];
        $monster['hp'] = $monster['max_hp'];
        return $monster;
    }

    public function reset_monster()
    {
        Session::put('monster', $this->createMonster());
        return redirect('game');
    }



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
        if (!Session::has('savedata')) {
            return Redirect('game/load');
        }
		return View('Game', ['messages' => []]);
	}

    public function attack()
    {
        $player = Session::get('savedata');
        $monster = Session::get('monster');
        $damage = $player['atk'] + rand(0, 4) - 2;
        //$damage = $player['atk'] + rand(0, 2);
        $monster['hp'] -= $damage;
        $message[] = "プレイヤーの攻撃！　{$monster['name']} に {$damage}ダメージを与えた";
        if ($monster['hp'] > 0) {

            $damaged = rand(1,3);
            $player['hp'] -= $damaged;
            $message[] = "{$monster['name']} の攻撃！  {$damaged}ダメージを受けた";

            if ($player['hp'] <= 0) {
                $player['gold'] = 0;
                $message[] = "プレイヤーは倒れた。　所持金を全て失った";
                $player['hp'] = $player['max_hp'];
                $message[] = "プレイヤーの体力が全回復した";
            }

            Session::put('monster', $monster);
        } else {
            $message[] = "{$monster['name']} を倒した";
            $player['gold'] += $monster['gold'];
            $message[] = "{$monster['gold']}ゴールド を手に入れた";
            $player['exp'] += $monster['exp'];
            $message[] = "経験値 {$monster['exp']} を得た";

            if ($player['exp'] >= $player['level'] * 10) {
                $player['level'] += 1;
                $message[] = "レベルが上った";
                $add_max_hp = rand(0,3);
                $add_atk = rand(0,1);
                $add_def = rand(0,1);
                $player['max_hp'] += $add_max_hp;
                $player['atk'] += $add_atk;
                $player['def'] += $add_def;
                if ($add_max_hp > 0) {
                    $message[] = "最大HPが {$add_max_hp} あがった";
                }
                if ($add_atk > 0) {
                    $message[] = "攻撃力が {$add_atk} あがった";
                }
                if ($add_def > 0) {
                    $message[] = "防御力が {$add_def} あがった";
                }
            }

            Session::forget('monster');
        }
        Session::put('savedata', $player);
        return View('Game', [
            'messages' => $message,
        ]);
    }

    public function heal()
    {
        $player = Session::get('savedata');
        if ($player['hp'] == $player['max_hp']) {
            $message[] = "体調は万全だ";
        } else if ($player['heal'] >= 1) {
            $message[] = "回復薬を使った";
            $player['heal'] -= 1;
            $rate = rand(40,80);
            $recover = floor($player['max_hp'] * $rate / 100);
            if ($player['hp'] + $recover > $player['max_hp']) {
                $player['hp'] = $player['max_hp'];
                $message[] = "体力が全回復した";
            } else {
                $player['hp'] += $recover;
                $message[] = "体力が {$recover} ポイント回復した";
            }
        } else {
            $message[] = "回復薬を持っていない";
        }
        Session::put('savedata', $player);
        return View('Game', [
            'messages' => $message,
        ]);
    }

    public function buy()
    {
        $player = Session::get('savedata');
        $price = $player['level'] * 4;
        if ($player['gold'] >= $price) {
            $player['gold'] -= $price;
            $player['heal'] += 1;
            $message[] = "{$price}ゴールドで回復薬を購入しました";
        } else {
            $message[] = "ゴールドが足りません";
        }
        Session::put('savedata', $player);
        return View('Game', [
            'messages' => $message,
        ]);
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $s3 = Aws::get('s3');

        $view = [];

        if ($s3->doesObjectExist($this->bucket, $this->key)) {
            $view['message'][] = 'セーブデータはすでに存在しています';
        } else {

            $data = [
                'level' => 1,
                'exp' => 0,
                'hp' => 10,
                'atk' => 3,
                'def' => 0,
                'max_hp' => 10,
                'gold' => 0,
                'heal' => 0,
            ];
            $s3->putObject([
                'Bucket' => $this->bucket,
                'Key' => $this->key,
                'Body' => serialize($data),
            ]);
            $view['messages'][] = "セーブデータを新規作成しました [{$this->key}]";
            $view['data'] = $data;
            Session(['savedata' => $data]);
        }

        return View('Game', $view);
	}

	public function delete()
	{
        $s3 = Aws::get('s3');

        if ($s3->doesObjectExist($this->bucket, $this->key)) {
            $s3->deleteObject([
                'Bucket' => $this->bucket,
                'Key' => $this->key,
            ]);
            $message[] = "セーブデータを削除しました";
            Session::forget('savedata');
        } else {
            $message[] = 'セーブデータは存在していません';
        }

        return View('Game', [
            'messages' => $message,
        ]);
	}

    public function load()
    {
        $s3 = Aws::get('s3');
        try {
            $result = $s3->getObject([
                'Bucket' => $this->bucket,
                'Key'    => $this->key
            ]);
            Session::set('savedata', unserialize($result['Body']));
            $view = [
                'messages' => ["データをロードしました"],
                'data' => Session::get('savedata'),
            ];
        } catch (Aws\S3\Exception\NoSuchKeyException $e) {
            $view = [
                'messages' => ["セーブデータは存在していません"],
            ];
        }
        return View('Game', $view);
    }

    public function save()
    {
        $s3 = Aws::get('s3');
        $view['data'] = Session::get('savedata');

        try {
            $s3->putObject([
                'Bucket' => $this->bucket,
                'Key' => $this->key,
                'Body' => serialize(Session::get('savedata')),
            ]);
            $view['messages'] = ["データをセーブしました [{$this->key}]"];
        } catch (Aws\S3\Exception\NoSuchKeyException $e) {
            $view = [
                'messages' => ["セーブデータは存在していません"],
            ];
        }
        return View('Game', $view);
    }

    protected function getSaveKey()
    {
        $id = Auth::user()->getAuthIdentifier();
        return "user{$id}-game01";
    }


    protected function procMonsterAttack()
    {

    }

    protected function whenPlayerDead()
    {

    }
}
