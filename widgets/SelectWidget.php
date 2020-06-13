<?php


namespace app\widgets;


use yii\base\Widget;

class SelectWidget extends Widget
{

    public $template;
    public $tree;
    public $htmlBegin;
    public $htmlEnd;
    public $model;

    private $htmlResult;

    public function run()
    {
         $this->htmlResult = $this->htmlBegin;
         $this->htmlResult .= $this->getItems($this->tree);
         $this->htmlResult .= $this->htmlEnd;
        return $this->htmlResult;
    }

    protected function getItems($tree, &$str = '', $tab = '')
    {
        foreach ($tree as $item) {
            $str .= $this->render($this->template, [
                'item' => $item,
                'model' => $this->model,
                'tab' => $tab] );
            if(isset($item['items'])) {
                $this->getItems($item['items'], $str, $tab . '-');
            }
        }
        return $str;
    }

}