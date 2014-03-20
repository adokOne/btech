<?php defined('SYSPATH') OR die('No direct access allowed.');

class Theme_Model extends ORM_Tree{


	protected $ORM_Tree_children = "themes";
	protected $belongs_to = array("course");

	public function name(){
		$field = "name_".Router::$cur_lang;
		return $this->$field;
	}
} 