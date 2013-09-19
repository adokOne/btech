<?php

class ext_core {

	
	public static function render_modules($modules){
		$_modules = array();
		foreach ($modules as $module) {
			$mod = array("text"=>$module->name,"leaf"=>true);
			if($module->children->count() > 0)
				foreach($module->children as $mo)
					$mod["children"][] = array("text"=>$mo->name,"leaf"=>true,"cls"=>$mo->icon,"id"=>$mo->class_name);
			$_modules[] = $mod;
		}
		return $_modules;
		
		
		
		
	}
	
	
	
}