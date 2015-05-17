<?php namespace App\Handlers\Events;

use App\Events\Reminder;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;

class ReminderHandler2 {

    public function handle(Reminder $event)
    {
        echo $event->getTime()
                ->timezone('Asia/Tokyo')
                ->toDateTimeString()
            .' に'
            . $event->getEventName()
            ." の予定があります"
            ."\n"
        ;
    }

}
