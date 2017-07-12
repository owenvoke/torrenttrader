<?php

namespace pxgamer\TorrentTrader\Configuration;

use pxgamer\TorrentTrader\Template\Output;

class BaseController
{
    protected $output;
    protected $database;

    public function __construct()
    {
        $this->output = new Output();
        $this->database = new \PDO($_ENV['DB_DSN'], $_ENV['DB_USER'], $_ENV['DB_PASS']);
    }
}