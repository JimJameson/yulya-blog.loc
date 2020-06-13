<?php


namespace app\controllers;


use app\models\Category;
use app\models\Post;
use app\models\SearchForm;
use yii\data\Pagination;
use yii\helpers\StringHelper;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{

    public function actionView($id)
    {
        $category = Category::findOne($id);
        if(empty($category)) {
            throw new NotFoundHttpException('Такой категории нет...');
        }

        $this->setMeta("{$category->title} ::" . \Yii::$app->name,
            $category->keywords, $category->description);

        $categories_id = Category::getCategoryChildren($id);

        $query = Post::getCategoryPostsQuery($categories_id);
        $pages = $this->getPagination($query);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();
        $firstPost = $posts[0];
        array_shift($posts);
       return $this->render('view', compact('category', 'posts', 'firstPost', 'pages'));
    }

    public function actionSearch($search)
    {
        if (\Yii::$app->request->get()) {

            $query = Post::find()->where(['like', 'keywords', $search])
                ->orWhere(['like', 'title', $search])
                ->orWhere(['like', 'description', $search])
                ->andWhere(['is_published' => 1]);

            $pages = $this->getPagination($query);
            $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('search', compact('posts', 'pages'));
        }

    }

    public function actionSearchFromTag($tag)
    {
        if (\Yii::$app->request->get()) {

            $query = Post::find()->where(['LIKE', 'keywords', $tag])->andWhere(['is_published' => 1]);

            $pages = $this->getPagination($query);
            $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

            return $this->render('search', compact('posts', 'pages'));
        }
    }

    public function getPagination($query)
    {
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 20,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        return $pages;
    }

}