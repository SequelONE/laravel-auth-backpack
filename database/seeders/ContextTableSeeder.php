<?php

namespace Database\Seeders;

use App\Models\Context;
use Illuminate\Database\Seeder;

class ContextTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Context::count() == 0) {
            // Default Languages
            Context::upsert([
                [
                    'name' => 's01.one',
                    'subdomain' => 's01.one',
                    'active' => 1
                ],
            ], ['name', 'subdomain', 'active']);
        }
    }
}
