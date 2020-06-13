<?php
/** @var \yii\debug\models\timeline\DataProvider $dataProvider */
/** @var \app\modules\admin\models\CommentSearch $searchModel */

use yii\grid\GridView;
use yii\helpers\Html; ?>

<div class="card">
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                [
                    'attribute' => 'post.title',
                    'label' => 'Статья',
                    'value' => function($data) {
                        return Html::a($data->post->title,['post/view', 'id' => $data->post->id]);
                    },
                    'format' => 'html',
                ],
                [
                    'attribute' => 'users.username',
                    'label' => 'Пользователь',
                    'value' => function($data) {
                        return Html::a($data->user->username,['user/view', 'id' => $data->user->id]);
                    },
                    'format' => 'html',
                ],
                'created_at:datetime',
                'message:ntext',

                //'parent_id',
                //'updated_at',
                //'status',

                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Опубликовать',
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                            if ($model->status == 0) {
                                $classBtn = 'btn btn-success';
                                $content = 'Опубликовать';
                            } else {
                                $classBtn = 'btn btn-danger';
                                $content = 'Снять';
                            }
                            return Html::button($content, [
                                'class' => 'comment-change_status ' . $classBtn,
                                'data-id' => $model->id,
                            ]);
                        },
                        'view' => function ($url, $model, $key) {
                            return false;
                        },
                        'delete' => function ($url, $model, $key) {
                            return false;
                        },
                    ],
                ],
                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Удалить',
                    'buttons' => [
                        'delete' => function ($url, $model, $key) {
                            return Html::button('Удалить', [
                                'class' => 'btn btn-warning comment-delete',
                            ]);
                        },
                        'view' => function ($url, $model, $key) {
                            return false;
                        },
                        'update' => function ($url, $model, $key) {
                            return false;
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

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Вы действительно хотите удалить этот комментарий?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="modal-delete-btn">Да</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Нет</button>
            </div>
        </div>
    </div>
</div>