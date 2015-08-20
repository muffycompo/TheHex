<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'firstname' => 'Hex',
            'lastname' => 'Administrator',
            'email' => 'admin@thehex.com',
            'phone' => '08123456789',
            'password' => bcrypt('admin'),
            'role_id' => 2,
        ]);
    }
}
