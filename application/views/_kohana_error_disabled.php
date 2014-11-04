<?php
	$lang = Kohana::lang("global");
	$categories = ORM::factory("category")->where("parent_id",1)->find_all();
	$body_cls= "pagenotfound";
	$card = false;
	$active_currency = false;

?>
<?php include Kohana::find_file("views","header");?>
<div id="center_column" class="center_column col-xs-12 col-sm-12">
	
	<div class="pagenotfound">
	<div class="img-404">
    	<img src="/img/front/404.jpg" alt="Page not found">
    </div>
	<h1><?php echo $lang["page_nit_avail"]?></h1>
	<p><?php echo $lang["page_not_avail_desc"]?></p>

</div>

</div>
<?php include Kohana::find_file("views","footer");?>