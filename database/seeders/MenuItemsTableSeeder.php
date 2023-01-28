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
        if (MenuItem::count() == 0) {
            // Default Languages
            MenuItem::upsert([
                [
                    'name' => 'Home',
                    'title' => json_encode(['en' => 'Home', 'de' => 'Haus', 'ru' => 'Домой']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 1,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 1
                ],
                [
                    'name' => 'About us',
                    'title' => json_encode(['en' => 'About us', 'de' => 'Über uns', 'ru' => 'О нас']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 2,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 1
                ],
                [
                    'name' => 'News',
                    'title' => json_encode(['en' => 'News', 'de' => 'Nachrichten', 'ru' => 'Новости']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 3,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Items',
                    'title' => json_encode(['en' => 'Items', 'de' => 'Elemente', 'ru' => 'Предметы']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 4,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Subitem 1',
                    'title' => json_encode(['en' => 'Subitem 1', 'de' => 'Subelemente 1', 'ru' => 'Субпредмет 1']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 5,
                    'parent_id' => 4,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Subitem 2',
                    'title' => json_encode(['en' => 'Subitem 2', 'de' => 'Subelemente 2', 'ru' => 'Субпредмет 2']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 6,
                    'parent_id' => 4,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Subitem 3',
                    'title' => json_encode(['en' => 'Subitem 3', 'de' => 'Subelemente 3', 'ru' => 'Субпредмет 3']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 7,
                    'parent_id' => 4,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Subitem 4',
                    'title' => json_encode(['en' => 'Subitem 4', 'de' => 'Subelemente 4', 'ru' => 'Субпредмет 4']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 8,
                    'parent_id' => 4,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Subitem 5',
                    'title' => json_encode(['en' => 'Subitem 5', 'de' => 'Subelemente 5', 'ru' => 'Субпредмет 5']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 9,
                    'parent_id' => 4,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Contacts',
                    'title' => json_encode(['en' => 'Contacts', 'de' => 'Kontakte', 'ru' => 'Контакты']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 10,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Users',
                    'title' => json_encode(['en' => 'Users', 'de' => 'Benutzern', 'ru' => 'Пользователи']),
                    'type' => 'internal_link',
                    'link' => 'users',
                    'page_id' => NULL,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 1,
                ],
                [
                    'name' => 'Privacy Policy',
                    'title' => json_encode(['en' => 'Privacy Policy', 'de' => 'Datenschutz', 'ru' => 'Политика конфиденциальности']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 11,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 0,
                ],
                [
                    'name' => 'User Agreement',
                    'title' => json_encode(['en' => 'User Agreement', 'de' => 'Nutzungsvereinbarung', 'ru' => 'Пользовательское соглашение']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 12,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 0,
                ],
                [
                    'name' => 'Deleting user data',
                    'title' => json_encode(['en' => 'Deleting user data', 'de' => 'Löschen von Benutzerdaten', 'ru' => 'Удаление пользовательских данных']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 13,
                    'parent_id' => NULL,
                    'context_id' => 1,
                    'status' => 0,
                ],
                [
                    'name' => 'Test',
                    'title' => json_encode(['en' => 'Test', 'de' => 'Test', 'ru' => 'Тест']),
                    'type' => 'page_link',
                    'link' => NULL,
                    'page_id' => 13,
                    'parent_id' => 9,
                    'context_id' => 1,
                    'status' => 0,
                ],
            ], ['name', 'title', 'type', 'link', 'link', 'page_id', 'parent_id', 'status']);
        }
    }
}
