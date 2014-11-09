<?php


class Feedback_Model  extends ORM{
  	public function save(){
  		if($this->created_at < 1){
  			$this->created_at = time();
  		}
  		parent::save();
  	}
}