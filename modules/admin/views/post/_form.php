<?php

use bupy7\cropbox\CropboxWidget;
use kartik\select2\Select2;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\elfinder\ElFinder;
use kartik\file\FileInput;

mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */

$data = \app\models\Tag::find()->select(['id', 'name'])->asArray()->all();
$data = \yii\helpers\ArrayHelper::map($data, 'id', 'name');
?>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="post-form">

                <?php $form = ActiveForm::begin([
                    'options' => ['enctype'=>'multipart/form-data']
//                        'fieldConfig' => [
//                            'template' => ["
//                                <div class='col-md-6'>
//                                    <p>{label}</p> \n
//                                    {input} \n
//                                    <div>{error}</div>
//                                </div>
//                            "]
//                        ]
                ]); ?>

                <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                <div class="form-group field-category-parent_id has-success">
                    <label class="control-label" for="category_id">Категория</label>
                    <?= \app\widgets\SelectWidget::widget([
                        'template' => 'select_category_in_post',
                        'tree' => \app\models\Category::getTree(),
                        'htmlBegin' => "
                    <select id=\"category_id\" class=\"form-control\" name=\"Post[category_id]\" aria-invalid=\"false\">
                    ",
                        'htmlEnd' => "</select>",
                        'model' => $model,
                    ]) ?>
                    <div class="help-block"></div>
                </div>

                <?= $form->field($model, 'short_content')->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'content')->widget(CKEditor::class,[
                    'editorOptions' => ElFinder::ckeditorOptions('elfinder',['preset' => 'standard']),
                ]); ?>

                <?php
                echo $form->field($model, 'file')->widget(\bilginnet\cropper\Cropper::class, [
                    // you can set image url directly
                    // you will see this image in the crop area if is set
                    // default null
                    'imageUrl' => (!empty($model->img)) ? Yii::getAlias('@web') . '/' . $model->img : null,

                    'cropperOptions' => [
                        'width' => 1000, // must be specified
                        'height' => 740, // must be specified

                        // optional
                        // url must be set in update action
                        'preview' => [
                            'url' => (!empty($model->img)) ? Yii::getAlias('@web') . '/' . $model->img : null,
                            'width' => 250, // must be specified // you can set as string '100%'
                            'height' => 185, // must be specified // you can set as string '100px'
                        ],

                        // optional // default following code
                        // you can customize
                        'buttonCssClass' => 'btn btn-primary',

                        // optional // defaults following code
                        // you can customize
                        'icons' => [
                            'browse' => '<i class="fa fa-image"></i>',
                            'crop' => '<i class="fa fa-crop"></i>',
                            'close' => '<i class="fa fa-crop"></i>',
                            'zoom-in' => '<i class="fa fa-search-plus"></i>',
                            'zoom-out' => '<i class="fa fa-search-minus"></i>',
                            'rotate-left' => '<i class="fas fa-undo"></i>',
                            'rotate-right' => '<i class="fas fa-redo"></i>',
                            'flip-horizontal' => '<i class="fas fa-arrows-alt-h"></i>',
                            'flip-vertical' => '<i class="fas fa-arrows-alt-v"></i>',
                            'move-left' => '<i class="fa fa-arrow-left"></i>',
                            'move-right' => '<i class="fa fa-arrow-right"></i>',
                            'move-up' => '<i class="fa fa-arrow-up"></i>',
                            'move-down' => '<i class="fa fa-arrow-down"></i>',
                        ]
                    ],


                    // optional // defaults following code
                    // you can customize
//                    'label' => '$model->attribute->label',

                    // optional // default following code
                    // you can customize
                    'template' => '{button}{preview}',
                ]);
                ?>

<!--                --><?//= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>
                <?php

                echo $form->field($model, 'tags')->widget(Select2::class, [
                    'data' => $data,
                    'language' => 'ru',
                    'options' => ['placeholder' => 'Введите ключевые слова', 'multiple' => true],
                    'pluginOptions' => [
                            'allowClear' => true,
                        'tags' => true,
                        'tokenSeparators' => [',', ' '],
                        'maximumInputLength' => 10
                    ],
                ])->label('Ключевые слова');

                ?>
                <?= $form->field($model, 'description')->textarea(['rows' => 6, 'maxlength' => true]) ?>

                <?= Html::activeHiddenInput($model, 'is_published') ?>

                <?php if (!$model->is_published): ?>
                <?= $form->field($model, 'mailing',['options' => [
                        'class' => 'custom-control custom-switch mb-3'],
                        'labelOptions' => ['class' => 'custom-control-label'],
                        'template' => '{input}{label}',
                    ])->checkbox([
                        'class' => 'custom-control-input'], false) ?>
                <?php endif; ?>
                <div class="form-group">

                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
                    <?php if ($model->is_published): ?>
                        <?= Html::submitButton('Снять с публикации', ['class' => 'btn btn-danger', 'id' => 'post-publish-disabled']) ?>
                    <?php else: ?>
                        <?= Html::submitButton('Опубликовать', ['class' => 'btn btn-primary', 'id' => 'post-publish-enabled']) ?>
                    <?php endif; ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

