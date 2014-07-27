<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Orders_Admin extends Admin_Controller {
	private $search = array(); 

	public function index($page = 1){
		$js = array(
			"modules/admin_orders",
		);
		js::add($js);
		$items = ORM::factory("order")
			->where($this->check_conditions())
			->limit($this->config["per_page"])
			->offset(($page-1)*$this->config["per_page"])
			->find_all();

		$view  = new View("orders/index");
		$view->items = $items;
		$view->search = $this->search;
		$view->pagination = $this->pagination();
		$this->view->content = $view->render(false);
		$actions = new View("orders/actions");
		$actions->total = ORM::factory("order")->count_all();
		$this->view->actions = $actions->render(false);
		$this->view->render(true);
	}

	public function new_one(){
		$goods = ORM::factory("good")->find_all()->as_array();
		$goods = array_chunk($goods, ceil(count($goods)/3));
		$view = new View("orders/edit");
		$view->object =  new Order_Model();
		$view->goods  = $goods;
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		$object = $this->check_object_by_id("order",$id);
		$goods = ORM::factory("good")->find_all()->as_array();
		$goods = array_chunk($goods, ceil(count($goods)/3));
		$view = new View("orders/edit");
		$view->object =  $object ;
		$view->goods  = $goods;
		$this->view->content = $view->render(false);
		$this->view->render(true);

	}
	public function update(){
		$object = (object)$this->input->post("object");
		$goods  = $object->goods;
		unset($object->goods);
		$item   = $object->id ? ORM::factory("order")->find($object->id) : new Order_Model();
		foreach ($object as $attr => $value) {
			$item->$attr = $value;
		}
		$item->delete_positions();
		$item->save();
		if(isset($goods["id"])){
			foreach($goods["id"] as $k=>$v){
				$position = new Position_Model();
				$position->order_id = $item->id;
				$position->good_id  = $k;
				$position->count    = $goods["count"][$k];
				$position->save();
			}
			$item->save();
		}

		url::redirect(url::base()."admin/orders?success");
	}


	public function delete($id=false){
		$user = $this->check_object_by_id("order",$id);
		$user->delete();
		url::redirect(request::referrer()."?success");
	}

	public function export(){
		die("To Do");
	}

	private function check_conditions(){
		$result = array();
		$search = $this->input->get("search",false);
		if($search){
			$this->search = $search;
			$result = mysql_escape_string(current(array_keys($search)))." LIKE '".mysql_escape_string(current(array_values($search)))."%'";
		}
		return $result;
	}



}
