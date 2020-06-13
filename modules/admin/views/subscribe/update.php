<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subscribe */

$this->title = 'Редактирование адреса подписки: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Подписки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="subscribe-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
