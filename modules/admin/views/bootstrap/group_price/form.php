<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" >
				<header role="heading">
					
					
					<h2>Редагування/створення ціни на курс</h2>
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
						<form action="/admin/prices/save" class="smart-form" method="post">
							<input type="hidden" name="item[id]" value="<?php echo $item->id?>"/>

							<fieldset>
								<section>
									<label class="select">
										<select name="item[course_id]">
											<?php foreach($courses as $i):?>
												<option <?php if($item->course_id == $i->id) echo 'selected="selected"'?> value="<?php echo $i->id?>"><?php echo $i->course_full_name()?></option>
											<?php endforeach;?>
										</select> <i></i> 
									</label>
								</section>
									<section >
										<label>Ціна 2 людини</label>
										<label class="input"> 
											<input type="text" name="item[price_2]" required="required" value="<?php echo $item->price_2?>"/>
										</label>
									</section>
									<section >
										<label>Ціна 3-4 людини</label>
										<label class="input"> 
											<input type="text" name="item[price_4]" required="required" value="<?php echo $item->price_4?>"/>
										</label>
									</section>
									<section >
										<label>Ціна 5-6 людини</label>
										<label class="input"> 
											<input type="text" name="item[price_6]" required="required" value="<?php echo $item->price_6?>"/>
										</label>
									</section>
									<section >
										<label>Ціна 7-8 людини</label>
										<label class="input"> 
											<input type="text" name="item[price_8]" required="required" value="<?php echo $item->price_8?>"/>
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