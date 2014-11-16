<?php


class Rukav_Model  extends ORM{
	protected $has_and_belongs_to_many = array("goods");
	public function name(){
		$field = "name_".Router::$current_language; 
		return $this->$field;
	}
}