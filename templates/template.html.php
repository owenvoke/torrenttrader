<?php
use pxgamer\TorrentTrader\Template;
?>
<!DOCTYPE html>
<html>
<?php include __DIR__ . '/include/header.html.php' ?>
<?= Template\Output::getContent() ?>
<?php include __DIR__ . '/include/footer.html.php' ?>
</html>
