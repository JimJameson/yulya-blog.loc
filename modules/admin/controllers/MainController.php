<?php


namespace app\modules\admin\controllers;


use app\models\Category;
use app\models\Comment;
use app\models\Post;
use app\models\User;

class MainController extends AppAdminController
{

    public function actionIndex()
    {
        $posts = Post::find()->count();
        $comments = Comment::find()->count();
        $users = User::find()->count();
        $categories = Category::find()->count();

        return $this->render('index', compact('posts', 'comments', 'users', 'categories'));
    }

}