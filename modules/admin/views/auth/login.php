<?php
/** @var \app\models\LoginForm $model */
?>

<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php $form = \yii\widgets\ActiveForm::begin() ?>
                <?= $form->field($model, 'username',
                        ['template' =>
                            "<div class=\"input-group mb-3\">
                                {input}
                                <div class=\"input-group-append\">
                                    <div class=\"input-group-text\">
                                        <span class=\"fas fa-user\"></span>
                                    </div>
                                </div>
                            </div>
                            <div>{error}</div>",
                        ]
                    )->textInput(['placeholder' => 'Login']) ?>
                <?= $form->field($model, 'password',
                        ['template' =>
                            "<div class=\"input-group mb-3\">
                                {input}
                                <div class=\"input-group-append\">
                                    <div class=\"input-group-text\">
                                        <span class=\"fas fa-lock\"></span>
                                    </div>
                                </div>
                            </div>
                            <div>{error}</div>",
                        ]
                    )->passwordInput(['placeholder' => 'Password']) ?>
            <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <?= $form->field($model, 'rememberMe')
                            ->checkbox(['template' => "{label} {input}"])?>
                    </div>
                </div>
                <div class="col-4">
                    <?= \yii\helpers\Html::submitButton('Login',['class' => 'btn btn-primary btn-block']) ?>
                </div>
            <?php \yii\widgets\ActiveForm::end() ?>

            <p class="mb-1">
                <a href="forgot-password.html">I forgot my password</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

