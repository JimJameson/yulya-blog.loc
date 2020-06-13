<?php


namespace app\widgets;


use app\models\SignupForm;
use yii\base\Widget;

class SignupWidget extends Widget
{
    public function run()
    {
        $model = new SignupForm();
        return $this->render('signup', compact('model'));
    }

}