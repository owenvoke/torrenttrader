<?php
/**
 * @var array $aDirectoriesWritable
 * @var array $aPhpRecommendedSettings
 */
?>
<div class="container-fluid">
    <div class="page-header">
        <h2><?= $_ENV['SITE_NAME'] ?> Config Check</h2>
    </div>

    <h4>Required Settings Check:</h4>

    <p>If any of these items are highlighted in red then please take actions to correct them.</p>
    <p>
        <em>Failure to do so could lead to your <?= $_ENV['SITE_NAME'] ?>! installation not functioning correctly.</em>
    </p>
    <p>This system check is designed for unix based servers, windows based servers may not give desired results.</p>

    <table class="table table-bordered">
        <colgroup>
            <col width="500px"/>
            <col/>
        </colgroup>

        <tr>
            <td>PHP version >= 7.0</td>
            <td>
                <?= phpversion() > '7.0' ?
                    '<strong><span class="text-success">Yes</span></strong>' :
                    '<strong><span class="text-danger">No</span> - 7.0 or above required</strong>' ?>
                - Your PHP version is <em><?= phpversion() ?></em>.
            </td>
        </tr>

        <tr>
            <td>
                <span>- ZLib Compression support</span>
                <a href="https://php.net/manual/en/book.zlib.php" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td><?= extension_loaded('zlib') ?
                    '<strong><span class="text-success">Available</span></strong>' :
                    '<strong><span class="text-danger">Unavailable</span></strong>' ?></td>
        </tr>

        <tr>
            <td>
                <span>- XML support</span>
                <a href="https://php.net/manual/en/book.xml.php" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td><?= extension_loaded('xml') ?
                    '<strong><span class="text-success">Available</span></strong>' :
                    '<strong><span class="text-danger">Unavailable</span></strong>' ?></td>
        </tr>

        <tr>
            <td>
                <span>- PDO support</span>
                <a href="https://php.net/manual/en/book.pdo.php" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td><?= class_exists('PDO') ?
                    '<strong><span class="text-success">Available</span></strong>' :
                    '<strong><span class="text-danger">Unavailable</span></strong>' ?></td>
        </tr>

        <tr>
            <td>
                <span>- cURL support</span>
                <a href="https://php.net/manual/en/book.curl.php" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td><?= function_exists('curl_init') ?
                    '<strong><span class="text-success">Available</span></strong>' :
                    '<strong><span class="text-danger">Unavailable</span></strong>' ?></td>
        </tr>

        <tr>
            <td>
                <span>- GMP support (for IPV6)</span>
                <a href="https://php.net/manual/en/book.gmp.php" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td><?= extension_loaded('gmp') ?
                    '<strong><span class="text-success">Available</span></strong>' :
                    '<strong><span class="text-danger">Unavailable</span></strong>' ?></td>
        </tr>

        <tr>
            <td>
                <span>- BC Math support (for IPV6)</span>
                <a href="https://php.net/manual/en/book.bc.php" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td><?= extension_loaded('bcmath') ?
                    '<strong><span class="text-success">Available</span></strong>' :
                    '<strong><span class="text-danger">Unavailable</span></strong>' ?></td>
        </tr>

        <tr>
            <td>
                <span>- <code>password_*</code> support</span>
                <a href="https://php.net/manual/en/book.password.php" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td><?= function_exists('password_hash') ?
                    '<strong><span class="text-success">Available</span></strong>' :
                    '<strong><span class="text-danger">Unavailable</span></strong>' ?></td>
        </tr>

        <tr>
            <td>
                <span><code>config/.env</code></span>
                <a href="https://12factor.net/config" target="_blank" class="fa fa-fw fa-info"></a>
            </td>
            <td>
                <?php if (!file_exists(ROOT_PATH . 'config/.env')) { ?>
                    <strong><span class="text-danger">No Config Exists</span></strong>
                <?php } else { ?>
                    <strong><span class="text-success">Config Exists</span></strong>
                <?php } ?>
            </td>
        </tr>

        <tr>
            <td>Document Root</td>
            <td><code><?= ROOT_PATH ?></code></td>
        </tr>
    </table>

    <p>These settings are recommended for PHP in order to ensure full compatibility with <?= $_ENV['SITE_NAME'] ?>!.
        However, <?= $_ENV['SITE_NAME'] ?>! will still operate if your settings do not quite match the recommended.</p>

    <table class="table table-bordered">
        <colgroup>
            <col width="500px"/>
            <col width="500px"/>
            <col/>
        </colgroup>

        <tr>
            <th>Directive</th>
            <th>Recommended</th>
            <th>Actual</th>
        </tr>

        <?php
        foreach ($aPhpRecommendedSettings as $php_setting) {
            ?>
            <tr>
                <td><?= $php_setting[0] ?></td>
                <td><?= $php_setting[2] ?></td>
                <td>
                    <?php $sIniStandard = (ini_get($php_setting[1]) == '1' ? 'ON' : 'OFF') ?>
                    <?php if ($sIniStandard == $php_setting[2]) { ?>
                        <strong class="text-success"><?= $sIniStandard ?></strong>
                    <?php } else { ?>
                        <strong class="text-danger"><?= $sIniStandard ?></strong>
                    <?php } ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>

    <h4>Directory and File Permissions Check:</h4>
    <p>In order for TorrentTrader! to function correctly it needs to be able to access or write to certain files or
        directories.<br/>
        If you see "Not Writable" you need to change the permissions on the file or directory to <em>777</em>
        (directories) or <em>666</em> (files) so that TorrentTrader to write to it.
    </p>

    <table class="table table-bordered table-striped">
        <colgroup>
            <col width="500px"/>
            <col width="500px"/>
            <col/>
        </colgroup>

        <tr>
            <th>Directory</th>
            <th>Exists</th>
            <th>Writable</th>
        </tr>

        <?php
        foreach ($aDirectoriesWritable as $directory) {
            ?>
            <tr>
                <td><?= $directory ?></td>
                <td><?= (is_dir(ROOT_PATH . $directory) ? '<span class="text-success">Exists</span>' : '<span class="text-danger">Does not Exist</span>') ?></td>
                <td><?= (is_writable(ROOT_PATH . $directory) ? '<span class="text-success">Writable</span>' : '<span class="text-danger">Not Writable</span>') ?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>