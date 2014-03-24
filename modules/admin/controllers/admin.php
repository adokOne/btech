<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Admin_Controller extends Controller {
	
	public function __construct(){
		parent::__construct();
		View::set_global('admin_lang', Kohana::lang('admin'));
		View::set_global("max_height",900);
		$css_arr =array(); 
		foreach(scandir(DOCROOT."css/admin") as $css){
			if(strlen($css) < 3) continue;
			stylesheet::add("admin/".str_replace(".css", "", $css));
		}
		foreach(scandir(DOCROOT."js/admin") as $js){
			if(strlen($js) < 3) continue;
			javascript::add("admin/".str_replace(".js", "", $js));
		}

		$this->logged_in && $this->user->is_admin() || $this->login(!in_array(request::method(), array("post")));

	}
	
	public function index(){
		$view = new View(Kohana::config('admin.admin_type').'/dashboard');
		$view->modules = $this->user->get_modules();
		$view->render(true);
	}
	
	public function login($show_form = false){
		if($show_form){
			$view = new View(Kohana::config('admin.admin_type').'/admin_login_form');
			$view->render(true);
		}
		else{
			$username = $this->input->post('username',null,true);
			$password = $this->input->post('password',null,true);
			$url = url::current()."?".http_build_query(array('errors'=>'default_login_error'));
			$user = Validation::factory($_POST)
				->pre_filter('trim', TRUE)
				->add_rules('username', 'required', 'length[5,127]')
				->add_rules('password','required','length[5,127]');
			if($user->validate()){
				$user = ORM::factory('user',$username);
				if($user->is_admin() && Auth::instance()->login($username, $password, false))
					$url = "/admin";
			}
			url::redirect($url);
		}
		exit;

	}

	public function __call($name, $arguments){
		$class = $name . '_Admin';
		$path  = __DIR__."/".strtolower($class).EXT;
		if (file_exists($path)) require_once $path;	
		if(class_exists($class)){
			$instance = new $class;
			$method   = empty($arguments) ? "index" :  $arguments[0];
			if(method_exists($instance,$method))
				isset($arguments[1]) ? $instance->$method($arguments[1]) : $instance->$method();
		}
		else{
			$view 	= new View(Kohana::config('admin.admin_type').'/not_found');
			$view->name  = $name ;
			$view->render(true);
		}
	}

	public function test(){

	}
	
}
