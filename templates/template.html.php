<!DOCTYPE html>
<html>
<?php
/**
 * @var string $sContent
 */

include __DIR__ . '/include/header.html.php';

if (!($sMaintenanceText ?? null)) {
    include __DIR__ . '/include/navigation.html.php';
}

/** @noinspection PhpIncludeInspection */
include($sContent);

include __DIR__ . '/include/footer.html.php';
?>
</html>