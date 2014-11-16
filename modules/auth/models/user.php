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

	public function save(){
		if($this->id > 0)
			parent::save();
		else{
			$array = array();
			foreach($this->list_fields() as $key=>$v)
				$array[$key] = $this->$key;
			$array["password"] = strlen($array["password"]) ? $array["password"] : $this->generate_password();
			
			$array = Validation::factory($array)
				->pre_filter('trim')
				->add_rules('email', 'required', 'length[4,127]', 'valid::email', array($this, 'email_available'))
				->add_rules('name', 'required', 'length[4,32]', 'chars[а-яА-Яa-zA-Z0-9_.\s]');
				// ->add_rules('password', 'required', 'length[5,42]');
			if($array->validate())
				parent::save();
		}


	}

	public function avatar(){
		
	}
	public function is_full(){
		return strlen($this->email) && strlen($this->name) && strlen($this->phone) && strlen($this->address);
	}

	public function is_wholesale(){
		return $this->has(ORM::factory('role','wholesale'));
	}

	public function roles(){
		$roles = array();
		foreach($this->roles as $role){
			$roles[] = $role->name;
		}
		return $roles;
	}

	public function generate_password(){
		return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
	}



	
}
#bcf08bae806f6e0910ac7faf1a2c7586309aa80f63991ddb87