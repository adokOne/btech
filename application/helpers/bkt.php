<?php defined('SYSPATH') OR die('No direct access allowed.');
	
class bkt_Core {
    public function error(){
        $view = new View("erorr_page");
        $view->render(true);
    }	
}


