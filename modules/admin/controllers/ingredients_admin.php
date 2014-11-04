<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Ingredients_Admin extends Admin_Controller {

	public function index($page = 1){
		$items = ORM::factory("ingredient")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$view  = new View("ingredients/index");
		$actions = new View("ingredients/actions");
		$view->items = $items;
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}


	public function edit($id=false){
		$js = array(
			
			"vendor/raphael-min",
			"vendor/colorwheel",

		);
		js::add($js);
		$object = $this->check_object_by_id("ingredient",$id);
		$view = new View("ingredients/edit");
		$view->object =  $object ;
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function new_one(){
		$js = array(
			
			"vendor/raphael-min",
			"vendor/colorwheel",

		);
		js::add($js);
		$object = new Ingredient_Model();
		$view = new View("ingredients/edit");
		$view->object =  $object ;
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$item   = $object->id ? ORM::factory("ingredient")->find($object->id) : new Ingredient_Model();
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}
		$item->save();
		if(isset($_FILES["main_pic"]) || isset($_FILES["alt_pic"])){
			$this->upload_pictures($item);
		}
		url::redirect(url::base()."admin/ingredients?success");
	}

	private function upload_pictures($item){
		foreach($_FILES as $name=>$file){
			if(!strlen($file["name"])) continue;
			picenigne::process_picture($file["tmp_name"],$item->img_dir.$item->id."/",$name.".png",Kohana::config("ing_images.sizes"));
		}
	}
}
