<?php

namespace pxgamer\TorrentTrader\Configuration;

use pxgamer\TorrentTrader\Configuration;
use System\Route;

class Routes
{
    public function addRoutes(Route $router)
    {
        if ($_ENV['SITE_MAINTENANCE']) {
            $controller = new Configuration\Controller();
            $controller->maintenance();
        }

        if (!file_exists(ROOT_PATH . 'config/checked')) {
            $router->any('/check', ['\pxgamer\TorrentTrader\Configuration\Controller', 'index']);
        }

        $router->any('/', ['\pxgamer\TorrentTrader\Welcome\Controller', 'index']);
        $router->any('/dmca', ['\pxgamer\TorrentTrader\Welcome\Controller', 'dmca']);

        return $router;
    }
}