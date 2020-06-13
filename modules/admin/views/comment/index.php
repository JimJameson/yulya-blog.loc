<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">
    <div class="col-md-12 mb-2">
        <div class="custom-control custom-switch status-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1">Показывать только не опубликованные</label>
        </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="col-md-12 comment-table">
        <?= $this->render('partial/commentTable', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
        ?>
    </div>
</div>
