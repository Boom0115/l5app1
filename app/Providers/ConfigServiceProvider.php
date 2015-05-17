<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider {

    /**
     * ベンダー／パッケージ設定のオーバーライト
     *
     * このサービスプロバイダーは、アプリケーションが要求された
     * リクエスト／コマンドを処理する前に変更したい、"vendor"やパッケージの
     * 設定をオーバーライトするため、便利な場所を提供することを意図しています。
     *
     * @return void
     */
    public function register()
    {
        config([
            //
        ]);
    }

}
