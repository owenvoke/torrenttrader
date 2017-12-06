<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category.
 */
class Category extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function torrents()
    {
        return $this->hasMany('App\Torrent');
    }
}
