<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Goods_Admin extends Admin_Controller {

	public function index($page = 1){
		View::set_global("main_height",1800);
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
		View::set_global("main_height",1400);
		$view = new View("goods/edit");
		$view->object =  new Good_Model();
		$view->ingredients = ORM::factory("ingredient")->find_all();
		$view->categories = ORM::factory("category")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		View::set_global("main_height",1400);
		$object = $this->check_object_by_id("good",$id);
		$view = new View("goods/edit");
		$view->object =  $object ;
		$view->ingredients = ORM::factory("ingredient")->find_all();
		$view->categories = ORM::factory("category")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$item   = $object->id ? ORM::factory("good")->find($object->id) : new Good_Model();
		$ingredients  = !isset($object->ingredients) ? array() : ORM::factory("ingredient")->where("id IN (".implode(",", array_keys($object->ingredients)).")")->find_all();
		if(isset($object->ingredients)) unset($object->ingredients);
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}
		$item->save();
		foreach(ORM::factory('ingredient')->find_all() as $_item){
			$item->remove($_item);
		}
		foreach($ingredients as $_item){
			$item->add($_item);
		}
		$item->save();
		if(isset($_FILES["main_pic"]) || isset($_FILES["alt_pic"])){
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
		foreach($_FILES as $name=>$file){
			if(!strlen($file["name"])) continue;
			picenigne::process_picture($file["tmp_name"],$item->img_dir.$item->id."/",$name.".png",Kohana::config("goods_images.sizes"));
		}
	}


}
