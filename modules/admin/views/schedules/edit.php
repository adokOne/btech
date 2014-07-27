<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">

				<header role="heading">
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

						<form action="/admin/schedule/update" class="smart-form" method="post">
							<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
							<fieldset>
								
								<section>
									<label class="label">День недели</label>
									<label class="input">
										<input type="text" class="input-sm" value="<?php echo $admin_lang["days"][$object->day_num]?>" readonly="readonly">
									</label>
								</section>
								
								<section>
									<label class="label">Часы работы</label>
									<label class="select select-multiple">
										<select multiple="" class="custom-scroll" name="object[hours][]">
											<?php $start = "00:00";$end   = "23:30"; $tStart = strtotime($start);$tEnd  = strtotime($end);$tNow = $tStart; while($tNow <= $tEnd): ?>
											<option <?php echo in_array(date("H:i",$tNow), json_decode($object->hours)) ? 'selected' : ""?> value="<?php echo date("H:i",$tNow) ?>"><?php echo date("H:i",$tNow); $tNow = strtotime('+30 minutes',$tNow);?></option>
											<?php endwhile;?>
										</select> 
									</label>
									<div class="note">
										<strong>Подсказка:</strong> Зажмите клавишу CTRL для выбора нескольких позиций.
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