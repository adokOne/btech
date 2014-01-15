<?php defined('SYSPATH') OR die('No direct access allowed.');

class Main_Controller extends Controller {


	public function index()
	{
		
		Router::$base_cls = "index";
		$view = new View("main");
		$view->render(true);
	}

}