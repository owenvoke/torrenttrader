<?php

namespace pxgamer\TorrentTrader\Template;

class Meta
{
    private static $title;

    /**
     * @return string
     */
    public static function getTitle()
    {
        return self::$title;
    }

    /**
     * @param string $title
     */
    public static function setTitle(string $title)
    {
        self::$title = $title;
    }
}