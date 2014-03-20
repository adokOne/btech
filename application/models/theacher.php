
<?php defined('SYSPATH') OR die('No direct access allowed.');

class Theacher_Model extends ORM {

	protected $belongs_to = array("course");
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