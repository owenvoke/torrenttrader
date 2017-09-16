<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 * @package App
 */
class Tag extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function torrents()
    {
        return $this->hasMany('App\Torrent');
    }
}
