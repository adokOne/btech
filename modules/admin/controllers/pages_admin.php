<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Pages_Admin extends Admin_Controller {

	public function index($page = 1){
		$items = ORM::factory("page")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$view  = new View("pages/index");
		$view->items = $items;
		$actions = new View("pages/actions");
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}

	public function new_one(){
		$view = new View("pages/edit");
		$view->object =  new Page_Model();
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		$object = $this->check_object_by_id("page",$id);
		$view = new View("pages/edit");
		$view->object =  $object ;
		$view->lables = ORM::factory("page")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		
		$item   = $object->id ? ORM::factory("page")->find($object->id) : new Page_Model();
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}
		$item->save();
		url::redirect(url::base()."admin/pages?success");
	}


	public function delete($id=false){
		$user = $this->check_object_by_id("page",$id);
		$user->delete();
		url::redirect(request::referrer()."?success");
	}



}
