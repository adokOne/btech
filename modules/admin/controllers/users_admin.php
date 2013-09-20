<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Users_Admin extends Ext_Constructor {

	protected $table   = "users";

	protected $columns = array(
		"email",
		"username",
		"logins",
		"(FROM_UNIXTIME(last_login)) AS last_login"
	);
}