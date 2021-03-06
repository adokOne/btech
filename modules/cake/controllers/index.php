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
      "front/datepicker"
    );
    $js = array(
      "front/jquery-1.7.2.min",
      "front/jquery-ui-1.10.4.min",
      "front/datepicker_ru",
      "jquery.mvc",
      "script",
      "front/main",
      "front/bootstrap.min",
      "front/jquery.nicescroll",
      "front/icheck",
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
  public function cart(){
    View::set_global("body_cls","order_page");
    $view = new View("cart");
    $view->render(true);
  }
  public function tort_na_zakaz(){
    $content = new View("pages/zakaz");
    $view = new View("base");
    $view->content = $content;
    $view->without_about = true;
    $view->render(true);
  }

  public function to_card($id){
    is_numeric($id) || die(json_encode(array("success"=>false)));
    $obj = ORM::factory("good")->find($id);
    $obj->id || die(json_encode(array("success"=>false)));
    if(!$data = Session::instance()->get($this->session_key)){
      $data  = array("ids"=>array($id),"price"=>$obj->price,"items"=>array(array("id"=>$id,"count"=>1)));
    }
    else{
      if(in_array($obj->id, $data["ids"])){
        foreach($data["items"] as &$item){
          if($obj->id == $item["id"]){
            $item["count"] = $item["count"] +1;
            // array_push($data["items"], array("id"=>$obj->id,"count"=>$item["count"]));
          }
        }
      }
      else{
        array_push($data["items"], array("id"=>$obj->id,"count"=>1));
      }

      array_push($data["ids"], $obj->id);
      $data["price"] =  $data["price"] + $obj->price;
    }
    Session::instance()->set($this->session_key,$data);
    die(json_encode(array("success"=>true,"price"=>$data["price"],"count"=>count($data["ids"]))));
  }

}