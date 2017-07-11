<?php
/**
 * @var Exception $e
 */
?>
<div class="container">
    <div class="page-header">
        <h1>Error 404</h1>
    </div>
    <div class="alert alert-warning">
        <div class="alert-link"><?= $e->getMessage() ?></div>

        <?php if ($_ENV['DEVELOPMENT_MODE'] === true || $_ENV['DEVELOPMENT_MODE'] === 'true') { ?>
            <pre><?= $e->getTraceAsString() ?></pre>
        <?php } ?>
    </div>
</div>