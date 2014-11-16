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
					<h2>Редактирование филтра</h2>				

				<span class="jarviswidget-loader"><i class="fa fa-refresh fa-spin"></i></span>
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
						
						<form action="/admin/filters/update?type=<?php echo $type?>" id="checkout-form" class="smart-form" method="post">

							<fieldset>

								<div class="row">
									<input type="hidden" name="object[id]" value="<?php echo $item->id?>"/>
									<section class="col col-6">
									    <label class="label">Название</label>
										<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "name_".$k;?>
											<label class="input lang lang_<?php echo $k;?>"> <i class="icon-append fa fa-tag"></i>
												<input required="required" type="text" name="object[name_<?php echo $k;?>]" placeholder="Название" value="<?php echo $item->$f?>">
											</label>
										<?php endforeach;?>
									</section>
								</div>
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