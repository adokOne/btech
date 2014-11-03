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
      "front/global",
      "front/highdpi",
      "front/responsive-tables",
      "front/uniform.default",
      "front/superfish-modified",
      "front/productcomments",
      "front/product_list",
      "front/jquery.fancybox",
      "front/jquery.autocomplete",
      "front/hooks",
      "front/homeslider",
      "front/blockwishlist",
      "front/blockviewed",
      "front/blockuserinfo",
      "front/blocktopmenu",
      "front/blocktags",
      "front/blocksearch",
      "front/blockpermanentlinks",

      "front/blocknewsletter",

      "front/blocklanguages",

      "front/blockfacebook",
      "front/blockcurrencies",
      "front/blockcontact",
      "front/blockcategories",
      "front/blockcart",
      "front/category",
     # "front/",

    );
    $js = array(
      "front/jquery-1.11.0.min",
      "front/jquery-migrate-1.2.1.min",
      "front/jquery.easing",
      "front/tools",
      "front/global",
      "front/10-bootstrap.min",
      "front/15-jquery.total-storage.min",
      "front/15-jquery.uniform-modified",
      "front/jquery.fancybox",
      "front/jquery.scrollTo",
      "front/jquery.serialScroll",
      "front/jquery.bxslider",
      "front/treeManagement",
      "front/blocknewsletter",
      "front/jquery.autocomplete",
      "front/homeslider",
      "front/hoverIntent",
      "front/superfish-modified",
      "front/blocktopmenu",
      "front/index",
      "jquery.mvc",
      "script",
      "front/main",
    );
    js::add($js);
    css::add($css);
    parent::__construct();
    View::set_global("card",Session::instance()->get($this->session_key));
    View::set_global("lang",Kohana::lang("global"));
    View::set_global("active_currency",cookie::get("active_currency","UAH"));

  }

  public function index(){
    $this->set_categories();
    $view = new View("index");
    $view->items  = ORM::factory("good")->where("active",1)->where("show_on_main",1)->find_all();
    // $view->feedbacks = ORM::factory("feedback")->limit(5)->find_all();
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
    // $view->feedbacks = ORM::factory("feedback")->limit(5)->find_all();
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
    #var_dump($top_ids_);die;
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

  private function set_categories(){
    $categories = ORM::factory("category")->where("parent_id",1)->find_all();
    View::set_global("categories",$categories);
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