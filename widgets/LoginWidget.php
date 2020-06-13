<?php


namespace app\widgets;


use app\models\LoginForm;
use yii\base\Widget;

class LoginWidget extends Widget
{

    public function run()
    {
        $model = new LoginForm();
        return $this->render('login', compact('model'));
    }

}