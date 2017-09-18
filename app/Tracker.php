<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tracker
 * @package App
 */
class Tracker extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function torrents()
    {
        return $this->belongsToMany('App\Torrent', 'torrent_trackers');
    }
}
