<?php

use Illuminate\Database\Seeder;

class TorrentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Torrent::class, 5)->create();
    }
}
