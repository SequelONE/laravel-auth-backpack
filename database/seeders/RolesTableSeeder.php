<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
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
        $RoleItems = [
            [
                'name'        => 'administrator',
                'guard_name'  => 'web'
            ],
            [
                'name'        => 'developer',
                'guard_name'  => 'web'
            ],
            [
                'name'        => 'manager',
                'guard_name'  => 'web'
            ],
            [
                'name'        => 'user',
                'guard_name'  => 'web'
            ],
            [
                'name'        => 'banned',
                'guard_name'  => 'web'
            ],
        ];

        /*
         * Add Role Items
         *
         */
        foreach ($RoleItems as $RoleItem) {
            $newRoleItem = Role::where('name', '=', $RoleItem['name'])->first();
            if ($newRoleItem === null) {
                $newRoleItem = Role::create([
                    'name'          => $RoleItem['name'],
                    'guard_name'          => $RoleItem['guard_name'],
                ]);
            }
        }
    }
}
