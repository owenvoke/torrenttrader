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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function torrents()
    {
        return $this->hasMany('App\TorrentTracker');
    }
}
