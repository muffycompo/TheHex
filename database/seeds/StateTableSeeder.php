<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['state_name' => 'Abia'],
            ['state_name' => 'Adamawa'],
            ['state_name' => 'Akwa-Ibom'],
            ['state_name' => 'Anambra'],
            ['state_name' => 'Bauchi'],
            ['state_name' => 'Bayelsa'],
            ['state_name' => 'Benue'],
            ['state_name' => 'Borno'],
            ['state_name' => 'Cross River'],
            ['state_name' => 'Delta'],
            ['state_name' => 'Ebonyi'],
            ['state_name' => 'Edo'],
            ['state_name' => 'Ekiti'],
            ['state_name' => 'Enugu'],
            ['state_name' => 'Gombe'],
            ['state_name' => 'Imo'],
            ['state_name' => 'Jigawa'],
            ['state_name' => 'Kaduna'],
            ['state_name' => 'Kano'],
            ['state_name' => 'Katsina'],
            ['state_name' => 'Kebbi'],
            ['state_name' => 'Kogi'],
            ['state_name' => 'Kwara'],
            ['state_name' => 'Lagos'],
            ['state_name' => 'Nasarawa'],
            ['state_name' => 'Niger'],
            ['state_name' => 'Ogun'],
            ['state_name' => 'Ondo'],
            ['state_name' => 'Osun'],
            ['state_name' => 'Oyo'],
            ['state_name' => 'Plateau'],
            ['state_name' => 'Rivers'],
            ['state_name' => 'Sokoto'],
            ['state_name' => 'Taraba'],
            ['state_name' => 'Yobe'],
            ['state_name' => 'Zamfara'],
            ['state_name' => 'FCT']
        ]);
    }
}
