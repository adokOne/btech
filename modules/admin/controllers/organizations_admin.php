<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Organizations_Admin extends Admin_Controller{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->view = new View("bootstrap/dashboard");
		$this->view->title = "Вакансії";
		$this->view->modules = $this->user->get_modules();
	}

	public function index(){
		$content = new View("bootstrap/organizations/index");
		$content->items    	  = $this->_teachers();
		$content->paginate    = $this->_paginate();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function new_item(){
		$content = new View("bootstrap/organizations/form");
		$content->item    	  = new Organization_Model();
		$content->courses       = ORM::factory('organization')->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function edit($id){
		$content = new View("bootstrap/organizations/form");
		$content->item    	  = ORM::factory("organization")->find($id);
		$content->courses       = ORM::factory('organization')->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function save(){
		$data = $this->input->post("item",array());
		if((int)$data["id"] > 0){
			$item = ORM::factory("organization")->find((int)$data["id"]);
			unset($data["id"]);
		}
		else{
			$item = new Organization_Model();
		}
		foreach($data as $key=>$value)
			$item->$key = $value;
		$item->save();
		url::redirect("/admin/organizations");
	}

	public function delete($id){
		$item = ORM::factory("organization")->find((int)$id)->delete();
		url::redirect("/admin/organizations");
	}

	public function upload($id){
		$item = ORM::factory("organization")->find((int)$id);
		upload::save($_FILES["file"], $item->image_path());
	}

	private function _paginate(){
		return $this->pagination = new Pagination(
			array(
				'base_url'=>'admin/organizations',
				'style'=>'digg',
				'query_string' => 'page',
				'total_items'=>$this->_teachers(true),
				'items_per_page'=>$this->limit
			)
		); 
	}

	private function _teachers($count=false){
		return $count ? ORM::factory("organization")->count_all() : ORM::factory("organization")->limit($this->limit)->offset(($this->input->get("page",1) - 1) * $this->limit)->find_all();
	}

}