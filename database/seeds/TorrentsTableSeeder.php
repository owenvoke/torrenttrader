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
        factory(App\Torrent::class, 5)->create([
            'user_id' => factory(App\User::class)->create()->id,
        ])->each(function (App\Torrent $torrent) {
            $torrent->trackers()->saveMany(factory(App\Tracker::class, 2)->make());
            $torrent->tags()->saveMany(factory(App\Tag::class, 2)->make());
        });
    }
}
