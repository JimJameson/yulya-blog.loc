<?php


namespace app\models;


use yii\base\Model;

class CommentForm extends Model
{

    public $message;
    public $captcha;

    public function rules()
    {
        return [
            ['message', 'required'],
            ['message', 'string', 'length' => [3, 255]],
            ['captcha', 'captcha', 'captchaAction' => 'comment/captcha'],

        ];
    }

    public function saveComment($post_id)
    {
        $comment = new Comment();
        $comment->message = $this->message;
        $comment->user_id = \Yii::$app->user->id;
        $comment->post_id = $post_id;
        $comment->status = 0;
        return $comment->save();
    }
}