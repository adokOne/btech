<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Categories_Admin extends Admin_Controller {

  public function index($page = 1){
    View::set_global("main_height",1400);
    $items = ORM::factory("category")->where("id != 1")->limit($this->config["per_page"])->offset(($page-1)*$this->config["per_page"])->find_all();
    $view  = new View("categories/index");
    $view->items = $items;

    $actions = new View("categories/actions");
    $view->pagination = $this->pagination();
    $this->view->content = $view->render(false);
    $this->view->actions = $actions->render(false);
    $this->view->render(true);
  }

  public function new_one(){
    View::set_global("main_height",1000);
    $view = new View("categories/edit");
	$view->categories = ORM::factory("category")/*->where("parent_id IN (0,1)")*/->find_all();
    $view->object =  new Category_Model();
    $this->view->content = $view->render(false);
    $this->view->render(true);
  }

  public function edit($id=false){
    View::set_global("main_height",1000);
    $object = $this->check_object_by_id("category",$id);
    $view = new View("categories/edit");
$view->categories = ORM::factory("category")/*->where("parent_id IN (0,1)")*/->find_all();
    $view->object =  $object ;
    $this->view->content = $view->render(false);
    $this->view->render(true);

  }
  public function update(){
    $object = (object)$this->input->post("object");
    $item   = $object->id ? ORM::factory("category")->find($object->id) : new Category_Model();
    foreach ($object as $attr => $value) {
      $item->$attr = $value;
    }
    $item->save();
    if(isset($_FILES["main_pic"])){
      $this->upload_pictures($item);
    }
    url::redirect(url::base()."admin/categories?success");
  }


  public function delete($id=false){
    $user = $this->check_object_by_id("category",$id);
    $user->delete();
    url::redirect(url::base()."admin/categories?success");
  }
  private function upload_pictures($item){
   # var_dump($_FILES);die;
   # foreach($_FILES["main_pic"] as $name=>$file){
      if(!strlen($_FILES["main_pic"]["name"])) return;
      picenigne::process_picture($_FILES["main_pic"]["tmp_name"],$item->img_dir.$item->id."/","main_pic.png",Kohana::config("goods_images.sizes"));
   # }
  }


}