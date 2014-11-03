<?php include Kohana::find_file("views","header");?>
<div class="columns-container">
   <div id="top_column" class="center_column">
      <!-- Module HomeSlider -->
      <div id="homepage-slider">
         <ul id="homeslider" style="max-height:847px;">
            <?php foreach(Kohana::config("slider") as $k=>$conf):?>
               <li class="homeslider-container">
                  <a href="<?php echo url::base().$conf["link"]?>" title="<?php echo $conf["heading"]?>">
                     <img src="/img/front/slider/<?php echo $k + 1?>.jpg" width="1920" height="847" alt="<?php echo $conf["heading"]?>" />
                  </a>
                  <div class="homeslider-description container">
                     <h2><?php echo $conf["heading"]?></h2>
                     <h3><?php echo $conf["pre_heading"]?></h3>
                     <p><?php echo $conf["desc"]?></p>
                  </div>
               </li>
            <?php endforeach;?>
         </ul>
      </div>
      <!-- /Module HomeSlider -->
   </div>
   <div id="columns" class="container">
      <div class="row">
         <div id="center_column" class="center_column col-xs-12 col-sm-12">
            <div class="tab-content">
               <!-- Products list -->
               <ul id="blocknewproducts" class="product_list grid row blocknewproducts tab-pane">
                  <?php foreach($items as $k=>$item):?>
                     <?php $cls = "ajax_block_product col-xs-12 col-sm-4 col-md-3 ".lesya::line_cls($k); include Kohana::find_file("views","_big_item");?>
                  <?php  endforeach;?>
               </ul>
               <!-- Products list -->
            </div>
         </div>
         <!-- #center_column -->
      </div>
      <!-- .row -->
   </div>
   <!-- #columns -->  
</div>
<!-- .columns-container -->
<div class="block-fb-content">
   <div class="container">
      <div class="row">
         <div id="fb-root"></div>
         <div id="facebook_block" class="col-xs-4">
            <h3 ><?php echo $lang["facebook_folow"] ?></h3>
            <div class="facebook-fanbox">
               <div class="fb-like-box" 
                  data-href="<?php echo Kohana::config("core.fb_link")?>" 
                  data-height="200" 
                  data-colorscheme="light" 
                  data-show-faces="true" 
                  data-header="false" 
                  data-stream="false" 
                  data-show-border="false">
               </div>
            </div>
         </div>
         <!-- MODULE Block cmsinfo -->
         <div id="cmsinfo_block">
            <div class="col-xs-6">
               <h3>Custom Block 2</h3>
               <p><strong>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</strong></p>
               <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
               <p><a href="#"><?php echo $lang["read_more"]?></a></p>
            </div>
            <div class="col-xs-6">
               <h3>Custom Block 3</h3>
               <p><strong>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</strong></p>
               <p>Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.</p>
               <p><a href="#"><?php echo $lang["read_more"]?></a></p>
            </div>
         </div>
         <!-- /MODULE Block cmsinfo -->
      </div>
   </div>
</div>
<?php include Kohana::find_file("views","footer");?>