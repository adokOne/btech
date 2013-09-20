<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Users_Controller extends Controller {
	

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