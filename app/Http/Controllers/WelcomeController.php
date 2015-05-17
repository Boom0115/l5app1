<?php namespace App\Http\Controllers;

class WelcomeController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Welcomeコントローラー
    |--------------------------------------------------------------------------
    |
    | このコントローラーはアプリケーションの「マーケティングページ」を
    | レンダーし、ゲストのみに表示されるように設定されています。
    | 他のコントローラサンプルと同様、好きなように変更したり、削除してください。
    |
    */

    /**
     * 新しいコントローラーインスタンスの生成
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * アプリケーションのウェルカムページをユーザーへ表示
     *
     * @return Response
     */
    public function index()
    {
        return view('welcome');
    }

}
