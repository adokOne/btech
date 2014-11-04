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
      "front/bootstrap-responsive",
      "front/cloud-zoom",
      "front/stylesheet",
      "front/superfish",
      "front/font-awesome",
      "front/slideshow",
      "front/jquery.prettyPhoto",
      "front/camera",
      "front/responsive",
      "front/photoswipe",
      "front/jquery.bxslider",
      "front/camera",
      "front/colorbox",

      // "front/",
      // "front/",
      // "front/",
      // "front/",
      // "front/",
      // "front/",
    );
    $js = array(
      "front/jquery-1.7.1.min",
      "front/jquery-ui-1.8.16.custom.min",
      "front/bootstrap",
      "front/tabs",
      "front/common",
      "front/superfish",
      "front/camera",
      "front/jquery.jcarousel.min",
      "front/script",
      "front/jquery.mobile-events",
      "front/jquery.mobile.customized.min",
      "vendor/jquery.validate",
      "vendor/jquery.maskedinput.min",
      "jquery.mvc",
      
      "front/all", 

    );
    js::add($js);
    css::add($css);
    parent::__construct();
    #Session::instance()->destroy();
   $categories = ORM::factory("category")->where("parent_id",0)->find_all();
    $news       = ORM::factory("page")->where("active",1)->where("type","news")->find_all();
    $sale_item  = ORM::factory("good")->where("has_sale",1)->where("active",1)->orderby(null, 'RAND()')->find();
    $cart       = Session::instance()->get($this->session_key);
    $this->cart       = $cart ? $cart : array("ids"=>array(),"total"=>0,"items"=>array());
    View::set_global("categories",$categories);
    View::set_global("news",$news);
    View::set_global("sale_item",$sale_item);
    View::set_global("cart",$this->cart);
    Router::$keywords = Kohana::lang("global.meta_keys");
    Router::$title = Kohana::lang("global.meta_desc");
  }

  public function index(){

    $view = new View("index");
    $view->items  = ORM::factory("good")->where("active",1)->where("show_on_main",1)->find_all();
    $view->feedbacks = ORM::factory("feedback")->limit(5)->find_all();
    $view->populars  = ORM::factory("good")->where("active",1)->where("show_as_popular",1)->limit(3)->find_all();
    $view->render(true);
  }

  public function category($seo=false){
    $seo || Kohana::show_404();
    $category = ORM::factory("category")->where("seo_name",$seo)->find();
    $category->id || Kohana::show_404();
    $view = new View("category");
    $view->active_category = $category;
    $view->render(true);
  }
  public function page($seo=false){
    $seo || Kohana::show_404();
    $page = ORM::factory("page")->where("active",1)->where("seo_name",$seo)->find();
    $page->id || Kohana::show_404();
    $view = new View("page");
    $view->page = $page;
    $view->render(true);
  }

  public function item($id=false){
    $id || Kohana::show_404();
    $item = ORM::factory("good")->where("active",1)->where("id",$id)->find();
    $item->id || Kohana::show_404();
    $view = new View("item");
    $view->body_cls="product-product";
    $view->active_item = $item;
    $view->render(true);
  }

  public function contacts(){
    $view = new View("contact");
    if(request::is_post()){
      $message = $this->input->post("contact",array());
      $mail = "";
      foreach ($message as $key => $value) {
        $mail .= $key.": ".$value."<br/>";
      }
      email::send( Kohana::config("core.support_mail"),  Kohana::config("email.sender"), Kohana::lang("global.contact_subj"), $mail, true);
      url::redirect(url::base());
    }
     $view->body_cls = "information-contact";
    $view->render(true);
   
  }

  public function checkout(){
count($this->cart["items"]) || Kohana::show_404();
    $view = new View("checkout");
    $view->body_cls = "checkout-checkout";
    $view->render(true);
  }

  public function create_order(){

    request::is_ajax() || Kohana::show_404();
    $json = array("success"=>true,"href"=>url::base()."thanks");


    $object = (object)$this->input->get("order");
    $item   = new Order_Model();
    foreach ($object as $attr => $value) {
      $item->$attr = $value;
    }
    $item->save();
    $desc = array();
    if($this->cart["items"]){
      foreach($this->cart["items"] as $good){
        $position = new Position_Model();
        $position->order_id = $item->id;
        $position->good_id  = $good["id"];
        $position->count    = $good["count"];
        $position->save();
        $desc[] = $good["name"]." x ".$good["count"];
      }
      $item->save();
    }
    $desc = implode("|", $desc);
    Session::instance()->destroy();
    echo json_encode($json);
    $this->_send_sms($desc);

  }

  public function thanks(){
    in_array(request::referrer(), array("checkout")) || Kohana::show_404();
    $page = ORM::factory("page")->where("seo_name","thanks")->find();
    $view = new View("thanks");
    $view->body_cls = "checkout-checkout";
    $view->page = $page;
    $view->render(true);
  }

  public function blog($seo){
    $page = ORM::factory("page")->where("seo_name",$seo)->find();
    $view = new View("blog");
    $view->body_cls = "checkout-checkout";
    $view->page = $page;
    $view->render(true);
  }

  public function to_card($id){
    is_numeric($id) || die(json_encode(array("success"=>false)));
    $obj = ORM::factory("good")->find($id);
    $obj->id || die(json_encode(array("success"=>false)));
    if(!$data = Session::instance()->get($this->session_key)){
      $data  = array("ids"=>array($obj->id),"items"=>array(array("price"=>$obj->price,"id"=>$obj->id,"count"=>1,"name"=>$obj->name())),"total"=>$obj->price);
    }
    else{
      if(in_array($obj->id, $data["ids"])){
        foreach($data["items"] as &$item){
          if($obj->id == $item["id"]){
            $item["count"] =  $item["count"] + 1;
          }
        }
      }
      else{
        array_push($data["items"], array("price"=>$obj->price,"id"=>$obj->id,"count"=>1,"name"=>$obj->name()));
      }
      $data["total"] =  $data["total"] + $obj->price;
      array_push($data["ids"] , $obj->id);
    }
    Session::instance()->set($this->session_key,$data);
    die(json_encode(array("success"=>true, "ids" =>$data["ids"] ,  "total"=>$data["total"],"items"=>$data["items"])));
  }

  public function delete_from_cart($id){
    is_numeric($id) || die(json_encode(array("success"=>false)));
    $obj = ORM::factory("good")->find($id);
    $obj->id || die(json_encode(array("success"=>false)));
    if(!$data = Session::instance()->get($this->session_key)){
      $data  = array("ids"=>array(),"items"=>array(),"total"=>0);
    }
    else{
      if(count($data["items"])){
        foreach($data["items"] as &$item){
          if($obj->id == $item["id"]){
            if($item["count"] > 1){
              $item["count"] = $item["count"] - 1;
            }
            else{
              $item = array();
            }
            
          }
        }
      }
    }
    $ids = $data["ids"];
    foreach ($data["ids"] as $key => $value) {
      if($value == $obj->id){
        unset($ids[$key]);break;
        
      }
    }
    $data["ids"] = array_values($ids);
    $data["items"] = array_filter($data["items"]);
    $data["total"] =  $data["total"] - $obj->price;
    Session::instance()->set($this->session_key,$data);
    die(json_encode(array("success"=>true, "ids" =>$data["ids"] ,  "total"=>$data["total"],"items"=>$data["items"])));
  }
}