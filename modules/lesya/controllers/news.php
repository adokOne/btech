<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class News_Controller extends Controller {
  public function __construct(){
    parent::__construct();
    View::set_global("card",Session::instance()->get($this->session_key));
    View::set_global("lang",Kohana::lang("global"));
    View::set_global("active_currency",cookie::get("active_currency","UAH"));

  }
	public function index(){
		$news = ORM::factory("page")->where(array("active"=>1,"type"=>"news"))->find_all();

		$this->set_categories();
		$view = new View("news");
		$view->news = $news;
		$view->render(true);
	}
	public function show($seo=false){
		$page = ORM::factory("page")->where(array("active"=>1,"type"=>"news"))->where("seo_name",$seo)->find();
		
		$page->id || Kohana::show_404();
		$this->set_categories();
		$view = new View("page_news");
		$view->page = $page;
		$view->render(true);
	}

}