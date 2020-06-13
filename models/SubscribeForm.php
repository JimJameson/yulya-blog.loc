<?php


namespace app\models;


use yii\base\Model;

class SubscribeForm extends Model
{

    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['name', 'string', 'max' => 50],
            ['email', 'email']
        ];
    }

    public function saveSubscribe()
    {
        $model = new Subscribe();
        $model->name = $this->name;
        $model->email = $this->email;
        return $model->save() && $model->sendMail();
    }
}