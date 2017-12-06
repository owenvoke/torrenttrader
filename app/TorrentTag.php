<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class TorrentTag.
 */
class TorrentTag extends Pivot
{
    /**
     * @var string
     */
    protected $table = 'torrent_tags';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function torrent()
    {
        return $this->belongsTo('App\Torrent');
    }
}
