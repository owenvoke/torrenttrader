<?php

namespace pxgamer\TorrentTrader\Configuration;

use Dotenv\Dotenv;
use Dotenv\Exception\ValidationException;
use pxgamer\TorrentTrader\Template\Output;
use System;

class Bootstrap
{
    public function __construct()
    {
        define('ROOT_PATH', realpath(__DIR__ . '/../../') . DIRECTORY_SEPARATOR);
    }

    public function loadEnvParams()
    {
        $env = new Dotenv('../config');
        $env->load();

        $this->loadRequiredEmptyParams($env);
        $this->loadRequiredNonEmptyParams($env);
        $this->loadIntParams($env);

        $this->envToParams();
    }

    private function loadRequiredEmptyParams(Dotenv $env)
    {
        try {
            $env->required([
                'SITE_EMAIL',
                'DB_USER',
                'DB_PASS',
                'ANNOUNCE_LIST',
                'MAIL_TYPE',
                'MAIL_SMTP_HOST',
                'MAIL_SMTP_SSL',
                'MAIL_SMTP_AUTH',
                'MAIL_SMTP_USER',
                'MAIL_SMTP_PASS',
                'CURRENCY_SYMBOL',
                'CHARSET',
                'BANNED_AGENTS',
            ]);
        } catch (ValidationException $exception) {
            $this->error(500, $exception);
        }
    }

    private function loadRequiredNonEmptyParams(Dotenv $env)
    {
        try {
            $env->required([
                'SITE_NAME',
                'SITE_URL',
                'DEFAULT_LANGUAGE',
                'DEVELOPMENT_MODE',
                'SITE_MAINTENANCE',
                'DB_DSN',
                'MEMBERS_ONLY',
                'MEMBERS_ONLY_WAIT',
                'ENABLE_INVITES',
                'INVITE_ONLY',
                'REQUIRE_EMAIL_CONFIRM',
                'REQUIRE_ADMIN_CONFIRM',
                'ALLOW_EXTERNAL',
                'UPLOADS_SCRAPE',
                'ANONYMOUS_UPLOAD',
                'UPLOADER_GROUP_ONLY',
                'FORUMS',
                'FORUMS_GUEST_READ',
                'IMAGE_MAX_FILE_SIZE',
            ])->notEmpty();
        } catch (ValidationException $exception) {
            $this->error(500, $exception);
        }
    }

    private function loadIntParams(Dotenv $env)
    {
        try {
            $env->required([
                'MAX_USERS',
                'MAX_USERS_INVITES',
                'MAIL_SMTP_PORT',
            ])->isInteger()->notEmpty();
        } catch (ValidationException $exception) {
            $this->error(500, $exception);
        }
    }

    private function envToParams()
    {
        foreach ($_ENV as $item => $value) {
            if (is_numeric($value) && ctype_digit($value)) {
                $_ENV[$item] = (int)$value;
            }

            if ($value === 'true') {
                $_ENV[$item] = true;
            }

            if ($value === 'false') {
                $_ENV[$item] = false;
            }
        }
    }

    public function loadRouting()
    {
        $app = System\App::instance();
        $app->request = System\Request::instance();
        $router = $app->route = System\Route::instance($app->request);

        $routes = new Routes();

        $router = $routes->addRoutes($router);

        $router->end();
    }

    public function error($error_code, $exception)
    {
        $output = new Output();

        $output->setViewVariable('e', $exception);

        if (!is_numeric($error_code)) {
            $error_code = 'default';
        }

        $error_file = __DIR__ . '/../../templates/errors/' . $error_code . '.html.php';

        $output->renderTemplate(
            [
                'file' => $error_file,
                'template' => true
            ]
        );

        $output->send();
        die;
    }
}