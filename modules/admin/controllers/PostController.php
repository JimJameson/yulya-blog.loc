<?php

namespace app\modules\admin\controllers;

use app\models\Category;
use app\modules\admin\models\CommentSearch;
use app\modules\admin\models\PostSearch;
use Yii;
use app\models\Post;
use app\modules\admin\controllers\AppAdminController;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends AppAdminController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->renderIndex();
    }

    public function renderIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categories = Category::find()->asArray()->select(['id', 'title'])->all();
        $categories = ArrayHelper::map($categories, 'id', 'title');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories
        ]);
    }
    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('view', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @param int|null $id - id категории
     * @return mixed
     */
    public function actionCreate(int $category_id = null)
    {
        $model = new Post();
        if ($category_id && Category::findOne($category_id)) {
            $model->category_id = $category_id;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Статья успешно создана');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if ($model->is_published) {
                Yii::$app->session->setFlash('success', 'Статья обновлена и опубликована');
            } else {
                Yii::$app->session->setFlash('success', 'Статья обновлена');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        if (Yii::$app->request->isPost) {
            $id = Yii::$app->request->post('id');
            $this->findModel($id)->unlinkAll('comments', true);
            if($this->findModel($id)->delete()) {
                Yii::$app->session->setFlash('success', 'Статья удалена');
            } else {
                Yii::$app->session->setFlash('error', 'При удалении возникла ошибка');
            }
        }
        return $this->renderIndex();
    }

    public function actionSetPublishStatus()
    {
        if (Yii::$app->request->isPost) {
            $model = Post::findOne(Yii::$app->request->post('id'));
            if ($model) {
                $model->changePublishStatus(Yii::$app->request->post('status'));
            }
        }
        return $this->renderIndex();
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::find()->with('tags')->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
