<?php

use Numencode\Models\Url;
use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'id' => '1',
                'action' => 'PageController@index',
                'uri' => 'new-page',
                'params' => '{"id":1}',
            ],
            [
                'id' => '2',
                'action' => 'PageController@index',
                'uri' => 'contact',
                'params' => '{"id":2}',
            ]
        ];

        foreach ($items as $item) {
            Url::forceCreate($item);
        }

        $translationContent = Url::find(1);
        $translationContent->saveTranslation('sl', [
            'uri' => 'sl/nova-stran',
            'params' => '{"id":1}',
        ]);

        $translationContent = Url::find(2);
        $translationContent->saveTranslation('sl', [
            'uri' => 'sl/kontakt',
            'params' => '{"id":2}',
        ]);
    }
}