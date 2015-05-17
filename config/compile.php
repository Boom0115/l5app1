<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 追加のコンパイル対象クラス
    |--------------------------------------------------------------------------
    |
    | ここで`artisan optimize`コマンドにより作成される、
    | コンパイル済みファイルへ含める追加のクラスを指定できます。原則、
    | アプリケーションの全リクエストで読み込まれるクラスを指定すべきです。
    |
    */

    'files' => [

        realpath(__DIR__.'/../app/Providers/AppServiceProvider.php'),
        realpath(__DIR__.'/../app/Providers/BusServiceProvider.php'),
        realpath(__DIR__.'/../app/Providers/ConfigServiceProvider.php'),
        realpath(__DIR__.'/../app/Providers/EventServiceProvider.php'),
        realpath(__DIR__.'/../app/Providers/RouteServiceProvider.php'),

    ],

    /*
    |--------------------------------------------------------------------------
    | コンパイル対象のプロバイダーファイル
    |--------------------------------------------------------------------------
    |
    | ここでは、コンパイルしなくてはならない追加のファイルを返す"compiles"
    | functionを定義している、サービスプロバイダーをリストします。
    | 使用しているパッケージから、共通ファイルを簡単に指定する手段です。
    |
    */

    'providers' => [
        //
    ],

];
