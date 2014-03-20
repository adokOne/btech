<?php defined('SYSPATH') OR die('No direct access allowed.');

class Course_Model extends ORM_Tree{

	private $image_path = "upload/courses/";
	private $image_ext  = ".png";

	protected $ORM_Tree_children = "courses";
	protected $has_many = array("groups","themes");
	protected $has_one  = array("group_price");

	public function name(){
		$field = "name_".Router::$cur_lang;
		return $this->$field;
	}
	public function desc(){
		$field = "desc_".Router::$cur_lang;
		return $this->$field;
	}
	public function preparation(){
		$field = "preparation_".Router::$cur_lang;
		return $this->$field;
	}

	public function get_all_childs(){
		return $this->get_courses($this);
	}
	public function get_all_childs_with_groups(){
		return $this->get_courses_with_groups($this);
	}
	private function get_courses($course){
		$result = array();
		foreach ($course->children as $c) {
			if($c->children->count()){
				$result = array_merge($result,$this->get_courses($c)) ;
			}
			else{
				$result[] = $c;
			}
		}
		return $result;
	}

	private function get_courses_with_groups($course){
		$result = array();
		foreach ($course->children as $c) {
			if($c->children->count()){
				$result = array_merge($result,$this->get_courses_with_groups($c)) ;
			}
			else{
				if($c->has_group && $c->group_price->price_2)
					$result[] = $c;
			}
		}
		return $result;
	}

	public function seo(){
		return 
		empty($this->parent->seo) ? 
		$this->seo : 
		(
		!empty($this->parent->parent->seo) 
		? 
		$this->parent->parent->seo."/".$this->parent->seo."/".$this->seo : 
		$this->parent->seo."/".$this->seo
		);
	}
	public function full_name(){
		return 
		empty($this->parent->seo) ? 
		$this->name() : 
		(
		!empty($this->parent->parent->seo) 
		? 
		$this->parent->parent->name()." ".$this->parent->name()." ".$this->name() : 
		$this->parent->name()." ".$this->name()
		);
	}

	public function course_full_name(){
		return 
		empty($this->parent->seo) ? 
		$this->name() : 
		(
		!empty($this->parent->parent->seo)  && $this->parent->parent->parent_id!=0
		? 
		$this->parent->parent->name()." ".$this->parent->name()." ".$this->name() : 
		($this->parent->parent_id!=0 ? $this->parent->name()." ".$this->name() : $this->name())
		
		);
	}
	public function img(){
		return html::image($this->image_path.$this->id.$this->image_ext,$this->name());
	}
} 