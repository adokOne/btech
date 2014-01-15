<?php defined('SYSPATH') OR die('No direct access allowed.');

class Blog_Controller extends Controller {

	public function __construct(){
		parent::__construct();
		Router::$base_cls = "blog";
		$this->page_limit = 10;
	}
	public function index(){
		$news 		= ORM::factory("news")->where("active",1);
		$pagination = $this->_pagination($news->count_all());
		$page = $this->input->get("page",1);
		$news = $news->limit($this->page_limit)->offset($this->page_limit*($page-1))->find_all();
		$view = new View("news_index");
		$view->pagination = $pagination;
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

	private function _pagination($total){
        $p_config = array(
            'base_url'          =>  "/blog",
            'query_string'      => 'page',
            'items_per_page'    =>  $this->page_limit,
            'style'             => 'tickets',
            'auto_hide'         => TRUE,
            'total_items'       => $total
        );
        $pagination = new Pagination($p_config);
        return $pagination->render();
	}
}