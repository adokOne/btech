<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">

				<header role="heading">
					<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
					<h2>Редактирование страницы</h2>				

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
						
						<form onsubmit="return postForm()"action="/admin/pages/update" id="checkout-form" class="smart-form" method="post" enctype="multipart/form-data" novalidate> 

							<fieldset>
								<div class="row">
									<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
									<input type="hidden" name="object[type]" value="page"/>
									<section class="col col-6">
										<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "name_".$k;?>
											<label class="input lang lang_<?php echo $k;?>"> <i class="icon-append fa fa-tag"></i>
												<input required="required" type="text" name="object[<?php echo $f;?>]" placeholder="Название" value="<?php echo $object->$f?>">
											</label>
										<?php endforeach;?>
									</section>
									<section class="col col-6">
										<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "desc_".$k;?>
											<label class="input lang lang_<?php echo $k;?>"> <i class="icon-append fa fa-tag"></i>
												<input required="required" type="text" name="object[<?php echo $f;?>]" placeholder="Мета описание" value="<?php echo $object->$f?>">
											</label>
										<?php endforeach;?>
									</section>
									<section class="col col-6">
										<label class="checkbox">
											<input type="checkbox" name="object[active]"  value="1" <?php echo $object->active ? 'checked="checked"' : "" ?> /><i></i>Опубликовано?
										</label>
									</section>
									<section class="col col-6">

										<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "anons_".$k;?>
											<label class="textarea lang lang_<?php echo $k;?>"> 	
												<i class="icon-append fa fa-comment"></i>									
												<textarea  required="required" rows="3" name="object[anons_<?php echo $k;?>]" placeholder="Анонс"><?php echo $object->$f;?></textarea> 
											</label>
										<?php endforeach;?>
									</section>
								</div>
							</fieldset>
							<fieldset>
								<section>
									<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "text_".$k; ?>
										
										<label class="textarea lang lang_<?php echo $k;?>"> 
											<i class="icon-append fa fa-comment"></i>
											<textarea class="hidden" id="text_<?php echo $k;?>"type="hidden" name="object[text_<?php echo $k;?>]"><?php echo $object->$f;?></textarea>								
											<div  class="summernote summernote_<?php echo $k;?>" ></div> 
										</label>
									<?php endforeach;?>
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
			<style type="text/css">
			.note-editor .btn-group button{
				padding: 6px 12px!important;
			}
			textarea.note-codeable,.hidden{
				display: none!important;
			}
			</style>
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
		$('.summernote').summernote({
				height : 300,
				focus : false,
				tabsize : 2,
		});
		$('.summernote_ru').code($('#text_ru').text());
		$('.summernote_uk').code($('#text_uk').text());

	})
	function postForm(){
		$('#text_ru').html($('.summernote_ru').code());
		$('#text_uk').html($('.summernote_uk').code());
	}
	function change_lang(lang){
		$(".lang").hide();
		$(".lang input,.lang textarea").removeAttr("required");
		$(".lang_"+lang).show();
		$(".lang_"+lang+" input,.lang_"+lang+" textarea").attr("required","required");
	}
</script>