<?php

namespace pxgamer\TorrentTrader\Welcome;

use pxgamer\TorrentTrader\Configuration\BaseController;

class Controller extends BaseController
{
    public function index()
    {
        $this->output->renderTemplate([
            'file' => ROOT_PATH . 'templates/welcome/index.html.php',
            'template' => true
        ]);

        $this->output->send();
    }
}
