<?php include Kohana::find_file("views","header");?>
<div class="slider">
   <!-- begin edit for ZX Slideshow -->
   <script language="javascript" type="text/javascript">
      jQuery(window).load(function() {
              jQuery('#slider').nivoSlider({
               effect: 'fold',
               animSpeed: 500,
                 pauseTime: 4000,
               directionNav: true,
               directionNavHide: false,
                 controlNav: false,
               pauseOnHover: true,
               captionOpacity: 0.8        });
          });
      
   </script>
   <div class="slider-wrapper theme-default">
      <div id="slider" class="nivoSlider">
         <?php foreach(Kohana::config("slider") as $k=>$conf):?>
            <a href="<?php echo url::base().$conf["url"]?>"><img src="/img/front/slider/<?php echo $k+1?>.jpg" alt="" width="1919" height="382" /></a>         
         <?php endforeach;?>
      </div>
   </div>
   <!-- end edit for ZX Slideshow --> 
</div>
<div class="banner-content">
   <div class="extra">
      <div class="main-width">
         <div class="banners1">
           <?php foreach($categories as $i=>$category):?>
               <div class="item_<?php echo $i+1?>">
                  <a href="<?php echo $category->url()?>"><img src="<?php echo $category->main_image()?>" alt="<?php echo $category->name()?>" title="<?php echo $category->name()?> " width="269" height="269" /></a>
                  <a class="title" href="<?php echo $category->url()?>">
                     <span>
                        <h3><?php echo $category->name()?></h3>
                        <b><?php echo text::limit_chars($category->desc(),30);?></b>
                        <p></p>
                     </span>
                  </a>
               </div>
            <?php endforeach;?>
         </div>
      </div>
   </div>
</div>
<div class="middle-content">
   <div class="extra">
      <div class="main-width">
         <table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
            <tr>
               <td id="column-center" valign="top">
                  <div class="column-center-padding">
                     <div class="centerColumn" id="indexDefault">
                        <div id="indexDefaultMainContent"></div>
                        <div class="centerBoxWrapper" id="featuredProducts">
                           <h2 class="centerBoxHeading"><?php echo $lang["pipular_goods"]?></h2>
                           <?php foreach($items as $k=>$item):?>
                              <div class="centerBoxContentsFeatured centeredContent back <?php echo $k==0  || ($k+1)%5 == 0 ? "first" : "" ?>">
                                 <div class="product-col" >
                                    <div class="img">
                                       <a href="<?php echo $item->url()?>"><img src="<?php echo $item->main_image()?>" alt="<?php echo $item->name()?>" title="<?php echo $item->name()?>" width="200" height="200" /></a>
                                    </div>
                                    <div class="prod-info">
                                       <a class="name" href="<?php echo $item->url()?>"><?php echo text::limit_chars($item->anons(),30)?></a>
                                       <div class="price">
                                          <strong><span class="normalprice"><?php echo $item->price()?> грн.</span><!-- <span class="productSpecialPrice">$79.40</span> --></strong>
                                       </div>
                                       <div class="product-buttons">
                                          <div class="button"><a href="<?php echo url::base()?>create_order/<?php echo $item->id?>"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" ><?php echo $lang["zamovutu"]?></span></a></div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <?php endforeach;?>
                           <br class="clearBoth" />
                        </div>
                     </div>
                     <div class="clear"></div>
                  </div>
            </tr>
         </table>
      </div>
   </div>
</div>
<?php include Kohana::find_file("views","footer");?>