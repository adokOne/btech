<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Jobs_Admin extends Admin_Controller{

	private $limit = 10;

	public function __construct(){
		parent::__construct();
		$this->view = new View("bootstrap/dashboard");
		$this->view->title = "Вакансії";
		$this->view->modules = $this->user->get_modules();
	}

	public function index(){
		$content = new View("bootstrap/jobs/index");
		$content->jobs    	  = $this->_jobs();
		$content->paginate    = $this->_paginate();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function new_item(){
		$content = new View("bootstrap/jobs/new");
		$content->job    	  = new Job_Model();
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function edit($id){
		$content = new View("bootstrap/jobs/new");
		$content->job    	  = ORM::factory("job")->find($id);
		$this->view->content = $content->render(false);
		$this->view->render(true);
	}

	public function save(){
		$job_data = $this->input->post("job",array());
		if((int)$job_data["id"] > 0){
			$job = ORM::factory("job")->find((int)$job_data["id"]);
			unset($job_data["id"]);
		}
		else{
			$job = new Job_Model();
		}
		foreach($job_data as $key=>$value)
			$job->$key = $value;
		$job->save();
		url::redirect("/admin/jobs");
	}

	public function delete($id){
		$job = ORM::factory("job")->find((int)$id)->delete();
		url::redirect("/admin/jobs");
	}

	private function _paginate(){
		return $this->pagination = new Pagination(
			array(
				'base_url'=>'admin/jobs',
				'style'=>'digg',
				'query_string' => 'page',
				'total_items'=>$this->_jobs(true),
				'items_per_page'=>$this->limit
			)
		); 
	}

	private function _jobs($count=false){
		return $count ? ORM::factory("job")->count_all() : ORM::factory("job")->limit($this->limit)->offset(($this->input->get("page",1) - 1) * $this->limit)->find_all();
	}

}