<?php namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class Hello extends Command {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'hello:world';

    protected $description = "test ... Display Hello world";

    public function __construct()
    {
        //$this->description = __($this->description);
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $utf8_name = $this->argument('name');
        $utf8_greeting = $this->argument('greeting');
        echo  $utf8_name . $utf8_greeting ;
        //echo __a("あいうえお");
    }

    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Target to say hello'],
            ['greeting', InputArgument::OPTIONAL, ' Greetng Message', ' san, youkoso!'],
        ];
    }
}
