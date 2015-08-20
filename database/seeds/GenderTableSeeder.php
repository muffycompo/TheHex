<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gender')->insert([
            ['gender_name' => 'Male'],
            ['gender_name' => 'Female']
        ]);
    }
}
