<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class TorrentTracker
 * @package App
 */
class TorrentTracker extends Pivot
{
    protected $table = 'torrent_trackers';
}
