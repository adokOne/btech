<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Filters_Admin extends Admin_Controller {

	public function index($page = 1){
		$rukavs = ORM::factory("rukav")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$colors = ORM::factory("color")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$types  = ORM::factory("type")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$view  = new View("filters/index");
		$view->rukavs = $rukavs;
		$view->colors = $colors;
		$view->types  = $types;
		$actions = new View("filters/actions");
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}

	public function new_one(){
		$view = new View("filters/edit");
		$type = $this->input->get("type","rukav");
		switch ($type) {
			case 'rukav':
				$view->item =  new Rukav_Model();
			break;
			case 'type':
				$view->item =  new Type_Model();
			break;
			case 'color':
				$view->item =  new Color_Model();
			break;
			default:
				$view->item =  new Rukav_Model();
				break;
		}
		$view->type = $type;
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		$type = $this->input->get("type","rukav");
		$item = $this->check_object_by_id($type,$id);
		$view = new View("filters/edit");
		$view->item = $item;
		$view->type = $type;
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$type = $this->input->get("type","rukav");
		switch ($type) {
			case 'rukav':
				$model =  new Rukav_Model();
			break;
			case 'type':
				$model =  new Type_Model();
			break;
			case 'color':
				$model =  new Color_Model();
			break;
			default:
				$model =  new Rukav_Model();
				break;
		}
		$object = (object)$this->input->post("object");
		$user   = $object->id ? ORM::factory($type)->find($object->id) : $model;
		unset($object->id);
		
		foreach ($object as $attr => $value) {
			$user->$attr = $value;
		}
		$user->save();
		url::redirect(url::base()."/admin/filters?success");
	}


	public function delete($id=false){
		$user = $this->check_object_by_id("user",$id);
		$user->delete();
		url::redirect(request::referrer()."?success");
	}


}
