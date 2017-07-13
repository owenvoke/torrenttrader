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
            <ul class="nav navbar-nav">
                <li>
                    <a href="/torrents">
                        <span class="fa fa-fw fa-shopping-bag"></span>
                        <span>Torrents</span>
                    </a>
                </li>
                <li>
                    <a href="/community">
                        <span class="fa fa-fw fa-comment"></span>
                        <span>Community</span>
                    </a>
                </li>
                <li>
                    <a href="/faq">
                        <span class="fa fa-fw fa-info"></span>
                        <span>FAQ</span>
                    </a>
                </li>
                <li>
                    <a href="/torrents/search">
                        <span class="fa fa-fw fa-search"></span>
                        <span>Search</span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/account/register">
                        <span class="fa fa-fw fa-user-plus"></span>
                        <span>Register</span>
                    </a>
                </li>
                <li>
                    <a href="/account/sign_in">
                        <span class="fa fa-fw fa-sign-in"></span>
                        <span>Sign In</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>