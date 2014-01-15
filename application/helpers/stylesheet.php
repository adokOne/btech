<?php defined('SYSPATH') OR die('No direct access allowed.');
class stylesheet_Core {

    protected static $stylesheets = array();

    public static function add($stylesheets = array()){       
        $stylesheets = is_array($stylesheets) ? $stylesheets : array($stylesheets);
        self::$stylesheets = array_merge(self::$stylesheets,$stylesheets);
    }

    public static function render(){
        foreach (array_unique(self::$stylesheets) as $stylesheet)
            echo html::stylesheet('css/' . $stylesheet . '.css');
    }
}
?>