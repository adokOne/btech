<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Feedbacks_Admin extends Admin_Controller {

	public function index($page = 1){
		$items = ORM::factory("feedback")->offset(($page-1)*$this->config["per_page"])->limit($this->config["per_page"])->find_all();
		$view  = new View("feedbacks/index");
		$view->items = $items;
		$actions = new View("feedbacks/actions");
		$view->pagination = $this->pagination(ORM::factory("feedback")->count_all());
		$this->view->content = $view->render(false);
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}


	public function delete($id=false){
		$user = $this->check_object_by_id("feedback",$id);
		$user->delete();
		url::redirect(request::referrer());
	}



}
