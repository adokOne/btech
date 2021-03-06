<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Lables_Admin extends Admin_Controller {

	public function index($page = 1){
		$items = ORM::factory("label")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$view  = new View("lables/index");
		$actions = new View("lables/actions");
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
		$object = $this->check_object_by_id("label",$id);
		$view = new View("lables/edit");
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
		$object = new Label_Model();
		$view = new View("lables/edit");
		$view->object =  $object ;
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$item   = $object->id ? ORM::factory("label")->find($object->id) : new Label_Model();
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}
		$item->save();
		url::redirect(url::base()."admin/lables?success");
	}

}
