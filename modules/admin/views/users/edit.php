<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">
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
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Редагування користувача</h2>				
					
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
						
						<form action="/admin/users/update" id="checkout-form" class="smart-form" method="post">

							<fieldset>

								<div class="row">
									<input type="hidden" name="object[id]" value="<?php echo $user->id?>"/>
									<section class="col col-4">
										<label class="input"> <i class="icon-prepend fa fa-user"></i>
											<input type="text" name="object[name]" placeholder="Ім'я" value="<?php echo $user->name?>">
										</label>
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
											<input type="email" name="object[email]" placeholder="E-mail" value="<?php echo $user->email?>">
										</label>
									</section>
									<section class="col col-4">
										<label class="input"> <i class="icon-prepend fa fa-lock"></i>
											<input type="text" name="object[password]" placeholder="Пароль">
										</label>
									</section>
								</div>
							</fieldset>


							<fieldset>
								<section>
									<label class="label">Доступи користувача</label>
									<div class="inline-group">
										<?php foreach($roles as $role):?>
											<label class="checkbox">
												<input type="checkbox" name="object[roles][<?php echo $role->id?>]"  <?php echo $user->has($role) ? 'checked' : ""?>>
												<i></i>
												(<?php echo $role->name?>) <?php echo $role->description?>
											</label>
										<?php endforeach;?>
									</div>
								</section>

							</fieldset>

							<footer>
								<button type="submit" class="btn btn-primary">
									Зберегти
								</button>
							</footer>
						</form>

					</div>
					<!-- end widget content -->
					
				</div>
				<!-- end widget div -->
				
			</div>