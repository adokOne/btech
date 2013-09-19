<?php defined('SYSPATH') OR die('No direct access allowed.');

class Module_Model extends ORM_Tree {
	protected $has_and_belongs_to_many = array('roles');	
	protected $ORM_Tree_children = "modules";
	protected $parent_key = 'parent_id';
} 

?>