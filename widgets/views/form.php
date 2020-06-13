<?php
/**
 * @var \app\models\SubscribeForm $model;
 */
?>

<div class="newsletter-widget">
    <h4>Подписаться <br>на наши новости</h4>
    <?php $form = \yii\widgets\ActiveForm::begin([
        'action' => \yii\helpers\Url::to('home/subscribe'),
        'fieldConfig' => [
            'template' => "{input} \n {error}",
        ]
    ])?>
    <?= $form->field($model, 'name', ['inputOptions' => ['placeholder' => 'Имя', 'id' => $form->id . '-name']]) ?>
    <?= $form->field($model, 'email', ['inputOptions' => ['placeholder' => 'E-mail', 'id' => $form->id . '-email']]) ?>
    <?= \yii\helpers\Html::submitButton('Подписаться',['class' => 'btn w-100']) ?>
    <?php \yii\widgets\ActiveForm::end() ?>
</div>
