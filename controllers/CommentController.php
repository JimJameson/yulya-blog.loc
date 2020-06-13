<?php


namespace app\controllers;


class CommentController extends AppController
{
    public function actions()
    {
        return [

            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


}