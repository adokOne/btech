<style type="text/css">
	th{
		text-align: center!important;
	}
</style>
<div data-auto-controller="AdminOrders" class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="">
				<header role="heading">
					<h2><?php echo $admin_lang["good_list"]?></h2>

					<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
			    </header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">
						<div class="form-inline">
							<div class="dt-wrapper">
								<table id="datatable_fixed_column" class="table table-striped table-bordered smart-form dataTable table table-striped table-bordered dataTable no-footer" width="100%" role="grid" aria-describedby="datatable_fixed_column_info" style="width: 100%;">
			
							        <thead>
							            <tr role="row">
							            	<th width="120"  class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["name"]?></th>
							            	<th width="120"  class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["phone"]?></th>
							            	<th width="250"  class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["order"]?></th>
							            	<!-- <th class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["pay_type"]?></th> -->
							            	<!-- <th class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["total_price"]?></th> -->
							            	<th class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["status"]?></th>
							            	<th class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["address"]?></th>
							            	<th width="60" class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["email"]?></th>
							            	<th class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["comment"]?></th>
							            	<th class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["orders"]["manager_com"]?></th>
							            	<th width="30" class="sorting" tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["goods"]["actions"]?></th>
							            </tr>
							            <tr class="second" role="row">
							            	<td rowspan="1" colspan="1">
												<label class="input">
													<input type="text" name="search[name]" value="<?php echo isset($search["name"]) ? $search["name"] : "" ?>" class="search_init">
												</label>
											</td>
											<td rowspan="1" colspan="1">
												<label class="input">
													<input type="text" name="search[phone]" value="<?php echo isset($search["phone"]) ? $search["phone"] : "" ?>" class="search_init">
												</label>
											</td>
											<td rowspan="1" colspan="1"></td>
											<!-- <td rowspan="1" colspan="1">
												<label class="select" style="width:80px">
												   <select size="1" name="search[pay_type]" >
												   	    <option selected disabled>Тип оплаты</option>
													   	<?php foreach(Kohana::lang("admin.pay_types") as $k=>$v):?>
															<option  <?php echo isset($search["pay_type"]) &&  $search["pay_type"] == $k ? 'selected'  : "" ?>  value="<?php echo $k;?>"><?php echo $v;?></option>
														<?php endforeach;?>
												   </select>
												   <i></i>
												</label>
											</td>  -->
											
											<td rowspan="1" colspan="1">
												<label class="select" >
												   <select size="1" name="search[status]" >
												   	   <option selected disabled>Статус</option>
													   	<?php foreach(Kohana::lang("admin.order_statuses") as $k=>$v):?>
															<option <?php echo isset($search["status"]) &&  $search["status"] == $k ? 'selected'  : "" ?> value="<?php echo $k;?>"><?php echo $v;?></option>
														<?php endforeach;?>
												   </select>
												   <i></i>
												</label>
											</td>
											<td rowspan="1" colspan="1">
												<label class="input">
													<input type="text" name="search[address]" value="<?php echo isset($search["address"]) ? $search["address"] : "" ?>" class="search_init">
												</label>
											</td>
											<td rowspan="1" colspan="1">
												<label class="input">
													<input type="text" name="search[email]" value="<?php echo isset($search["email"]) ? $search["email"] : "" ?>" class="search_init">
												</label>
											</td>
											<td rowspan="1" colspan="1"></td>
											<td rowspan="1" colspan="1"></td>
											<td rowspan="1" colspan="1"></td>
											<td rowspan="1" colspan="1"></td>
										</tr>
							        </thead>

							        <tbody>
							        <?php foreach($items as $k=>$item):?>    
								        <tr role="row" class="<?php echo $k%2 > 0 ? "odd" : "even"?>">
								                <td><?php echo $item->name?></td>
								                <td><?php echo $item->phone?></td>
								                <td style="font-size: 10px;"><?php echo $item->goods_admin_html()?></td>
								                <!-- <td><?php echo $admin_lang["pay_types"][$item->pay_type]?></td> -->
								                <!--  <td><?php echo $item->total_price?></td> -->
								                <td><b style="color:<?php echo $admin_lang["order_statuses_color"][$item->status]?>"><?php echo $admin_lang["order_statuses"][$item->status]?></b></td>
								                <td><?php echo $item->address?></td>
								                <td><?php echo $item->email?></td>
								                <td><?php echo $item->comment?></td>
								                <td><?php echo $item->manager_comment?></td>
								                <td>
								                	<a style="padding: 6px 12px;" class="btn btn-primary" href="/admin/orders/edit/<?php echo $item->id?>">O</a>
								                	<a style="padding: 6px 12px;" class="btn btn-danger" href="/admin/orders/delete/<?php echo $item->id?>">X</a>
								                </td>
								        </tr>
							    	<?php endforeach;?>
							    	</tbody>
							
								</table>
							</div>
							<div class="dt-row dt-bottom-row">
								<div class="row">
									<div class="col-sm-6"></div>
									<div class="col-sm-6 text-right">
										<div class="dataTables_paginate paging_bootstrap">
							  		 		<?php echo $pagination->render();?>
							  		 	</div>
							  		 </div>
							  	</div>
							</div>
						</div>
					</div>

				</div>
					<!-- end widget content -->

			</div>
				<!-- end widget div -->

		</div>