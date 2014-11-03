<?php include Kohana::find_file("views","header");?>
<div id="columns" class="container">
   <!-- Breadcrumb -->
   <div class="breadcrumb clearfix">
      <a class="home" href="<?php echo url::base()?>" title="Return to Home">
      <i class="fa fa-home"></i>
      </a>
      <span class="navigation-pipe">&gt;</span>
      <span class="navigation_page"><?php echo $lang["contacts"]?></span>
   </div>
   <!-- /Breadcrumb -->
   <div class="row">
      <div id="center_column" class="center_column col-xs-12 col-sm-12">
         <div class="rte">
            <div class="block">
               
               <div class="clearfix"> </div>
            </div>
         </div>
         <br>
      </div>
      <!-- #center_column -->
   </div>
   <!-- .row -->
</div>
<?php include Kohana::find_file("views","footer");?>