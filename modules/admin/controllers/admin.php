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
		$this->logged_in && $this->user->is_admin() || $this->login(!request::is_ajax());
	}
	
	public function index(){
		#var_dump(ext::render_modules($this->user->get_modules()));die;
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
			$user = Validation::factory($_POST)
				->pre_filter('trim', TRUE)
				->add_rules('username', 'required', 'length[5,127]')
				->add_rules('password','required','length[5,127]');
			if($user->validate()){
				$user = ORM::factory('user',$username);
				if($user->is_admin() && Auth::instance()->login($username, $password, false)){
					$response = array('success'=>true);
				}
				else{
					$response = array('success'=>false,'text'=>Kohana::lang('admin.default_login_error'));
				}
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

		#echo ext::render_modules($this->user->get_modules());
		/*echo "{ 
text: '.',
children: [{
    text:'Basic Ext Layouts',
    expanded: true,
    children:[{
        text:'Absolute',
        id:'absolute',
        leaf:false
    },{
        text:'Accordion',
        id:'accordion',
        leaf:false
    },{
        text:'Anchor',
        id:'anchor',
        leaf:false
    },{
        text:'Border',
        id:'border',
        leaf:true
    },{
        text:'Card (TabPanel)',
        id:'card-tabs',
        leaf:true
    },{
        text:'Card (Wizard)',
        id:'card-wizard',
        leaf:true
    },{
        text:'Column',
        id:'column',
        leaf:true
    },{
        text:'Fit',
        id:'fit',
        leaf:true
    },{
        text:'Table',
        id:'table',
        leaf:true
    },{
        text:'vBox',
        id:'vbox',
        leaf:true
    },{
        text:'hBox',
        id:'hbox',
        leaf:true
    }]
},{
    text:'Custom Layouts',
    children:[{
        text:'Center',
        id:'center',
        leaf:true
    }]
},{
    text:'Combination Examples',
    children:[{
        text:'Absolute Layout Form',
        id:'abs-form',
        leaf:true
    },{
        text:'Tabs with Nested Layouts',
        id:'tabs-nested-layouts',
        leaf:true
    }]
}]
}"; */echo ext::render_modules($this->user->get_modules());
	}
	
}
