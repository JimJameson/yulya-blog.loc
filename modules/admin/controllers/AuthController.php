<?php


namespace app\modules\admin\controllers;


use app\models\LoginForm;
use Yii;

class AuthController extends AppAdminController
{

    public $layout = 'auth';



    public function actionLogin()
    {
        if (Yii::$app->user->id === 1) {
            return $this->goBack();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goBack();
    }

}
