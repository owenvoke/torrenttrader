<?php

namespace pxgamer\TorrentTrader\Configuration;

use pxgamer\TorrentTrader\Configuration;

class Controller extends Configuration\BaseController
{
    public function index()
    {
        $this->output->setViewVariable('sTitle', $_ENV['SITE_NAME'] . ' Check');

        $this->output->renderTemplate(['file' => ROOT_PATH . 'templates/configuration/check.html.php', 'template' => true]);
        $this->output->send();
    }
}