
<?php defined('SYSPATH') or die('No direct script access.');
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Ext_Constructor extends Constructor 
{
	protected $table; #string

	protected $columns     = array();

	protected $fields      = array();

	protected $multi_lang  = false;

	public function index() {}

	public function create()  {}

	public function edit()  {}

	public function save()  {}

	public function save_all()  {}

	public function delete()  {}

	public function delete_all()  {}


}

?>