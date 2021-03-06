<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BrandsTableSeeder::class,
            ColoursTableSeeder::class,
            LocationsTableSeeder::class,
            ReleaseTypesTableSeeder::class,
            ShoeCategoriesTableSeeder::class,
            ShoeSizesTableSeeder::class,
            SourcesTableSeeder::class,
        ]);
    }
}
