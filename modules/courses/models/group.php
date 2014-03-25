<?php defined('SYSPATH') OR die('No direct access allowed.');

class Group_Model extends ORM{

	protected $belongs_to = array("course");

	public function days(){
/*		$days = array();
		foreach(explode("|", $this->days) as $day)
			$days[] = Kohana::lang("all.short_days.".$day); 
		return implode(",", $days);*/
		return $this->days;
	}

	public function time(){
		return $this->time_from." ".$this->time_to;
	}

} 