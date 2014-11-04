<?php
class Controller extends Controller_Core {
	protected $session_key = "order";
	public function __construct(){
		parent::__construct();
		$this->_set_user();
		$this->_set_connect();

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
      "front/jquery.jqzoom",
      "front/blockfacebook",
      "front/blockcurrencies",
      "front/blockcontact",
      "front/blockcategories",
      "front/blockcart",
      "front/category",
      "front/product",
      "front/my-account",

    );
    $js = array(
      "front/jquery-1.11.0.min",
      "front/jquery-migrate-1.2.1.min",
      "front/jquery.easing",
      "front/jquery.validate",
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
      "front/jquery.rating.pack",
      "front/blocknewsletter",
      "front/jquery.autocomplete",
      "front/homeslider",
      "front/hoverIntent",
      "front/jquery.jqzoom",
      "front/superfish-modified",
      "front/jquery.maskedinput.min",
      "front/blocktopmenu",
      "front/index",
      "front/product",
      "front/blockfacebook",
      "front/productscategory",
      "jquery.mvc",
      "script",
      "front/main",
      "front/productcomments",
      "front/ajax-cart",
      "front/all",
    );
    if(strpos(url::current(), "admin") === false){
       js::add($js);
       css::add($css);
    }
   
		
	}


	private function _set_user(){
		if( $this->logged_in = Auth::instance()->logged_in() ) {
			$this->user = Auth::instance()->get_user();
			View::set_global('user',$this->user);
		}	
    else{
      $this->user = false;
    }
		View::set_global('logged_in', $this->logged_in);
	}

	private function _set_connect(){
		$this->db = Database::instance();
	}

  protected function set_categories(){
    $categories = ORM::factory("category")->where("parent_id",1)->find_all();
    View::set_global("categories",$categories);
  }

  protected function _send_sms($desc){
      // include_once 'GCalendarEvent.php';
      // $event = new GCalendarEvent(Kohana::config("core.g_mail"),Kohana::config("core.g_pass"));
      // $result = $event->addEvent(Kohana::config("core.order_theme"), $desc, $desc,date('c', time()),date('c', time()),1);
  }

  public function error_page(){
    $view = new View("_kohana_error_disabled");
    $view->render(true);
  }






}