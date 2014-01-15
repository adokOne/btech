
<?php defined('SYSPATH') or die('No direct script access.');
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  @abstract
 *  
 */
abstract class Constructor 
{
	protected $table; #string

	protected $columns     = array();

	protected $fields      = array();

	protected $where_statement = null;

	protected $multi_lang  = false;

	protected $template; #string

	protected $user_fields = array("SQL_CALC_FOUND_ROWS id");

	protected $phantom_fields = array();

	protected $stores = array();

	protected $use_form   = false;

	protected $use_tree   = false;

	protected $use_logo   = false;

	protected $use_filter = false;

	protected $use_map    = false;

	protected $enable_dd  = false;

	protected $order_by   = "id";
	protected $order_dir  = "ASC";

	public function __construct(){}

	public function index() {}

	public function create()  {}

	public function edit()  {}

	public function save()  {}

	public function save_all()  {}

	public function delete()  {}

	public function delete_all()  {}


}

?>