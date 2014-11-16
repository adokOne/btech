<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"

				-->
				<header role="heading">
					<h2>Список пользователей</h2>

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
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["users"]["admin_name"]?></th>
					            	<th tabindex="0" rowspan="1" colspan="1"><?php echo $admin_lang["users"]["admin_email"]?></th>
					            	<th tabindex="0" rowspan="1" colspan="1">Адрес</th>
					            	<th tabindex="0" rowspan="1" colspan="1">Оптовик?</th>
					            	<th tabindex="0" rowspan="1" colspan="1">Действия</th>
					            </tr>
					        </thead>

					        <tbody>
					        <?php foreach($users as $k=>$user):?>    
						        <tr role="row" class="<?php echo $k%2 > 0 ? "odd" : "even"?>">
						                <td><?php echo $user->name?></td>
						                <td><?php echo $user->email?></td>
						                <td><?php echo $user->address?></td>
						                <td><?php echo $admin_lang["answ_".(int)$user->is_wholesale()]?></td>
						                <td>
						                	<a class="btn btn-warning" href="/admin/user/edit/<?php echo $user->id?>"><?php echo $admin_lang["edit"]?></a>
						                	<a class="btn btn-danger" href="/admin/user/delete/<?php echo $user->id?>"><?php echo $admin_lang["delete"]?></a>
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