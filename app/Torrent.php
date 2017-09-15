<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Torrent
 * @package App
 */
class Torrent extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function files()
    {
        return $this->hasMany('App\File');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trackers()
    {
        return $this->hasMany('App\TorrentTracker');
    }
}
