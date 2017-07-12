<?php
/**
 * @var string $sTitle
 */
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#tt-main-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= $_ENV['SITE_URL'] ?>"><?= $_ENV['SITE_NAME'] ?></a>
        </div>

        <div class="collapse navbar-collapse" id="tt-main-navbar">
        </div>
    </div>
</nav>