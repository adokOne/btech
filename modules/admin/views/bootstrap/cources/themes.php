
<article class="col-sm-12 col-md-12 col-lg-6 sortable-grid ui-sortable">

			<!-- Widget ID (each widget will need unique ID)-->
			
			<!-- end widget -->

		<div class="jarviswidget jarviswidget-color-blue jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" role="widget" style="">

				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-sitemap"></i> </span>
					<h2>План курсу</h2>

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span></header>

				<!-- widget div-->
				<div role="content">

					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->

					</div>
					<!-- end widget edit box -->

					<!-- widget content -->
					<div class="widget-body">

						<div class="tree smart-form">
							<ul role="tree">
								<?php foreach($item->where("parent_id",0)->themes as $item):?>
								<li class="parent_li" role="treeitem">
									<a href="/admin/themes/edit/<?php echo $item->id?>"><i class="fa fa-lg fa-minus-circle"></i><?php echo $item->name()?></a>
									<?php if($item->children->count()):?>
									<ul role="group">
										<?php foreach($item->children as $it):?>
										<li class="parent_li" role="treeitem" style="display: list-item;">
											<a href="/admin/themes/edit/<?php echo $it->id?>"><i class="fa fa-lg fa-minus-circle"></i> <?php echo $it->name()?></a>
											<?php if($it->children->count()):?>
												<ul role="group">
													<?php foreach($it->children as $i):?>
													<li>
														<a href="/admin/themes/edit/<?php echo $i->id?>"><i class="fa fa-lg fa-minus-circle"></i> <?php echo $i->name()?></a>
													</li>
													<?php endforeach;?>
												</ul>
											<?php endif;?>
										</li>
										<?php endforeach;?>
									</ul>
									<?php endif;?>
								</li>
								<?php endforeach;?>
							</ul>
							
						</div>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div></article>







