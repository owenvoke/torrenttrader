<?php
/**
 * @var Exception $e
 */
?>
<div class="container">
    <div class="page-header">
        <h1>Error 500</h1>
    </div>
    <div class="alert alert-warning">
        <div class="alert-link"><?= $e->getMessage() ?></div>
    </div>
</div>