<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Feedbacks_Admin extends Admin_Controller{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->view = new View("bootstrap/dashboard");
		$this->view->title = "Вакансії";
		$this->view->modules = $this->user->get_modules();
	}

	public function index(){
		$content = new View("bootstrap/feedbacks/index");
		$content->items    	  = $this->_teachers();
		$content->paginate    = $this->_paginate();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function new_item(){
		$content = new View("bootstrap/feedbacks/form");
		$content->item    	  = new Feedback_Model();
		$content->feedbacks   = ORM::factory("feedback")->where("parent_id",0)->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function edit($id){
		$content = new View("bootstrap/feedbacks/form");
		$content->item    	  = ORM::factory("feedback")->find($id);
		$content->feedbacks   = ORM::factory("feedback")->where("parent_id",0)->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function save(){
		$data = $this->input->post("item",array());
		if((int)$data["id"] > 0){
			$item = ORM::factory("feedback")->find((int)$data["id"]);
			unset($data["id"]);
		}
		else{
			$item = new Feedback_Model();
		}
		foreach($data as $key=>$value)
			$item->$key = $value;
		$item->save();
		url::redirect("/admin/feedbacks");
	}

	public function delete($id){
		$item = ORM::factory("feedback")->find((int)$id)->delete();
		url::redirect("/admin/feedbacks");
	}

	public function answer($id){
		$content = new View("bootstrap/feedbacks/answer");
		$content->item    	  = new Feedback_Model();
		$content->id   = $id;
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	private function _paginate(){
		return $this->pagination = new Pagination(
			array(
				'base_url'=>'admin/feedbacks',
				'style'=>'digg',
				'query_string' => 'page',
				'total_items'=>$this->_teachers(true),
				'items_per_page'=>$this->limit
			)
		); 
	}

	private function _teachers($count=false){
		return $count ? ORM::factory("feedback")->count_all() : ORM::factory("feedback")->limit($this->limit)->offset(($this->input->get("page",1) - 1) * $this->limit)->find_all();
	}

}