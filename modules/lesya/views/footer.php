                     <!-- Footer -->
                     <div class="footer-container">
                        <footer id="footer"  class="container">
                           <div class="row">
                              <!-- Block categories module -->
                              <section class="blockcategories_footer footer-block col-xs-12 col-sm-2">
                                 <h4><?php echo $lang["categories"]?></h4>
                                 <div class="category_footer toggle-footer">
                                    <div class="list">
                                       <ul class="tree dhtml">
                                          <?php foreach($categories as $cat):?>
                                          <li >
                                             <a href="<?php echo isset($active_category) && $cat->id == $active_category->id ? "#" : $cat->url()?>" title="<?php echo $cat->name() ?>"><?php echo $cat->name() ?></a>
                                          <li />
                                          <?php endforeach;?>
                                       </ul>
                                    </div>
                                 </div>
                                 <!-- .category_footer -->
                              </section>
                              <!-- /Block categories module -->
                              <!-- MODULE Block footer -->
                              <section class="footer-block col-xs-12 col-sm-2" id="block_various_links_footer">
                                 <h4><?php echo $lang["information"]?></h4>
                                 <ul class="toggle-footer">
                                    <li class="item">
                                       <a href="<?php echo url::base()?>specials" title="<?php echo $lang["specials"]?>"><?php echo $lang["specials"]?></a>
                                    </li>
                                    <li class="item">
                                       <a href="<?php echo url::base()?>contacts" title="<?php echo $lang["contact_us"]?>"><?php echo $lang["contact_us"]?></a>
                                    </li>
                                    <li class="item">
                                       <a href="<?php echo url::base()?>page/delivery" title="<?php echo $lang["delivery_and_pay"]?>"><?php echo $lang["delivery_and_pay"]?></a>
                                    </li>
                                    <li class="item">
                                       <a href="<?php echo url::base()?>page/wholesale" title="<?php echo $lang["to_wholesasle"]?>"><?php echo $lang["to_wholesasle"]?></a>
                                    </li>
                                 </ul>
                              </section>
                              <div class="bottom-footer col-xs-12">
                                 <div>
                                    &copy; 2014 <a class="_blank" href="https://vk.com/adok_one">Powere by Adok™</a>
                                 </div>
                              </div>
                              <!-- /MODULE Block footer -->
                              <!-- Block myaccount module -->
                              <section class="footer-block col-xs-12 col-sm-2">
                                 <h4>
                                    <a href="<?php echo url::base()?>account" title="<?php echo $lang["my_acount"]?>" rel="nofollow"><?php echo $lang["my_acount"]?></a>
                                 </h4>
                                 <div class="block_content toggle-footer">
                                    <ul class="bullet">
                                       <li>
                                          <a href="<?php echo url::base()?>users/orders" title="My orders" rel="nofollow"><?php echo $lang["my_orders"]?></a>
                                       </li>
                                       <li>
                                          <a href="<?php echo url::base()?>users/profile" title="My merchandise returns" rel="nofollow"><?php echo $lang["my_profile"]?></a>
                                       </li>
                                    </ul>
                                 </div>
                              </section>
                              <!-- /Block myaccount module -->
                              <section id="social_block" class="footer-block col-xs-12 col-sm-2">
                                 <h4><?php echo $lang["we_on"]?></h4>
                                 <ul class="block_content toggle-footer">
                                    <?php if(Kohana::config("core.fb_link")):?>
                                       <li class="facebook">
                                          <a target="_blank" href="<?php echo Kohana::config("core.fb_link"); ?>" title="Facebook">
                                          <i class="fa fa-facebook"></i>
                                          <span>Facebook</span>
                                          </a>
                                       </li>
                                    <?php endif;?>
                                    <?php if(Kohana::config("core.tw_link")):?>
                                       <li class="twitter">
                                          <a target="_blank" href="<?php echo Kohana::config("core.tw_link"); ?>" title="Twitter">
                                          <i class="fa fa-twitter"></i>
                                          <span>Twitter</span>
                                          </a>
                                       </li>
                                    <?php endif;?>
                                    <?php if(Kohana::config("core.vk_link")):?>
                                       <li class="rss">
                                          <a target="_blank" href="<?php echo Kohana::config("core.vk_link"); ?>" title="Vkonakte">
                                          <i class="fa fa-rss"></i>
                                          <span>Vkonakte</span>
                                          </a>
                                       </li>
                                    <?php endif;?>
                                 </ul>
                              </section>
                              <!-- MODULE Block contact infos -->
                              <section id="block_contact_infos" class="footer-block col-xs-12 col-sm-3">
                                 <div>
                                    <h4><?php echo $lang["store_info"]?></h4>
                                    <ul class="toggle-footer">
                                       <li>
                                          <i class="fa fa-map-marker"></i>
                                          <?php echo Kohana::config("core.shop_address")?>
                                       </li>
                                       <li>
                                          <i class="fa fa-phone"></i>
                                          <?php echo $lang["call_us"]?>: 
                                          <span>0123-456-789</span>
                                       </li>
                                       <li>
                                          <i class="fa fa-envelope-o"></i>
                                          Email: 
                                          <span><a href="mailto:<?php echo Kohana::config("core.site_mail")?>" ><?php echo Kohana::config("core.site_mail")?></a></span>
                                       </li>
                                    </ul>
                                 </div>
                              </section>
                              <!-- /MODULE Block contact infos -->
                           </div>
                        </footer>
                     </div>
                     <!-- #footer -->
                     <div id="prod_template">
                        <dt data-id="cart_block_product_%id%" class="first_item">
                           <a class="cart-images" href="/product/%seo%-%id%" title="%name%">
                           <img src="/upload/goods/%id%/1_thumb.png" alt="%name%">
                           </a>
                           <div class="cart-info">
                              <div class="product-name">
                                 <span class="quantity-formated">
                                 <span class="quantity">%count%</span>&nbsp;x&nbsp;
                                 </span>
                                 <a class="cart_block_product_name" href="/product/%seo%-%id%" title="%name%">%id%</a>
                              </div>
                              <span class="price">%price% грн.</span>
                           </div>
                           <span class="remove_link">
                           <a class="remove" data-id="%id%" rel="nofollow">&nbsp;</a>
                           </span>
                        </dt>
                     </div>
                  </div>
                  <!-- #page -->
                  
               </body>
            </html>