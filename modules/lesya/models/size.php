<?php


class Size_Model  extends ORM{
	protected $has_many = array("size_counts");
	public $goods = array();
	public function goods(){
		$this->goods = array();
		foreach($this->size_counts as $pos){
			$this->goods[$pos->good_id] = $pos->count;
		}
		return $this->goods;
	}
}