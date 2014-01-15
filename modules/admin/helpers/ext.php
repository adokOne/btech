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
        $nodes['total'] = (int)Database::instance()->query("SELECT FOUND_ROWS() AS total")->current()->total;
        return $nodes;
    }
	
    public static function record($table, $columns)
    {
        foreach ($columns as $key => $val)
        {
            $as = strripos($val, 'AS ');
            $columns[$key] = ($as) ? substr($val, $as + 3) : $val;
        }
        $fields = Database::instance()->field_data($table);
               
        foreach($fields as $field)
            $fields[$field->Field] = array_shift($fields);
        
        $result = array();
        foreach($columns as $key)
        {
            if (isset($fields[$key]))
            {
                $val = $fields[$key];
                $isset_length = strripos($val->Type, '(');
                $type = ($isset_length) ? substr($val->Type, 0, $isset_length) : $val->Type;
                switch ($type)
                {
                case 'varchar':
                case 'text':
                case 'tinytext':
                case 'mediumtext':
                case 'longtext':
                case 'enum':                
                    $type = 'string';
                break;
                case 'int':
                case 'tinyint':
                case 'mediumint':
                case 'smallint':
                    $type = 'int';
                break;
                case 'float':
                case 'real':
                case 'double':
                    $type = 'float';
                break;
                case 'datetime':
                    $type = 'xdatetime';
                break;
                case 'date':
                    $type = 'date';
                break;              
                default:
                    $type = 'string';
                }
                switch ($key)
                {
                case 'last_login': 
                case 'created_at':   
                case 'updated_at':
                case 'active_until':                 
                    $type = 'date';
                break;           
                default:
                    $type = $type;
                }             
                $result[] = $type == "date" ? "{name: '$key', type: '$type' , dateFormat: 'd.m.Y', }" :  "{name: '$key', type: '$type'}";
            }
            else
            {
                $result[] = "{name: '$key'}";
            }
        }
        return implode(",\n", $result);       
    }  
}
