<?php

use Bican\Roles\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Cashier',
            'slug' => 'cashier',
            'description' => 'Cashier Admin User', // optional
            'level' => 1, // optional, set to 1 by default
        ]);
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Super Admin User', // optional
            'level' => 2, // optional, set to 1 by default
        ]);

    }
}
