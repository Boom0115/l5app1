<?php

/*
|--------------------------------------------------------------------------
| アプリケーションのルート
|--------------------------------------------------------------------------
|
| ここでアプリケーションのルートを全て登録することが可能です。
| 簡単です。ただ、Laravelへ対応するURIと、そのURIがリクエスト
| されたときに呼び出されるコントローラーを指定してください。
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('/sendmail', function() {
   \Mail::raw(' 本日は晴天なり', function($message) {
       $message->to('tetsuya_takahashi@hotmail.com')
           ->subject('Test Send From Laravel5');
   });
   return ' Mail Send Complete.';
});

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/savedata', 'SavedataController@index');

/*
Route::group(['before' => 'api_auth'], function() {
});
*/

Route::get('login', ['uses' => 'HomeController@showLogin']);
Route::post('login', ['uses' => 'HomeController@doLogin']);
/*
Route::get('game', function() {
    return view("game");
});
*/
Route::group(['middleware' => 'auth'], function() {
    Route::get('game/attack', 'GameController@attack');
    Route::get('game/heal',   'GameController@heal');
    Route::get('game/buy',    'GameController@buy');
    Route::get('game/create', 'GameController@create');
    Route::get('game/delete', 'GameController@delete');
    Route::get('game/load',   'GameController@load');
    Route::get('game/save',   'GameController@save');
    Route::get('game/reset_monster', 'GameController@reset_monster');
    Route::get('game',        'GameController@index');

});

Route::get('info', function() {
    return View('phpinfo');
});

