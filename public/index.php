<?php
use pxgamer\TorrentTrader\Configuration\Bootstrap;

require_once('../vendor/autoload.php');

$bootstrap = new Bootstrap();

$bootstrap->loadEnvParams();

$bootstrap->loadRouting();