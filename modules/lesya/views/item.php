<?php include Kohana::find_file("views","header");?>
<div class="middle-content">
   <div class="extra">
      <div class="main-width">
         <table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
            <tbody>
               <tr>
                  <td id="column-center" valign="top">
                     <div class="column-center-padding">
                        <div class="centerColumn" id="productGeneral">
                           <!--bof Product Name-->
                           <h1 id="productName" class="productGeneral"><?php echo $item->name();?></h1>
                           <!--eof Product Name-->
                           <div class="tie">
                              <div class="tie-indent">
                                 <div class="page-content">
                                    <div class="wrapper">
                                          <div class="fleft">
                                             <!--bof Main Product Image -->
                                             <div id="productMainImage" class="centeredContent back">
                                                <span class="image"><a href="<?php echo $item->main_image()?>"><img src="<?php echo $item->main_image()?>" alt="<?php echo $item->name()?>" title="<?php echo $item->name()?>" width="350" height="350" /><span class="zoom"></span></a></span>
                                             </div>
                                             <!--eof Main Product Image-->
                                             <div class="clear"></div>
                                             <div id="productAdditionalImages">
                                                <div id="gallery">
                                                   <?php foreach($item->alt_images("thumb") as $k=>$image): ?>
                                                      <div class="additionalImages centeredContent back">
                                                         <script language="javascript" type="text/javascript"><!--
                                                            document.write('<a href="<?php echo str_replace("_thumb", "", $image);?>"><img src="<?php echo $image;?>" alt="<?php echo $item->name()?>" title="<?php echo $item->name()?>" width="114" height="114" /></a>');
                                                            //--></script>
                                                      </div>
                                                   <?php endforeach;?>
                                                   <br class="clearBoth" />
                                                </div>
                                             </div>
                                          </div>
                                          <div class="fleft desc2">
                                             <h2 id="productPrices" class="productGeneral">
                                                <span class="price-text"><?php echo $lang["price"]?>: &nbsp;</span>
                                                <?php echo $item->price();?> грн.
                                             </h2>

                                             <div id="cartAdd">
                                             <div class="button"><a href="<?php echo url::base()?>create_order/<?php echo $item->id?>"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" ><?php echo $lang["zamovutu"]?></span></a></div>
	 
                                             </div>
                                             <div id="productDescription" class="description biggerText">
                                             <strong><?php echo $lang["desc"]?>: </strong>
                                                <?php echo $item->desc();?>
                                             </div>
                                          </div>
                                    </div>
                                    <div id="social">
                                       <!-- bof Social Media Icons -->
                                       <div id="socialIcons" class="fright">
                                          <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.d58098f8a7f0ff5a206e7f15442a6b30.en.html#_=1415537830157&amp;count=horizontal&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Flivedemo00.template-help.com%2Fzencart_51374%2Findex.php%3Fmain_page%3Dproduct_info%26cPath%3D3%26products_id%3D10&amp;size=m&amp;text=adipisicing%20elit%20%5BModel1%5D%20-%20%2432.00%20%3A%20Zen%20Cart!%2C%20The%20Art%20of%20E-commerce&amp;url=http%3A%2F%2Flivedemo00.template-help.com%2Fzencart_51374%2Findex.php%3Fmain_page%3Dproduct_info%26products_id%3D10" class="twitter-share-button fleft twitter-tweet-button twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 108px; height: 20px;"></iframe>
                                          <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                                          <div class="fleft">
                                             <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1415537829002" name="I0_1415537829002" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;origin=http%3A%2F%2Flivedemo00.template-help.com&amp;url=http%3A%2F%2Flivedemo00.template-help.com%2Fzencart_51374%2Findex.php%3Fmain_page%3Dproduct_info%26products_id%3D10&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.ru.e1ClpYFZPu0.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCM38lXFnB_VRk1rilIEWufmyWaXoA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1415537829002&amp;parent=http%3A%2F%2Flivedemo00.template-help.com&amp;pfname=&amp;rpctoken=79088135" data-gapiattached="true" title="+1"></iframe></div>
                                          </div>
                                          <div class="fleft">
                                             <fb:like send="false" layout="button_count" width="150" show_faces="false" class=" fb_iframe_widget" fb-xfbml-state="rendered" fb-iframe-plugin-query="app_id=&amp;href=http%3A%2F%2Flivedemo00.template-help.com%2Fzencart_51374%2Findex.php%3Fmain_page%3Dproduct_info%26cPath%3D3%26products_id%3D10&amp;layout=button_count&amp;locale=en_GB&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=150"><span style="vertical-align: bottom; width: 78px; height: 20px;"><iframe name="f21e9b37b" width="150px" height="1000px" frameborder="0" allowtransparency="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2FQjK2hWv6uak.js%3Fversion%3D41%23cb%3Df230688638%26domain%3Dlivedemo00.template-help.com%26origin%3Dhttp%253A%252F%252Flivedemo00.template-help.com%252Ff14de2a3ec%26relation%3Dparent.parent&amp;href=http%3A%2F%2Flivedemo00.template-help.com%2Fzencart_51374%2Findex.php%3Fmain_page%3Dproduct_info%26cPath%3D3%26products_id%3D10&amp;layout=button_count&amp;locale=en_GB&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=150" style="border: none; visibility: visible; width: 78px; height: 20px;" class=""></iframe></span></fb:like>
                                          </div>
                                          <div class="pint">
                                             <a class="PIN_1415537829574_pin_it_button_20 PIN_1415537829574_pin_it_button_en_20_gray PIN_1415537829574_pin_it_button_inline_20 PIN_1415537829574_pin_it_beside_20" data-pin-href="//www.pinterest.com/pin/create/button/?guid=2YitSmnEGojQ-1&amp;url=http%3A%2F%2Flivedemo00.template-help.com%2Fzencart_51374%2Findex.php%3Fmain_page%3Dproduct_info%26amp%3BcPath%3D3%26amp%3Bproducts_id%3D10&amp;media=http%3A%2F%2Flivedemo00.template-help.com%2Fzencart_51374%2Fimages%2F10-3.png&amp;description=adipisicing%20elit" data-pin-log="button_pinit" data-pin-config="beside"><span class="PIN_1415537829574_hidden" id="PIN_1415537829574_pin_count_0"><i></i></span></a>
                                          </div>
                                       </div>
                                       <!-- eof Social Media Icons -->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="clear"></div>
                        <!--eof content_center--> 
                     </div>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
<?php include Kohana::find_file("views","footer");?>