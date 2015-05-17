<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class Reminder extends Event {

    use SerializesModels;

    private $time;
    private $eventName;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($time = null, $eventName = null)
    {
        $this->time = $time;
        $this->eventName = $eventName;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getEventName()
    {
        return $this->eventName;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function setEventName($eventName)
    {
        $this->eventName = $eventName;
    }

    public function __toString()
    {
        return ' 日時:'.$this->time
            ->timezone( 'Asia/Tokyo' )
            ->toDateTimeString()
            ."\n"
            .' 内容:' . $this->eventName
            ."\n"
            ;
    }
}
