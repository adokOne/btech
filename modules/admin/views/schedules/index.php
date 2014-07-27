<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="">
				<header role="heading">
					<h2><?php echo $admin_lang["sch_list"]?></h2>

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
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["schedules"]["name"]?></th>
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["schedules"]["hours"]?></th>
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["users"]["actions"]?></th>
					            </tr>
					        </thead>

					        <tbody>
					        <?php foreach($items as $k=>$item):?>    
						        <tr role="row" class="<?php echo $k%2 > 0 ? "odd" : "even"?>">
						        	    <td><?php echo $admin_lang["days"][$item->day_num]?></td>
						                <td><?php echo implode("<br/>", json_decode($item->hours));?></td>
						                <td>
						                	<a class="btn btn-warning" href="/admin/schedule/edit/<?php echo $item->id?>"><?php echo $admin_lang["edit"]?></a>
						                </td>
						        </tr>
					    	<?php endforeach;?>
					    	</tbody>
					
						</table>
						<div class="dt-toolbar-footer">
						   <?php echo $pagination->render();?>
						</div>
					</div>

				</div>
					<!-- end widget content -->

			</div>
				<!-- end widget div -->

		</div>