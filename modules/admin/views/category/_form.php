<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">
<div class="col-md-12">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'short_title')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'img')->textInput(['maxlength' => true]) ?>

    <?php if (empty($model->parent_id) || !$model->parent_id == 0): ?>
        <div class="form-group field-category-parent_id has-success required">
        <label class="control-label" for="category-parent_id">Родитель</label>
        <?= \app\widgets\SelectWidget::widget([
            'template' => 'select_category',
            'tree' => \app\models\Category::getTree(),
            'htmlBegin' => "
                    <select id=\"category-parent_id\" class=\"form-control\" name=\"Category[parent_id]\" aria-invalid=\"false\">
                    ",
            'htmlEnd' => "</select>",
            'model' => $model,
        ]) ?>
        <div class="help-block"></div>
    </div>
    <?php endif; ?>

<!--    --><?//= $form->field($model, 'color')->
//    dropDownList(['blue', 'indigo', 'purple', 'pink', 'red', 'orange', 'yellow', 'green', 'teal', 'cyan', 'gray', 'gray-dark'], [
//        'prompt' => 'Выберите цвет',
//        'class' => 'form-control color-chooser',
//        'options' => [
//            '0' => ['class' => 'blue'],
//            '1' => ['class' => 'indigo'],
//            '2' => ['class' => 'purple'],
//            '3' => ['class' => 'pink'],
//            '4' => ['class' => 'red'],
//            '5' => ['class' => 'orange'],
//            '6' => ['class' => 'yellow'],
//            '7' => ['class' => 'green'],
//            '8' => ['class' => 'teal'],
//            '9' => ['class' => 'cyan'],
//            '10' => ['class' => 'gray'],
//            '11' => ['class' => 'gray-dark'],
//        ]
//    ])?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>


</div>
