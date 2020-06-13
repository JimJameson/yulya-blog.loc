<?php
/** @var \app\models\LoginForm $model */

use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html; ?>

<div class="site-login">

    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
        'action' => 'auth/signup',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-12 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username', ['enableAjaxValidation' => true])->textInput(['autofocus' => true]) ?>

    <?= $form->field($model, 'email', ['enableAjaxValidation' => true])->textInput() ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'password_repeat')->passwordInput() ?>

    <?= $form->field($model, 'captcha')->widget(Captcha::class, ['captchaAction' => 'auth/captcha']) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Вход', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

