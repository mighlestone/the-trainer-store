<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colours')->insert([
            ['name' => 'Black'],
            ['name' => 'Blue'],
            ['name' => 'Brown'],
            ['name' => 'Green'],
            ['name' => 'Grey'],
            ['name' => 'Multi'],
            ['name' => 'Orange'],
            ['name' => 'Pink'],
            ['name' => 'Purple'],
            ['name' => 'Red'],
            ['name' => 'Silver'],
            ['name' => 'White'],
            ['name' => 'Yellow']
        ]);
    }
}
