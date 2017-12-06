<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class File.
 * @package App
 */
class File extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function torrents()
    {
        return $this->belongsTo('App\Torrent');
    }
}
