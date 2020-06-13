<?php


namespace app\widgets;


use app\models\Post;
use yii\jui\Widget;

class PopularPostsWidget extends Widget
{

    public function run()
    {

        $popularPosts = Post::find()->where(['is_published' => 1])->orderBy('views DESC')->limit(3)->all();

        return $this->render('popularPosts', compact('popularPosts'));
    }

}