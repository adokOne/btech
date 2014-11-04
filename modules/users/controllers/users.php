<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Users_Controller extends Controller {

	public function __construct(){
	    parent::__construct();
	    View::set_global("card",Session::instance()->get($this->session_key));
	    View::set_global("lang",Kohana::lang("global"));
	    View::set_global("active_currency",cookie::get("active_currency","UAH"));
	    View::set_global("body_cls","my-account");
	}

	public function get_pass(){
		if($email = $this->input->post("eamil",false)){
			$user = ORM::factory("user")->where("email",$email)->find();
			if($user->id){
				$pass = $this->generate_password();
				$user->change_password($pass,$pass);
				$message = new View("forgot_email");
				$message->password = $password;
				$message->email    = $email;
				$message->name     = $username;
				email::send($email, Kohana::config("email.sender"), Kohana::lang("global.forgot_email"), $message->render(), true);
				url::redirect(url::base());
			}
			
		}
	}

	public function index(){
		if($this->logged_in){
			url::redirect(url::base());
		}
		$this->set_categories();
		$view = new View("login");
		$view->render(true);
	}

	public function forgot(){
		if($this->logged_in){
			url::redirect(url::base());
		}
		$this->set_categories();
		$view = new View("forgot");
		$view->render(true);
	}

	public function account(){
		$this->set_categories();
		$view = new View("account");
		$view->render(true);
	}

	public function orders(){
		$this->set_categories();
		$view = new View("orders");
		$view->render(true);
	}
	public function order($id){
		$this->set_categories();
		$order = $this->user->where("id",$id)->orders->current();
		$order->id || Kohana::show_404();
		if(isset($_POST["msgText"])){
			$order->comment = $_POST["msgText"];
			$order->save();
			url::redirect(url::current());
		}
		$view = new View("order");
		$view->order = $order;
		$view->render(true);
	}
	public function update(){
		$this->user->email = $this->input->post("email",false);
		$this->user->name  = $this->input->post("name",false);
		$this->user->phone = $this->input->post("phone",false);
		$this->user->address = $this->input->post("address",false);
		$this->user->save();
		url::redirect(request::referrer());
	}

	public function login(){
		$username = $this->input->get('email',null);
		$password = $this->input->get('password',null);
		$array = array("email"=>$username,"password"=>$password);
		$response = array('success'=>false,'errors'=>array(array("email"=>Kohana::lang('global.default_login_error'))));
		$user = Validation::factory($array)
			->pre_filter('trim', TRUE)
			->add_rules('email', 'required', 'length[5,127]')
			->add_rules('password','required','length[4,127]');
		if($user->validate()){
			$user = ORM::factory('user',$username);
			if(Auth::instance()->login($username, $password, false))
				$response = array('success'=>true,"errors"=>array());
		}
		die(json_encode($response));
	}

	public function profile(){
		if(!$this->logged_in){
			url::redirect(url::base());
		}
		$this->set_categories();
		$view = new View("profile");
		$view->render(true);
	}

	public function registration(){
		request::is_ajax() || Kohana::show_404();
		$erros = array();
		if(!$email = $this->input->get("email",false)){
			$erros[] = array("email"=>Kohana::lang("global.email_required"));
			die(json_encode(array("success"=>false,"errors"=>$erros)));
		}
		elseif(Database::instance()->from("users")->where("email",$email)->count_records()){
			$erros[] = array("email"=>Kohana::lang("global.email_exist"));
			die(json_encode(array("success"=>false,"errors"=>$erros)));
		}
		elseif(!$username = $this->input->get("username",false)){
			$erros[] = array("email"=>Kohana::lang("global.username_required"));
			die(json_encode(array("success"=>false,"errors"=>$erros)));
		}
		else{
			$password = $this->generate_password();
			$message = new View("req_email");
			$message->password = $password;
			$message->email    = $email;
			$message->name     = $username;
			
			$user   = new User_Model();
			$user->email    = $email;
			$user->name     = $username;
			$user->username = $username;
			$user->password = $password;
			$user->save();
			$user->reload();
			foreach(ORM::factory('role')->where("name","login")->find_all() as $item){
				$user->add($item);
			}
			if($user->id){
				email::send($email, Kohana::config("email.sender"), Kohana::lang("global.reg_subj"), $message->render(), true);
			}
			
			Auth::instance()->force_login($user);
			die(json_encode(array("success"=>$user->id > 0,"errors"=>$erros)));
		}

	}

	public function logout(){
		Auth::instance()->logout(TRUE);
		url::redirect(url::base(),301);
	}
	private function generate_password(){
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
	}
}

?>