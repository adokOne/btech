<?php


class Review_Model  extends ORM{
	protected $belongs_to = array("good");
	public function save(){
		if((int)$this->created_at < 1){
			$this->created_at = time();
		}
		parent::save();
	}
}