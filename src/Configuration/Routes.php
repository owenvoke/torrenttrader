<?php

namespace pxgamer\TorrentTrader\Configuration;

use System\Route;

class Routes
{
    public function addRoutes(Route $router)
    {
        if (!file_exists(ROOT_PATH . 'config/checked')) {
            $router->any('/check', ['\pxgamer\TorrentTrader\Configuration\Controller', 'index']);
        }

        return $router;
    }
}