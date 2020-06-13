<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <div class="col-md-12">
        <p>
            <?= Html::a('Новая категория', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <?= \leandrogehlen\treegrid\TreeGrid::widget([
                    'keyColumnName' => 'id',
                    'parentColumnName' => 'parent_id',
                    'dataProvider' => $dataProvider,
//                    'filterModel' => $searchModel,
                    'columns' => [
//                        ['class' => 'yii\grid\SerialColumn'],

//            'id',
                        [
                            'attribute' => 'title',
                            'value' => function($data) {
                                if (!$data->parent_id == 0) {
                                    $result = Html::a($data->title, ['category/view', 'id' => $data->id]);
                                } else {
                                    $result = $data->title;
                                }
                                return $result;
                            },
                            'format' => 'html',
                        ],
//            'img',
//                        [
//                            'attribute' => 'parent.title',
//                            'label' => 'Родитель',
//                            'value' => function($data) {
//                                return Html::a($data->parent->title, ['category/view', 'id' => $data->parent->id]);
//                            },
//                            'format' => 'html',

//                        ],
//            'description',
                        //'keywords',
                        //'color',
                        //'isGroup',

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
                                    return Html::a('', $url,[
                                            'class' => 'fas fa-eraser',
                                            'data' => [
                                                'confirm' => 'Вы действительно хотите удалить эту категорию?',
                                                'method' => 'post',
                                            ],
                                    ]);
                                },
                            ],
                        ],
                    ],
                    'options' => ['class' => 'table table-bordered'],

                ]); ?>
<!--                --><?//= GridView::widget([
//                    'dataProvider' => $dataProvider,
//                    'filterModel' => $searchModel,
//                    'columns' => [
//                        ['class' => 'yii\grid\SerialColumn'],
//
////            'id',
//                        'title',
////            'img',
//                        [
//                            'attribute' => 'parent.title',
//                            'label' => 'Родитель',
//                            'value' => function($data) {
//                                return Html::a($data->parent->title, ['category/view', 'id' => $data->parent->id]);
//                            },
//                            'format' => 'html',
//
//                        ],
////            'description',
//                        //'keywords',
//                        //'color',
//                        //'isGroup',
//
//                        ['class' => 'yii\grid\ActionColumn',
//                            'header' => 'Действия',
//                            'buttons' => [
//                                'view' => function ($url, $model, $key) {
//                                    return Html::a('', $url,['class' => 'far fa-eye']);
//                                },
//                                'update' => function ($url, $model, $key) {
//                                    return Html::a('', $url,['class' => 'fas fa-pen']);
//                                },
//                                'delete' => function ($url, $model, $key) {
//                                    return Html::a('', $url,['class' => 'fas fa-eraser']);
//                                },
//
//                            ],
//                        ],
//                    ],
//                    'tableOptions' => ['class' => 'table table-bordered'],
//                    'pager' => [
//                        'options' => ['class' => 'pagination pagination-sm m-0 float-right'],
//                        'linkOptions' => ['class' => 'page-link'],
//                        'pageCssClass' => 'page-item',
//                        'prevPageCssClass' => 'page-item',
//                        'nextPageCssClass' => 'page-item',
//                        'disabledPageCssClass' => 'page-item',
//                        'disabledListItemSubTagOptions' => ['class' => 'page-link'],
//                    ],
//                ]); ?>
            </div>
        </div>
    </div>

</div>
