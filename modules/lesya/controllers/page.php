<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Page_Controller extends Controller {
  public function __construct(){
    parent::__construct();
    View::set_global("card",Session::instance()->get($this->session_key));
    View::set_global("lang",Kohana::lang("global"));
    View::set_global("active_currency",cookie::get("active_currency","UAH"));

  }
	public function index($seo){
		$page = ORM::factory("page")->where("active",1)->where("seo_name",$seo)->find();
		
		$page->id || Kohana::show_404();
		$this->set_categories();
		$view = new View("page");
		$view->page = $page;
		$view->render(true);
	}

	public function contacts(){
		$this->set_categories();
		$view = new View("contacts");
		$view->render(true);
	}
}