<?php

namespace Numencode\Console\Commands\Admin;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class Bower extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:bower';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Bower update for the admin theme.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $command = 'cd modules/Admin/Resources/assets/vendor && bower update';
        $process = new Process($command);
        $process->run();

        $this->comment($process->getOutput());

        if ($process->isSuccessful()) {
            $this->info('Bower update for the admin theme executed successfully.' . PHP_EOL);
        } else {
            $this->error('Error executing Bower update for the admin theme.' . PHP_EOL);
        }
    }
}
