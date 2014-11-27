<?php
class Controller extends Controller_Core {

	public function __construct(){
		parent::__construct();
		$this->_set_user();
		$this->_set_connect();

		
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

	protected function _send_sms($desc){
			include_once 'google.php';
			#$event = new GCalendarEvent(Kohana::config("core.g_mail"),Kohana::config("core.g_pass"));
			#$result = $event->addEvent(Kohana::config("core.order_theme"), $desc, $desc,date('c', time()+1200),date('c', time()+1200),1);
	}

	public function error_page(){
		$view = new View("_kohana_error_disabled");
		$view->render(true);
	}








}