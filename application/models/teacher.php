
<?php defined('SYSPATH') OR die('No direct access allowed.');

class Teacher_Model extends ORM {
	protected $has_and_belongs_to_many = array('courses');

	public function name(){
		$field = "name_".Router::$cur_lang;
		return $this->$field;
	}
	public function desc(){
		$field = "desc_".Router::$cur_lang;
		return $this->$field;
	}

	public function foto(){
		return html::image(array("src"=>"upload/".$this->image_path(),"width"=>100,"height"=>100));
	}

	public function image_path(){
		return "teachers/".$this->id.".jpg";
	}

} 

?>