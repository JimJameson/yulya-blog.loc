<?php


namespace app\controllers;


use app\models\Contact;
use app\models\ContactForm;
use app\models\Post;
use app\models\Subscribe;
use app\models\SubscribeForm;
use Yii;
use yii\data\Pagination;

class HomeController extends AppController
{

    public function actionIndex()
    {
        $query = Post::find()->joinWith('category')->where(['is_published' => 1]);
        $pages = new Pagination(['totalCount' => $query->count(),
            'pageSize' => 20,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $posts = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('index', compact('posts', 'pages'));
    }

    public function actionSubscribe()
    {
        $form = new SubscribeForm();
        if ($form->load(Yii::$app->request->post()) && $form->saveSubscribe()) {
            \Yii::$app->session->setFlash('success','Подписка оформлена!');
            return $this->goBack();
        }
    }

    public function actionContact()
    {
        $form = new ContactForm();
        if ($form->load(Yii::$app->request->post()) && $form->saveContact()) {
            \Yii::$app->session->setFlash('success','Ваше сообщение успешно отправлено!');
            return $this->goBack();
        }
    }

}