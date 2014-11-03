<?php if(count($items)):?>
<section id="new-products_block_right" class="block products_block">
   <h4 class="title_block">
      <a href="<?php echo url::base()?>new" title="New products"><?php echo $lang["new_products"]?></a>
   </h4>
   <div class="block_content products-block" style="">
      <ul class="products">
         <?php foreach($items as $item):?>
            <li class="clearfix">
               <a class="products-block-image" href="<?php echo $item->url();?>" title="">
               <img class="replace-2x img-responsive" src="<?php echo $item->main_image("small");?>" alt="<?php echo $item->name();?>">
               </a>
               <div class="product-content">
                  <h5>
                     <a class="product-name" href="<?php echo $item->url();?>" title="<?php echo $item->name();?>"><?php echo $item->name();?></a>
                  </h5>
                  <p class="product-description"><?php echo text::limit_chars($item->desc(),20);?></p>
                  <div class="price-box">
                     <span class="price"><?php echo $item->price." ".$lang["currencies"][$active_currency]?> </span>
                  </div>
               </div>
            </li>
         <?php endforeach;?>
      </ul>
      <div>
         <a href="<?php echo url::base()?>new" title="<?php echo $lang["all_new"]?>" class="btn btn-default btn-sm icon-right">
         <span><?php echo $lang["all_new"]?></span>
         </a>
      </div>
   </div>
</section>
<?php endif;?>