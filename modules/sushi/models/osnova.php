<?php


class Osnova_Model  extends ORM{
	protected  $belongs_to = array("sam_order");
   public    $img_dir = "upload/osnova/";
	public function name(){
		$field = "name_".Router::$current_language; 
		return $this->$field;
	}
  public function main_image($size="nome"){
    return file_exists(DOCROOT.$this->img_dir.$this->id."/main_pic_".$size.".png") 
    ? $this->img_dir.$this->id."/main_pic_".$size.".png" 
    : "upload/goods/not_found/".$size.".png";
  }
}