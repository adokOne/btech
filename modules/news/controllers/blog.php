<?php defined('SYSPATH') OR die('No direct access allowed.');

class Blog_Controller extends Controller {

	public function __construct(){
		parent::__construct();
		Router::$base_cls = "blog";
	}
	public function index(){
		$news = ORM::factory("news")->where("active",1)->find_all();
		$view = new View("news_index");
		$view->news = $news;
		$view->render(true);
	}
	public function show($seo){
		$post = ORM::factory("news")->where(array("active"=>1,"seo"=>$seo))->find();
		$post->id || Kohana::show_404();
		$view = new View("news_show");
		$view->post = $post;
		$view->render(true);
	}
}