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
	}

	public function index(){
		if($this->logged_in){
			#url::redirect(url::base());
		}
		$this->set_categories();
		$view = new View("login");
		$view->render(true);
	}

	public function forgot(){
		if($this->logged_in){
			#url::redirect(url::base());
		}
		$this->set_categories();
		$view = new View("forgot");
		$view->render(true);
	}

	public function registration(){

	}

	public function login(){

	}

	public function logout(){
		Auth::instance()->logout(TRUE);
		url::redirect(request::referrer(),301);
	}
}

?>