<?php
/** @var array $item
 * @var \app\models\Post $model
 * @var string $tab
 */
?>

<option

    <?php if ($item['parent_id'] == 0): ?>
        class="font-weight-bold"
    <?php endif; ?>

    value="<?= $item['id'] ?>"
    <?php if($item['id'] == $model->category_id) echo 'selected' ?>
>
    <?= $tab ?> <?=  $item['label'] ?>
</option>
