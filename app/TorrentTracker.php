<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class TorrentTracker
 * @package App
 */
class TorrentTracker extends Pivot
{
    /**
     * @var string
     */
    protected $table = 'torrent_trackers';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tracker()
    {
        return $this->belongsTo('App\Tracker');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function torrent()
    {
        return $this->belongsTo('App\Torrent');
    }
}
