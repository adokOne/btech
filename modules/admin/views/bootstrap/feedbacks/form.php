<section id="widget-grid"  data-auto-controller="TeachersController"data-id="<?php echo $item->id?>">

	<!-- row -->
	<div class="row">

		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 sortable-grid ui-sortable">
			<div class="jarviswidget jarviswidget-color-blueDark jarviswidget-sortable" >
				<header role="heading">
					
					
					<h2>Редагування/створення відгука</h2>
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
						<form action="/admin/feedbacks/save" class="smart-form" method="post" novalidate>
							<input type="hidden" name="item[id]" value="<?php echo $item->id?>"/>
							<input type="hidden" name="item[user_id]" value="<?php echo 0?>"/>

							<fieldset>
									<section class="">
										<label>Email</label>
										<label class="textarea"> 
											<input type="email" name="item[email]" required="required" value="<?php echo $item->email?>"/>
										</label>
									</section>
									<section >
										<label>Імя</label>
										<label class="textarea"> 
											<input type="text" name="item[name]" required="required" value="<?php echo $item->name?>"/>
										</label>
									</section>
									<section >
									<label class="label">Батьківський відгук</label>
									<label class="select">
										<select name="item[parent_id]">
											<option value="0" >Немає</option>
											<?php foreach($feedbacks as $i):?>
											
												<option <?php if($item->parent_id == $i->id) echo 'selected="selected"'?> value="<?php echo $i->id?>"><?php echo $i->name?></option>
											<?php endforeach;?>
										</select> <i></i> 
									</label>
									</section>
									<section>
										<label class="textarea"> 
											<textarea class="summernote" cols="42" name="item[text]" required="required" rows="5" class="custom-scroll"><?php echo $item->text?></textarea>
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