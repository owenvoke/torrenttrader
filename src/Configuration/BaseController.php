<?php

namespace pxgamer\TorrentTrader\Configuration;

use pxgamer\TorrentTrader\Template\Output;

class BaseController
{
    public function __construct()
    {
        $this->output = new Output();
    }
}