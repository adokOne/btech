<?php
/*
 *  @author Chernov Aleksandr <adok@ukr.net>
 *  @package BT_CRM
 *  *  
 */
class Orders_Admin extends Admin_Controller {
	private $search = array(); 

	public function index($page = 1){
		View::set_global("main_height",1400);
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
		View::set_global("main_height",1400);
		$goods = ORM::factory("good")->find_all()->as_array();
		$goods = array_chunk($goods, ceil(count($goods)/3));
		$view = new View("orders/edit");
		$view->object =  new Order_Model();
		$view->goods  = $goods;
		$this->view->content = $view->render(false);
		$this->view->render(true);
	}

	public function edit($id=false){
		View::set_global("main_height",1400);
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
		include Kohana::find_file('vendor', 'PHPExcel');
        $file_name = 'xls_'.date('Y_m_d(H:i:s)', time()).'.xls';
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', true);
        header('Content-type: application/vnd.ms-excel', true);
        header('Content-Disposition: attachment;filename="'.$file_name);
        header('Cache-Control: max-age=0');  
        header('Content-Transfer-Encoding: binary');

        $xls = new PHPExcel();
        $xls->getActiveSheet()->setTitle('Заказы');

        $rows = array();
        $rows[0] = array("ID","Заказ","Имя","Телефон","e-mail","Дата доставки","Время доставки","Тип оплаты","Комментарий","Комментарий меннеджера","Цена","Статус");

        $rowCount = 1;
        foreach (ORM::factory("order")->find_all() as $k=>$order) {
       	$xls->getActiveSheet()
          ->getRowDimension($k+1)
          ->setRowHeight(100);      
          $rows[] = array(
            $order->id,
            $order->goods_admin_exel(),
            $order->name,
            $order->phone,
            $order->email,
            $order->date,
            $order->time,
            Kohana::lang("admin.pay_types.".$order->pay_type),
            $order->comment,
            $order->manager_comment,
            $order->total_price,
            Kohana::lang("admin.order_statuses.".$order->status),
          );
          $rowCount++;
        }
        
        $xls->getActiveSheet()->fromArray($rows);
          for($i = 'A'; $i !== "K"; $i++) {
            $xls->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
          }
          $xls->setActiveSheetIndex(0);


        $objWriter = PHPExcel_IOFactory::createWriter($xls, 'Excel5');
        $objWriter->setPreCalculateFormulas(false);

        ob_clean();
        $objWriter->save('php://output');

        $excelOutput = ob_get_clean();
        $bom = pack("CCC", 0xef, 0xbb, 0xbf);
        if (0 == strncmp($excelOutput, $bom, 3)) {
                $excelOutput = substr($excelOutput, 3);
        }
        $xls->disconnectWorksheets();
        unset($xls);
        echo $excelOutput;
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
