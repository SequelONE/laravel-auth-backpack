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
                    'name' => config('app.domain'),
                    'subdomain' => config('app.domain'),
                    'active' => 1
                ],
            ], ['name', 'subdomain', 'active']);
        }
    }
}
