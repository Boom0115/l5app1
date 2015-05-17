<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | 登録／ログインコントローラー
    |--------------------------------------------------------------------------
    |
    | このコントローラハンドラーは新ユーザーを登録し、同時に既存の
    | ユーザーを認証します。デフォルトでこのコントローラーは振る舞いを
    | 追加するためにシンプルなトレイトを使用します。試してみませんか？
    |
    */

    use AuthenticatesAndRegistersUsers {
        getLogout as private _getLogout;
    }

    public function getLogout()
    {
        Session::flush();
        return $this->_getLogout();
    }

    /**
     * 新しい認証コントローラインスタンスの生成
     *
     * @param  \Illuminate\Contracts\Auth\Guard  $auth
     * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
     * @return void
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

}
