<?php

class lesya_Core {
  public static function item(Good_Model $item, $id, $render = true ){
    $view = new View("_big_item");
    $view->item = $item;
    $view->id = $id;
    $view->render($render);
  }
  public static function line_cls($idx,$catalog_mode=false){
  	$idx = $idx + 1;
  	$cls = "";
  	if($catalog_mode){
	  	if($idx == 0) $cls .= " first-in-line first-item-of-tablet-line first-item-of-mobile-line";
	  	if($idx%3 == 0 && $idx!=0)       $cls .= " last-item-of-mobile-line ";
	  	if($idx%2 == 0 && $idx!=0)       $cls .= " last-item-of-tablet-line ";
	  	if($idx%3 == 0 && $idx!=0)       $cls .= " last-in-line ";
	  	if(($idx - 1)%3 == 0) $cls .= " first-item-of-mobile-line ";
	  	if(($idx - 1)%2 == 0) $cls .= " first-item-of-tablet-line ";
	  	if(($idx - 1)%3 == 0) $cls .= " first-in-line ";
  	}
  	else{
	  	if($idx == 0) $cls .= " first-in-line first-item-of-tablet-line first-item-of-mobile-line";
	  	if($idx%2 == 0 && $idx!=0)       $cls .= " last-item-of-mobile-line ";
	  	if($idx%3 == 0 && $idx!=0)       $cls .= " last-item-of-tablet-line ";
	  	if($idx%4 == 0 && $idx!=0)       $cls .= " last-in-line ";
	  	if(($idx - 1)%2 == 0) $cls .= " first-item-of-mobile-line ";
	  	if(($idx - 1)%3 == 0) $cls .= " first-item-of-tablet-line ";
	  	if(($idx - 1)%4 == 0) $cls .= " first-in-line ";
  	}

  	return $cls;
  }

  public static function filters(){
  	$view = new View("_filter");
  	$view->lang = Kohana::lang("global");
  	$view->sizes = ORM::factory("size")->find_all();
  	return $view->render();
  }

  public static function sale(){
  	$view = new View("left/sale");
  	$view->lang = Kohana::lang("global");
  	$view->item = ORM::factory("good")->where("has_sale",1)->orderby(null,"RAND()")->limit(1)->find();
  	return $view->render();
  }


  public static function new_items(){
  	$view = new View("left/new");
  	$view->lang = Kohana::lang("global");
  	$new_time = time() - Kohana::config("lesya.new_time");
  	$view->items = ORM::factory("good")->where("`created_at` > ".$new_time)->orderby(null,"RAND()")->limit(Kohana::config("lesya.new_limit"))->find_all();
  	return $view->render();
  }

  public static function top(){
  	$top_ids = Database::instance()->from("positions")->select("good_id,COUNT(good_id) AS cnt")->groupby("good_id")->orderby("cnt","DESC")->limit(Kohana::config("lesya.top_limit"))->get();
  	$top_ids_ = array();
  	foreach ($top_ids as $key => $value) {
  		$top_ids_[] = $value->good_id;
  	}
  	$view = new View("left/top");
  	$view->lang = Kohana::lang("global");
  	$view->items = ORM::factory("good")->where("id IN (".implode(",", $top_ids_).")")->find_all();
  	return $view->render();
  }
}