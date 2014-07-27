<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Roles_Admin extends Admin_Controller {

	public function index($page = 1){
		$js = array(
			"modules/admin_orders",
		);
		js::add($js);
		$items = ORM::factory("role")
			->limit($this->config["per_page"])
			->offset(($page-1)*$this->config["per_page"])
			->find_all();

		$view  = new View("roles/index");
		$view->items = $items;
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$actions = new View("roles/actions");
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}

	public function new_one(){
		$modules = ORM::factory("module")->find_all();

		$view = new View("roles/edit");
		$view->object =  new Role_Model();
		$view->modules  = $modules;
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		$object = $this->check_object_by_id("role",$id);
		$modules = ORM::factory("module")->find_all();
		$view = new View("roles/edit");
		$view->object =  $object ;
		$view->modules  = $modules;
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$item   = $object->id ? ORM::factory("role")->find($object->id) : new Role_Model();
		$modules  = !isset($object->modules) ? array() : ORM::factory("module")
		->where("id IN (".implode(",", array_keys($object->modules)).")")
		->find_all();
		if(isset($object->modules)) unset($object->modules);
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}
		$item->save();
		foreach(ORM::factory('module')->find_all() as $_item){
			$item->remove($_item);
		}
		foreach($modules as $_item){
			$item->add($_item);
		}
		$item->save();
		url::redirect(url::base()."admin/roles?success");
	}


	public function delete($id=false){
		$item = $this->check_object_by_id("role",$id);
		$item->delete();
		url::redirect(request::referrer()."?success");
	}


}
