<?php

namespace App\Http\Controllers;

use App\Torrent;

class TorrentController extends Controller
{
    public function index()
    {
        return Torrent::all();
    }
    public function show(Torrent $torrent)
    {
        return $torrent;
    }
}
