<?php


namespace app\widgets;


use app\models\Category;
use app\models\Post;
use yii\base\Widget;

class NewsWidget extends Widget
{

    public function run()
    {
        $newsCategory = Category::getCategoryChildren(12);
        $news = Post::find()->where(['category_id' => $newsCategory])->andWhere(['is_published' => 1])->orderBy('updated_at DESC')->limit(4)->all();
        return $this->render('news', compact('news'));
    }

}