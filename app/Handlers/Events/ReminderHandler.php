<?php namespace App\Handlers\Events;

use App\Events\Reminder;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Carbon\Carbon;

class ReminderHandler {

    public function handle(Reminder $event)
    {
        echo $event;
    }
}
