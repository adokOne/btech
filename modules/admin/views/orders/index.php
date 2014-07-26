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
				<header role="heading"><div class="jarviswidget-ctrls" role="menu">   <a href="javascript:void(0);" class="button-icon jarviswidget-toggle-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Collapse"><i class="fa fa-minus "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-fullscreen-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Fullscreen"><i class="fa fa-expand "></i></a> <a href="javascript:void(0);" class="button-icon jarviswidget-delete-btn" rel="tooltip" title="" data-placement="bottom" data-original-title="Delete"><i class="fa fa-times"></i></a></div><div class="widget-toolbar" role="menu"><a data-toggle="dropdown" class="dropdown-toggle color-box selector" href="javascript:void(0);"></a><ul class="dropdown-menu arrow-box-up-right color-select pull-right"><li><span class="bg-color-green" data-widget-setstyle="jarviswidget-color-green" rel="tooltip" data-placement="left" data-original-title="Green Grass"></span></li><li><span class="bg-color-greenDark" data-widget-setstyle="jarviswidget-color-greenDark" rel="tooltip" data-placement="top" data-original-title="Dark Green"></span></li><li><span class="bg-color-greenLight" data-widget-setstyle="jarviswidget-color-greenLight" rel="tooltip" data-placement="top" data-original-title="Light Green"></span></li><li><span class="bg-color-purple" data-widget-setstyle="jarviswidget-color-purple" rel="tooltip" data-placement="top" data-original-title="Purple"></span></li><li><span class="bg-color-magenta" data-widget-setstyle="jarviswidget-color-magenta" rel="tooltip" data-placement="top" data-original-title="Magenta"></span></li><li><span class="bg-color-pink" data-widget-setstyle="jarviswidget-color-pink" rel="tooltip" data-placement="right" data-original-title="Pink"></span></li><li><span class="bg-color-pinkDark" data-widget-setstyle="jarviswidget-color-pinkDark" rel="tooltip" data-placement="left" data-original-title="Fade Pink"></span></li><li><span class="bg-color-blueLight" data-widget-setstyle="jarviswidget-color-blueLight" rel="tooltip" data-placement="top" data-original-title="Light Blue"></span></li><li><span class="bg-color-teal" data-widget-setstyle="jarviswidget-color-teal" rel="tooltip" data-placement="top" data-original-title="Teal"></span></li><li><span class="bg-color-blue" data-widget-setstyle="jarviswidget-color-blue" rel="tooltip" data-placement="top" data-original-title="Ocean Blue"></span></li><li><span class="bg-color-blueDark" data-widget-setstyle="jarviswidget-color-blueDark" rel="tooltip" data-placement="top" data-original-title="Night Sky"></span></li><li><span class="bg-color-darken" data-widget-setstyle="jarviswidget-color-darken" rel="tooltip" data-placement="right" data-original-title="Night"></span></li><li><span class="bg-color-yellow" data-widget-setstyle="jarviswidget-color-yellow" rel="tooltip" data-placement="left" data-original-title="Day Light"></span></li><li><span class="bg-color-orange" data-widget-setstyle="jarviswidget-color-orange" rel="tooltip" data-placement="bottom" data-original-title="Orange"></span></li><li><span class="bg-color-orangeDark" data-widget-setstyle="jarviswidget-color-orangeDark" rel="tooltip" data-placement="bottom" data-original-title="Dark Orange"></span></li><li><span class="bg-color-red" data-widget-setstyle="jarviswidget-color-red" rel="tooltip" data-placement="bottom" data-original-title="Red Rose"></span></li><li><span class="bg-color-redLight" data-widget-setstyle="jarviswidget-color-redLight" rel="tooltip" data-placement="bottom" data-original-title="Light Red"></span></li><li><span class="bg-color-white" data-widget-setstyle="jarviswidget-color-white" rel="tooltip" data-placement="right" data-original-title="Purity"></span></li><li><a href="javascript:void(0);" class="jarviswidget-remove-colors" data-widget-setstyle="" rel="tooltip" data-placement="bottom" data-original-title="Reset widget color to default">Remove</a></li></ul></div>
					<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					<h2><?php echo $admin_lang["admin_list"]?></h2>

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body no-padding">

						<div id="datatable_fixed_column_wrapper" class="dataTables_wrapper form-inline no-footer"><div class="dt-toolbar"><div class="col-xs-12 col-sm-6 hidden-xs"><div id="datatable_fixed_column_filter" class="dataTables_filter"><label><span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span> <input type="search" class="form-control" aria-controls="datatable_fixed_column"></label></div></div><div class="col-sm-6 col-xs-12 hidden-xs"><div class="toolbar"><div class="text-right"></div></div></div></div><table id="datatable_fixed_column" class="table table-striped table-bordered dataTable no-footer" width="100%" role="grid" aria-describedby="datatable_fixed_column_info" style="width: 100%;">
	
					        <thead>
								<tr role="row">
									<th class="hasinput" style="width:17%" rowspan="1" colspan="1">
										<input type="text" class="form-control" placeholder="Filter Name">
									</th>
									<th class="hasinput" style="width:18%" rowspan="1" colspan="1">
										<div class="input-group">
											<input class="form-control" placeholder="Filter Position" type="text">
											<span class="input-group-addon">
												<span class="onoffswitch">
													<input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="st3">
													<label class="onoffswitch-label" for="st3"> 
														<span class="onoffswitch-inner" data-swchon-text="YES" data-swchoff-text="NO"></span> 
														<span class="onoffswitch-switch"></span> 
													</label> 
												</span>
											</span>
										</div>
									</th>
									<th class="hasinput" style="width:16%" rowspan="1" colspan="1">
										<input type="text" class="form-control" placeholder="Filter Office">
									</th><th class="hasinput" style="width:17%" rowspan="1" colspan="1">
										<input type="text" class="form-control" placeholder="Filter Age">
									</th><th class="hasinput icon-addon" rowspan="1" colspan="1">
										<input id="dateselect_filter" type="text" placeholder="Filter Date" class="form-control datepicker hasDatepicker" data-dateformat="yy/mm/dd">
										<label for="dateselect_filter" class="glyphicon glyphicon-calendar no-margin padding-top-15" rel="tooltip" title="" data-original-title="Filter Date"></label>
									</th><th class="hasinput" style="width:16%" rowspan="1" colspan="1">
										<input type="text" class="form-control" placeholder="Filter Salary">
									</th></tr>
					            <tr role="row">
					            	<th data-class="expand" class="sorting_asc" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column ascending" style="width: 187px;">Name</th>
					            	<th class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 200px;">Position</th>
					            	<th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 175px;">Office</th>
					            	<th data-hide="phone" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 187px;">Age</th>
					            	<th data-hide="phone,tablet" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 178px;">Start date</th>
					            	<th data-hide="phone,tablet" class="sorting" tabindex="0" aria-controls="datatable_fixed_column" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 176px;">Salary</th>
					            </tr>
					        </thead>

					        <tbody>
					        <?php foreach($users as $k=>$user):?>    
						        <tr role="row" class="<?php echo $k%2 > 0 ? "odd" : "even"?>">
						                <td class="sorting_1"><span class="responsiveExpander"></span>Airi Satou</td>
						                <td>Accountant</td>
						                <td>Tokyo</td>
						                <td>33</td>
						                <td>2008/11/28</td>
						                <td>$162,700</td>
						        </tr>
					    	<?php endforeach;?>
					    	</tbody>
					
						</table><div class="dt-toolbar-footer"><div class="col-sm-6 col-xs-12 hidden-xs"><div class="dataTables_info" id="datatable_fixed_column_info" role="status" aria-live="polite">Showing <span class="txt-color-darken">1</span> to <span class="txt-color-darken">10</span> of <span class="text-primary">57</span> entries</div></div><div class="col-xs-12 col-sm-6"><div class="dataTables_paginate paging_simple_numbers" id="datatable_fixed_column_paginate"><ul class="pagination pagination-sm"><li class="paginate_button previous disabled" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_previous"><a href="#">Previous</a></li><li class="paginate_button active" aria-controls="datatable_fixed_column" tabindex="0"><a href="#">1</a></li><li class="paginate_button " aria-controls="datatable_fixed_column" tabindex="0"><a href="#">2</a></li><li class="paginate_button " aria-controls="datatable_fixed_column" tabindex="0"><a href="#">3</a></li><li class="paginate_button " aria-controls="datatable_fixed_column" tabindex="0"><a href="#">4</a></li><li class="paginate_button " aria-controls="datatable_fixed_column" tabindex="0"><a href="#">5</a></li><li class="paginate_button " aria-controls="datatable_fixed_column" tabindex="0"><a href="#">6</a></li><li class="paginate_button next" aria-controls="datatable_fixed_column" tabindex="0" id="datatable_fixed_column_next"><a href="#">Next</a></li></ul></div></div></div></div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>