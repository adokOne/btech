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
    public static function grid()
    {
        $offset = (int)Input::instance()->post('start', 0);
        $limit  = (int)Input::instance()->post('limit', 20);
        $nodes['items'] = Database::instance()
            ->limit($limit, $offset)
            ->get()
            ->as_array();
        $nodes['total'] = Database::instance()->query("SELECT FOUND_ROWS() AS total")->current()->total;
        return $nodes;
    }
	
	
}