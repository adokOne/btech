<section id="widget-grid"  data-auto-controller="TeachersController"data-id="<?php echo $item->id?>">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" >
				<header role="heading">
					
					
					<h2>Редагування/створення купона</h2>
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
						<form action="/admin/cupons/save" class="smart-form" method="post">
							<input type="hidden" name="item[id]" value="<?php echo $item->id?>"/>

							<fieldset>
									<section class="">
										<label>Номер</label>
										<label class="textarea"> 
											<input type="text" name="item[number]" required="required" value="<?php echo $item->number?>"/>
										</label>
									</section>
									<section >
										<label>% Знижки</label>
										<label class="textarea"> 
											<input type="text" name="item[discount]" required="required" value="<?php echo $item->discount?>"/>
										</label>
									</section>
									<section >
									<label class="label">Організація</label>
									<label class="select">
										<select name="item[organization_id]">
											<?php foreach($organizations as $i):?>
											
												<option <?php if($item->organization_id == $i->id) echo 'selected="selected"'?> value="<?php echo $i->id?>"><?php echo $i->name?></option>
											<?php endforeach;?>
										</select> <i></i> 
									</label>
									</section>
							</fieldset>
							<footer>
								<!-- <button type="submit" class="btn btn-primary" onclick="$('.smart-form').submit();">Зберігти</button> -->
								<input type="submit" class="btn btn-primary" value="Зберігти"/>
								<button type="button" class="btn btn-default" onclick="window.history.back();">
									Назад
								</button>
							</footer>
						</form>
						<!-- <form class="dropzone" action="/admin/teachers/upload" class="smart-form" method="post"> -->
						</form>

					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

			</div>
		</article>
		<!-- WIDGET END -->

	</div>

	<!-- end row -->

	<!-- end row -->

</section>