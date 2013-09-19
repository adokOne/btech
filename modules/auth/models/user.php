<?php defined('SYSPATH') OR die('No direct access allowed.');

class User_Model extends Auth_User_Model {
	
	public function is_admin(){
		return $this->has(ORM::factory('role','admin'));
	}
	public function get_modules(){
		$modules = array();
		foreach ($this->roles as $role) {
			$modules = array_merge($modules,$role->modules->as_array());
		}
		return $modules;
	}



	
}