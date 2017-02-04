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
                'is_hidden'   => null,
            ],
            [
                'id'          => 2,
                'title'       => 'Show Task',
                'description' => null,
                'action'      => 'TaskController@show',
                'params'      => [
                                    [
                                        'label' => 'Name',
                                        'name'  => 'name',
                                        'type'  => 'text',
                                    ],
                                    [
                                        'label' => 'Surname',
                                        'name'  => 'surname',
                                        'type'  => 'text',
                                    ],
                                    [
                                        'label'   => 'Task',
                                        'name'    => 'task_id',
                                        'type'    => 'select',
                                        'options' => 'Task@getTaskSelection',
                                    ],
                                ],
                'sort_order'  => 20,
                'is_hidden'   => null,
            ],
        ];

        foreach ($items as $item) {
            Plugin::forceCreate($item);
        }
    }
}
