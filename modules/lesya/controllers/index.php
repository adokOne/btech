<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Index_Controller extends Controller {

  protected $session_key = "order";
  public function __construct(){
    parent::__construct();
    #Session::instance()->delete($this->session_key);
    View::set_global("lang",Kohana::lang("global"));
    View::set_global("active_currency",cookie::get("active_currency","UAH"));
    $cart       = Session::instance()->get($this->session_key);
    $this->cart = $cart ? $cart : array("ids"=>array(),"total"=>0,"items"=>array());
    View::set_global("card",$this->cart);
  }

  public function index(){
    $this->set_categories();
    $view = new View("index");
    $view->items  = ORM::factory("good")->where("active",1)->where("show_on_main",1)->find_all();
    $view->render(true);
  }

  public function thanks(){
    in_array(request::referrer(), array("checkout")) || Kohana::show_404();
    $this->set_categories();
    $view = new View("page");
    $view->page  = ORM::factory("page")->where("active",1)->where("seo_name","thanks")->find();
    $view->render(true);
  }

  public function process_order($pay_id){
    count($this->cart["items"]) || Kohana::show_404();
    $address = $this->input->get("address",false);
    $address = $address ? $address : $this->user->address;
    $this->logged_in || Kohana::show_404();
    $item   = new Order_Model();
    $item->user_id  = $this->user->id;
    $item->name     = $this->user->name;
    $item->phone    = $this->user->phone;
    $item->email    = $this->user->email;
    $item->address  = $address;
    $item->pay_type = intval($pay_id);
    $item->time     = time();
    $item->total_price = intval($this->cart["total"]);
    $item->save();
    $desc = array();
    if($this->cart["items"]){
      foreach($this->cart["items"] as $good){
        $position = new Position_Model();
        $position->order_id = $item->id;
        $position->good_id  = $good["id"];
        $position->count    = $good["count"];
        $position->size     = $good["size"];
        $position->save();
        $desc[] = $good["name"]." x ".$good["count"];
      }
      $item->save();
    }
    $desc = implode("|", $desc);
    Session::instance()->delete($this->session_key);
    url::redirect(url::base()."thanks");
    $data = array($item->id,$username,$this->user->email,$item->goods_admin_html());
    $this->_send_email($data,$this->user->email,"new_order");
    $this->_send_sms($desc);
  }

  public function category($seo){
    $seo = explode("-", $seo);
    $id = end($seo);
    $page = $this->input->get("page",1);
    $limit = Kohana::config("lesya.per_page");
    $offset = (Kohana::config("lesya.per_page") * ($page - 1));
    $category = ORM::factory("category")->find((int)$id);
    $price_min = $this->input->get("price_min",0);
    $price_max = $this->input->get("price_max",800000);

    $category->id || Kohana::show_404();

    if(isset($_GET["size"])){
      $sql = "SELECT Distinct(s.good_id) 
              FROM goods g 
              JOIN size_counts s 
              ON s.good_id = g.id 
              JOIN categories_goods cg 
              ON cg.good_id = g.id 

              WHERE size_id IN (".implode(",", array_values($_GET["size"])).")
              AND cg.category_id = {$category->id}
              AND g.price >= {$price_min}
              AND g.price <= {$price_max}
              LIMIT {$limit} 
              OFFSET {$offset}";
    }
    else{
      $sql = "SELECT Distinct(s.good_id) 
              FROM goods g 
              JOIN size_counts s 
              ON s.good_id = g.id 
              JOIN categories_goods cg 
              ON cg.good_id = g.id 
              WHERE cg.category_id = {$category->id}
              AND g.price >= {$price_min}
              AND g.price <= {$price_max}
              LIMIT {$limit} 
              OFFSET {$offset}";
    }
    $ids = Database::instance()->query($sql)->as_array();
    $ids = array_map(function($it){ return $it->good_id;}, $ids);
    $goods = $ids ? ORM::factory("good")->where("id IN (".implode(",", $ids).")")->find_all() : $ids;
    $this->set_categories();
    $view = new View("list");
    $view->active_category = $category;
    $view->items      = $goods;
    $view->total      = $category->goods->count();
    $view->pagination = $this->pagination($category->goods->count());
    $view->render(true);
  }

  public function product($seo){
    $seo = explode("-", $seo);
    $id = end($seo);
    $good = ORM::factory("good")->find((int)$id);
    $good->id || Kohana::show_404();
    $this->set_categories();
    $view = new View("item");
    $view->active_category = $good->categories->current();;
    $view->item = $good;
    $view->render(true);
  }

  public function bestsellers(){
    $page = $this->input->get("page",1);
    $offset = (Kohana::config("lesya.per_page") * ($page - 1));
    $this->set_categories();
    $top_ids = Database::instance()->from("positions")->select("good_id,COUNT(good_id) AS cnt")->groupby("good_id")->orderby("cnt","DESC")->limit(Kohana::config("lesya.per_page"))->offset($offset)->get();
    $top_ids_ = array();
    foreach ($top_ids as $key => $value) {
      $top_ids_[] = $value->good_id;
    }
    $view = new View("sorted_list");
    $view->pagination = $this->pagination(10/*ORM::factory("good")->where("active",1)->count()*/);
    $view->items = ORM::factory("good")->where("active",1)->where("id IN (".implode(",", $top_ids_).")")->find_all();
   
    $view->heading      = "top_sellers";
    $view->render(true);
  }

  public function new_products(){
    $page = $this->input->get("page",1);
    $offset = (Kohana::config("lesya.per_page") * ($page - 1));
    $this->set_categories();
    $view = new View("sorted_list");
    $new_time = time() - Kohana::config("lesya.new_time");
    $view->pagination = $this->pagination(10/*ORM::factory("good")->where("active",1)->count()*/);
    $view->items = ORM::factory("good")->where("`created_at` > ".$new_time)->orderby("created_at","DESC")->offset($offset)->limit(Kohana::config("lesya.new_limit"))->find_all();
   
    $view->heading      = "new_products";
    $view->render(true);
  }

  public function specials(){
    $page = $this->input->get("page",1);
    $offset = (Kohana::config("lesya.per_page") * ($page - 1));
    $this->set_categories();
    $view = new View("sorted_list");
    $new_time = time() - Kohana::config("lesya.new_time");
    $view->pagination = $this->pagination(10/*ORM::factory("good")->where("active",1)->count()*/);
    $view->items = ORM::factory("good")->where("has_sale",1)->orderby("created_at","DESC")->offset($offset)->limit(Kohana::config("lesya.new_limit"))->find_all();
   
    $view->heading      = "specials";
    $view->render(true);
  }

  public function checkout(){
    count($this->cart["items"]) || Kohana::show_404();
    if(!$this->logged_in){
      url::redirect(url::base()."users");
    }
    if(!$this->user->is_full()){
      url::redirect(url::base()."users/profile");
    }
    $this->set_categories();
    $view = new View("checkout");
    $view->body_cls = "checkout-checkout";
    $view->render(true);
  }



  public function set_comment($id){
    $data = $this->input->get("feedback",array());
    $review = new Review_Model();
    foreach($data as $k=>$v){
      $review->$k = $v;
    }
    $review->save();
    die(json_encode(array("success"=>true)));
  }

  public function to_card($id){
    is_numeric($id) || die(json_encode(array("success"=>false)));
    $sizes = $this->input->get("sizes",array(array("size"=>"L","count"=>1)));
    foreach($sizes as $qty){
      $obj = ORM::factory("good")->find($id);
      $obj->id || die(json_encode(array("success"=>false)));
      if(!$data = Session::instance()->get($this->session_key)){
        $data  = array("ids"=>array($obj->id),"items"=>array(array("seo"=>$obj->seo_name,"price"=>$obj->price($this->user),"id"=>$obj->id,"count"=>$qty["count"],"size"=>$qty["size"],"name"=>$obj->name())),"total"=>($obj->price($this->user) * $qty["count"]));
      }
      else{
        
        if(in_array($obj->id, $data["ids"])){
          $succes_add = false;
          foreach($data["items"] as &$item){
            if($obj->id == $item["id"] && $item["size"]==$qty["size"]){
              $item["count"] =  $item["count"] + $qty["count"];
              $succes_add = true;
            }
          }
          if(!$succes_add){
            array_push($data["items"], array("seo"=>$obj->seo_name,"price"=>$obj->price($this->user),"id"=>$obj->id,"count"=>$qty["count"],"size"=>$qty["size"],"name"=>$obj->name()));
          }
        }
        else{
          array_push($data["items"], array("seo"=>$obj->seo_name,"price"=>$obj->price($this->user),"id"=>$obj->id,"count"=>$qty["count"],"size"=>$qty["size"],"name"=>$obj->name()));
        }

        $data["total"] =  $data["total"] + ($obj->price($this->user) * $qty["count"]);
        array_push($data["ids"] , $obj->id);
      }
      Session::instance()->set($this->session_key,$data);
    }

    die(json_encode(array("success"=>true, "ids" =>$data["ids"] ,  "total"=>$data["total"],"items"=>$data["items"])));
  }

  public function delete_from_cart($id){
    is_numeric($id) || die(json_encode(array("success"=>false)));
    $obj = ORM::factory("good")->find($id);
    $obj->id || die(json_encode(array("success"=>false)));
    $sizes = $this->input->get("sizes",array(array("size"=>"L","count"=>1)));
    foreach($sizes as $qty){
      if(!$data = Session::instance()->get($this->session_key)){
        $data  = array("ids"=>array(),"items"=>array(),"total"=>0);
      }
      else{
        if(count($data["items"])){
          foreach($data["items"] as &$item){
            if($obj->id == $item["id"] && $item["size"]==$qty["size"]){
              if($item["count"] > 1){
                $item["count"] = $item["count"] - $qty["count"];
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
      $data["total"] =  $data["total"] - $obj->price($this->user);
      $data["total"] = $data["total"] < 0 ? 0 : $data["total"];
      Session::instance()->set($this->session_key,$data);
    }
    die(json_encode(array("success"=>true, "ids" =>$data["ids"] ,  "total"=>$data["total"],"items"=>$data["items"])));
  }



  private function pagination($total){
        $p_config = array(
            'base_url'          =>  "/search/results",
            'query_string'      => 'page',
            'items_per_page'    =>  Kohana::config('lesya.per_page'),
            'style'             => 'lesya',
            'auto_hide'         => TRUE,
            'total_items'       => $total
        );
        $pagination = new Pagination($p_config);
        return $pagination->render();
  }
}