<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(RoleTableSeeder::class);
         $this->call(PermissionTableSeeder::class);
         $this->call(GenderTableSeeder::class);
         $this->call(StateTableSeeder::class);
         $this->call(OrderCategoryTableSeeder::class);
         $this->call(UserTableSeeder::class);

        Model::reguard();
    }
}
