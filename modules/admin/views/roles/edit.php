<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">

				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Редактирование роли</h2>				
					
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
						
						<form action="/admin/roles/update" id="checkout-form" class="smart-form" method="post">
							<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
							<fieldset>

								<div class="row">
									<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
									<section class="col col-4">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="object[name]" placeholder="Название" value="<?php echo $object->name?>">
										</label>
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input type="text" name="object[description]" placeholder="Описание" value="<?php echo $object->description?>">
										</label>
									</section>
								</div>
							</fieldset>


							<fieldset>
								<section>
									<label class="label">Доступные модули для роли</label>
									<div class="inline-group">
										<?php foreach($modules as $module):?>
											<label class="checkbox">
												<input type="checkbox" name="object[modules][<?php echo $module->id?>]"  <?php echo $object->has($module) ? 'checked' : ""?>>
												<i></i>
												<?php echo $module->name?>
											</label>
										<?php endforeach;?>
									</div>
								</section>

							</fieldset>

							<footer>
								<button type="submit" class="btn btn-primary">
									Сохранить
								</button>
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