<?php


namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password_repeat;
    public $password;
    public $email;
    public $captcha;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username', 'email', 'password', 'password_repeat'], 'string', 'max' => 255],
            ['password', 'compare', 'message' => 'Пароли не совпадают'],
            ['email', 'email'],
            ['captcha', 'captcha', 'captchaAction' => 'auth/captcha'],
            ['email', 'unique',
                'targetClass' => 'app\models\User',
                'targetAttribute' => 'email',
                'message' => 'Пользователь с этим e-mail уже зарегистрирован'
            ],
            ['username', 'unique',
                'targetClass' => 'app\models\User',
                'targetAttribute' => 'username',
                'message' => 'Этот логин уже занят',
            ],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя:',
            'email' => 'E-mail:',
            'password' => 'Пароль:',
            'password_repeat' => 'Повторить пароль:',
            'captcha' => 'Введите текст с картинки:',

        ];
    }
}

