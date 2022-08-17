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
        if (Page::count() == 0) {
            // Default Languages
            Page::upsert([
                [
                    'template' => 'welcome',
                    'name' => 'Index',
                    'title' => json_encode(['en' => 'Authentication system on Laravel 8 and Backpack 5.', 'de' => 'Authentifizierungssystem auf Laravel 8 und Backpack 5.', 'ru' => 'Система аутентификации на Laravel 8 и Backpack 5.']),
                    'slug' => '/',
                    'content' => json_encode(['en' => '<p>Authentication system on Laravel 8 and Backpack 5.</p>', 'de' => '<p>Authentifizierungssystem auf Laravel 8 und Backpack 5.</p>', 'ru' => '<p>Система аутентификации на Laravel 8 и Backpack 5.</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Welcome', 'meta_description' => 'Authentication system on Laravel 8 and Backpack 5.', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Willkommen', 'meta_description' => 'Authentifizierungssystem auf Laravel 8 und Backpack 5.', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Добро пожаловать', 'meta_description' => 'Система аутентификации на Laravel 8 и Backpack 5.', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'about_us',
                    'name' => 'About us',
                    'title' => json_encode(['en' => 'About us', 'de' => 'Über uns', 'ru' => 'О нас']),
                    'slug' => 'about',
                    'content' => json_encode(['en' => '<p>About us</p>', 'de' => '<p>Über uns</p>', 'ru' => '<p>О нас</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'About us', 'meta_description' => 'About us', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Über uns', 'meta_description' => 'Über uns', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'О нас', 'meta_description' => 'О нас', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'News',
                    'title' => json_encode(['en' => 'News', 'de' => 'Nachrichten', 'ru' => 'Новости']),
                    'slug' => 'news',
                    'content' => json_encode(['en' => '<p>News</p>', 'de' => '<p>Nachrichten</p>', 'ru' => '<p>Новости</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'News', 'meta_description' => 'News', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Nachrichten', 'meta_description' => 'Nachrichten', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Новости', 'meta_description' => 'Новости', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Items',
                    'title' => json_encode(['en' => 'Items', 'de' => 'Elemente', 'ru' => 'Новости']),
                    'slug' => 'items',
                    'content' => json_encode(['en' => '<p>Items</p>', 'de' => '<p>Elemente</p>', 'ru' => '<p>Предметы</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Items', 'meta_description' => 'Items', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Elemente', 'meta_description' => 'Elemente', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Предметы', 'meta_description' => 'Предметы', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Subitem 1',
                    'title' => json_encode(['en' => 'Subitem 1', 'de' => 'Subelemente 1', 'ru' => 'Субпредмет 1']),
                    'slug' => 'items/subitem-1',
                    'content' => json_encode(['en' => '<p>Subitem 1</p>', 'de' => '<p>Subelemente 1</p>', 'ru' => '<p>Субпредмет 1</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Subitem 1', 'meta_description' => 'Subitem 1', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Subelemente 1', 'meta_description' => 'Subelemente 1', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Субпредмет 1', 'meta_description' => 'Субпредмет 1', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Subitem 2',
                    'title' => json_encode(['en' => 'Subitem 2', 'de' => 'Subelemente 2', 'ru' => 'Субпредмет 2']),
                    'slug' => 'items/subitem-2',
                    'content' => json_encode(['en' => '<p>Subitem 2</p>', 'de' => '<p>Subelemente 2</p>', 'ru' => '<p>Субпредмет 2</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Subitem 2', 'meta_description' => 'Subitem 2', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Subelemente 2', 'meta_description' => 'Subelemente 2', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Субпредмет 2', 'meta_description' => 'Субпредмет 2', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Subitem 3',
                    'title' => json_encode(['en' => 'Subitem 3', 'de' => 'Subelemente 3', 'ru' => 'Субпредмет 3']),
                    'slug' => 'items/subitem-3',
                    'content' => json_encode(['en' => '<p>Subitem 3</p>', 'de' => '<p>Subelemente 3</p>', 'ru' => '<p>Субпредмет 3</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Subitem 3', 'meta_description' => 'Subitem 3', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Subelemente 3', 'meta_description' => 'Subelemente 3', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Субпредмет 3', 'meta_description' => 'Субпредмет 3', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Subitem 4',
                    'title' => json_encode(['en' => 'Subitem 4', 'de' => 'Subelemente 4', 'ru' => 'Субпредмет 4']),
                    'slug' => 'items/subitem-4',
                    'content' => json_encode(['en' => '<p>Subitem 4</p>', 'de' => '<p>Subelemente 4</p>', 'ru' => '<p>Субпредмет 4</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Subitem 4', 'meta_description' => 'Subitem 4', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Subelemente 4', 'meta_description' => 'Subelemente 4', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Субпредмет 4', 'meta_description' => 'Субпредмет 4', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Subitem 5',
                    'title' => json_encode(['en' => 'Subitem 5', 'de' => 'Subelemente 5', 'ru' => 'Субпредмет 5']),
                    'slug' => 'items/subitem-5',
                    'content' => json_encode(['en' => '<p>Subitem 5</p>', 'de' => '<p>Subelemente 5</p>', 'ru' => '<p>Субпредмет 5</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Subitem 5', 'meta_description' => 'Subitem 5', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Subelemente 5', 'meta_description' => 'Subelemente 5', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Субпредмет 5', 'meta_description' => 'Субпредмет 5', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'contacts',
                    'name' => 'Contacts',
                    'title' => json_encode(['en' => 'Contacts', 'de' => 'Kontakte', 'ru' => 'Контакты']),
                    'slug' => 'contacts',
                    'content' => json_encode(['en' => '<p>Contacts</p>', 'de' => '<p>Kontakte</p>', 'ru' => '<p>Контакты</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Contacts', 'meta_description' => 'Contacts', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Kontakte', 'meta_description' => 'Kontakte', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Контакты', 'meta_description' => 'Контакты', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Privacy Policy',
                    'title' => json_encode(['en' => 'Privacy Policy', 'de' => 'Datenschutz', 'ru' => 'Политика конфиденциальности']),
                    'slug' => 'privacy',
                    'content' => json_encode(['en' => '<p>When you use our services, you’re trusting us with your information. We understand this is a big responsibility and work hard to protect your information and put you in control.</p><p>This Privacy Policy is meant to help you understand what information we collect, why we collect it, and how you can update, manage, export, and delete your information.</p>', 'de' => '<p>Wenn Sie unsere Dienste nutzen, vertrauen Sie uns Ihre Informationen an. Wir verstehen, dass dies eine große Verantwortung ist und arbeiten hart daran, Ihre Daten zu schützen und Ihnen die Kontrolle zu geben.</p><p>Diese Datenschutzrichtlinie soll Ihnen helfen zu verstehen, welche Informationen wir sammeln, warum wir sie sammeln und wie Sie Ihre Informationen aktualisieren, verwalten, exportieren und löschen können.</p>', 'ru' => '<p>Когда вы пользуетесь нашими услугами, вы доверяете нам свою информацию. Мы понимаем, что это большая ответственность, и прилагаем все усилия, чтобы защитить вашу информацию и поставить вас под контроль.</p><p> Эта Политика конфиденциальности призвана помочь вам понять, какую информацию мы собираем, почему мы ее собираем и как вы можете обновлять, управлять, экспортировать и удалять свою информацию.</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Contacts', 'meta_description' => 'Contacts', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Kontakte', 'meta_description' => 'Kontakte', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Контакты', 'meta_description' => 'Контакты', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'User Agreement',
                    'title' => json_encode(['en' => 'User Agreement', 'de' => 'Nutzungsvereinbarung', 'ru' => 'Пользовательское соглашение']),
                    'slug' => 'user-agreement',
                    'content' => json_encode(['en' => '<p>User Agreement</p>', 'de' => '<p>Nutzungsvereinbarung</p>', 'ru' => '<p>Пользовательское соглашение</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'User Agreement', 'meta_description' => 'User Agreement', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Nutzungsvereinbarung', 'meta_description' => 'Nutzungsvereinbarung', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Пользовательское соглашение', 'meta_description' => 'Пользовательское соглашение', 'meta_keywords' => NULL]]),
                ],
                [
                    'template' => 'services',
                    'name' => 'Deleting user data',
                    'title' => json_encode(['en' => 'Deleting user data', 'de' => 'Löschen von Benutzerdaten', 'ru' => 'Удаление пользовательских данных']),
                    'slug' => 'deleting-user-data',
                    'content' => json_encode(['en' => '<p>Deleting user data</p>', 'de' => '<p>Löschen von Benutzerdaten</p>', 'ru' => '<p>Удаление пользовательских данных</p>']),
                    'extras' => json_encode(['en' => ['meta_title' => 'Deleting user data', 'meta_description' => 'Deleting user data', 'meta_keywords' => NULL], 'de' => ['meta_title' => 'Löschen von Benutzerdaten', 'meta_description' => 'Löschen von Benutzerdaten', 'meta_keywords' => NULL], 'ru' => ['meta_title' => 'Удаление пользовательских данных', 'meta_description' => 'Удаление пользовательских данных', 'meta_keywords' => NULL]]),
                ],
            ], ['template', 'name', 'title', 'slug', 'content', 'extras' => ['meta_title', 'meta_description', 'meta_keywords']]);
        }
    }
}
