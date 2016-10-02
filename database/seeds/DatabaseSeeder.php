<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class DatabaseSeeder extends Seeder
{
    use DatabaseTransactions;
    /**
     * Database tables.
     *
     * @var array
     */
    private $tables = [
        'managers',
        'users',

        'roles',
        'permissions',
        'role_permission',
        'role_user',
        'role_manager',

        'pages',
        'pages_i18n',
        'contents',
        'contents_i18n',
        'plugins',

        'tasks',
        'tasks_i18n',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();
        $this->command->info('Database truncated.');

        $this->call(ManagersTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(RoleManagerTableSeeder::class);

        $this->call(PagesTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
        $this->call(PluginsTableSeeder::class);

        $this->call(TasksTableSeeder::class);
    }

    /**
     * Truncate tables.
     */
    public function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        foreach ($this->tables as $tableName) {
            DB::table($tableName)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
