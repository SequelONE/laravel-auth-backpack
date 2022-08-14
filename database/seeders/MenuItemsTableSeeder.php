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
                'title' => "Home", "de" => "Home","ru" => "Главная",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 1,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'About us',
                'title' => "About us", "de" => "Über uns", "ru" => "О нас",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 2,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'News',
                'title' => "News", "de" => "Nachrichten","ru" => "Новости",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 3,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Items',
                'title' => "Items", "de" => "Elemente", "ru" => "Предметы",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 4,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 1',
                'title' => "Subitem 1", "de" => "Subelemente 1","ru" => "Субпредмет 1",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 5,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 2',
                'title' => "Subitem 2", "de" => "Subelemente 2", "ru" => "Субпредмет 2",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 6,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 3',
                'title' => "Subitem 3", "de" => "Subelemente 3","ru" => "Субпредмет 3",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 7,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 4',
                'title' => "Subitem 4", "de" => "Subelemente 4","ru" => "Субпредмет 4",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 8,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Subitem 5',
                'title' => "Subitem 5", "de" => "Subelemente 5","ru" => "Субпредмет 5",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 9,
                'parent_id' => 4,
                'status' => 1,
            ],
            [
                'name' => 'Contacts',
                'title' => "Contacts", "de" => "Kontakte","ru" => "Контакты",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 10,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Users',
                'title' => "Users", "de" => "Benutzern","ru" => "Пользователи",
                'type' => 'internal_link',
                'link' => 'users',
                'page_id' => NULL,
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Privacy Policy',
                'title' => '',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 11,
                'parent_id' => NULL,
                'status' => 0,
            ],
            [
                'name' => 'User Agreement',
                'title' => '',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 12,
                'parent_id' => NULL,
                'status' => 0,
            ],
            [
                'name' => 'Deleting user data',
                'title' => '',
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 13,
                'parent_id' => NULL,
                'status' => 0,
            ],
            [
                'name' => 'Test',
                'title' => "Test", "de" => "Test", "ru" => "Тест",
                'type' => 'page_link',
                'link' => NULL,
                'page_id' => 13,
                'parent_id' => 9,
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
                    'title' => $MenuItem['title'],
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
