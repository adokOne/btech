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
    View::set_global("card",Session::instance()->get($this->session_key));
    View::set_global("lang",Kohana::lang("global"));
    View::set_global("active_currency",cookie::get("active_currency","UAH"));

  }

  public function index(){
    $this->set_categories();
    $view = new View("index");
    $view->items  = ORM::factory("good")->where("active",1)->where("show_on_main",1)->find_all();
    $view->render(true);
  }

  public function category($seo){
    $seo = explode("-", $seo);
    $id = end($seo);
    $category = ORM::factory("category")->find((int)$id);
    $category->id || Kohana::show_404();
    $page = $this->input->get("page",1);
    $offset = (Kohana::config("lesya.per_page") * ($page - 1));
    $category_clone = clone($category);
    $this->set_categories();
    $view = new View("list");
    $view->active_category = $category;
    $view->items  = $category->where("active",1)->limit(Kohana::config("lesya.per_page"))->offset($offset)->goods;
    $view->total      = $category->goods->count();
    $view->pagination = $this->pagination($category_clone->where("active",1)->goods->count());
    $view->render(true);
  }

  public function product($seo){
    $seo = explode("-", $seo);
    $id = end($seo);
    $good = ORM::factory("good")->find((int)$id);
    $good->id || Kohana::show_404();
    $this->set_categories();
    $view = new View("item");
    $view->active_category = $good->category;;
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



  public function set_comment($id){

  }

  public function to_card($id){
    is_numeric($id) || die(json_encode(array("success"=>false)));
    $obj = ORM::factory("good")->find($id);
    $obj->id || die(json_encode(array("success"=>false)));
    if(!$data = Session::instance()->get($this->session_key)){
      $data  = array("ids"=>array($obj->id),"items"=>array(array("seo"=>$obj->seo_name,"price"=>$obj->price,"id"=>$obj->id,"count"=>1,"name"=>$obj->name())),"total"=>$obj->price);
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
        array_push($data["items"], array("seo"=>$obj->seo_name,"price"=>$obj->price,"id"=>$obj->id,"count"=>1,"name"=>$obj->name()));
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
    $data["total"] = $data["total"] < 0 ? 0 : $data["total"];
    Session::instance()->set($this->session_key,$data);
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