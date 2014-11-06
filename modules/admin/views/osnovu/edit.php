<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">

				<header role="heading">
				<div class="widget-toolbar" role="menu">
					<a  href="javascript:void(0);" class="btn-warning btn button-icon jarviswidget-toggle-btn">RU</a>
					<a  href="javascript:void(0);" class="active btn-warning btn button-icon jarviswidget-toggle-btn" style="margin-left:10px;">UK</a>
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

						<form action="/admin/osnovu/update" class="smart-form" method="post" enctype="multipart/form-data">
							<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
							<fieldset>
								
								<section class="col col-6">
									<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "name_".$k;?>
										<label class="input lang lang_<?php echo $k;?>"> <i class="icon-append fa fa-tag"></i>
											<input class="name" required="required" type="text" name="object[name_<?php echo $k;?>]" placeholder="Название" value="<?php echo $object->$f?>">
										</label>
									<?php endforeach;?>
								</section>
								<section class="col col-6">
										<label class="input"> <i class="icon-append fa fa-tag"></i>
											Цена
											<input required="required" type="text" name="object[price]" placeholder="Цена" value="<?php echo $object->price ? $object->price : ""?>">
										</label>
								</section>
							</fieldset>
							<fieldset>
								<section class="col col-6" style="text-align: center;">
									<img style="-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;"src="<?php echo url::base().$object->main_image()?>">
									<label for="file" class="input input-file">
										<div class="button">
											<input type="file" name="main_pic" onchange="$(this).parent().next().val( this.value)">
											Загрузить
										</div>
										<input type="text" placeholder="Картинка" readonly="" value="">
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
	change_lang(window.language);
})

function change_lang(lang){
	$(".lang").hide();
	$(".lang input,.lang textarea").removeAttr("required");
	$(".lang_"+lang).show();
	$(".lang_"+lang+" input,.lang_"+lang+" textarea").attr("required","required");
}


</script>