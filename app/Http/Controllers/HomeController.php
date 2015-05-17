<?php namespace App\Http\Controllers;

class HomeController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | ホームコントローラー
    |--------------------------------------------------------------------------
    |
    | このコントローラーは認証済みのユーザーのアプリケーション
    | 「ダッシュボード」をレンダーします。もちろん、希望に合わせ
    | コントローラーを変更したり削除したりしてください。ここからappがスタートします！
    |
    */

    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * アプリケーションのダッシュボードをユーザーへ表示
     *
     * @return Response
     */
    public function index()
    {
        return view('home');
    }

    public function showLogin()
    {
        return View('login');
    }

    public function doLogin()
    {
        // TODO: process the form
    }
}
