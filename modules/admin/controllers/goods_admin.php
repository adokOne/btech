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
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		#$sizes  = $object->sizes;
		#unset($object->sizes);
		$item   = $object->id ? ORM::factory("good")->find($object->id) : new Good_Model();
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}
		$item->has_sale = isset($object->has_sale) ? 1 : 0;
		$item->show_on_main = isset($object->show_on_main) ? 1 : 0;
		$item->active = isset($object->active) ? 1 : 0;
		
		$item->save();
		// if(isset($sizes["id"]) && count($sizes["id"])){
		// 	foreach($sizes["id"] as $k=>$v){
		// 		$position = new Size_Count_Model();
		// 		$position->good_id  = $item->id;
		// 		$position->size_id  = $k;
		// 		$position->count    = $sizes["count"][$v];
		// 		$position->save();
		// 	}
		// 	$item->save();
		// }
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
