<?php

namespace Numencode\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TruncateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate {table_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate selected database table.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        DB::beginTransaction();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($this->argument('table_name'))->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        DB::commit();

        $this->comment(PHP_EOL . 'Database table "' . $this->argument('table_name') . '" was truncated.' . PHP_EOL);
    }
}
