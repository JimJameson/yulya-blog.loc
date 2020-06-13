<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $categories array */


$this->title = 'Список статей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">
    <div class="col-md-12">
        <p>
            <?= Html::a('Новая статья', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php \yii\widgets\Pjax::begin() ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                        'id',
//                        'title',
                        [
                            'attribute' => 'title',
                            'value' => function($data) {
                                return Html::a($data->title,['post/view', 'id' => $data->id]);
                            },
                            'format' => 'html',
                        ],

                        [
                            'attribute' => 'category_id',
                            'label' => 'Категория',
//                            'filter' => $categories,
                            'filter' => \app\widgets\SelectWidget::widget([
                                            'template' => 'select_category_in_post_search',
                                            'tree' => \app\models\Category::getTree(),
                                            'htmlBegin' => "
                                                <select class=\"form-control\" name=\"PostSearch[category_id]\">
                                                    <option value></option>
                                                ",
                                            'htmlEnd' => "</select>",
                                            'model' => $searchModel,
                            ]),
                            'value' => function($data) {
                                return Html::a($data->category->title,['category/view', 'id' => $data->category->id]);
                            },
                            'format' => 'html',
                        ],
//                        'content:ntext',
//                        'img',
                        //'keywords',
                        //'description',
                        'created_at:datetime',
                        //'views',
                        'updated_at:datetime',
                        ['class' => 'yii\grid\ActionColumn',
                            'header' => 'Публикация',
                            'template' => '{setPublishStatus}',
                            'buttons' => [
                                'setPublishStatus' => function ($url, $model, $key) {
                                    $classBtn = 'btn btn-success';
                                    $content = 'Опубликовать';
                                    $newStatus = 1;
                                    if ($model->is_published) {
                                        $classBtn = 'btn btn-danger';
                                        $content = 'Снять';
                                        $newStatus = 0;
                                    }
                                    return Html::a($content, ['post/set-publish-status'],[
                                        'class' => 'comment-change_status ' . $classBtn,
                                        'data' => [
                                            'method' => 'post',
                                            'pjax' => true,
                                            'params' => ['id' => $model->id, 'status' => $newStatus],
                                        ],

                                    ]);
                                }
                            ]
                            ],

                        ['class' => 'yii\grid\ActionColumn',
                            'header' => 'Действия',
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    return Html::a('', $url,[
                                        'class' => 'far fa-eye',
                                    ]);
                                },
                                'update' => function ($url, $model, $key) {
                                    return Html::a('', $url,[
                                        'class' => 'fas fa-pen',
                                    ]);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return Html::a('', ['post/delete'],[
                                        'class' => 'fas fa-eraser',
                                        'data' => [
                                            'confirm' => 'Вы действительно хотите удалить эту статью?',
                                            'method' => 'post',
                                            'pjax' => true,
                                            'params' => ['id' => $model->id],
                                        ],
                                    ]);
                                },
                            ],
                        ],
                    ],
                    'tableOptions' => ['class' => 'table table-bordered'],
                    'pager' => [
                        'options' => ['class' => 'pagination pagination-sm m-0 float-right'],
                        'linkOptions' => ['class' => 'page-link'],
                        'pageCssClass' => 'page-item',
                        'prevPageCssClass' => 'page-item',
                        'nextPageCssClass' => 'page-item',
                        'disabledPageCssClass' => 'page-item',
                        'disabledListItemSubTagOptions' => ['class' => 'page-link'],
                    ],

                ]); ?>
                <?php \yii\widgets\Pjax::end() ?>

            </div>
        </div>
    </div>

</div>
