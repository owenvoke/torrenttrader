<?php

namespace pxgamer\TorrentTrader\Configuration;

use pxgamer\TorrentTrader\Configuration;

class Controller extends Configuration\BaseController
{
    public function index()
    {
        // Set page title
        $this->output->setViewVariable('sTitle', $_ENV['SITE_NAME'] . ' Check');

        // Set directories to check for write permissions
        $this->output->setViewVariable('aDirectoriesWritable', [
            'resources/backups',
            'resources/cache',
        ]);

        // Set array of PHP recommended settings to check
        $this->output->setViewVariable('aPhpRecommendedSettings', [
            ['Safe Mode', 'safe_mode', 'OFF'],
            ['Display Errors (Can be off, but does make debugging difficult.)', 'display_errors', 'ON'],
            ['File Uploads', 'file_uploads', 'ON'],
            ['Magic Quotes Runtime', 'magic_quotes_runtime', 'OFF'],
            ['Register Globals', 'register_globals', 'OFF'],
            ['Output Buffering', 'output_buffering', 'OFF'],
            ['Session auto start', 'session.auto_start', 'OFF'],
            ['allow_url_fopen (Required for external torrents)', 'allow_url_fopen', 'ON']
        ]);

        $this->output->renderTemplate([
            'file' => ROOT_PATH . 'templates/configuration/check.html.php',
            'template' => true
        ]);

        $this->output->send();
    }

    public function maintenance()
    {
        // Set page title
        $this->output->setViewVariable('sTitle', 'Maintenance');

        // Set maintenance mode output
        $this->output->setViewVariable('sMaintenanceText', 'Maintenance Mode is currently active. Please check back shortly.');

        $this->output->renderTemplate([
            'file' => ROOT_PATH . 'templates/configuration/maintenance.html.php',
            'template' => true
        ]);

        $this->output->send();
        die();
    }
}