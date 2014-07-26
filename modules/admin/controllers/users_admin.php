<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Users_Admin extends Admin_Controller {

	public function index($page = 1){
		$users = ORM::factory("user")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$view  = new View("users/index");
		$view->users = $users;
		$actions = new View("users/actions");
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}

	public function new_one(){
		$view = new View("users/edit");
		$view->user =  new User_Model();
		$view->roles = ORM::factory("role")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		$user = $this->check_object_by_id("user",$id);
		$view = new View("users/edit");
		$view->user = $user;
		$view->roles = ORM::factory("role")->find_all();
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$user   = $object->id ? ORM::factory("user")->find($object->id) : new User_Model();
		$roles  = !isset($object->roles) ? array() : ORM::factory("role")->where("id IN (".implode(",", array_keys($object->roles)).")")->find_all();
		unset($object->id);
		if(isset($object->roles)) unset($object->roles);
		foreach ($object as $attr => $value) {
			$user->$attr = $value;
		}
		$user->save();
		foreach(ORM::factory('role')->find_all() as $item){
			$user->remove($item);
		}
		foreach($roles as $item){
			$user->add($item);
		}
		$user->save();
		url::redirect(url::base()."/admin/users?success");
	}


	public function delete($id=false){
		$user = $this->check_object_by_id("user",$id);
		$user->delete();
		url::redirect(request::referrer()."?success");
	}


}
