<?php
/**
 * @var array $aIndexTorrentsList
 */
?>
<div class="container-fluid">
    <?php if ($_ENV['SITE_NOTICE']) { ?>
        <?php include __DIR__ . '/../block_modules/site_notice.html.php'; ?>
    <?php } ?>

    <?php if ($_ENV['SHOUT_BOX']) { ?>
        <div id="shout_box_frame">
            <?php //TODO: Add Shoutbox ?>
        </div>
    <?php } ?>

    <?php if ($_ENV['MEMBERS_ONLY']) { ?>
        <?php include __DIR__ . '/../block_modules/index_torrents.html.php'; ?>
    <?php } ?>
</div>