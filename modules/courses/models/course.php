<?php defined('SYSPATH') OR die('No direct access allowed.');

class Course_Model extends ORM_Tree{

	private $image_path = "upload/courses/";
	private $image_ext  = ".png";

	protected $ORM_Tree_children = "courses";
	protected $has_many = array("groups","themes");

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
		$this->parent->name()."/".$this->name()
		);
	}
	public function img(){
		return html::image($this->image_path.$this->id.$this->image_ext,$this->name());
	}
} 