<?php

namespace pxgamer\TorrentTrader\Template;

class Output
{
    private static $content;

    /**
     * @return string
     */
    public static function getContent()
    {
        return self::$content;
    }

    /**
     * @param string $content
     */
    public static function setContent(string $content)
    {
        self::$content = $content;
    }
}