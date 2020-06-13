<?php
    /** @var array $item
     * @var \app\models\Category $model
     * @var string $tab
     */
?>

<option
    <?php if ($item['parent_id'] == 0): ?>
        class="font-weight-bold"
    <?php endif; ?>

    value="<?= $item['id'] ?>"
    <?php if($item['id'] == $model->parent_id) echo 'selected' ?>
    <?php if($item['id'] == $model->id) echo 'disabled' ?>
>
    <?= $tab ?> <?=  $item['label'] ?>
</option>

