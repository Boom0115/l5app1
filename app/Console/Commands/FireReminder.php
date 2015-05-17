<?php namespace App\Console\Commands;

use App\Events\Reminder;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Carbon\Carbon;

class FireReminder extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'fire:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'test... Fire Reminder Event ';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire( Reminder $reminder)
    {
        $reminder->setEventName( $this->argument('schedule') );
        $time = $this->argument('time');

        $scheduledTime = $time ? Carbon::createFromFormat('Y-m-d H:i:s', $time, 'Asia/Tokyo')
            : Carbon::now();
        $reminder->setTime($scheduledTime);
        \Event::fire( $reminder);
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            [
                'schedule',
                InputArgument::REQUIRED,
                ' スケジュールの内容'],
            [
                'time',
                InputArgument::OPTIONAL,
                ' スケジュールの予定時間(YY-MM-DD HH:MM:SS)',
                false
            ],
        ];
    }
}
