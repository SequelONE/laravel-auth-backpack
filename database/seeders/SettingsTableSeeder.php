<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * The settings to add.
     */
    protected $settings = [
        [
            'key'         => 'company_name',
            'name'        => 'Company name',
            'description' => 'Company name',
            'value'       => 'S01.ONE',
            'field'       => '{"name":"value","label":"Company name","type":"text"}',
            'active'      => 1,

        ],
        [
            'key'         => 'logo',
            'name'        => 'Logo',
            'description' => 'Logo for website',
            'value'       => '/img/logo.png',
            'field'       => '{"name":"value","label":"Image","type":"upload","upload":true}',
            'active'      => 1,

        ],
        [
            'key'         => 'favicon',
            'name'        => 'Favicon',
            'description' => 'Favicon for website',
            'value'       => '/favicon.ico',
            'field'       => '{"name":"value","label":"Favicon","type":"upload","upload":true}',
            'active'      => 1,

        ],
        [
            'key'         => 'email',
            'name'        => 'E-mail',
            'description' => 'E-mail',
            'value'       => 'admin@s01.one',
            'field'       => '{"name":"value","label":"E-mail","type":"email"}',
            'active'      => 1,

        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = DB::table(config('backpack.settings.table_name'))->insert($setting);

            if (!$result) {
                $this->command->info("Insert failed at record $index.");

                return;
            }
        }

        $this->command->info('Inserted '.count($this->settings).' records.');
    }
}
