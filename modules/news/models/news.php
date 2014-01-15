<?php defined('SYSPATH') OR die('No direct access allowed.');

class News_Model extends ORM{

	protected $has_many = array("comments");

	public function name(){
		$field = "name_".Router::$cur_lang;
		return $this->$field;
	}
	public function anons(){
		$field = "anons_".Router::$cur_lang;
		return $this->$field;
	}
	public function text(){
		$field = "text_".Router::$cur_lang;
		return $this->$field;
	}
	public function desc(){
		$field = "desc_".Router::$cur_lang;
		return $this->$field;
	}
	public function keyw(){
		$field = "keyw_".Router::$cur_lang;
		return $this->$field;
	}	
} 