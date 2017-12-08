<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            ['name' => 'adidas'],
            ['name' => 'Converse'],
            ['name' => 'Jordan'],
            ['name' => 'New Balance'],
            ['name' => 'Nike'],
            ['name' => 'Puma']
        ]);
    }
}
