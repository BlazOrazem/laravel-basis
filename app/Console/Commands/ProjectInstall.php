<?php

namespace Numencode\Console\Commands;

use DB;
use Illuminate\Console\Command;

class ProjectInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the NumencodeCMS project.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $columnName = 'Tables_in_' . env('DB_DATABASE');

        $dropList = [];
        foreach (DB::select('SHOW TABLES') as $table) {
            $dropList[] = $table->$columnName;
        }

        if (!empty($dropList)) {
            $dropList = implode(',', $dropList);

            if (!$this->confirm('ARE YOU SURE you want to DROP ALL TABLES in the current database (' . env('DB_DATABASE') .')? [y|N]')) {
                exit('Drop tables command aborted.');
            }

            $this->info('Dropping all tables...');

            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS = 0');
            DB::statement("DROP TABLE $dropList");
            DB::statement('SET FOREIGN_KEY_CHECKS = 1');
            DB::commit();
        }

        $this->comment(PHP_EOL . 'Running database migrations...' . PHP_EOL);
        $this->call('migrate');

        $this->comment(PHP_EOL . 'Running database seeders...' . PHP_EOL);
        $this->call('db:seed');

        $this->comment(PHP_EOL . 'Project is successfully installed. You can now login to admin dashboard.' . PHP_EOL);
    }
}
