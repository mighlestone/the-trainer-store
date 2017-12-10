<?php

use Illuminate\Database\Seeder;

class SourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([
            ['name' => 'Sneakersnstuff', 'url' => 'https://www.sneakersnstuff.com/'],
            ['name' => 'Yeezy', 'url' => 'http://www.adidas.com/yeezy'],
            ['name' => 'Yeezy Mafia', 'url' => 'http://news.yeezymafia.com/'],
            ['name' => 'Footpatrol', 'url' => 'https://www.footpatrol.com/shop'],
            ['name' => 'Offspring', 'url' => 'https://www.offspring.co.uk/'],
            ['name' => 'HBX', 'url' => 'https://hbx.com/'],
            ['name' => 'END.', 'url' => 'https://www.endclothing.com/gb/'],
            ['name' => 'Hypebeast', 'url' => 'https://hypebeast.com/'],
            ['name' => 'The Sole Supplier', 'url' => 'https://thesolesupplier.co.uk/'],
        ]);
    }
}
