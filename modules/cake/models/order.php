<?php


class Order_Model  extends ORM{
	protected $has_many = array("positions");
	public $goods = array();

	public function pay_type(){

	}
	public function goods(){
		$this->goods = array();
		foreach($this->positions as $pos){
			$this->goods[$pos->good_id] = $pos->count;
		}
		return $this->goods;
	}
	public function delete_positions(){
		foreach($this->positions as $pos)
		{
		   $pos->delete();
		}
	}

	public function goods_admin_html(){
		$result = array();
		foreach($this->positions as $pos)
		{
		  $result[] = "<b>". $pos->count."</b> x ".$pos->good->name()."<span style='float:right'>".$pos->good->price." грн.</span>";
		}
		return implode("<br/>", $result);
	}
}