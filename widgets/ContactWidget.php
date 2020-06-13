<?php


namespace app\widgets;


use app\models\ContactForm;
use yii\jui\Widget;

class ContactWidget extends Widget
{

    public function run()
    {
        $model = new ContactForm();

        return $this->render('contacts', compact('model'));
    }

}