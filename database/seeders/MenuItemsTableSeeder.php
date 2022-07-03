<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Role Types
         *
         */
        $MenuItems = [
            [
                'name' => 'Home',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 1,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'About us',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 2,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'News',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 3,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Items',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 4,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 1',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 5,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 2',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 6,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 3',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 7,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 4',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 8,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 5',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 9,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Privacy Policy',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 10,
                'parent_id' => NULL,
                'status' => 0,
            ],
            [
                'name' => 'User Agreement',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 11,
                'parent_id' => NULL,
                'status' => 0,
            ],
            [
                'name' => 'Deleting user data',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 12,
                'parent_id' => NULL,
                'status' => 0,
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($MenuItems as $MenuItem) {
            $newMenuItem = MenuItem::where('name', '=', $MenuItem['name'])->first();
            if ($newMenuItem === null) {
                $newMenuItem = MenuItem::create([
                    'name' => $MenuItem['name'],
                    'type' => $MenuItem['type'],
                    'link' => $MenuItem['link'],
                    'page_id' => $MenuItem['page_id'],
                    'parent_id' => $MenuItem['parent_id'],
                    'status' => $MenuItem['status'],
                ]);
            }
        }
    }
}
