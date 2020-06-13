<?php


namespace app\widgets;


use app\models\Post;
use yii\jui\Widget;

class LatestPostWidget extends Widget
{

    public function run()
    {

        $latestPosts = Post::find()->orderBy('updated_at DESC')->where(['is_published' => 1])->limit(3)->all();

        return $this->render('latestPosts', compact('latestPosts'));

    }

}