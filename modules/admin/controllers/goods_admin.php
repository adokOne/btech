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
		$view = new View("goods/edit");
		$view->object =  new Good_Model();
		$view->lables = ORM::factory("label")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		$object = $this->check_object_by_id("good",$id);
		$view = new View("goods/edit");
		$view->object =  $object ;
		$view->lables = ORM::factory("label")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$item   = $object->id ? ORM::factory("good")->find($object->id) : new Good_Model();
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
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
		url::redirect(request::referrer()."?success");
	}

	private function upload_pictures($item){
		foreach($_FILES as $name=>$file){
			if(!strlen($file["name"])) continue;
			picenigne::process_picture($file["tmp_name"],$item->img_dir.$item->id."/",$name.".png",Kohana::config("goods_images.sizes"));
		}
	}


}
