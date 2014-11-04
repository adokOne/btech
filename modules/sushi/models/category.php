<?php


class Category_Model  extends ORM_Tree{
  protected $has_many = array("goods");
  protected $ORM_Tree_children = "categories";
  protected $parent_key = 'parent_id';
  public function name(){
    $field = "name_".Router::$current_language; 
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
}