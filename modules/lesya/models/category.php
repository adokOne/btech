<?php


class Category_Model  extends ORM_Tree{
	protected $has_many = array("goods");
	protected $ORM_Tree_children = "categories";
	protected $parent_key = 'parent_id';
  public    $img_dir = "/upload/categories/";
	public function name(){
		$field = "name_".Router::$current_language; 
		return $this->$field;
	}
  public function desc(){
    $field = "desc_".Router::$current_language; 
    return $this->$field;
  }
  public function save(){
    #if(!strlen($this->seo_name)){
      $this->seo_name = $this->generate_seo();
    #}
    parent::save();
  }

  private function generate_seo(){
    return text::ru2Lat($this->name_uk);
  }

  public function main_image($size="cat"){
    return file_exists(DOCROOT.$this->img_dir.$this->id."/main_pic_".$size.".png") 
    ? $this->img_dir.$this->id."/main_pic_".$size.".png" 
    : "/upload/goods/not_found/".$size.".png";
  }

  public function url(){
    return url::base()."category/".$this->seo_name."-".$this->id;
  }

  public function seos($seos=array(),$with_id=true){
    $seos = array_merge($seos,array($this->seo_name));
    $seos = $this->parent->id > 1 ? ($seos + $this->parent->seos($seos)) : $seos;
    return arr::flatten($seos);
  }

  public function parents($parents = array()){
    $parents = array_merge($parents,array($this->parent));
    $parents = $this->parent->id > 1 ? ($parents + $this->parent->parents($parents)) : $parents;
    return arr::flatten($parents);
  }


}
