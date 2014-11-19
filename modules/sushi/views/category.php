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
                  <script type="text/javascript">
                     if ($('.container').width() > 480) {
                       (function($){$.fn.equalHeights=function(minHeight,maxHeight){tallest1=(minHeight)?minHeight:0;this.each(function(){if($(this).height()>tallest1){tallest1=$(this).height()}});if((maxHeight)&&tallest1>maxHeight)tallest1=maxHeight;return this.each(function(){$(this).height(tallest1)})}})(jQuery)
                     $(window).load(function(){
                       if($(".maxheight-feat1").length){
                       $(".maxheight-feat1").equalHeights()}
                     });
                     };
                  </script>
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
                     <div class="box-heading"><?php echo $active_category->name()?></div>
                     <div class="box-content">
                        <div class="box-product">
                           <ul class="row">
                              <?php function map_good($item){return $item->goods->as_array();};$goods = $active_category->goods->count() ? $active_category->goods : arr::flatten(array_map("map_good",$active_category->children->as_array()))?>
                              <?php foreach($goods as $k=>$item): ?>
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
                                 <div class="name maxheight-spec"><a href="http://livedemo00.template-help.com/opencart_46242/index.php?route=product/product&amp;product_id=41"><?php echo $sale_item->name()?></a></div>
                                 <div class="image2">
                                    <a href="http://livedemo00.template-help.com/opencart_46242/index.php?route=product/product&amp;product_id=41">
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