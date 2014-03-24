<section id="widget-grid" class="">
	<div class="row">
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">

			<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" id="wid-id-3" data-widget-editbutton="false" role="widget">

				<header role="heading">
				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
				</header>
				<div role="content">
					<div class="jarviswidget-editbox"></div>
				<div class="widget-body no-padding">
					<div class="widget-body-toolbar">			
						<div class="row">
<!-- 							<div class="col-xs-9 col-sm-5 col-md-5 col-lg-5">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-search"></i></span>
									<input class="form-control" id="prepend" style="height: 35px;"placeholder="Filter" type="text">
								</div>
							</div> -->
							<div class="col-xs-3 col-sm-7 col-md-7 col-lg-7 text-right">
								<a class="btn btn-success" href="/admin/cources/new_item">
									<i class="fa fa-plus"></i>
									Створити
								</a>	
								<a class="btn btn-warning" href="/admin/cources/tree">
									
									Показати дерево
								</a>								
							</div>
						</div>
							
								

					</div>
					<div id="datatable_tabletools_wrapper" class="dataTables_wrapper form-inline" role="grid">
						<div class="dt-wrapper">
							<table id="datatable_tabletools" class="table table-striped table-hover dataTable" aria-describedby="datatable_tabletools_info">
								<thead>
									<tr role="row">
										<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_tabletools" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" >ID
										</th>
										<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_tabletools" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" >
											Викладачі
										</th>
										<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_tabletools" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" >Фото
										</th>
										<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="datatable_tabletools" rowspan="1" colspan="1" aria-sort="ascending" aria-label="" >Дії
										</th>
									</tr>
								</thead>
							
								<tbody role="alert" aria-live="polite" aria-relevant="all">
									<?php foreach($items as $item):?>
										<tr class="odd">
											<td class=" sorting_1"><?php echo $item->id?></td>
											<td class=" "><?php echo $item->name()?></td>
											<td action="/admin/cources/upload/<?php echo $item->id ?>" id="myDrop" class="dropzone"><?php echo $item->foto()?></td>
											<td class=" sorting_1">
												<a style="float: right;" href="/admin/cources/edit/<?php echo $item->id?>" class="btn btn-primary">
													<i class="fa fa-gear"></i> 
													Редагувати
												</a>
												<a style="float: right;"  href="/admin/cources/delete/<?php echo $item->id?>" class="btn btn-danger">
													<i class="glyphicon glyphicon-remove"></i> 
													Видалити
												</a>
											</td>
										</tr>
									<?php endforeach;?>
								</tbody>
							</table>
						</div>
						<div class="dt-row dt-bottom-row">
							<div class="row">
								<div class="col-sm-6">
									<div class="dataTables_info" id="datatable_tabletools_info">
										
									</div>
								</div>
								<div class="col-sm-6 text-right">
									<div class="dataTables_paginate paging_bootstrap">
										<?php echo $paginate->render();?>
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

		</article>
		<!-- WIDGET END -->
	</div>
</section>
<script type="text/javascript">

	Dropzone.options.myDrop = {
	  init: function() {
	    this.on("complete", function() {
	       window.location.reload()
	    });
	  }
	};
</script>