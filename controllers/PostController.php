<?php


namespace app\controllers;


use app\models\Category;
use app\models\CommentForm;
use app\models\Post;
use app\models\PostLike;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class PostController extends AppController
{

    public function actionView($id)
    {
        $post = Post::findOne($id);
        if(empty($post)) {
            throw new NotFoundHttpException('Данный пост отсутствует...');
        }
        if (!$post->is_published) {
            throw new NotFoundHttpException('Данный пост еще не опубликован');
        }
        $relatedPosts = Post::find()->where('category_id = :category_id AND id <> :id')
            ->addParams(['category_id' => $post->category_id, 'id' => $post->id])
            ->andWhere(['is_published' => 1])
            ->orderBy('updated_at DESC')->limit(2)->all();

        $this->setMeta("{$post->title} ::" . \Yii::$app->name,
            $post->keywords, $post->description);

        $commentForm = new CommentForm();

        $post->views = $post->views + 1;
        $post->save();

        return $this->render('view', compact('post', 'relatedPosts', 'commentForm'));
    }

    public function actionComment($id)
    {
        $model = new CommentForm();
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->saveComment($id)) {
                if (\Yii::$app->user->id != 1) {
                    \Yii::$app->session->setFlash('comment', 'Ваш комментарий сохранен. После подтверждения администратора он будет опубликован!');
                }
                return $this->redirect(['post/view', 'id' => $id]);
            }
        }
    }

    public function actionLike($id)
    {
        if (\Yii::$app->request->isPjax) {
            $post = Post::findOne($id);
            if($post->isLiked() == 0) {

                $post->likes++;
                $post->save();

                $postLike = new PostLike();
                $postLike->user_id = \Yii::$app->user->id;
                $postLike->post_id = $id;
                $postLike->save();

                return $this->renderPartial('partial/likes_greetings');
            }
        }
    }
}