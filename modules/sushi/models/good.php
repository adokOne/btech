<?php


class Good_Model  extends ORM{
    protected $has_and_belongs_to_many = array("ingredients");
    protected $belongs_to = array("category");
    public    $img_dir = "upload/goods/";
    protected $has_many = array("positions");
    protected $sorting = array('price'=>"asc");
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
	public function alt_image($size="prev"){
		return file_exists(DOCROOT.$this->img_dir.$this->id."/alt_pic_".$size.".png") 
		? $this->img_dir.$this->id."/alt_pic_".$size.".png" 
		: "upload/goods/not_found/".$size.".png";
	}
	public function main_image($size="prev"){
		return file_exists(DOCROOT.$this->img_dir.$this->id."/main_pic_".$size.".png") 
		? $this->img_dir.$this->id."/main_pic_".$size.".png" 
		: "upload/goods/not_found/".$size.".png";
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