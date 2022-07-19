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
            [
                'template' => 'services',
                'name' => 'Items',
                'title' => 'Items',
                'slug' => 'items',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'Items',
                    'meta_description' => 'Items',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'Subitem 1',
                'title' => 'Subitem 1',
                'slug' => 'items/subitem-1',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'Subitem 1',
                    'meta_description' => 'Subitem 1',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'Subitem 2',
                'title' => 'Subitem 2',
                'slug' => 'items/subitem-2',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'Subitem 2',
                    'meta_description' => 'Subitem 2',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'Subitem 3',
                'title' => 'Subitem 3',
                'slug' => 'items/subitem-3',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'Subitem 3',
                    'meta_description' => 'Subitem 3',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'Subitem 4',
                'title' => 'Subitem 4',
                'slug' => 'items/subitem-4',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'Subitem 4',
                    'meta_description' => 'Subitem 4',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'Subitem 5',
                'title' => 'Subitem 5',
                'slug' => 'items/subitem-5',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'Subitem 5',
                    'meta_description' => 'Subitem 5',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'contacts',
                'name' => 'Contacts',
                'title' => 'Contacts',
                'slug' => 'contacts',
                'content' => '<p>Text</p>',
                'extras' => [
                    'meta_title' => 'Contacts',
                    'meta_description' => 'Contacts',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'Privacy Policy',
                'title' => 'Privacy Policy',
                'slug' => 'privacy',
                'content' => '<p>When you use our services, you’re trusting us with your information. We understand this is a big responsibility and work hard to protect your information and put you in control.</p><p>This Privacy Policy is meant to help you understand what information we collect, why we collect it, and how you can update, manage, export, and delete your information.</p>',
                'extras' => [
                    'meta_title' => 'Privacy Policy',
                    'meta_description' => 'Privacy Policy',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'User Agreement',
                'title' => 'User Agreement',
                'slug' => 'user-agreement',
                'content' => '<p>User Agreement</p>',
                'extras' => [
                    'meta_title' => 'User Agreement',
                    'meta_description' => 'User Agreement',
                    'meta_keywords' => NULL
                ],
            ],
            [
                'template' => 'services',
                'name' => 'Deleting user data',
                'title' => 'Deleting user data',
                'slug' => 'deleting-user-data',
                'content' => '<p>Deleting user data</p>',
                'extras' => [
                    'meta_title' => 'Deleting user data',
                    'meta_description' => 'Deleting user data',
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
