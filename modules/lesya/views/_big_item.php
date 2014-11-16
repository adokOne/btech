<li class="<?php echo $cls; lesya::line_cls($k); ?>">
   <div class="product-container" itemscope itemtype="http://schema.org/Product">
      <div class="left-block">
         <div class="product-image-container">
            <a class="product_img_link"  href="<?php echo $item->url() ?>" title="<?php echo $item->name() ?>" itemprop="url">
            <img class="replace-2x img-responsive" src="<?php echo $item->main_image() ?>" alt="<?php echo $item->name() ?>" title="<?php echo $item->name() ?>" itemprop="image" />
            </a>
<!--             <a class="quick-view" href="<?php echo $item->url() ?>">
               <span><?php echo $lang["quick_view"]?></span>
            </a> -->
            <?php if($item->is_new()):?>
               <a class="new-box" href="<?php echo $item->url() ?>">
                  <span class="new-label"><?php echo $lang["new"]?></span>
               </a>
            <?php endif;?>
            <?php if($item->has_sale):?>
               <a class="sale-box" href="<?php echo $item->url() ?>">
                  <span class="sale-label"><?php echo $lang["sale"]?></span>
               </a>
            <?php endif;?>
         </div>
      </div>
      <div class="right-block">
         <h5 itemprop="name">
            <a class="product-name" href="<?php echo $item->url() ?>" title="<?php echo $item->name() ?>" itemprop="url" >
            <span class="list-name"><?php echo $item->name() ?></span>
            <span class="grid-name"><?php echo $item->name() ?></span>
            </a>
         </h5>
         <?php if($item->reviews->count()):?>
            <div class="comments_note" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
               <div class="star_content clearfix">
                  <?php for ($i=0; $i < 5; $i++):?>
                     <div class="star <?php echo ($i < $item->rating()) ? "star_on" : ""?> "></div>
                  <?php endfor;?>
                  <meta itemprop="worstRating" content = "0" />
                  <meta itemprop="ratingValue" content = "<?php echo $item->rating() ?>" />
                  <meta itemprop="bestRating" content = "5" />
               </div>
               <span class="nb-comments"><span itemprop="reviewCount">1</span> <?php echo $lang["reviews_cnt"]?></span>
            </div>
         <?php endif;?>
         <p class="product-desc" itemprop="description">
            <span class="list-desc"><?php echo text::limit_chars($item->anons(),60); ?></span>
            <span class="grid-desc"><?php echo text::limit_chars($item->anons(),60);  ?></span>
         </p>
         <div itemprop="offers" itemscope itemtype="http://schema.org/Offer" class="content_price">
         <?php if($item->wholesale_price > 0 && $logged_in && $user->is_wholesale()):?>
            <span itemprop="price" class="price product-price product-price-new ">
               <?php echo $item->wholesale_price." ".$lang["currencies"][$active_currency]?>                         
            </span>
            <span class="old-price product-price">
             <?php echo $item->price." ".$lang["currencies"][$active_currency]?>  
            </span>
         <?php elseif($item->has_sale):  ?>
            <span itemprop="price" class="price product-price product-price-new ">
               <?php echo $item->sale_price." ".$lang["currencies"][$active_currency]?>                         
            </span>
            <span class="old-price product-price">
             <?php echo $item->price." ".$lang["currencies"][$active_currency]?>  
            </span>
            <span class="price-percent-reduction">-<?php echo ceil(($item->price - $item->sale_price)/($item->price/100))?>  %</span>
         <?php else:?>
            <span class="price ">
             <?php echo $item->price." ".$lang["currencies"][$active_currency]?>  
            </span>
         <?php endif;?>
         </div>
         <div class="button-container">
            <a class="ajax_add_to_cart_button btn btn-default" href="<?php echo url::base()."to_card/".$item->id; ?>" rel="nofollow" title="<?php echo $lang["add_to_cart"] ?>" data-id-product="1">
            <span><?php echo $lang["add_to_cart"] ?></span>
            </a>
            <a itemprop="url" class="lnk_view btn btn-default" href="<?php echo $item->url() ?>" title="<?php echo $lang["more"] ?>">
            <span><?php echo $lang["more"] ?></span>
            </a>
         </div>
      </div>
   </div>
   <!-- .product-container> -->
</li>