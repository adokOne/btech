<?php include Kohana::find_file("views","header");?>
<div class="columns-container">
   <div id="top_column" class="center_column"></div>
   <div id="columns" class="container">
      <!-- Breadcrumb -->
      <div class="breadcrumb clearfix">
         <a class="home" href="<?php echo url::base()?>" title="Return to Home">
         <i class="fa fa-home"></i>
         </a>
         <?php  foreach(array_reverse($active_category->parents()) as $seo):?>
	         <span class="navigation-pipe">&gt;</span>
	         <a href="<?php echo $seo->url();?>" title="<?php echo $seo->name();?>"><?php echo $seo->name();?></a>
     	    <?php endforeach;?>
     		<span class="navigation-pipe">&gt;</span>
     		<span class="navigation_page"><?php echo $item->name();?></span>
      </div>
      <!-- /Breadcrumb -->
      <div class="row">
          <div id="center_column" class="center_column col-xs-12 col-sm-12">
             <div itemscope itemtype="http://schema.org/Product">
                <div class="primary_block row">
                   <div class="container">
                      <div class="top-hr"></div>
                   </div>
                   <!-- left infos-->  
                   <div class="pb-left-column col-xs-12  col-sm-4 col-md-5">
                      <!-- product img-->        
                      <div id="image-block" class="clearfix">
	                 	 <?php if($item->has_sale):?>
	                         <span class="sale-box no-print">
	                         	<span class="sale-label"><?php echo $lang["sale"]?></span>
	                         </span>
	                     <?php endif;?>
                         <span id="view_full_size">
                         <a class="jqzoom" title="<?php echo $item->name();?>" rel="gal1" href="<?php echo $item->main_image("original");?>" itemprop="url">
                         <img itemprop="image" src="<?php echo $item->main_image("large");?>" title="<?php echo $item->main_image();?>" alt="<?php echo $item->name();?>"/>
                         </a>
                         </span>
                      </div>
                      <!-- end image-block -->
                      <!-- thumbnails -->
                      <div id="views_block" class="clearfix ">
                         <span class="view_scroll_spacer">
                            <a id="view_scroll_left" href="javascript:{}"><?php echo $lang["previous"]?></a>
                         </span>
                         <div id="thumbs_list">
                            <ul id="thumbs_list_frame">
                               <?php foreach($item->alt_images("thumb") as $k=>$image): ?>
                               <li id="thumbnail_<?php echo $k+1?>" class="<?php echo $k==(count($item->alt_images("thumb")) - 1) ? "last" : ""?>">
                                  <a 
                                     href="javascript:void(0);"
                                     rel="{gallery: 'gal1', smallimage: '<?php echo str_replace("_thumb", "_large", $image);?>',largeimage: '<?php echo str_replace("_thumb", "", $image);?>'}"
                                     title="<?php echo $item->name();?>">
                                  <img class="img-responsive" id="thumb_<?php echo $k+1?>" src="<?php echo $image;?>" alt="<?php echo $item->name();?>" title="<?php echo $item->name();?>" height="80" width="80" itemprop="image" />
                                  </a>
                               </li>
                           	   <?php endforeach;?>
                            </ul>
                         </div>
                         <!-- end thumbs_list -->
                         <a id="view_scroll_right" href="javascript:{}"><?php echo $lang["next"]?></a>
                      </div>
                   </div>
                   <div class="pb-center-column col-xs-12  col-sm-4">
                      <h1 itemprop="name"><?php echo $item->name();?></h1>
                      <div id="short_description_block">
                         <div id="short_description_content" class="rte align_justify" itemprop="description">
                            <p><?php echo $item->anons();?></p>
                         </div>
                      </div>
                      <p id="pQuantityAvailable">
                         <span  id="quantityAvailableTxtMultiple"><?php echo sprintf($lang["availible"], $item->count())?></span>  
                      </p>
                      <p class="socialsharing_product list-inline no-print">
                         <button type="button" class="btn btn-default btn-twitter" onclick="socialsharing_twitter_click('AR-15 Nature Grass and Animals <?php echo $item->url();?>');">
                            <i class="icon-twitter"></i> Tweet
                         </button>
                         <button type="button" class="btn btn-default btn-facebook" onclick="socialsharing_facebook_click();">
                            <i class="icon-facebook"></i> Share
                         </button>
                         <button type="button" class="btn btn-default btn-google-plus" onclick="socialsharing_google_click();">
                            <i class="icon-google-plus"></i> Google+
                         </button>
                         <button type="button" class="btn btn-default btn-pinterest" onclick="socialsharing_pinterest_click('<?php echo $item->main_image();?>');">
                            <i class="icon-pinterest"></i> Pinterest
                         </button>
                      </p>
                      <br/>
                      <p id="pQuantityAvailable">
                         <span><?php echo $lang["availible_sizes"];?></span>  
                      </p>
                      <p class="socialsharing_product list-inline no-print">
                         <?php $av_sizes = $item->sizes(); foreach( ORM::factory("size")->find_all()  as $size):?>
                           <button data-id="<?php echo $size->id?>" data-name="<?php echo $size->name?>" style="<?php echo isset($av_sizes[$size->id]) && $av_sizes[$size->id] ? "" : " text-decoration: line-through;"?>" <?php echo isset($av_sizes[$size->id]) && $av_sizes[$size->id]? "" : "disabled='disabled'"?> type="button" class="size btn btn-default btn-twitter">
                              <i class="icon-twitter"></i><?php echo $size->name?>
                           </button>
                           <small style="color:green"><?php echo  isset($av_sizes[$size->id]) && $av_sizes[$size->id] ? $av_sizes[$size->id] : ""?></small>
                         <?php endforeach;?>
                      </p>



                      <?php if($item->reviews->count()):?>
                        <div id="product_comments_block_extra" class="no-print" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                           <div class="comments_note clearfix">
                              <span><?php echo $lang["Rating"]?>&nbsp;</span>
                              <div class="star_content clearfix">
                                 <?php for ($i=0; $i < 5; $i++):?>
                                    <div class="star <?php echo ($i < $item->rating()) ? "star_on" : ""?> "></div>
                                 <?php endfor;?>
                                 <meta itemprop="worstRating" content = "0" />
                                 <meta itemprop="ratingValue" content = "<?php echo $item->rating() ?>" />
                                 <meta itemprop="bestRating" content = "5" />
                              </div>
                           </div>
                           <!-- .comments_note -->
                           <ul class="comments_advices">
                              <li>
                                 <a href="#idTab5" class="reviews" title="<?php echo $lang["read_reviews"]?>">
                                 <?php echo $lang["read_reviews"]?> (<span itemprop="reviewCount"><?php echo $item->reviews->count()?></span>)
                                 </a>
                              </li>
                           </ul>
                        </div>
                      <?php endif;?>
                   </div>
                   <!-- end center infos-->
                   <!-- pb-right-column-->
                   <div class="pb-right-column col-xs-12  col-sm-4 col-md-3">
                      <!-- add to cart form-->
                      <form id="buy_block" action="<?php echo url::base()?>to_card/<?php echo $item->id?>" method="post">
                         <div class="box-info-product">
                            <div class="content_prices clearfix">
                               <!-- prices -->
                               <?php if($item->wholesale_price > 0 && $logged_in && $user->is_wholesale()):?>
                									<div class="price">
                									   <p class="our_price_display" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                									      <link itemprop="availability" href="http://schema.org/InStock">
                									      <span id="our_price_display" itemprop="price"><?php echo $item->wholesale_price." ".$lang["currencies"][$active_currency]?></span>
                									   </p>
                									</div>
    							                <p class="pack_price">
                                       <?php echo $lang["Instead_of"]?>
                                       <span style="text-decoration: line-through;"><?php echo $item->price." ".$lang["currencies"][$active_currency]?></span>
                                  </p>
                               <?php elseif($item->has_sale):?>

	                               <div class="price">
	                                  <p class="our_price_display" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	                                     <link itemprop="availability" href="http://schema.org/InStock"/>
	                                     <span id="our_price_display" itemprop="price"><?php echo $item->sale_price." ".$lang["currencies"][$active_currency]?> </span>
	                                  </p>
	                                  <p id="reduction_percent" >
	                                     <span id="reduction_percent_display">
	                                     -<?php echo ceil(($item->price - $item->sale_price)/($item->price/100))?>%									</span>
	                                  </p>
	                                  <p id="old_price">
	                                     <span id="old_price_display"><?php echo $item->price." ".$lang["currencies"][$active_currency]?>  </span>
	                                     <!--  -->
	                                  </p>
	                               </div>

                               <?php else:?>

              									<div class="price">
              									   <p class="our_price_display" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
              									      <link itemprop="availability" href="http://schema.org/InStock">
              									      <span id="our_price_display" itemprop="price"><?php echo $item->price." ".$lang["currencies"][$active_currency]?></span>
              									   </p>
              									</div>

                               <?php endif;?>
                               <!-- end prices -->
                               
                               <div class="clear"></div>
                            </div>
                            <!-- end content_prices -->
                            <div class="product_attributes clearfix">
                               <!-- quantity wanted -->
                               <p id="quantity_wanted_p" style="display:none">
                                  <label><?php echo $lang["Quantity"]?></label>
                                  <span class="prod_qty">
                                    <input type="text" name="qty" readonly="readonly" id="quantity_wanted_" class="text" value="1" />
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down">
                                    <span>
                                    <i class="fa fa-minus"></i>
                                    </span>
                                    </a>
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-plus product_quantity_up">
                                    <span>
                                    <i class="fa fa-plus"></i>
                                    </span>
                                    
                                    </a>
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-plus  size_btn">
                                    <span>
                                    <i class="fa size_name">XL</i>
                                    </span>
                                    </a>
                                    <span class="clearfix"></span>
                                    <br/>
                                  </span>
                               </p>

                               <p id="sfwefwefwe" >
                                Оберіть розмір і кількість
                               </p>
                            </div>
                            <!-- end product_attributes -->
                            <div class="box-cart-bottom">
                               <div>
                                  <p id="add_to_cart" class="buttons_bottom_block no-print" style="display:none">
                                     <button href="<?php echo url::base()."to_card/".$item->id; ?>" type="submit" name="Submit" class="exclusive btn btn-default ajax_add_to_cart_button">
                                     <span><?php echo $lang["add_to_card"]?></span>
                                     </button>
                                  </p>
                               </div>
                            </div>
                            <!-- end box-cart-bottom -->
                         </div>
                         <!-- end box-info-product -->
                      </form>
                   </div>
                   <!-- end pb-right-column-->
                </div>
                <!-- end primary_block -->
                <!-- More info -->
                <section class="page-product-box">
                   <h3 class="page-product-heading"><?php echo $lang["opus"]?></h3>
                   <!-- full description -->
                   <div  class="rte">
                      <p><?php echo $item->desc()?></p>
                   </div>
                </section>
                <!--end  More info -->
                <!--HOOK_PRODUCT_TAB -->

                <section class="page-product-box">
                   <h3 id="#idTab5" class="idTabHrefShort page-product-heading"><?php echo $lang["rewievs"]?></h3>
                   <div id="idTab5">
                      <div id="product_comments_block_tab">
                      <?php foreach($item->reviews as $review):?>
	                         <div class="comment row" itemprop="review" itemscope itemtype="http://schema.org/Review">
	                            <div class="comment_author col-sm-2">
	                               <span><?php echo $lang["Grade"]?>&nbsp;</span>
	                               <div class="star_content clearfix"  itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
					                  <?php for ($i=0; $i < 5; $i++):?>
					                     <div class="star <?php echo ($i < $review->rating) ? "star_on" : ""?> "></div>
					                  <?php endfor;?>
	                                  <meta itemprop="worstRating" content = "0" />
	                                  <meta itemprop="ratingValue" content = "<?php echo $review->rating;?>" />
	                                  <meta itemprop="bestRating" content = "5" />
	                               </div>
	                               <div class="comment_author_infos">
	                                  <strong itemprop="author"><?php echo $review->author;?></strong>
	                                  <em><?php echo date("d.m.Y",$review->created_at);?></em>
	                               </div>
	                            </div>
	                            <!-- .comment_author -->
	                            <div class="comment_details col-sm-10">
	                               <p itemprop="reviewBody"><?php echo $review->text;?></p>
	                            </div>
	                            <!-- .comment_details -->
	                         </div>
                  		<?php endforeach;?>
                      <p class="align_center">
                        <a id="new_comment_tab_btn" class="btn btn-default btn-sm open-comment-form" href="#new_comment_form" title="<?php echo $lang["write_review"]?>">
                          <span><?php echo $lang["write_review"]?></span>
                        </a>
                      </p>
                         <!-- .comment -->
                      </div>
                      <!-- #product_comments_block_tab -->
                   </div>
                   <!-- Fancybox -->
                   <div style="display:none;">
                      <div id="new_comment_form">
                         <form id="id_new_comment_form" action="<?php echo url::base()."set_comment/".$item->id?>">
                            <input type="hidden" name="feedback[good_id]" value="<?php echo $item->id?>"/>
                            <h2 class="page-subheading"><?php echo $lang["write_reviews"]?></h2>
                            <div class="row">
                               <div class="product clearfix  col-xs-12 col-sm-6">
                                  <img src="<?php echo $item->main_image("sub")?>" alt="<?php echo $item->name()?>" />
                                  <div class="product_desc">
                                     <p class="product_name">
                                        <strong><?php echo $item->name()?></strong>
                                     </p>
                                     <p><?php echo $item->desc()?></p>
                                  </div>
                               </div>
                               <div class="new_comment_form_content col-xs-12 col-sm-6">
                                  <h2><?php echo $lang["your_reviews"]?></h2>
                                  <div id="new_comment_form_error" class="error alert alert-danger" style="display: none; padding: 15px 25px">
                                     <ul></ul>
                                  </div>
                                  <ul id="criterions_list">
                                     <li>
                                        <label><?php echo $lang["quality"]?>:</label>
                                        <div class="star_content">
                                           <input class="star" type="radio" name="feedback[rating]" value="1" />
                                           <input class="star" type="radio" name="feedback[rating]" value="2" />
                                           <input class="star" type="radio" name="feedback[rating]" value="3" />
                                           <input class="star" type="radio" name="feedback[rating]" value="4" checked="checked" />
                                           <input class="star" type="radio" name="feedback[rating]" value="5" />
                                        </div>
                                        <div class="clearfix"></div>
                                     </li>
                                  </ul>
                                  <label for="comment_title">
                                  <?php echo $lang["author"]?>: <sup class="required">*</sup>
                                  </label>
                                  <input id="comment_title" name="feedback[author]" type="text" value="" required="required"/>
                                  <label for="comment_title">
                                  <?php echo $lang["email"]?>: <sup class="required">*</sup>
                                  </label>
                                  <input id="comment_email" name="feedback[email]" type="email" value=""  required="required"/>
                                  <label for="content">
                                  <?php echo $lang["Comment"]?>: <sup class="required">*</sup>
                                  </label>
                                  <textarea id="content" name="feedback[text]"  required="required"></textarea>
                                  <div id="new_comment_form_footer">
                                     <input id="id_product_comment_send" name="id_product" type="hidden" value='1' />
                                     <p class="fl required"><sup>*</sup> <?php echo $lang["Required"]?></p>
                                     <p class="fr">
                                        <button id="submitNewMessage" name="submitMessage" type="submit" class="btn btn-default btn-sm">
                                        <span><?php echo $lang["send"]?></span>
                                        </button>&nbsp;
                                        <?php echo $lang["or"]?>&nbsp;
                                        <a class="closefb" href="#" title="<?php echo $lang["send"]?>">
                                        <?php echo $lang["cancel"]?>
                                        </a>
                                     </p>
                                     <div class="clearfix"></div>
                                  </div>
                                  <!-- #new_comment_form_footer -->
                               </div>
                            </div>
                         </form>
                         <!-- /end new_comment_form_content -->
                      </div>
                   </div>
                   <!-- End fancybox -->
                </section>
                <!--end HOOK_PRODUCT_TAB -->
                <section class="page-product-box blockproductscategory">
                   <h3 class="productscategory_h3 page-product-heading"><?php echo $lang["same_products"]?>:</h3>
                   <div id="productscategory_list" class="clearfix">
                      <ul id="bxslider1" class="bxslider clearfix">
                      	<?php foreach($active_category->limit(20)->orderby(null,"RAND()")->goods as $good):?>
	                         <li class="product-box item">
	                            <a href="<?php echo $good->url()?>" class="lnk_img product-image" title="<?php echo $good->name()?>">
	                            <img src="<?php echo $good->main_image("same")?>" alt="<?php echo $good->name()?>" /></a>
	                            <h5 class="product-name">
	                               <a href="<?php echo $good->url()?>" title="<?php echo $good->name()?>"><?php echo text::limit_chars($good->name(),15); ?></a>
	                            </h5>
	                            <p class="price_display">
		                            <?php if($good->wholesale_price > 0  && $logged_in && $user->is_wholesale()):?>
		                            	<span class="price"><?php echo $good->wholesale_price." ".$lang["currencies"][$active_currency]?>  </span>
		                            	<p class="pack_price">
                                        	<?php echo $lang["Instead_of"]?>
                                			<span style="text-decoration: line-through;"><?php echo $good->price." ".$lang["currencies"][$active_currency]?></span>
                                    	</p>
		                            <?php elseif($good->has_sale):?>
		                            	<span class="price special-price"><?php echo $good->sale_price." ".$lang["currencies"][$active_currency]?>  </span>
		                                <span class="price-percent-reduction small">-<?php echo ceil(($good->price - $good->sale_price)/($good->price/100))?>%</span><br/>                          
		                                <span class="old-price"><?php echo $good->price." ".$lang["currencies"][$active_currency]?>  </span>
		                            <?php else:?>
		                            	<span class="price"><?php echo $good->price." ".$lang["currencies"][$active_currency]?>  </span><br/>
		                            <?php endif;?>                         
	                            </p>
	                         </li>
                     	<?php endforeach;?>
                      </ul>
                   </div>
                </section>
                <!-- description & features -->
             </div>
             <!-- itemscope product wrapper -->
          </div>
         <!-- #center_column -->
      </div>
      <!-- .row -->
   </div>
   <!-- #columns -->  
</div>
<?php include Kohana::find_file("views","footer");?>










