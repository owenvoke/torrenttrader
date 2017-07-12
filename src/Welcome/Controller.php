<?php

namespace pxgamer\TorrentTrader\Welcome;

use pxgamer\TorrentTrader\Configuration\BaseController;

class Controller extends BaseController
{
    public function index()
    {
        if ($_ENV['MEMBERS_ONLY']) {
            // Select latest torrents
            $stmt = $this->database->query("SELECT torrents.id, torrents.anon, torrents.announce, torrents.category, torrents.leechers, torrents.nfo, torrents.seeders, torrents.name, torrents.times_completed, torrents.size, torrents.added, torrents.comments, torrents.numfiles, torrents.filename, torrents.owner, torrents.external, torrents.freeleech, categories.name AS cat_name, categories.image AS cat_pic, categories.parent_cat AS cat_parent, users.username, users.privacy, IF(torrents.numratings < 2, NULL, ROUND(torrents.ratingsum / torrents.numratings, 1)) AS rating FROM torrents LEFT JOIN categories ON category = categories.id LEFT JOIN users ON torrents.owner = users.id WHERE visible = 'yes' AND banned = 'no' ORDER BY id DESC LIMIT 25");

            if ($stmt->execute()) {
                $aIndexTorrentsList = $stmt->fetchAll();
                $this->output->setViewVariable('aIndexTorrentsList', $aIndexTorrentsList);
            }
        }

        $this->output->renderTemplate([
            'file' => ROOT_PATH . 'templates/welcome/index.html.php',
            'template' => true
        ]);

        $this->output->send();
    }
}
