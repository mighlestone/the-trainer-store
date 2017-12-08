<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoe_categories')->insert([
            ['name' => 'Basketball Shoes'],
            ['name' => 'Boots'],
            ['name' => 'Functional'],
            ['name' => 'Leisure'],
            ['name' => 'Running'],
            ['name' => 'Sandals'],
            ['name' => 'Skate'],
            ['name' => 'Tennis']
        ]);
    }
}
