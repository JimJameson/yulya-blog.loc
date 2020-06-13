<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Subscribe */

$this->title = 'Добавить адрес подписки';
$this->params['breadcrumbs'][] = ['label' => 'Подписки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscribe-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
