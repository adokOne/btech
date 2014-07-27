<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="">
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
						<table id="datatable_fixed_column" class="table table-striped table-bordered dataTable no-footer" width="100%" role="grid" aria-describedby="datatable_fixed_column_info" style="width: 100%;">
	
					        <thead>
					            <tr role="row">
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["pages"]["name"]?></th>
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["pages"]["desc"]?></th>
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["pages"]["status"]?></th>
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["goods"]["actions"]?></th>
					            </tr>
					        </thead>

					        <tbody>
					        <?php foreach($items as $k=>$item):?>    
						        <tr role="row" class="<?php echo $k%2 > 0 ? "odd" : "even"?>">
						                <td><?php echo $item->name()?></td>
						                <td><?php echo $item->desc()?></td>
						                <td><?php echo $admin_lang["answ_".$item->active]?></td>
						                <td>
						                	<a class="btn btn-warning" href="/admin/pages/edit/<?php echo $item->id?>"><?php echo $admin_lang["edit"]?></a>
						                	<a class="btn btn-danger" href="/admin/pages/delete/<?php echo $item->id?>"><?php echo $admin_lang["delete"]?></a>
						                </td>
						        </tr>
					    	<?php endforeach;?>
					    	</tbody>
					
						</table>
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
					<!-- end widget content -->

			</div>
				<!-- end widget div -->

		</div>