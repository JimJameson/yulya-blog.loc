<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
    <div class="col-md-12">
        <p>
            <?= Html::a('Новый пользователь', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
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
            'username',
//            'password',
            'auth_key',
            'social_id',

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
                                'confirm' => 'Вы действительно хотите удалить данного пользователя?',
                                'method' => 'post',
                            ],
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>

</div>
