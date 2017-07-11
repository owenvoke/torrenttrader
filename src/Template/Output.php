<?php

namespace pxgamer\TorrentTrader\Template;

class Output
{
    const HTTP_OK = 200;

    private $m_aHeaders;
    private $m_sBody;
    private $m_sStatus;
    private $m_sContentType;
    private $m_aViewVariables;

    public function __construct()
    {
        $this->m_aHeaders = array();
        $this->m_sBody = '';
        $this->m_sStatus = self::HTTP_OK;
        $this->m_sContentType = 'text/html; charset=UTF-8';
        $this->m_aViewVariables = array();
    }

    public function renderTemplate($p_aOptions)
    {
        extract($this->m_aViewVariables);

        if ($p_aOptions['template'] ?? false) {
            $sContent = $p_aOptions['file'];
            $this->checkTemplateExists($sContent);
            $sFile = ROOT_PATH . 'templates/template.html.php';
        } else {
            $sFile = $p_aOptions['file'];
        }

        $this->checkTemplateExists($sFile);

        ob_start();
        /** @noinspection PhpIncludeInspection */
        include($sFile);
        $this->m_sBody = ob_get_clean();
    }

    public function renderText($p_aOptions)
    {
        $this->m_sBody = (string)$p_aOptions;
    }

    public function send()
    {
        if (!is_null($this->m_sStatus)) {
            header($this->m_sStatus);
        }

        foreach ($this->m_aHeaders as $sKey => $sValue) {
            header("$sKey: $sValue");
        }

        header("Content-type: " . $this->m_sContentType);

        echo $this->m_sBody;
    }

    public function setContentType($p_sContentType)
    {
        $this->m_sContentType = $p_sContentType;
    }

    public function setHeader($p_sKey, $p_sValue)
    {
        $this->m_aHeaders[$p_sKey] = $p_sValue;
    }

    public function setStatus($p_sStatusCode)
    {
        $this->m_sStatus = $p_sStatusCode;
    }

    public function setViewVariable($p_sKey, $p_sValue)
    {
        $this->m_aViewVariables[$p_sKey] = $p_sValue;
    }

    private function checkTemplateExists($p_sTemplate)
    {
        if (!file_exists($p_sTemplate)) {
            throw new \Exception('Template not found.');
        }
    }
}