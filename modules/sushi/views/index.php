<?php include Kohana::find_file("views","header");?>

<section>
   <div id="container">
   <p id="back-top"> <a href="#top"><span></span></a> </p>
   <div class="container">
      <?php include Kohana::find_file("views","notify");?>
      <div class="row">
         <div class="span12">
            <div class="row">
               <div class="span9  " id="content">
                  <script>
                     jQuery(function(){
                       jQuery('#camera_wrap_0').camera({
                         fx: 'stampede',
                         navigation: false,
                         playPause: false,
                         thumbnails: false,
                         navigationHover: false,
                         barPosition: 'top',
                         loader: false,
                         time: 3000,
                         transPeriod:800,
                         alignment: 'center',
                         autoAdvance: true,
                         mobileAutoAdvance: true,
                         barDirection: 'leftToRight', 
                         barPosition: 'bottom',
                         easing: 'easeInOutExpo',
                         fx: 'simpleFade',
                         height: '40.46%',
                         minHeight: '90px',
                         hover: true,
                         pagination: false,
                         loaderColor     : '#1f1f1f', 
                         loaderBgColor   : 'transparent',
                         loaderOpacity   : 1,
                         loaderPadding   : 0,
                         loaderStroke    : 3
                         });
                     });
                  </script>
                  <div class="fluid_container" >
                     <div>
                        <div id="camera_wrap_0">
			<div title="" data-thumb="/img/front/slide_3.jpg"   data-src="/img/front/slide_3.jpg"></div>
                           <div title="" data-thumb="/img/front/slide_1.jpg"   data-src="/img/front/slide_1.jpg"></div>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
                  <script type="text/javascript">
                     if ($('.container').width() > 480) {
                       (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest1=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest1){tallest1=$(this).height()}});if((maxHeight)&&tallest1>maxHeight)tallest1=maxHeight;return this.each(function(){$(this).height(tallest1)})}})(jQuery)
                     $(window).load(function(){
                       if($(".maxheight-feat1").length){
                       $(".maxheight-feat1").equalHeights()}
                     });
                     };
                  </script>
                  <div id="banner0" class="banner row">
                     <?php foreach($populars as $popular):?>
                     <div class="span3">
                        <a href="<?php echo url::base()."item/".$popular->id?>">
                           <div>
                              <img src="<?php echo url::base().$popular->main_image("popular")?>" alt="<?php echo $popular->name();?>" title="<?php echo $popular->name();?>" />
                              <div class="strok"></div>
                           </div>
                           <div class="s-desc maxheight-feat1">
                              <?php echo $popular->name();?>
                              <span class="icon-double-angle-right"><span>
                           </div>
                        </a>
                     </div>
                     <?php endforeach;?>
                  </div>
                  <script type="text/javascript">
                     if ($('.container').width() > 723) {
                       (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest){tallest=$(this).height()}});if((maxHeight)&&tallest>maxHeight)tallest=maxHeight;return this.each(function(){$(this).height(tallest)})}})(jQuery)
                     $(window).load(function(){
                       if($(".maxheight-feat").length){
                       $(".maxheight-feat").equalHeights()}
                     });
                     };
                  </script>
                  <div class="box featured">
                     <div class="box-heading"><?php echo Kohana::lang("global.featured")?></div>
                     <div class="box-content">
                        <div class="box-product">
                           <ul class="row">
                              <?php foreach($items as $k=>$item):?>
                              <li class="<?php echo in_array($k, array(0,3,6,9,12)) ? "first-in-line" : (in_array($k, array(2,5,8,11,14)) ? "last-in-line" : "" ) ; ?> span3">
                                 <div class="name maxheight-feat">
                                    <a href="<?php echo url::base()."item/".$item->id?>"><?php echo $item->name();?></a>
                                 </div>
                                 <div class="image2">
                                    <a href="<?php echo url::base()."item/".$item->id?>"><img id="img_<?php echo $item->id?>" src="<?php echo url::base().$item->main_image("home")?>" alt="<?php echo $item->name();?>" /></a>         
                                 </div>
                                 <div class="inner">
                                    <div class="f-left">
                                       <div class="price">
                                          <?php echo sprintf(Kohana::lang("global.price"),$item->price);?>
                                          <i style="float:right;color:green;font-size:10px;"><?php echo sprintf(Kohana::lang("global.weight"),$item->weight);?></i>
                                       </div>
                                       <div class="description">
                                          <?php echo text::limit_chars($item->anons(),60);?>
                                       </div>
                                    </div>
                                    <div class="cart-button">
                                       <div class="cart"><a href="<?php echo url::base()?>to_card/<?php echo $item->id?>" title="<?php echo Kohana::lang("global.add_to_cart")?>" data-id="<?php echo $item->id?>" class="button addToCart"><i class="icon-plus-sign"></i><span><?php echo Kohana::lang("global.add_to_cart")?></span></a></div>
                                    </div>
                                    <div class="clear"></div>
                                 </div>
                                 <div class="clear"></div>
                              </li>
                              <?php endforeach;?>
                           </ul>
                        </div>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
               <aside class="span3" id="column-left">
                  <div class="box category">
                     <div class="box-heading"><?php echo Kohana::lang("global.categories")?></div>
                     <div class="box-content">
                        <div class="box-category">
                           <ul>
                        <?php foreach($categories as $category):  ?> 
                        <li class="cat-header <?php echo isset($active_category) && $active_category->id == $category->id ? "active" : ""?> <?php echo count($category->children) ? "parent" : ""?>">
                           <a href="<?php echo isset($active_category) && $active_category->id == $category->id ? "#" : url::base()."category/".$category->seo_name?>"><?php echo $category->name();?></a>
                           <?php if(count($category->children)):?>
                           <ul class="active">
                              <?php foreach($category->children as $cat):?> 
                                 <li class="<?php echo isset($active_category) && $active_category->id == $cat->id ? "active" : ""?>">
                                    <a href="<?php echo isset($active_category) && $active_category->id == $cat->id ? "#" : url::base()."category/".$cat->seo_name?>"><?php echo $cat->name();?></a>
                                 </li>
                              <?php endforeach;?>
                           </ul>
                           <?php endif;?>
                        </li>
                        <?php endforeach;?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <script type="text/javascript">
                     if ($('.container').width() > 723) {
                       (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest){tallest=$(this).height()}});if((maxHeight)&&tallest>maxHeight)tallest=maxHeight;return this.each(function(){$(this).height(tallest)})}})(jQuery)
                     $(window).load(function(){
                       if($(".maxheight-spec").length){
                       $(".maxheight-spec").equalHeights()}
                     });
                     };
                  </script>
                  <?php if($sale_item->id):?>
                  <div class="box specials">
                     <div class="box-heading special-heading"><?php echo Kohana::lang("global.specials")?></div>
                     <div class="box-content">
                        <div class="box-product">
                           <ul class="row">
                              <li class="first-in-line last_line span3">
                                 <div class="name maxheight-spec"><a href="<?php echo url::base()."item/".$sale_item->id?>"><?php echo $sale_item->name()?></a></div>
                                 <div class="image2">
                                    <a href="<?php echo url::base()."item/".$sale_item->id?>">
                                    <img id="img_<?php echo $sale_item->id?>" src="<?php echo url::base().$sale_item->main_image()?>" alt="<?php echo $sale_item->name()?>" />
                                    </a>          
                                 </div>
                                 <div class="inner">
                                    <div class="f-left">
                                       <div class="price">
                                          <span class="price-new"><?php echo sprintf(Kohana::lang("global.price"),$sale_item->sale_price);?></span><span class="price-old"><?php echo sprintf(Kohana::lang("global.price"),$sale_item->price);?></span>

                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                    <div class="clear"></div>
                              </li>
                           </ul>
                           </div>
                        </div>
                     </div>
                     <?php endif;?>
                     <div class="clear"></div>
                     <div class="box man">
                        <div class="box-heading"><span><?php echo Kohana::lang("global.blog")?></span></div>
                        <div class="box-content">
                           <ul class="info">
                              <?php foreach($news as $item):?>
                              <li>
                                 <a href="<?php echo url::base()."blog/".$item->seo_name?>"><?php echo $item->name()?></a>
                              </li>
                              <?php endforeach;?>
                           </ul>
                           <div class="clear"></div>
                        </div>
                     </div>
               </aside>
               </div>
            </div>
            <div class="clear"></div>
         </div>
      </div>
   </div>
   <div class="clear"></div>
</section>
<?php include Kohana::find_file("views","footer");?>