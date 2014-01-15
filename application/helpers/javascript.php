<?php defined('SYSPATH') OR die('No direct access allowed.');
	
class javascript_Core {
	
        protected static $javascripts = array();
	
        public static function add($javascripts = array()){	
            $javascripts = is_array($javascripts) ? $javascripts : array($javascripts);
            self::$javascripts = array_merge(self::$javascripts,$javascripts);
        }
	
        public static function remove($javascripts = array())	
		{	
            $javascripts = is_array($javascripts) ? $javascripts : array($javascripts);
            self::$javascripts = array_diff(self::$javascripts,$javascripts);
        }
        
        public static function render()	
        {
                foreach (array_unique( self::$javascripts ) as $key => $javascript)
                {
                    echo  
                    (substr($javascript, 0, 4) == 'http') ? 
                    '<script type="text/javascript" src="'.$javascript.'"></script>' : 
                    html::script('js/' . $javascript . '.js');

                }
        }
		public static function render_once($script)	
        {
            echo html::script('js/' . $script . '.js');       
        }
}


