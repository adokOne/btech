<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Goods_Admin extends Admin_Controller {

	public function index($page = 1){
		View::set_global("main_height",1400);
		$items = ORM::factory("good")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$view  = new View("goods/index");
		$view->items = $items;
		$actions = new View("goods/actions");
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}

	public function new_one(){
		View::set_global("main_height",1800);
		$view = new View("goods/edit");
		$view->object =  new Good_Model();
		$view->lables = ORM::factory("size")->find_all();
		$view->rukavs = ORM::factory("rukav")->find_all();
		$view->colors = ORM::factory("color")->find_all();
		$view->types  = ORM::factory("type")->find_all();
		$view->categories = ORM::factory("category")->where("id != 1")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		View::set_global("main_height",1800);
		$object = $this->check_object_by_id("good",$id);
		$view = new View("goods/edit");
		$view->object =  $object ;
		$view->categories = ORM::factory("category")->where("id != 1")->find_all();
		$view->lables = ORM::factory("size")->find_all();
		$view->rukavs = ORM::factory("rukav")->find_all();
		$view->colors = ORM::factory("color")->find_all();
		$view->types  = ORM::factory("type")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$sizes  = $object->sizes;
		unset($object->sizes);
		$categories  = !isset($object->categories) ? array() : ORM::factory("category")->where("id IN (".implode(",", array_keys($object->categories)).")")->find_all();
		if(isset($object->categories)) unset($object->categories);
		$types  = !isset($object->types) ? array() : ORM::factory("type")->where("id IN (".implode(",", array_keys($object->types)).")")->find_all();
		if(isset($object->types)) unset($object->types);
		$colors  = !isset($object->colors) ? array() : ORM::factory("color")->where("id IN (".implode(",", array_keys($object->colors)).")")->find_all();
		if(isset($object->colors)) unset($object->colors);
		$rukavs  = !isset($object->rukavs) ? array() : ORM::factory("rukav")->where("id IN (".implode(",", array_keys($object->rukavs)).")")->find_all();
		if(isset($object->rukavs)) unset($object->rukavs);
		$item   = $object->id ? ORM::factory("good")->find($object->id) : new Good_Model();

		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}

		$item->has_sale = isset($object->has_sale) ? 1 : 0;
		$item->show_on_main = isset($object->show_on_main) ? 1 : 0;
		$item->active = isset($object->active) ? 1 : 0;
		
		$item->save();
		if(isset($sizes["id"]) && count($sizes["id"])){
			foreach($sizes["id"] as $k=>$v){
				$position = new Size_Count_Model();
				$position->good_id  = $item->id;
				$position->size_id  = $k;
				$position->count    = $sizes["count"][$v];
				$position->save();
			}
			$item->save();
		}
		foreach(ORM::factory('rukav')->find_all() as $item_){
			$item->remove($item_);
		}
		foreach($rukavs as $item_){
			$item->add($item_);
		}


		foreach(ORM::factory('type')->find_all() as $item_){
			$item->remove($item_);
		}
		foreach($types as $item_){
			$item->add($item_);
		}

		foreach(ORM::factory('color')->find_all() as $item_){
			$item->remove($item_);
		}
		foreach($colors as $item_){
			$item->add($item_);
		}

		foreach(ORM::factory('category')->find_all() as $item_){
			$item->remove($item);
		}

		foreach($categories as $item_){
			$item->add($item_);
		}

		$item->save();

		if(isset($_FILES["pic"])){
			$this->upload_pictures($item);
		}
		url::redirect(url::base()."admin/goods?success");
	}


	public function delete($id=false){
		$user = $this->check_object_by_id("good",$id);
		$user->delete();
		url::redirect(url::base()."admin/goods?success");
	}

	private function upload_pictures($item){
		
		foreach($_FILES["pic"] as $k=>$names){
			if($k=="name")
			foreach ($names as $key => $name) {
				if(strlen($name)){
					picenigne::process_picture($_FILES["pic"]["tmp_name"][$key],$item->img_dir.$item->id."/",$key.".png",Kohana::config("goods_images.sizes"));
				}
				
			}
		}
	}


}
