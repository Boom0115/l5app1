<?php

return [

    /*
    |--------------------------------------------------------------------------
    | アプリケーションデバッグモード
    |--------------------------------------------------------------------------
    |
    | アプリケーションをデバッグモードにすると、アプリケーションでエラーが発生する
    | たびにスタックトレースともに、詳細なエラーメッセージが表示されます。
    | このモードでない場合、シンプルで一般利用者向きなエラーページが表示されます。
    |
    */

    'debug' => env('APP_DEBUG'),

    /*
    |--------------------------------------------------------------------------
    | アプリケーションURL
    |--------------------------------------------------------------------------
    |
    | このURLはArtisanコマンドラインツールを使用する時に正しい
    | URLを生成するために使用します。アプリケーションのルートのURLを設定してください。
    | Artisanコマンドを実行する時に使用されます。
    |
    */

    'url' => 'http://localhost',

    /*
    |--------------------------------------------------------------------------
    | アプリケーションタイムゾーン
    |--------------------------------------------------------------------------
    |
    | ここではアプリケーションのデフォルトタイムゾーンを指定します。これは
    | PHPの日付／時間関数で使用されます。最初から未設定でも使用できるように
    | 適切なデフォルトを設定してあります。
    |
    */

    'timezone' => 'Asia/Tokyo',

    /*
    |--------------------------------------------------------------------------
    | アプリケーションローカル設定
    |--------------------------------------------------------------------------
    |
    | アプリケーションローカルは翻訳サービスプロバイダーにより使用される
    | デフォルトローカルを指定します。アプリケーションで提供するローカルを
    | 自由に設定してください。
    |
    */

    'locale' => 'ja',

    /*
    |--------------------------------------------------------------------------
    | アプリケーションフォールバック言語
    |--------------------------------------------------------------------------
    |
    | フォールバック言語は現在のローカルが使用できない場合に、
    | 代替として使われます。アプリケーション全体に対して用意されている
    | 言語フォルダーに対応するコードであればどれでも使用可能です。
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | 暗号化キー
    |--------------------------------------------------------------------------
    |
    | このキーはIlluminate暗号化サービスで使用されます。ランダムな32文字を
    | セットしないと安全ではありません。アプリケーションをデプロイ
    | る前に、必ず変更してください。
    |
    */

    'key' => env('APP_KEY', 'SomeRandomString'),

    'cipher' => MCRYPT_RIJNDAEL_128,

    /*
    |--------------------------------------------------------------------------
    | ログ設定
    |--------------------------------------------------------------------------
    |
    | ここではアプリケーションのログ設定を指定します。Laravelは
    | 初めから、Monolog PHPログライブラリーを使用しています。これは便利なように、
    | 強力でバリエーション豊かなログハンドラー／フォーマッターを提供しています。
    |
    | 使用可能な設定： "single", "daily", "syslog", "errorlog"
    |
    */

    'log' => 'daily',

    /*
    |--------------------------------------------------------------------------
    | 自動ロードされるサービスプロバイダー
    |--------------------------------------------------------------------------
    |
    | ここにリストしたサービスプロバイダーはアプリケーションのリクエストに対し
    | 自動的にロードされます。アプリケーションの機能を拡張するため、この配列へ
    | 自由に自分のサービスを付け加えてください。
    |
    */

    'providers' => [

        /*
         * Laravelフレームワークサービスプロバイダー
         */
        'Illuminate\Foundation\Providers\ArtisanServiceProvider',
        'Illuminate\Auth\AuthServiceProvider',
        'Illuminate\Bus\BusServiceProvider',
        'Illuminate\Cache\CacheServiceProvider',
        'Illuminate\Foundation\Providers\ConsoleSupportServiceProvider',
        'Illuminate\Routing\ControllerServiceProvider',
        'Illuminate\Cookie\CookieServiceProvider',
        'Illuminate\Database\DatabaseServiceProvider',
        'Illuminate\Encryption\EncryptionServiceProvider',
        'Illuminate\Filesystem\FilesystemServiceProvider',
        'Illuminate\Foundation\Providers\FoundationServiceProvider',
        'Illuminate\Hashing\HashServiceProvider',
        'Illuminate\Mail\MailServiceProvider',
        'Illuminate\Pagination\PaginationServiceProvider',
        'Illuminate\Pipeline\PipelineServiceProvider',
        'Illuminate\Queue\QueueServiceProvider',
        'Illuminate\Redis\RedisServiceProvider',
        'Illuminate\Auth\Passwords\PasswordResetServiceProvider',
        'Illuminate\Session\SessionServiceProvider',
        'Illuminate\Translation\TranslationServiceProvider',
        'Illuminate\Validation\ValidationServiceProvider',
        'Illuminate\View\ViewServiceProvider',

        'Aws\Laravel\AwsServiceProvider',

        /*
         * アプリケーションサービスプロバイダー
         */
        'App\Providers\AppServiceProvider',
        'App\Providers\BusServiceProvider',
        'App\Providers\ConfigServiceProvider',
        'App\Providers\EventServiceProvider',
        'App\Providers\RouteServiceProvider',

    ],

    /*
    |--------------------------------------------------------------------------
    | クラスエイリアス
    |--------------------------------------------------------------------------
    |
    | このクラスエイリアスの配列はこのアプリケーションが開始されると登録されます。
    | エイリアスをどんなに好きなだけ自由に登録しても、「遅延」ロードされるので、
    | パフォーマンスを妨げることはありません。
    |
    */

    'aliases' => [

        'App'       => 'Illuminate\Support\Facades\App',
        'Artisan'   => 'Illuminate\Support\Facades\Artisan',
        'Auth'      => 'Illuminate\Support\Facades\Auth',
        'Aws'       => 'Aws\Laravel\AwsFacade',
        'Blade'     => 'Illuminate\Support\Facades\Blade',
        'Bus'       => 'Illuminate\Support\Facades\Bus',
        'Cache'     => 'Illuminate\Support\Facades\Cache',
        'Config'    => 'Illuminate\Support\Facades\Config',
        'Cookie'    => 'Illuminate\Support\Facades\Cookie',
        'Crypt'     => 'Illuminate\Support\Facades\Crypt',
        'DB'        => 'Illuminate\Support\Facades\DB',
        'Eloquent'  => 'Illuminate\Database\Eloquent\Model',
        'Event'     => 'Illuminate\Support\Facades\Event',
        'File'      => 'Illuminate\Support\Facades\File',
        'Hash'      => 'Illuminate\Support\Facades\Hash',
        'Input'     => 'Illuminate\Support\Facades\Input',
        'Inspiring' => 'Illuminate\Foundation\Inspiring',
        'Lang'      => 'Illuminate\Support\Facades\Lang',
        'Log'       => 'Illuminate\Support\Facades\Log',
        'Mail'      => 'Illuminate\Support\Facades\Mail',
        'Password'  => 'Illuminate\Support\Facades\Password',
        'Queue'     => 'Illuminate\Support\Facades\Queue',
        'Redirect'  => 'Illuminate\Support\Facades\Redirect',
        'Redis'     => 'Illuminate\Support\Facades\Redis',
        'Request'   => 'Illuminate\Support\Facades\Request',
        'Response'  => 'Illuminate\Support\Facades\Response',
        'Route'     => 'Illuminate\Support\Facades\Route',
        'Schema'    => 'Illuminate\Support\Facades\Schema',
        'Session'   => 'Illuminate\Support\Facades\Session',
        'Storage'   => 'Illuminate\Support\Facades\Storage',
        'URL'       => 'Illuminate\Support\Facades\URL',
        'Validator' => 'Illuminate\Support\Facades\Validator',
        'View'      => 'Illuminate\Support\Facades\View',

    ],

];
