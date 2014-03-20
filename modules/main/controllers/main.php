<?php defined('SYSPATH') OR die('No direct access allowed.');

class Main_Controller extends Controller {


	public function index()
	{
		
		Router::$base_cls = "index";
		$view = new View("main");
		$view->render(true);
	}

	public function online(){
		javascript::add(array("jquery.selectbox-0.2.min","controllers/online"));
		stylesheet::add("jquery.selectbox");
		Router::$base_cls = "online";

		$view = new View("online");
		$view->courses = $this->_prepare_courses(0);
		$view->render(true);
	}

	public function price(){
		Router::$base_cls = "price";
		$view = new View("price");
		$view->courses = $this->_prepare_courses(0);
		$view->render(true);
	}

	public function contacts(){
		Router::$base_cls = "contacts";
		$view = new View("contacts");
		$view->render(true);
	}
	public function job(){
		Router::$base_cls = "job";
		$view = new View("job");
		$view->jobs = $this->_jobs();
		$view->render(true);
	}
	public function error(){
		bkt::error();
	}

	public function load_courses(){
		$courses  = $this->_prepare_courses($this->input->post("id",0))->as_array();
		function map_course($course){
			return array("has_child"=>($course->children->count() > 0),"has_group"=>($course->children->count() < 1 && $course->groups->count()>0),"name"=>$course->name(),"id"=>$course->id);
		}
		die(json_encode(array("data"=>array_map("map_course", $courses))));
	}

	private function _prepare_courses($id){
		return ORM::factory('course')->where('parent_id',$id)->find_all();
	}

	private function _jobs(){
		return ORM::factory('job')->find_all();
	}

}