<?php

use Illuminate\Database\Seeder;

class ShoeSizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shoe_sizes')->insert([
            ['name' => 'UK 2.5'],
            ['name' => 'UK 3'],
            ['name' => 'UK 3.5'],
            ['name' => 'UK 4'],
            ['name' => 'UK 4.5'],
            ['name' => 'UK 5'],
            ['name' => 'UK 5.5'],
            ['name' => 'UK 6'],
            ['name' => 'UK 6.5'],
            ['name' => 'UK 7'],
            ['name' => 'UK 7.5'],
            ['name' => 'UK 8'],
            ['name' => 'UK 8.5'],
            ['name' => 'UK 9'],
            ['name' => 'UK 9.5'],
            ['name' => 'UK 10'],
            ['name' => 'UK 10.5'],
            ['name' => 'UK 11'],
            ['name' => 'UK 11.5'],
            ['name' => 'UK 12'],
            ['name' => 'UK 12.5'],
            ['name' => 'UK 13'],
            ['name' => 'UK 13.5'],
            ['name' => 'UK 14'],
            ['name' => 'UK 14.5'],
            ['name' => 'UK 15'],
        ]);
    }
}
