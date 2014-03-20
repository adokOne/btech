<?php defined('SYSPATH') OR die('No direct access allowed.');

class Job_Model extends ORM {

	public function name(){
		$field = "name_".Router::$cur_lang;
		return $this->$field;
	}
	public function desc(){
		$field = "desc_".Router::$cur_lang;
		return $this->$field;
	}
} 

?>