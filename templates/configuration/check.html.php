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
        <tr>
            <td>PHP version >= 7.0</td>
            <td>
                <?= phpversion() > '7.0' ? '<strong><span class="text-danger">Yes</span></strong>' : '<strong><span class="text-danger">No</span> - 7.0 or above required</strong>'; ?>
                - Your PHP version is <em><?= phpversion() ?></em>.
            </td>
        </tr>

        <tr>
            <td>- zlib compression support</td>
            <td><?= extension_loaded('zlib') ? '<strong><span class="text-success">Available</span></strong>' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>- XML support</td>
            <td><?= extension_loaded('xml') ? '<strong><span class="text-success">Available</span></strong>' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>- PDO support</td>
            <td><?= class_exists('PDO') ? '<strong><span class="text-success">Available</span></strong>' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>- curl support (Not required but external torrents may scrape faster)</td>
            <td><?= function_exists('curl_init') ? '<strong><span class="text-success">Available</span></strong>' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>- gmp support (Required for IPv6)</td>
            <td><?= extension_loaded('gmp') ? '<strong><span class="text-success">Available</span></strong>' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>- bcmath support (Required for IPv6)</td>
            <td><?= extension_loaded('bcmath') ? '<strong><span class="text-success">Available</span></strong>' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>- hash_hmac support (Recommended - For better password encryption)</td>
            <td><?= function_exists('hash_hmac') ? '<strong><span class="text-success">Available</span></strong>' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>- suhosin extension (Optional)</td>
            <td><?= extension_loaded('suhosin') ? '<strong><span class="text-success">Available</span></strong><br /><br />Add to your php.ini (otherwise you may have issues):<br />suhosin.get.disallow_nul = Off<br />suhosin.request.disallow_nul = Off' : '<strong><span class="text-danger">Unavailable</span></strong>'; ?></td>
        </tr>

        <tr>
            <td>config/.env</td>
            <td>
                <?php
                if (!file_exists(ROOT_PATH . 'config/.env')) {
                    echo '<strong><span class="text-danger">No Config Exists</span></strong><br />Warning: No config exists.';
                } else {
                    echo '<strong><span class="text-success">Config Exists</span></strong>';
                }
                ?>
            </td>
        </tr>

        <tr>
            <td>Document Root</td>
            <td><?= ROOT_PATH ?></td>
        </tr>
    </table>

    <p>These settings are recommended for PHP in order to ensure full compatibility with <?= $_ENV['SITE_NAME'] ?>!.
        However, <?= $_ENV['SITE_NAME'] ?>! will still operate if your settings do not quite match the recommended.</p>

    <table class="table">
        <tr>
            <th width="500px">Directive</th>
            <th>Recommended</th>
            <th>Actual</th>
        </tr>

        <?php
        $php_recommended_settings = [
            ['Safe Mode', 'safe_mode', 'OFF'],
            ['Display Errors (Can be off, but does make debugging difficult.)', 'display_errors', 'ON'],
            ['File Uploads', 'file_uploads', 'ON'],
            ['Magic Quotes Runtime', 'magic_quotes_runtime', 'OFF'],
            ['Register Globals', 'register_globals', 'OFF'],
            ['Output Buffering', 'output_buffering', 'OFF'],
            ['Session auto start', 'session.auto_start', 'OFF'],
            ['allow_url_fopen (Required for external torrents)', 'allow_url_fopen', 'ON']
        ];

        foreach ($php_recommended_settings as $php_setting) {
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
        <tr>
            <th width="500px">Directive</th>
            <th>Recommended</th>
            <th>Actual</th>
        </tr>
        <?php
        $directories = [
            'resources/backups',
            'uploads/images',
            'resources/ache',
        ];
        foreach ($directories as $directory) {
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