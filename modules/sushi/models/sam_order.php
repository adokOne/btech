<?php


class Sam_Order_Model  extends ORM{
	protected $has_many = array("sam_positions");
	protected $has_one = array("osnova");
	public $ingredients = array();

	public function pay_type(){

	}
	public function ingredients(){
		$this->ingredients = array();
		foreach($this->sam_positions as $pos){
			$this->ingredients[$pos->ingredient_id] = $pos->count;
		}
		return $this->ingredients;
	}
	public function delete_positions(){
		foreach($this->sam_positions as $pos)
		{
		   $pos->delete();
		}
	}

	public function goods_admin_html(){
		$result = array("<b>".$this->osnova->name()."</b><br/>");
		foreach($this->sam_positions as $pos)
		{
		  $result[] = "<b>". $pos->count."</b> x ".$pos->ingredient->name()."<span style='float:right'>".$pos->ingredient->price." грн.</span>";
		}
		return implode("<br/><br/>", $result);
	}
	public function goods_admin_exel(){
		$result = array();
		foreach($this->sam_positions as $pos)
		{
		  $result[] = $pos->count." x ".$pos->ingredient->name()."---".$pos->ingredient->price." грн.";
		}
		return implode("\n", $result);
	}
}