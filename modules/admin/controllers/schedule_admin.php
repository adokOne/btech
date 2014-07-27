<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Schedule_Admin extends Admin_Controller {

	public function index($page = 1){
		$items = ORM::factory("schedule")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
		$view  = new View("schedules/index");
		$view->items = $items;
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}


	public function edit($id=false){
		$object = $this->check_object_by_id("schedule",$id);
		$view = new View("schedules/edit");
		$view->object =  $object ;
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$item   = $this->check_object_by_id("schedule",$object->id);
		$hours = isset($object->hours) ?  $object->hours : array();
		$item->hours = json_encode($hours);
		$item->save();
		url::redirect(url::base()."admin/schedule?success");
	}

}
