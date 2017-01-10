<?php

use Numencode\Models\Plugin;
use Illuminate\Database\Seeder;

class PluginsTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'id'          => 1,
                'title'       => 'Tasks list',
                'description' => null,
                'action'      => 'TaskController@index',
                'params'      => null,
                'sort_order'  => 10,
                'is_hidden'   => 0,
            ],
            [
                'id'          => 2,
                'title'       => 'Sample',
                'description' => null,
                'action'      => 'TaskController@sample',
                'params'      => (object)   [
                                                'id' => [
                                                    'selection' => "\\Numencode\\Models\\User::whereNotNull('is_verified')->get()->pluck('name', 'id')",
                                                ],
                                                'name' => 'text',
                                                'surname' => 'text',
                                            ],
                'sort_order'  => 20,
                'is_hidden'   => 0,
            ],
        ];

        foreach ($items as $item) {
            Plugin::forceCreate($item);
        }
    }
}
