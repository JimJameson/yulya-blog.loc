<?php


namespace app\widgets;


use app\models\SubscribeForm;
use yii\base\Widget;

class SubscribeWidget extends Widget
{

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {
        $model = new SubscribeForm();

        return $this->render('form', compact('model'));
    }

}