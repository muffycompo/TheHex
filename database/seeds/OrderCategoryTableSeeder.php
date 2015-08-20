<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrderCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_categories')->insert([
            ['order_type' => 'Breakfast'],
            ['order_type' => 'Lunch'],
            ['order_type' => 'Dinner']
        ]);
    }
}
