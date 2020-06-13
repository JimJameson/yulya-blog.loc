<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category
 *@var $postsDataProvider \yii\debug\models\timeline\DataProvider
 */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <div class="col-md-12">
        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить эту категорию?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    </div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'title',
            'img',
            [
                'attribute' => 'parent_id',
                'label' => 'Родитель',
                'value' => isset($model->parent->title) ? Html::a($model->parent->title, ['category/view', 'id' => $model->parent->id]) : 'нет',
                'format' => 'html',
            ],
            'description',
            'keywords',
            'color',
            'isGroup',
        ],
    ]) ?>
        </div>
    </div>
</div>
    <div class="col-md-12">
        <p>
            <?= Html::a('Новая статья', ['post/create', 'category_id' => $model->id], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?= GridView::widget([
                    'dataProvider' => $postsDataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

//                        'id',
//                        [
//                            'attribute' => 'category.title',
//                            'label' => 'Категория',
//                            'value' => function($data) {
//                                return Html::a($data->category->title,['category/view', 'id' => $data->category->id]);
//                            },
//                            'format' => 'html',
//                        ],
                        'title',
//                        'content:ntext',
//                        'img',
                        //'keywords',
                        //'description',
                        'created_at:datetime',
                        //'views',
                        'updated_at:datetime',

                        ['class' => 'yii\grid\ActionColumn',
                            'header' => 'Действия',
                            'buttons' => [
                                'view' => function ($url, $model, $key) {
                                    return Html::a('', $url,['class' => 'far fa-eye']);
                                },
                                'update' => function ($url, $model, $key) {
                                    return Html::a('', $url,['class' => 'fas fa-pen']);
                                },
                                'delete' => function ($url, $model, $key) {
                                    return Html::a('', $url,[
                                            'class' => 'fas fa-eraser',
                                            'data' => [
                                                'confirm' => 'Вы действительно хотите удалить эту статью?',
                                                'method' => 'post',
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
            </div>
        </div>
    </div>

</div>
