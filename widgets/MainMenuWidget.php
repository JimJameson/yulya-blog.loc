<?php


namespace app\widgets;


use app\models\Category;
use phpDocumentor\Reflection\Types\Array_;
use yii\base\Widget;
use yii\widgets\Menu;

class MainMenuWidget extends Widget
{

  public function run()
  {
//      $menu = [];
      $categories = Category::getTree();
      array_unshift($categories,['label' => 'Главная','url' => '/']);
      array_push($categories,[
          'label' => 'Связаться',
          'url' => '',
          'template' => "<button type=\"button\" class=\"contact-btn\" data-toggle=\"modal\" data-target=\"#contactModal\">{label}</button>"
      ]);

//      $menu[1]['items'] = $categories;
    echo  Menu::widget([
         'submenuTemplate' => "\n <ul class='dropdown'> \n {items} \n </ul> \n",
          'items' => $categories,
     ]);
  }

}