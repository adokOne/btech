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
                  <div class="breadcrumb">
                     <a href="#"><?php echo $active_item->name();?></a>

                  </div>
                  <div class="product-info">
                     <div class="row">
                        <div class="span3">
                           <div id="full_gallery">
                              <ul id="gallery">
                                 <li><a class="preview" href="<?php echo url::base().$active_item->main_image()?>" data-something="something1" data-another-thing="anotherthing1"><img src="<?php echo url::base().$active_item->main_image("item")?>" alt="<?php echo $active_item->name();?>" /></a></li>
                              </ul>
                           </div>
                           <div id="default_gallery" class="left spacing">
                              <div class="image">
                                 <a class="preview" href="<?php echo url::base().$active_item->main_image()?>" title="<?php echo $active_item->name();?>" class = 'cloud-zoom' id='zoom1' rel="position: 'right'" >
                                 <img src="<?php echo url::base().$active_item->main_image("item")?>" title="<?php echo $active_item->name();?>" alt="<?php echo $active_item->name();?>" />
                                 </a>
                              </div>
                           </div>
                        </div>
                        <div class="span6">
                           <h1><?php echo Kohana::lang("global.ingridienty")?></h1>
                           <div class="description">
                           <div class="product-section">
                              <ul>
                                 <?php foreach($active_item->ingredients as $ingr):?>
                                 <li style="float:left;margin-right: 10px;">
                                    <div style="max-width: 80px;">
                                       
                                       <img src="<?php echo url::base().$ingr->main_image()?>" title="<?php echo $ingr->name();?>" alt="<?php echo $ingr->name();?>" />
                                       <p><?php echo $ingr->name();?></p>
                                       
                                    </div>
                                 </li>
                                 <?php endforeach;?>
                              </ul>
                              <div class="clear"></div>
                           </div>
                              <div class="price">
                                 <span class="text-price"><?php echo Kohana::lang("global.text_price")?>:</span>
                                  <?php if($active_item->has_sale):?>
                                    <span class="price-new"><?php echo sprintf(Kohana::lang("global.price"),$active_item->sale_price);?></span>
                                    <span class="price-old"><?php echo sprintf(Kohana::lang("global.price"),$active_item->price);?></span>
                                  <?php else:?>
                                    <span class="price-new"><?php echo sprintf(Kohana::lang("global.price"),$active_item->price);?></span>
                                  <?php endif;?>
                                 
                              </div>
                              <div class="price" style="border-top:none;">
                                 <span class="text-price"><?php echo Kohana::lang("global.weight_text")?>:</span>
                                  <span style="color:green;" class="price-new"><?php echo sprintf(Kohana::lang("global.weight"),$active_item->weight);?></span>
                              </div>
                              <div class="cart">
                                 <div class="prod-row">
                                    <div class="cart-top">
                                       <div class="cart-top-padd form-inline">
                                          <label>
                                          <?php echo Kohana::lang("global.quantity")?>
                                          <select style="width: 50px;" name="quantity" class="quantity_sel">
                                             <?php for ($i=1; $i < 5; $i++):?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                             <?php endfor;?>
                                          </select>
                                          </label>
                                          <a id="button-cart" href="<?php echo url::base()?>to_card/<?php echo $active_item->id?>" class="button-prod addToCart" ><i class="icon-plus-sign"></i>
                                            <?php echo Kohana::lang("global.add_to_cart")?>
                                          </a>
                                       </div>
                                       <div class="clear"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="clear"></div>
                              <div class="share">
                                 <!-- AddThis Button BEGIN 
                                 <span class='st_facebook_hcount' displayText='Facebook'></span>
                                 <span class='st_twitter_hcount' displayText='Tweet'></span>
                                 <span class='st_googleplus_hcount' displayText='Google +'></span>
                                 <span class='st_pinterest_hcount' displayText='Pinterest'></span>
                                 <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
                                 <script type="text/javascript">stLight.options({publisher: "00fa5650-86c7-427f-b3c6-dfae37250d99", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                                 <!-- AddThis Button END -->
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tabs">
                        <div class="tab-heading">
                           <?php echo Kohana::lang("global.desc")?>    
                        </div>
                        <!-- <div class="tab-content"><div> php </div>-->
                        <div class="tab-content" id="tab-description" style="display: block;">
                           <p><?php echo $active_item->desc();?></p>
                        </div>
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
                  <div class="clear"></div>
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