<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            ['name' => 'London'],
            ['name' => 'Paris'],
            ['name' => 'Berlin'],
            ['name' => 'Amsterdam'],
            ['name' => 'Stockholm'],
            ['name' => 'Milan'],
            ['name' => 'Barcelona']
        ]);
    }
}
