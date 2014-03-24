<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Cupons_Admin extends Admin_Controller{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->view = new View("bootstrap/dashboard");
		$this->view->title = "Вакансії";
		$this->view->modules = $this->user->get_modules();
	}

	public function index(){
		$content = new View("bootstrap/cupons/index");
		$content->items    	  = $this->_teachers();
		$content->paginate    = $this->_paginate();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function new_item(){
		$content = new View("bootstrap/cupons/form");
		$content->item    	  = new Cupon_Model();
		$content->organizations       = ORM::factory('organization')->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function edit($id){
		$content = new View("bootstrap/cupons/form");
		$content->item    	  = ORM::factory("cupon")->find($id);
		$content->organizations       = ORM::factory('organization')->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function save(){
		$data = $this->input->post("item",array());
		if((int)$data["id"] > 0){
			$item = ORM::factory("cupon")->find((int)$data["id"]);
			unset($data["id"]);
		}
		else{
			$item = new Cupon_Model();
		}
		foreach($data as $key=>$value)
			$item->$key = $value;
		$item->save();
		url::redirect("/admin/cupons");
	}

	public function delete($id){
		$item = ORM::factory("cupon")->find((int)$id)->delete();
		url::redirect("/admin/cupons");
	}

	public function upload($id){
		$item = ORM::factory("cupon")->find((int)$id);
		upload::save($_FILES["file"], $item->image_path());
	}

	private function _paginate(){
		return $this->pagination = new Pagination(
			array(
				'base_url'=>'admin/cupons',
				'style'=>'digg',
				'query_string' => 'page',
				'total_items'=>$this->_teachers(true),
				'items_per_page'=>$this->limit
			)
		); 
	}

	private function _teachers($count=false){
		return $count ? ORM::factory("cupon")->count_all() : ORM::factory("cupon")->limit($this->limit)->offset(($this->input->get("page",1) - 1) * $this->limit)->find_all();
	}

}