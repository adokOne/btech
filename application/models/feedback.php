<?php defined('SYSPATH') OR die('No direct access allowed.');

class Feedback_Model extends ORM_Tree {
	protected $ORM_Tree_children = "feedbacks";

	public function save(){
		if(is_null($this->date)){
			$this->date = date("Y-m-d H:i:s");
		}
		parent::save();
	}
} 

?>