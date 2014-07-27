<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">
				<header role="heading">
				</header>
				<!-- widget div-->
				<div role="content">
					<!-- widget content -->
					<div class="widget-body no-padding">

						<form action="/admin/orders/update" method="POST" class="smart-form">
							<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
							<fieldset>
								<section>
									<div class="row">
										<?php foreach($goods as $group): ?>
											<div class="col col-4">
												<?php foreach($group as $good):?>
												<div class="row">
													<div class="col col-10" style="padding-bottom: 10px;">
														<label class="checkbox">
															<input name="object[goods][id][<?php echo $good->id?>]" type="checkbox" name="checkbox" <?php echo array_key_exists($good->id, $object->goods()) ? 'checked="checked"' : ""?>>
															<i></i><?php echo $good->name(); ?>
														</label>
													</div>
													<div class="col col-2">
														<label class="select">
															<select name="object[goods][count][<?php echo $good->id?>]" class="input-sm">
																<?php for($i=1;$i<7;$i++):?>
																	<option <?php echo array_key_exists($good->id, $object->goods()) && $object->goods[$good->id] == $i ? 'selected="selected"' : ""?> value="<?php echo $i?>"><?php echo $i?></option>
																<?php endfor;?>
															</select><i></i> 
														</label>
													</div>
												</div>
												<?php endforeach;?>
											</div>
										<?php endforeach;?>
									</div>
								</section>
							</fieldset>
							<fieldset>
								<section>
									<label class="label"><b>Имя<small class="red">*</small></b></label>
									<label class="input">
										<input value="<?php echo $object->name?>" name="object[name]" type="text" class="input-sm" required="required">
									</label>
								</section>
								<section>
									<label class="label"><b>Телефон<small class="red">*</small></label>
									<label class="input">
										<input value="<?php echo $object->phone?>" name="object[phone]" type="text" class="input-sm" required="required">
									</label>
								</section>
								<section>
									<label class="label">Адрес</label>
									<label class="input">
										<input value="<?php echo $object->address?>" name="object[address]" type="text" class="input-sm">
									</label>
								</section>
								<section>
									<label class="label">E-mail</label>
									<label class="input">
										<input value="<?php echo $object->email?>" name="object[email]" type="text" class="input-sm">
									</label>
								</section>
								<section>
									<label class="label">Дата доставки</label>
									<label class="input">
										<input value="<?php echo $object->date?>" name="object[date]" type="text" class="input-sm">
									</label>
								</section>
								<section>
									<label class="label">Время доставки</label>
									<label class="input">
										<input value="<?php echo $object->time?>" name="object[time]" type="text" class="input-sm">
									</label>
								</section>
								<section>
									<label class="label">Полная стоимость</label>
									<label class="input">
										<input value="<?php echo $object->total_price?>" name="object[total_price]" type="text" class="input-sm">
									</label>
								</section>
								<section>
									<label class="label">Способ оплаты</label>
									<label class="select">
										<select name="object[pay_type]" class="input-sm">
											<?php foreach(Kohana::lang("admin.pay_types") as $k=>$v):?>
												<option value="<?php echo $k;?>"><?php echo $v;?></option>
											<?php endforeach;?>
										</select> <i></i> </label>
								</section>
								<section>
									<label class="label">Статус</label>
									<label class="select">
										<select name="object[status]" class="input-sm">
											<?php foreach(Kohana::lang("admin.order_statuses") as $k=>$v):?>
												<option value="<?php echo $k;?>"><?php echo $v;?></option>
											<?php endforeach;?>
										</select> <i></i> </label>
								</section>
								<section>
									<label class="label">Комментарий</label>
									<label class="textarea textarea-resizable"> 										
										<textarea name="object[comment]" rows="3" class="custom-scroll"><?php echo $object->comment?></textarea> 
									</label>
								</section>
								<section>
									<label class="label">Комментарий менеджера</label>
									<label class="textarea textarea-resizable"> 										
										<textarea name="object[manager_comment]" rows="3" class="custom-scroll"><?php echo $object->manager_comment?></textarea> 
									</label>
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