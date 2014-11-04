<?php

class cake_Core {
  public static function item(Good_Model $item, $id, $render = true ){
    $view = new View("_big_item");
    $view->item = $item;
    $view->id = $id;
    $view->render($render);
  }
}