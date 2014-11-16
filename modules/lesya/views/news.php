<?php include Kohana::find_file("views","header");?>
<div id="columns" class="container">
   <!-- Breadcrumb -->
   <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo url::base()?>" title="Return to Home">
      <i class="fa fa-home"></i>
      </a>
      <span class="navigation-pipe">&gt;</span>
      <span class="navigation_page"><?php echo $lang["news"]?></span>
   </div>
   <!-- /Breadcrumb -->
   
   <div class="row">
      <div id="center_column" class="center_column col-xs-12 col-sm-12">
         <div class="rte">
            <?php foreach($news as $page):?>
               <div class="block">
                  <h4><a href="<?php echo url::base()?>news/<?php echo $page->seo_name?>"><?php echo $page->name();?></a></h4>
                  <div><?php echo $page->anons();?></div>
                  <div class="clearfix"> </div>
               </div>
            <?php endforeach;?>
         </div>
         <br>
         
      </div>
      <!-- #center_column -->
   </div>

   <!-- .row -->
</div>
<?php include Kohana::find_file("views","footer");?>