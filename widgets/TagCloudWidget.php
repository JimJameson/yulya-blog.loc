<?php


namespace app\widgets;


use app\models\Tag;
use yii\helpers\Html;
use yii\jui\Widget;

class TagCloudWidget extends Widget
{
    public $limit = 20;

    public function run()
    {
        $tags = Tag::findTagWeights($this->limit);
        foreach ($tags as $tag => $weight)
            echo Html::a($tag, ['category/search-from-tag', 'tag' => $tag], ['style' => "font-size:{$weight}px; padding: 5px"]);
    }

}