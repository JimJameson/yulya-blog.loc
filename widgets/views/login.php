<?php
/** @var \app\models\LoginForm $model */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html; ?>

<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'action' => 'auth/login',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-12\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-12 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-1 col-md-12\">{input} {label}</div>\n<div class=\"col-md-12\">{error}</div>",
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?= yii\authclient\widgets\AuthChoice::widget([
        'baseAuthUrl' => ['auth/authVK'],
        'popupMode' => false,
    ]) ?>

</div>
