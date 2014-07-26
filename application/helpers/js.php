<?php
    
class js_Core {
    
        protected static $javascripts = array();
        
        public static function add($javascripts = array())    
        {    
                if ( ! is_array($javascripts))    
                        $javascripts = array($javascripts);
    
                foreach ($javascripts as $key => $javascript)    
                {    
                        self::$javascripts[] = $javascript;    
                }    
        }
    
        public static function remove($javascripts = array())    
        {    
                foreach (self::$javascripts as $key => $javascript)
                {
                        if (in_array($javascript, $javascripts))
                                unset(self::$javascripts[$key]);
                }
        }
        
        public static function render() {
            foreach (array_unique( self::$javascripts ) as $key => $javascript){        
                echo html::script("js/{$javascript}.js", FALSE, FALSE);
            }
        }
}