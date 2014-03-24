<section id="widget-grid"  data-auto-controller="TeachersController"data-id="<?php echo $item->id?>">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" >
				<header role="heading">
					
					
					<h2>Редагування/створення курса</h2>
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
						<form action="/admin/cources/save" class="smart-form" method="post" novalidate>
							<input type="hidden" name="item[id]" value="<?php echo $item->id?>"/>
							<fieldset>
									<section >
										<label>Кількість занятть</label>
										<label class="input"> 
											<input type="text" name="item[lessons_count]" required="required" value="<?php echo $item->lessons_count?>"/>
										</label>
									</section>
									<section >
										<label>Ціна індивідуального курсу</label>
										<label class="input"> 
											<input type="text" name="item[price]" required="required" value="<?php echo $item->price;?>"/>
										</label>
									</section>
									<section >
										
										<div class="checkbox">
											<label>
											  <input type="checkbox" name="item[has_group]" value="1" class="checkbox style-0" <?php if($item->has_group) echo 'checked="checked"';?> >
											  <span>Цей має це курс групові заняття</span>
											</label>
										</div>
									</section>
									<section>
									<label class="label">Батьківський курс</label>
									<label class="select">
										<select name="item[parent_id]">
											<option value="0">Головний</option>
											<?php foreach($items as $i):?>
											
												<option <?php if($item->parent_id == $i->id) echo 'selected="selected"'?> value="<?php echo $i->id?>"><?php echo $i->course_full_name()?></option>
											<?php endforeach;?>
										</select> <i></i> 
									</label>
								</section>
							</fieldset>
							<fieldset>
								<?php foreach(array("ua","ru") as $lang):?>
									<section class="lang_<?php echo $lang?>">
										<label>Назва <?php echo strtoupper($lang)?></label>
										<label class="input"> 
											<input type="text" name="item[name_<?php echo $lang?>]" required="required" value="<?php $field = "name_".$lang; echo $item->$field?>"/>
										</label>
									</section>
									<section class="lang_<?php echo $lang?>">
										<label>Опис <?php echo strtoupper($lang)?></label>
										<label class="textarea"> 
											<textarea class="summernote" cols="42" name="item[desc_<?php echo $lang?>]" required="required" rows="5" class="custom-scroll"><?php $field = "desc_".$lang; echo $item->$field?></textarea>
										</label>
									</section>
									<section class="lang_<?php echo $lang?>">
										<label>Необхідна підготовка <?php echo strtoupper($lang)?></label>
										<label class="textarea"> 
											<textarea class="summernote" cols="42" name="item[preparation_<?php echo $lang?>]" required="required" rows="5" class="custom-scroll"><?php $field = "preparation_".$lang; echo $item->$field?></textarea>
										</label>
									</section>
								<?php endforeach;?>
							</fieldset> 
							<?php if($teachers->count()):?>
								<fieldset>
									<section>
										<label class="label">Викладачі данного курсу</label>
										<div class="row">
											<?php foreach(array_chunk($teachers->as_array(), ceil($teachers->count()/3)) as $teacher_group):?>
											<div class="col col-4">
												<?php foreach($teacher_group as $teacher):?>
												<label class="checkbox">
													<input type="checkbox" name="item[teachers][<?php echo $teacher->id?>]" <?php if(in_array($teacher->id, array_map(function($i){ return $i->id;}, $item->teachers->as_array()))) echo "checked"?>>
													<i></i><?php echo $teacher->name()?></label>
												<?php endforeach;?>
											</div>
											<?php endforeach;?>
										</div>
									</section>
								</fieldset>
							<?php endif;?>



							<footer>
								<!-- <button type="submit" class="btn btn-primary" onclick="$('.smart-form').submit();">Зберігти</button> -->
								<input type="submit" class="btn btn-primary" value="Зберігти"/>
								<?php if($item->id):?>
									<button type="button" class="btn btn-warning" onclick="window.location.href='/admin/cources/themes/<?php echo $item->id?>';">
										Переглянути План
									</button>
								<?php endif;?>
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