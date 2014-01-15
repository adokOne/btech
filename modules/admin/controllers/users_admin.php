<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Users_Admin extends Ext_Constructor {

	protected $table    = "users";
	protected $use_form = true;
	protected $use_logo = true;

	protected $columns = array(
		"id",
		"email",
		"username",
		"logins",
		"active",
		"(DATE_FORMAT(FROM_UNIXTIME(last_login),GET_FORMAT(DATE,'EUR'))) AS last_login"
	);

}