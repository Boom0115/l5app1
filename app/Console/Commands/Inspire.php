<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class Inspire extends Command {

    /**
     * コンソールコマンド名
     *
     * @var string
     */
    protected $name = 'inspire';

    /**
     * コンソールコマンドの説明
     *
     * @var string
     */
    protected $description = 'Display an inspiring quote';

    /**
     * コンソールコマンドの実行
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment(PHP_EOL.Inspiring::quote().PHP_EOL);
    }

}
