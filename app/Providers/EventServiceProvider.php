<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * アプリケーションのイベントハンドラーのマップ
     *
     * @var array
     */
    protected $listen = [
        'event.name' => [
            'EventListener',
        ],
        'App\Events\Reminder' => [
            'App\Handlers\Events\ReminderHandler',
            'App\Handlers\Events\ReminderHandler2',
        ],
    ];

    /**
     * アプリケーションのその他のイベントの登録
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        //
    }

}
