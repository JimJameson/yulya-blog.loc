<?php


namespace app\widgets;


use app\models\Comment;
use yii\jui\Widget;

class LatestCommentsWidget extends Widget
{

    public function run()
    {

        $latestComments = Comment::find()->where(['status' => 1])->orderBy('updated_at DESC')->all();

        return $this->render('latestComments', compact('latestComments'));

    }

}