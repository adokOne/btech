<section id="widget-grid" class="">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" >
				<header role="heading">
					
					
					<h2>Редагування/створення вакансії</h2>
					<label class="select">
										<select class="input-lg" id="lang_select">
											<option value="ua">UA</option>
											<option value="ru">RU</option>
										</select> 
									</label>
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
						<form action="/admin/jobs/save" class="smart-form" method="post">
							<input type="hidden" name="job[id]" value="<?php echo $job->id?>"/>

							<fieldset>
								<?php foreach(array("ua","ru") as $lang):?>
									<section class="lang_<?php echo $lang?>">
										<label>Назва <?php echo strtoupper($lang)?></label>
										<label class="input"> 
											<input type="text" name="job[name_<?php echo $lang?>]" required="required" value="<?php $field = "name_".$lang; echo $job->$field?>"/>
										</label>
									</section>
									<section class="lang_<?php echo $lang?>">
										<label>Опис <?php echo strtoupper($lang)?></label>
										<label class="textarea"> 
											<textarea cols="42" name="job[desc_<?php echo $lang?>]" required="required" rows="5" class="custom-scroll"><?php $field = "desc_".$lang; echo $job->$field?></textarea>
										</label>
									</section>
								<?php endforeach;?>
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