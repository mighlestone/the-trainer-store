<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReleaseTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('release_types')->insert([
            ['name' => 'Exclusives'],
            ['name' => 'Limited'],
            ['name' => 'Regular']
        ]);
    }
}
