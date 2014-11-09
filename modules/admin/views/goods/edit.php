<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">

				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Редактирование товара</h2>				

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
				<div class="widget-toolbar" role="menu">
					<a  href="javascript:void(0);" class="active btn-warning btn button-icon jarviswidget-toggle-btn">RU</a>
					<a  href="javascript:void(0);" class="btn-warning btn button-icon jarviswidget-toggle-btn" style="margin-left:10px;">UK</a>
				</div>
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
						
						<form action="/admin/goods/update" id="checkout-form" class="smart-form" method="post" enctype="multipart/form-data"> 

							<fieldset>
								<div class="row">
									<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
									<section class="col col-6">
									    <label class="label">Название</label>
										<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "name_".$k;?>
											<label class="input lang lang_<?php echo $k;?>"> <i class="icon-append fa fa-tag"></i>
												<input required="required" type="text" name="object[name_<?php echo $k;?>]" placeholder="Название" value="<?php echo $object->$f?>">
											</label>
										<?php endforeach;?>
									</section>
									<section class="col col-6">
										<label class="label">Цена</label>
										<label class="input"> <i class="icon-append fa fa-tag"></i>
											<input required="required" type="text" name="object[price]" placeholder="Цена" value="<?php echo $object->price ? $object->price : ""?>">
										</label>
									</section>
<!-- 									<section class="col col-6">
										<label class="label">Цена со скидкой</label>
										<label class="input"> <i class="icon-append fa fa-tag"></i>
											<input  type="text" name="object[sale_price]" placeholder="Цена со скидкой" value="<?php echo $object->sale_price ? $object->sale_price : ""?>">
										</label>
									</section> -->
<!-- 									<section class="col col-6">
										<label class="label">Оптовая цена</label>
										<label class="input"> <i class="icon-append fa fa-tag"></i>
											<input required="required" type="text" name="object[wholesale_price]" placeholder="Оптовая цена" value="<?php echo $object->wholesale_price ? $object->wholesale_price : ""?>">
										</label>
									</section> -->
<!-- 									<section class="col col-6">
									    <label class="label">Артикул</label>
										<label class="input"> <i class="icon-append fa fa-tag"></i>
											<input required="required" type="text" name="object[artikul]" placeholder="Артикул" value="<?php echo $object->artikul?>">
										</label>
									</section> -->
									<section class="col col-6">
										<label class="label">Категория</label>
										<label class="select">
											<select name="object[category_id]">
												<?php foreach($categories as $cat):?>
												<option <?php echo $object->category_id == $cat->id ? "selected" : ""?> value="<?php echo $cat->id?>"><?php echo $cat->name();?></option>
												<?php endforeach;?>
											</select>
										</label>
									</section>
							</fieldset>
							<fieldset>
									<section class="col col-6">
										<label class="label">Анонс</label>
										<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "anons_".$k;?>
											<label class="textarea lang lang_<?php echo $k;?>"> 	
												<i class="icon-append fa fa-comment"></i>									
												<textarea  required="required" rows="3" name="object[anons_<?php echo $k;?>]" placeholder="Анонс"><?php echo $object->$f;?></textarea> 
											</label>
										<?php endforeach;?>
									</section>
									<section class="col col-6">
										<label class="label">Описание</label>
										<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "desc_".$k;?>
											<label class="textarea lang lang_<?php echo $k;?>"> 
												<i class="icon-append fa fa-comment"></i>										
												<textarea   required="required" rows="6" name="object[desc_<?php echo $k;?>]" placeholder="Описание"><?php echo $object->$f;?></textarea> 
											</label>
										<?php endforeach;?>
									</section>
								
							</fieldset>
							<fieldset>
								<section>
									<div class="inline-group">
										<label class="checkbox">
										<input type="checkbox" name="object[active]"  value="1" <?php echo $object->active ? 'checked="checked"' : "" ?> />
											<i></i>Товар активен?
										</label>
<!-- 										<label class="checkbox">
										<input type="checkbox" name="object[has_sale]"  value="1" <?php echo $object->has_sale ? 'checked="checked"' : "" ?> />
											<i></i>Есть скидка?
										</label> -->
										<label class="checkbox">
										<input type="checkbox" name="object[show_on_main]"  value="1" <?php echo $object->show_on_main ? 'checked="checked"' : "" ?> />
											<i></i>Отображать на главной?
										</label>
									</div>
								</section>
							</fieldset>

							<fieldset>
								<section class="col col-6" style="text-align: center;">
									<img style="-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;"src="<?php echo url::base().$object->main_image("thumb")?>">
									<label for="file" class="input input-file">
										<div class="button">
											<input type="file" name="pic[1]" onchange="$(this).parent().next().val( this.value)">
											Загрузить
										</div>
										<input type="text" placeholder="Картинка 1 " readonly="" value="">
									</label>
								</section>
								<section class="col col-6" style="text-align: center;">
									<img style="-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;"src="<?php echo url::base().$object->alt_image(2,"thumb")?>">
									<label for="file" class="input input-file">
										<div class="button">
											<input type="file" name="pic[2]" onchange="$(this).parent().next().val( this.value)">
											Загрузить
										</div>
										<input type="text" placeholder="Картинка 2 " readonly="" value="">
									</label>
								</section>
								<section class="col col-6" style="text-align: center;">
									<img style="-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;"src="<?php echo url::base().$object->alt_image(3,"thumb")?>">
									<label for="file" class="input input-file">
										<div class="button">
											<input type="file" name="pic[3]" onchange="$(this).parent().next().val( this.value)">
											Загрузить
										</div>
										<input type="text" placeholder="Картинка 3 " readonly="" value="">
									</label>
								</section>
								<section class="col col-6" style="text-align: center;">
									<img style="-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;"src="<?php echo url::base().$object->alt_image(4,"thumb")?>">
									<label for="file" class="input input-file">
										<div class="button">
											<input type="file" name="pic[4]" onchange="$(this).parent().next().val( this.value)">
											Загрузить
										</div>
										<input type="text" placeholder="Картинка 4 " readonly="" value="">
									</label>
								</section>
								<section class="col col-6" style="text-align: center;">
									<img style="-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;"src="<?php echo url::base().$object->alt_image(5,"thumb")?>">
									<label for="file" class="input input-file">
										<div class="button">
											<input type="file" name="pic[5]" onchange="$(this).parent().next().val( this.value)">
											Загрузить
										</div>
										<input type="text" placeholder="Картинка 5 " readonly="" value="">
									</label>
								</section>
								<section class="col col-6" style="text-align: center;">
									<img style="-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;"src="<?php echo url::base().$object->alt_image(6,"thumb")?>">
									<label for="file" class="input input-file">
										<div class="button">
											<input type="file" name="pic[6]" onchange="$(this).parent().next().val( this.value)">
											Загрузить
										</div>
										<input type="text" placeholder="Картинка 6 " readonly="" value="">
									</label>
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
<script type="text/javascript">
$(document).ready(function(){
	$(".button-icon").click(function(ev){
		ev.preventDefault();
		if($(this).hasClass("active")) return;
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
		var lang = $(this).text().toLowerCase();
		change_lang(lang);
	});
	change_lang(window.language)
})

function change_lang(lang){
	$(".lang").hide();
	$(".lang input,.lang textarea").removeAttr("required");
	$(".lang_"+lang).show();
	$(".lang_"+lang+" input,.lang_"+lang+" textarea").attr("required","required");
}
</script>