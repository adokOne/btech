<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Index_Controller extends Controller {

  private $session_key = "order";
  public function __construct(){
    $css = array(
      "front/bootstrap",
      "front/style",
    );
    $js = array(
      "front/jquery-1.7.2.min",
      "jquery.mvc",
      "script",
      "front/main",
      "front/bootstrap.min",
      "front/jquery.nicescroll",
    );
    js::add($js);
    css::add($css);
    parent::__construct();
    View::set_global("card",Session::instance()->get($this->session_key));

  }

  public function index(){
    $view = new View("index");
    $view->items  = ORM::factory("good")->find_all();
    $view->feedbacks = ORM::factory("feedback")->limit(5)->find_all();
    $view->render(true);
  }

  public function to_card($id){
    is_numeric($id) || die(json_encode(array("success"=>false)));
    $obj = ORM::factory("good")->find($id);
    $obj->id || die(json_encode(array("success"=>false)));
    if(!$data = Session::instance()->get($this->session_key)){
      $data  = array("ids"=>array($id),"price"=>$obj->price);
    }
    else{
      array_push($data["ids"], $obj->id);
      $data["price"] =  $data["price"] + $obj->price;
    }
    Session::instance()->set($this->session_key,$data);
    die(json_encode(array("success"=>true,"price"=>$data["price"],"count"=>count($data["ids"]))));
  }
}