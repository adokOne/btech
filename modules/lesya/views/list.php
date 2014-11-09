<?php include Kohana::find_file("views","header");?>
<div class="content">
   <div class="extra">
      <div class="main-width">

         <table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
            <tr>
               <td id="column-center" valign="top">
                  <div class="column-center-padding">
                     <div class="centerColumn" id="indexDefault">
                        <div id="indexDefaultMainContent"></div>
                        <div class="centerBoxWrapper" id="featuredProducts">
                           <h2 class="centerBoxHeading"><?php echo $active_category->name()?></h2>
                          <div class="tie3 text2 tie-margin1">
                             <div class="tie3-indent">
                                <div class="wrapper">
                                   <div class="fleft">
                                      <div id="categoryImgListing" class="categoryImg"><img src="<?php echo $active_category->main_image()?>" alt="" width="150" height="150"></div>
                                   </div>
                                   <div class="fleft" id="indexProductListCatDescription">
                                   </div>
                                   <div class="content_desc"><?php echo $active_category->desc()?></div>
                                </div>
                             </div>
                          </div>
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