<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed test page
        $page = Page::where('slug', '=', 'about-us')->first();
        if ($page === null) {
            $page = Page::create([
                'template'      => 'about_us',
                'name'          => 'About us',
                'title'         => 'About us',
                'slug'         => 'about-us',
                'content'         => '<p>Text</p>',
                'extras'         => '{"meta_title":"About us","meta_description":"About us","meta_keywords":null}',
            ]);

            $page->save();
        }

    }
}
