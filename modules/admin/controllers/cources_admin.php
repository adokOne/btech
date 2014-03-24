<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Cources_Admin extends Admin_Controller{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->view = new View("bootstrap/dashboard");
		$this->view->title = "Вакансії";
		$this->view->modules = $this->user->get_modules();
	}

	public function index(){
		View::set_global("max_height",1200);
		$content = new View("bootstrap/cources/index");
		$content->items    	  = $this->_teachers();
		$content->paginate    = $this->_paginate();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function new_item(){
		View::set_global("max_height",1500);
		$content = new View("bootstrap/cources/form");
		$content->item    	  = new Course_Model();
		$content->items       = ORM::factory('course')->find_all();
		$content->teachers    = ORM::factory('teacher')->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function edit($id){
		View::set_global("max_height",1500);
		$content = new View("bootstrap/cources/form");
		$content->item    	  = ORM::factory("course")->find($id);
		$content->teachers    = ORM::factory('teacher')->find_all();
		$content->items       = ORM::factory('course')->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function save(){
		$data = $this->input->post("item",array());
		if((int)$data["id"] > 0){
			$item = ORM::factory("course")->find((int)$data["id"]);
			unset($data["id"]);
		}
		else{
			$item = new Course_Model();
		}
		foreach($data as $key=>$value){
			if(in_array($key, array("teachers")));  continue;
			$item->$key = $value;
		}
			
		isset($data["has_group"]) ? $item->has_group = 1 : $item->has_group = 0;
		$item->save();
		foreach(ORM::factory('teacher')->find_all() as $teach){
			$item->remove( ORM::factory("teacher",$teach->id));
		}
		if(isset($data["teachers"])){
			foreach (array_keys($data["teachers"]) as $id) {
				$item->add( ORM::factory("teacher",$id));
			}
		}

		
		$item->save();
		url::redirect("/admin/cources");
	}

	public function delete($id){
		$item = ORM::factory("course")->find((int)$id)->delete();
		url::redirect("/admin/cources");
	}

	public function upload($id){
		$item = ORM::factory("course")->find((int)$id);
		upload::save($_FILES["file"], $item->image_path());
	}

	public function tree(){
		View::set_global("max_height",1500);
		$content = new View("bootstrap/cources/tree");
		$content->items    	  = ORM::factory('course')->where('parent_id', 0)->find_all();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function themes($id){
		$content = new View("bootstrap/cources/themes");
		$content->item    	  = ORM::factory("course")->find($id);
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	private function _paginate(){
		return $this->pagination = new Pagination(
			array(
				'base_url'=>'admin/cources',
				'style'=>'digg',
				'query_string' => 'page',
				'total_items'=>$this->_teachers(true),
				'items_per_page'=>$this->limit
			)
		); 
	}

	private function _teachers($count=false){
		return $count ? ORM::factory("course")->count_all() : ORM::factory("course")->limit($this->limit)->offset(($this->input->get("page",1) - 1) * $this->limit)->find_all();
	}

}