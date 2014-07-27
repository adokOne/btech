<div class="jarviswidget jarviswidget-sortable" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-custombutton="false" role="widget" style="">

				<header role="heading">
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

						<form action="/admin/lables/update" class="smart-form" method="post">
							<input type="hidden" name="object[id]" value="<?php echo $object->id?>"/>
							<fieldset>
								
								<section class="col col-6">
									<?php foreach(Kohana::config('multi_lang.allowed_languages') as $k=>$v): $f = "name_".$k;?>
										<label class="input lang lang_<?php echo $k;?>"> <i class="icon-append fa fa-tag"></i>
											<input class="name" required="required" type="text" name="object[name_<?php echo $k;?>]" placeholder="Название" value="<?php echo $object->$f?>">
										</label>
									<?php endforeach;?>
								</section>
							</fieldset>
							<fieldset>
								<section  class="col col-2">
									<label class="label">Цвет лейбла</label>
									<div class="colorwheel"></div>
									<label class="input">
											<input class="sel"  type="text" name="object[bg_color]" placeholder="#000000" value="<?php echo $object->bg_color?>">
									</label>
								</section>
								<section  class="col col-2">
									<label class="label">Цвет текста</label>
									<div class="colorwheel"></div>
									<label class="input">
											<input class="sel"  type="text" name="object[color]" placeholder="#ffffff" value="<?php echo $object->color?>">
									</label>
								</section>
								<section  class="col col-2">
									<label class="label">Предпросмотр</label>
									<?php echo html::label($object->name(),$object->bg_color, $object->color,200)?>
								</section>
							</fieldset>
							<fieldset>
								
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
	cycle_example();
	$(".name").keyup(function(){
		$(".lbl .text_div").text($(this).val())
	})
})

function change_lang(lang){
	$(".lang").hide();
	$(".lang input,.lang textarea").removeAttr("required");
	$(".lang_"+lang).show();
	$(".lang_"+lang+" input,.lang_"+lang+" textarea").attr("required","required");
}

	function cycle_example(){
	  var position = 0,
	      letters = [],
	      colorwheel;


	  function setup_the_letters(el){
	  	//console.log(el);
	    var cycle = $(".cycle"),
	        l = cycle.text().split("");

	    cycle.html("");

	    for (var i=0; i < l.length; i++) {
	      var letter = $("<span>"+l[i]+"</span>");
	      cycle.append(letter);
	      letters.push(letter);
	    };
	  }

	  function update(color){
	  	$(".lbl").css("background-color", color.hex);
	  }
	  function update_front(color){
	  	$(".lbl").css("color", color.hex);
	  }
	  colorwheel   = Raphael.colorwheel($(".colorwheel")[0],150);
	  colorwheel_1 = Raphael.colorwheel($(".colorwheel")[1],150);
	  colorwheel.input($(".sel")[0]);
	  colorwheel_1.input($(".sel")[1]);

	  //setup_the_letters();

	  colorwheel.onchange(update).color($(".sel:eq(0)").val());
	  colorwheel_1.onchange(update_front).color($(".sel:eq(1)").val())
	}


</script>