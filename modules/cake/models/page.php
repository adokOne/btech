<?php


class Page_Model  extends ORM{

    
	public function name(){
		$field = "name_".Router::$current_language; 
		return $this->$field;
	}
	public function anons(){
		$field = "anons_".Router::$current_language; 
		return $this->$field;
	}
	public function desc(){
		$field = "desc_".Router::$current_language; 
		return $this->$field;
	}

	public function __set($key, $value)
	{	$trim_keys = array("anons_ru","anons_uk","desc_ru","desc_uk");
		if (in_array($key, $trim_keys))
		{
			$value = trim($value);
		}

		parent::__set($key, $value);
	}
}