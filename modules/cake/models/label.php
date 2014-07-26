<?php


class Label_Model  extends ORM{
	protected $has_many = array("goods");
	public function name(){
		$field = "name_".Router::$current_language; 
		return $this->$field;
	}

}