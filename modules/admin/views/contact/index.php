<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сообщения с сайта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">

<!--    <p>-->
<!--        --><?//= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">

            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'email:email',
            'body:ntext',

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

            </div>
        </div>
    </div>

    <?php Pjax::end(); ?>

</div>
