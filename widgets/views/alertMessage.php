<?php
/** @var string $flashType */
/** @var string $message */
?>

<div class="alert <?= $flashType ?> alert-dismissible fade show" role="alert">
    <?= $message ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
