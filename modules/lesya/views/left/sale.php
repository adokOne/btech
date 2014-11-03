<?php if($item->id):?>
   <section id="special_block_right" class="block">
      <h4 class="title_block">
         <a href="<?php echo url::base()?>specials" title="<?php echo $lang["specials"]?>"><?php echo $lang["specials"]?></a>
      </h4>
      <div class="block_content products-block" style="">
         <ul>
            <li class="clearfix">
               <a class="products-block-image" href="<?php echo $item->url();?>">
               <img class="replace-2x img-responsive" src="<?php echo $item->main_image("small");?>" alt="<?php echo $item->name();?>" title="<?php echo $item->name();?>">
               </a>
               <div class="product-content">
                  <h5>
                     <a class="product-name" href="<?php echo $item->url();?>" title="<?php echo $item->name();?>"><?php echo $item->name();?></a>
                  </h5>
                  <p class="product-description"><?php echo text::limit_chars($item->desc(),20);?></p>
                  <div class="price-box">
                     <span class="price special-price">
                        <?php echo $item->sale_price." ".$lang["currencies"][$active_currency]?>       
                     </span>
                     <br/>
                     <span class="price-percent-reduction">-<?php echo ceil(($item->price - $item->sale_price)/($item->price/100))?>%</span>
                     <span class="old-price">
                        <?php echo $item->price." ".$lang["currencies"][$active_currency]?>       
                     </span>
                  </div>
               </div>
            </li>
         </ul>
         <div>
            <a class="btn btn-default btn-sm icon-right" href="<?php echo url::base()?>specials" title="<?php echo $lang["all_specials"]?>">
               <span><?php echo $lang["all_specials"]?></span>
            </a>
         </div>
      </div>
   </section>
<?php endif;?>