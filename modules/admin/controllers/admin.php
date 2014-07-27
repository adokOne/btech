<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Admin_Controller extends Controller {

	public function __construct(){
		parent::__construct();
		$css = array(
			"bootstrap.min",
			"font-awesome.min",
			"smartadmin-production",
			"smartadmin-skins.min",
		);
		$js = array(

			"vendor/jquery.min",
			"vendor/jquery-ui.min",
			"vendor/app.config",
			"vendor/bootstrap.min",
			"vendor/jquery.validate",
			"vendor/jquery.maskedinput.min",
			"vendor/select2.min",
			"vendor/jquery.mb.browser.min",
			"vendor/app",
			"jquery.mvc",
			"admin",
			"modules/admin_login",
			"vendor/summernote",
		);
		js::add($js);
		css::add($css);
		$this->config = Kohana::config('admin');
		View::set_global('admin_lang', Kohana::lang('admin'));
		$this->logged_in && $this->user->is_admin() || $this->login(!request::is_ajax());
		$this->view = new View('dashboard');
		$this->view->modules = $this->user->get_modules();

	}
	
	public function index(){
		$this->view->render(true);
	}
	
	public function login($show_form = false){
		if($show_form){
			$view = new View('admin_login');
			$view->render(true);
		}
		else{
			$username = $this->input->post('email',null,true);
			$password = $this->input->post('password',null,true);
			$response = array('success'=>false,'text'=>Kohana::lang('admin.default_login_error'));
			$user = Validation::factory($_POST)
				->pre_filter('trim', TRUE)
				->add_rules('email', 'required', 'length[5,127]')
				->add_rules('password','required','length[5,127]');
			if($user->validate()){
				$user = ORM::factory('user',$username);
				if($user->is_admin() && Auth::instance()->login($username, $password, isset($_POST["remember"])))
					$response = array('success'=>true);
			}
			echo json_encode($response);
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
			if(method_exists($instance,$method)){
				isset($arguments[1]) ? $instance->$method($arguments[1]) : $instance->$method();
			}
				
		}
		else{
			$view 	= new View(Kohana::config('admin.admin_type').'/not_found');
			$view->name  = $name ;
			$view->render(true);
		}
	}

	public function logout(){
		Auth::instance()->logout(TRUE);
		url::redirect(request::referrer(),301);
	}

	protected function pagination(){

		$config = array(
			"base_url"			=> "/admin/".current(explode("_", strtolower(get_called_class()))),
			"uri_segment"    	=>  "index",
			"total_items"		=>  $this->db->count_last_query(),
			"items_per_page"	=>  $this->config['per_page'],
			'style'          	=> "b_tech",
			'auto_hide'         => true
		);
		return new Pagination($config);
	}

	protected function check_object_by_id($model,$id){
		is_numeric($id) || Kohana::show_404();
		$object =  ORM::factory($model)->find($id);
		$object->id || Kohana::show_404();
		return $object;
	}
	
}
