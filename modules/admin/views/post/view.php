<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $searchModel \app\modules\admin\models\CommentSearch */
/* @var $dataProvider \yii\data\ActiveDataProvider */
$tags = "";
foreach ($model->tags as $key => $tag) {
   $tags .= $tag->name;
   if ($key < count($model->tags) - 1) {
       $tags .= ', ';
   }
}



$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="post-view">
    <div class="col-md-12">
        <p>
            <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Вы действительно хотите удалить эту статью?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            [
                                'attribute' => 'title',
                                'value' => Html::a($model->title,['@web/post/view', 'id'=>$model->id]),
                                'format' => 'html',
                            ],
                            [
                                'attribute' => 'category_id',
                                'value' => isset($model->category->title) ?
                                    Html::a($model->category->title,['category/view', 'id'=>$model->category_id]) :
                                    'нет',
                                'format' => 'html',
                                'label' => 'Категория',
                            ],
                            'content:html',
                            [
                                'attribute' => 'img',
                                'value' => "@web/{$model->img}",
                                'format' => ['image', ['width' => '200px']],

                            ],
//                            'tags.name',
                            ['attribute' => 'tags.name',
                                'value' => $tags,
                                'label' => 'Теги'
                            ],
                            'description',
                            'created_at:datetime',
                            'updated_at:datetime',
                            'views',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Комментарии</h3>
                </div>
                <!-- /.card-header -->
                <div class="col-md-12 comment-table">
                    <?= $this->render('@app/modules/admin/views/comment/partial/commentTable', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                    ]);
                    ?>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

</div>
