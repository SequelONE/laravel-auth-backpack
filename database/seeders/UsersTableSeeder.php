<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed test admin
        $seededAdminEmail = 'admin@s01.one';
        $user = User::where('email', '=', $seededAdminEmail)->first();
        if ($user === null) {
            $user = User::create([
                'avatar'                         => NULL,
                'name'                           => 'Admin',
                'email'                          => $seededAdminEmail,
                'password'                       => Hash::make('password'),
            ]);

            $user->assignRole('administrator');
            $user->save();
        }

        // Seed test developer
        $seededDeveloperEmail = 'developer@s01.one';
        $user = User::where('email', '=', $seededDeveloperEmail)->first();
        if ($user === null) {
            $user = User::create([
                'avatar'                         => NULL,
                'name'                           => 'Developer',
                'email'                          => $seededDeveloperEmail,
                'password'                       => Hash::make('password'),
            ]);

            $user->assignRole('developer');
            $user->save();
        }

        // Seed test manager
        $seededManagerEmail = 'manager@s01.one';
        $user = User::where('email', '=', $seededManagerEmail)->first();
        if ($user === null) {
            $user = User::create([
                'avatar'                         => NULL,
                'name'                           => 'Manager',
                'email'                          => $seededManagerEmail,
                'password'                       => Hash::make('password'),
            ]);

            $user->assignRole('manager');
            $user->save();
        }

        // Seed test user
        $user = User::where('email', '=', 'user@s01.one')->first();
        if ($user === null) {
            $user = User::create([
                'avatar'                         => NULL,
                'name'                           => 'User',
                'email'                          => 'user@s01.one',
                'password'                       => Hash::make('password'),
            ]);

            $user->assignRole('user');
            $user->save();
        }

        // Seed test user
        $user = User::where('email', '=', 'banned@s01.one')->first();
        if ($user === null) {
            $user = User::create([
                'avatar'                         => NULL,
                'name'                           => 'Banned',
                'email'                          => 'banned@s01.one',
                'password'                       => Hash::make('password'),
            ]);

            $user->assignRole('banned');
            $user->save();
        }

    }
}
