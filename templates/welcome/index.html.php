<?php
/**
 */
?>
<div class="container-fluid">
    <?php if ($_ENV['SITE_NOTICE']) { ?>
        <div id="site_notice">
            <?php include __DIR__ . '/../block_modules/site_notice.html.php'; ?>
        </div>
    <?php } ?>
    <?php if ($_ENV['SHOUT_BOX']) { ?>
        <div id="shout_box_frame">
            <?php //TODO: Add Shoutbox ?>
        </div>
    <?php } ?>
</div>