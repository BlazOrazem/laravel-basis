<?php

use Illuminate\Database\Seeder;
use Numencode\Models\Blog\BlogItem;
use Numencode\Models\Blog\BlogCategory;
use Numencode\Models\Blog\BlogItemComment;

class BlogTableSeeder extends Seeder
{
    public function run()
    {
        $items = [
            [
                'id'         => 1,
                'route_id'   => 10,
                'title'      => 'News',
                'lead'       => null,
                'body'       => null,
                'sort_order' => '10',
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ],
        ];

        foreach ($items as $item) {
            BlogCategory::forceCreate($item);
        }

        $translationBlogCategory = BlogCategory::find(1);
        $translationBlogCategory->saveTranslation('sl', [
            'title' => 'Novice',
            'lead'  => null,
            'body'  => null,
        ]);

        $items = [
            [
                'blog_category_id' => 1,
                'route_id'         => 11,
                'title'            => 'Free financial workshops',
                'lead'             => null,
                'body'             => "<p>We offer several financial management workshops, many with a beginner's focus.</p><p>Our educational workshops will present financial basics and help you understand some sophisticated financial concepts.</p><p>You'll gain a working knowledge of the six areas that every financial management program must consider:</p><ul><li>cash management,</li><li>risk management,</li><li>investment planning,</li><li>tax planning,</li><li>retirement planning,</li><li>and estate conservation.</li></ul><p>These workshops are free, and no financial products will be offered for sale during the presentations.</p>",
                'created_at'       => new DateTime,
                'updated_at'       => new DateTime,
            ],
        ];

        foreach ($items as $item) {
            BlogItem::forceCreate($item);
        }

        $translationBlogItem = BlogItem::find(1);
        $translationBlogItem->saveTranslation('sl', [
            'title' => 'Brezplačne finančne delavnice',
            'lead'  => null,
            'body'  => "<p>Nudimo številne delavnice za finančno upravljanje, veliko jih je s poudarkom na začetnikih.</p><p>Naše izobraževalne delavnice bodo predstavile finančne osnove in vam pomagale razumeti nekatere zapletene finančne koncepte.</p><p>Pridobili boste praktično znanje o šestih področjih, ki jih mora pokrivati vsak program za finančno upravljanje in ki jih mora upoštevati:</p><ul><li>upravljanje z denarnimi sredstvi,</li><li>obvladovanje tveganja,</li><li>načrtovanje naložb,</li><li>davčno načrtovanje,</li><li>načrtovanje upokojitve</li><li>in ohranjanje nepremičnin</li></ul><p>Delavnice so brezplačne in nobeni finančni produkti ne bodo na voljo za nakup v predstavitvah.</p>",
        ]);

        $items = [
            [
                'blog_item_id' => 1,
                'user_id'      => 1,
                'comment'      => 'I find this article very interesting!',
                'is_published' => true,
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ],
            [
                'blog_item_id' => 1,
                'user_id'      => 2,
                'comment'      => 'Me too, thank you very much!',
                'is_published' => true,
                'created_at'   => new DateTime,
                'updated_at'   => new DateTime,
            ],
        ];

        foreach ($items as $item) {
            BlogItemComment::forceCreate($item);
        }

        $translationBlogItemComment = BlogItemComment::find(1);
        $translationBlogItemComment->saveTranslation('sl', [
            'comment' => 'Ta članek je zelo zanimiv!',
        ]);

        $translationBlogItemComment = BlogItemComment::find(2);
        $translationBlogItemComment->saveTranslation('sl', [
            'comment' => 'Se strinjam, hvala lepa!',
        ]);
    }
}
