<?php defined('SYSPATH') OR die('No direct access allowed.');

class Courses_Controller extends Controller {

	public function __construct(){
		parent::__construct();
		Router::$base_cls = "courses";
	}

	public function index(){
		$courses = ORM::factory('course')->where('parent_id', 0)->find_all();
		$view = new View("courses_main");
		$view->courses = $courses;
		$view->header  = $this->lang["courses_head"];
		$view->desc    = $this->lang["courses_desc"];
		$view->render(true);
	}
	public function show($seo){
		$parent = ORM::factory('course')->where(array('parent_id'=>0,"seo"=>$seo))->find();
		$parent->id || Kohana::show_404();
		$view = new View("courses_main");
		$view->courses = $parent->children;
		$view->header  = $parent->name();
		$view->desc    = $parent->desc();
		$view->render(true);
	}

	public function categories($seo_1,$seo_2){
		$parent = ORM::factory('course')->where(array('parent_id'=>0,"seo"=>$seo_1))->find();
		$parent->id || Kohana::show_404();
		$course = $parent->where("seo",$seo_2)->limit(1)->children->current();
		$course && $course->id || Kohana::show_404();
		if(!$course->children->count()){
			$this->_open($course);die;	
		}
		$view = new View("course_categories");
		$view->courses = $course->children;
		$view->header  = $course->name();
		$view->desc    = $course->desc();
		$view->render(true);
	}

	public function open($seo_1,$seo_2,$seo_3){
		$pre_parent = ORM::factory('course')->where(array('parent_id'=>0,"seo"=>$seo_1))->find();
		$pre_parent->id || Kohana::show_404();
		$parent = $pre_parent->where("seo",$seo_2)->limit(1)->children->current();
		$parent && $parent->id || Kohana::show_404();
		$course = $parent->where("seo",$seo_3)->limit(1)->children->current();
		$course && $course->id || Kohana::show_404();
		$this->_open($course);
	}

	private function _open($course){
		die("efe");
		$view = new View("course_open");
		$view->course = $course;
		$view->render(true);
	}
}