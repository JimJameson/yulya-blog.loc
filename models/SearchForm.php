<?php


namespace app\models;


use yii\base\Model;
use yii\helpers\StringHelper;

class SearchForm extends Model
{


    public function search($keywords)
    {
        $searchArr = StringHelper::explode($keywords,',',function ($element) {
            return rtrim($element);
        }, true);

        return Post::find()->where(['keywords' => $searchArr]);
    }

}