<?php

namespace App\Console\Commands;

use App\Events\RemainingTimeChanged;
use App\Events\WinnerNumberGenerated;
use Illuminate\Console\Command;

class GameExecuter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:game-executer';
    protected $signature = 'game:execute';
    private  $time = 15;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start executing the game';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        while (true) {
            broadcast(new RemainingTimeChanged($this->time . 's'));
            $this->time--;
            sleep(1);
            if ($this->time === 0) {
                $this->time = 'Waiting to start';
                broadcast(new RemainingTimeChanged($this->time));
                broadcast(new WinnerNumberGenerated(mt_rand(1, 12)));
                sleep(5);
                $this->time = 15;
            }
        }
    }
}
