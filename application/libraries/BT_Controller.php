<?php
class Controller extends Controller_Core {

	public function __construct(){
		parent::__construct();
		$this->_set_user();
		$this->_set_connect();
		$this->_prepare_layout();

		
	}


	private function _set_user(){
		if( $this->logged_in = Auth::instance()->logged_in() ) {
			$this->user = Auth::instance()->get_user();
			View::set_global('user',$this->user);
		}	
		View::set_global('logged_in', $this->logged_in);
	}

	private function _set_connect(){
		$this->db = Database::instance();
	}

	private function _prepare_layout(){
		$css = array("all","jquery-ui-1.9.2.custom.css");
		$js  = array("jquery-1.7.2.min.js","jquery-ui-1.9.2.custom.min.js");
		javascript::add($js);
		stylesheet::add($css);
		View::set_global("lang",Kohana::lang("all"));
	}










}