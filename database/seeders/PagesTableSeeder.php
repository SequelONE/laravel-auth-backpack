<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \JsonException
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $Pages = [
            [
                'template' => 'welcome',
                'name' => 'Index',
                'title' => 'Authentication system on Laravel 8 and Backpack 5.',
                'slug' => '/',
                'content' => '<p>Authentication system on Laravel 8 and Backpack 5.</p>',
                'extras' => [
                    'meta_title' => 'Welcome',
                    'meta_description' => 'Authentication system on Laravel 8 and Backpack 5.',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'about_us',
                'name' => 'About us',
                'title' => 'About us',
                'slug' => 'about',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'About us',
                    'meta_description' => 'About us',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'News',
                'title' => 'News',
                'slug' => 'news',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'News',
                    'meta_description' => 'News',
                    'meta_keywords' => NULL
                ],
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($Pages as $Page) {
            $newPage = Page::where('slug', '=', $Page['slug'])->first();
            if ($newPage === null) {
                $newPage = Page::create([
                    'template' => $Page['template'],
                    'name' => $Page['name'],
                    'title' => $Page['title'],
                    'slug' => $Page['slug'],
                    'content' => $Page['content'],
                    'extras' => $Page['extras'],
                ]);
            }
        }
    }
}
