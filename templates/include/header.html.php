<?php
/**
 * @var string $sTitle
 */
?>
<head>
    <title><?= $_ENV['SITE_NAME'] . (isset($sTitle) ? ': ' . $sTitle : null) ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="theme-color" content="#ffffff">
    <script src="/assets/js/app.js"></script>
    <link rel="stylesheet" href="/assets/css/app.css">
</head>