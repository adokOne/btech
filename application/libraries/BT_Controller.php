<?php
class Controller extends Controller_Core {
	protected $session_key = "order";
	public function __construct(){
		parent::__construct();
		$this->_set_user();
		$this->_set_connect();

    $css = array(
      "front/stylesheet",
      "front/stylesheet_boxes",
      "front/stylesheet_css_buttons",
      "front/stylesheet_ezpages_footer_columns",
      "front/stylesheet_header_menu",
      "front/stylesheet_lightbox-0.5",
      "front/stylesheet_main",
      "front/stylesheet_social_media_icons",
      "front/stylesheet_tm",
      "front/index_home",
      "front/print_stylesheet",
      // "front/",
      // "front/",
      // "front/",
      // "front/",
      // "front/",
      // "front/",

    );
    $js = array(
      "front/jscript_jquery-1.7.1.min",
      "front/jscript_jquery.nivo.slider.pack",
      "front/jscript_script",
      "front/jscript_xdropdown_menu",
      "front/jscript_xeasyTooltip",
      "front/jscript_xjquery.easing.1.3",
      "front/jscript_xjquery.jqtransform",
      "front/jscript_xjquery.lightbox-0.5",
      // "front/",
      // "front/",
      // "front/",
      // "front/",
      "jquery.mvc",
      "script",
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