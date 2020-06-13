<?php
/** @var \yii\web\View $this
 * @var \app\models\Contact $model
 */
?>

<p>Пользователь <b><?= $model->name ?></b> отправил
    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['admin/contact/view', 'id' => $model->id]) ?>">
        сообщение
    </a>
    с сайта
    <a href="<?= Yii::$app->urlManager->createAbsoluteUrl('/') ?>">
        <?= Yii::$app->name ?>
    </a>
</p>
<h3>Текст сообщения</h3>
<p>
    <?= $model->body ?>
</p>
