<?php defined('SYSPATH') OR die('No direct access allowed.');

class Organization_Model extends ORM {
	protected $has_many = array("cupons");
} 

?>