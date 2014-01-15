<?php defined('SYSPATH') OR die('No direct access allowed.');

class Comment_Model extends ORM_Tree{
	
	protected $ORM_Tree_children = "comments";
	protected $belongs_to = array("news","user");


} 