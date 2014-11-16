<!DOCTYPE HTML>
<!--[if lt IE 7]> 
<html class="no-js lt-ie9 lt-ie8 lt-ie7 " lang="en">
   <![endif]-->
   <!--[if IE 7]>
   <html class="no-js lt-ie9 lt-ie8 ie7" lang="en">
      <![endif]-->
      <!--[if IE 8]>
      <html class="no-js lt-ie9 ie8" lang="en">
         <![endif]-->
         <!--[if gt IE 8]> 
         <html class="no-js ie9" lang="en">
            <![endif]-->
            <html lang="en">
               <head>
                  <meta charset="utf-8" />
                  <title><?php echo Router::$title?></title>
                  <meta name="description" content="<?php echo Router::$desc?>" />
                  <meta name="robots" content="index,follow" />
                  <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.0, initial-scale=1.0" />
                  <meta name="apple-mobile-web-app-capable" content="yes" />
                  <link rel="icon" type="image/vnd.microsoft.icon" href="/img/favicon.ico?1410520368" />
                  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico?1410520368" />
                  <?php echo css::render();?>
                  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin,latin-ext,cyrillic-ext" type="text/css" media="all" />
                  <link href='http://fonts.googleapis.com/css?family=Roboto:100,400,500,300,700&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
                  <script type="text/javascript">
                     var CUSTOMIZE_TEXTFIELD = 1;
                     var FancyboxI18nClose = 'Close';
                     var FancyboxI18nNext = 'Next';
                     var FancyboxI18nPrev = 'Previous';
                     var added_to_wishlist = 'Added to your wishlist.';
                     var ajax_allowed = true;
                     var ajaxsearch = true;
                     var baseDir = '<?php echo url::base();?>';
                     var baseUri = '<?php echo url::base();?>';
                     var blocksearch_type = 'top';
                     var comparator_max_item = 2;
                     var comparedProductsIds = [];
                     var contentOnly = false;
                     var customizationIdMessage = 'Customization #';
                     var delete_txt = 'Delete';
                     var displayList = false;
                     var freeProductTranslation = 'Free!';
                     var freeShippingTranslation = 'Free shipping!';
                     var generated_date = 1414421313;
                     var homeslider_loop = 1;
                     var homeslider_pause = 5000;
                     var homeslider_speed = 700;
                     var homeslider_width = 2050;
                     var id_lang = 1;
                     var img_dir = '<?php echo url::base();?>img';
                     var instantsearch = true;
                     var isGuest = 0;
                     var isLogged = 0;
                     var loggin_required = 'You must be logged in to manage your wishlist.';
                     var max_item = 'You cannot add more than 2 product(s) to the product comparison';
                     var min_item = 'Please select at least one product';
                     var mywishlist_url = '';
                     var nbItemsPerLine = 4;
                     var nbItemsPerLineMobile = 2;
                     var nbItemsPerLineTablet = 3;
                     var page_name = 'index';
                     var priceDisplayMethod = 1;
                     var priceDisplayPrecision = 2;
                     var quickView = true;
                     var removingLinkText = 'remove this product from my cart';
                     var roundMode = 2;
                     var search_url = '';
                     var static_token = '964567a589c6bde7d9ddb8febb969552';
                     var token = '02ed07d4a98b7a264a4121870331ca4b';
                     var usingSecureMode = false;
                     var wishlistProductsIds = false;
                  </script>
                  <?php js::render();?>
                  <!--[if IE 8]>
                  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
                  <![endif]-->
               </head>
               <body id="<?php echo isset($body_cls) ? $body_cls : "index" ?>" class="index hide-left-column hide-right-column lang_en" data-auto-controller="All">
                  <!--[if IE 8]>
                  <div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>
                  <![endif]-->
                  <div id="page">
                     <div class="header-container">
                        <header id="header">
                           <div class="banner">
                              <div class="container">
                                 <div class="row">
                                 </div>
                              </div>
                           </div>
                           <div class="nav">
                              <div class="container">
                                 <div class="row">
                                    <nav>
                                       <!-- Block permanent links module HEADER -->
                                       <ul id="header_links">
<!--                                           <li id="header_link_contact">
                                             <a  href="<?php echo url::base()?>contacts" title="<?php echo $lang["contact_us"]?>"><?php echo $lang["contact_us"]?></a>
                                          </li> -->
                                          <li id="header_link_sitemap">
                                             <a  href="<?php echo url::base()?>page/wholesale" title="<?php echo $lang["to_wholesasle"]?>"><?php echo $lang["to_wholesasle"]?></a>
                                          </li>
                                       </ul>
                                       <!-- /Block permanent links module HEADER -->
                                       <!-- Block user information module NAV  -->
                                       <div class="header_user_info">
                                          <a  href="<?php echo url::base()?>page/delivery" title="<?php echo $lang["delivery_and_pay"]?>"><?php echo $lang["delivery_and_pay"]?></a>
                                       </div>
                                       <?php if(!$logged_in):?>
                                          <div class="header_user_info">
                                             <a  href="<?php echo url::base()?>users" title="<?php echo $lang["login"]?>"><?php echo $lang["login"]?></a>
                                          </div>
                                       <?php else:?>
                                          <div class="header_user_info">
                                             <a  href="<?php echo url::base()?>users/account" title="<?php echo $user->name?>"><?php echo $user->name?></a>
                                          </div>
                                       <?php endif;?>
                                       <!-- /Block usmodule NAV --><!-- Block currencies module -->
<!--                                        <div id="currencies-block-top">
                                          <form id="setCurrency" action="<?php echo url::current()?>" method="post">
                                             <div class="current">
                                                <input type="hidden" name="id_currency" id="id_currency" value=""/>
                                                <input type="hidden" name="SubmitCurrency" value="" />
                                                <span class="cur-label"><?php echo $lang["currency"]?> :</span>
                                                <strong><?php echo $active_currency; ?></strong>                                
                                             </div>
                                             <ul id="first-currencies" class="currencies_ul toogle_content">
                                               <?php foreach(Kohana::config("core.currencies") as $cur):?>
                                                  <li class="<?php echo $cur == $active_currency ? "selected" : "" ?> ">
                                                     <a href="javascript:setCurrency('<?php echo $cur; ?>');" rel="nofollow" title="<?php echo $cur; ?>"><?php echo $cur; ?></a>
                                                  </li>
                                                <?php endforeach;?>
                                             </ul>
                                          </form>
                                       </div> -->
                                       <!-- /Block currencies module --><!-- Block languages module -->
                                       <div id="languages-block-top" class="languages-block">
                                          <div class="current">
                                             <span><?php echo strtoupper(Router::$current_language);?></span>
                                          </div>
                                          <ul id="first-languages" class="languages-block_ul toogle_content">
                                             <?php foreach(Kohana::config("multi_lang.allowed_languages") as $l=>$v):?>
                                                <li class="<?php echo Router::$current_language == $l ? "selected" : ""?>">
                                                <?php if(Router::$current_language == $l):?>
                                                   <span><?php echo strtoupper($l);?></span>
                                                <?php else:?>
                                                   <a href="<?php echo ($l==Kohana::config("multi_lang.default_language") ? "" : "/".$l )."/".trim((Router::$current_uri==Kohana::config("routes._default") ? "" : Router::$current_uri), '/')?>">
                                                      <span><?php echo strtoupper($l);?></span>
                                                   </a>
                                                <?php endif;?>
                                                </li>
                                             <?php endforeach;?>
                                          </ul>
                                       </div>
                                       <!-- /Block languages module -->
                                    </nav>
                                 </div>
                              </div>
                           </div>
                           <div class="row-top" >
                              <div class="container">
                                 <div class="row">
                                    <div id="header_logo">
                                       <a href="<?php echo url::base()?>" title="<?php echo Kohana::config("core.site_name")?>">
                                        <img class="logo img-responsive" src="/img/front/logo.png" alt="<?php echo Kohana::config("core.site_name")?>"  height="44"/>
                                       </a>
                                    </div>
                                    <!-- MODULE Block cart -->
                                    <div class="">
                                       <div class="shopping_cart">
                                          <a href="#" title="<?php echo $lang["cart"]?>" rel="nofollow">
                                          <b><?php echo $lang["cart"]?></b>     
                                          <span class="ajax_cart_quantity" ><?php echo isset($card) && $card ? count($card["items"]) : 0?></span>
                                          <span class="ajax_cart_product_txt unvisible"><?php echo $lang["prod"]?></span>
                                          <span class="ajax_cart_product_txt_s unvisible"><?php echo $lang["prods"]?></span>
                                          <span class="ajax_cart_total unvisible">
                                          </span>
                                          <?php if(!isset($card) || !$card): ?>
                                             <span class="ajax_cart_no_product"><?php echo $lang["empty"]?></span>
                                          <?php endif;?>
                                          </a>
                                          <div class="cart_block block">
                                             <div class="block_content">
                                                <!-- block list of products -->
                                                <div class="cart_block_list">
                                                      <p  class="cart_block_no_products <?php echo (!isset($card) || $card && count($card["items"])) ? "hidden" : "" ?>">
                                                         <?php echo $lang["no_products"]?>
                                                      </p>
                                                      
                                                         <dl class="products">
                                                            <?php if(isset($card) && isset($card["items"]) && count($card["items"])):?>
                                                               <?php foreach($card["items"] as $prod):?>
                                                                  <dt data-id="cart_block_product_<?php echo $prod["id"]?>" class="first_item">
                                                                     <a class="cart-images" href="<?php echo ORM::factory("good")->find($prod["id"])->url();?>" title="<?php echo $prod["name"]?>">
                                                                        <img src="<?php echo ORM::factory("good")->find($prod["id"])->main_image("thumb");?>" alt="<?php echo $prod["name"]?>">
                                                                     </a>
                                                                     <div class="cart-info">
                                                                        <div class="product-name">
                                                                           <span class="quantity-formated">
                                                                           <span class="quantity"><?php echo $prod["count"];?></span>&nbsp;x&nbsp;
                                                                           </span>
                                                                           <a class="cart_block_product_name" href="<?php echo ORM::factory("good")->find($prod["id"])->url();?>" title="<?php echo $prod["name"]?>"><?php echo text::limit_chars($prod["name"],8);?></a>
                                                                        </div>
                                                                        <span class="price">
                                                                           <?php echo $prod["price"]." ".$lang["currencies"][$active_currency];?>
                                                                        </span>
                                                                     </div>
                                                                     <span class="remove_link">
                                                                        <a  class="remove" data-id="<?php echo $prod["id"];?>" data-size="<?php echo $prod["size"];?>" href="<?php echo url::base()."delete_from_cart/".$prod["id"];?>" rel="nofollow">&nbsp;</a>
                                                                     </span>
                                                                  </dt>
                                                               <?php endforeach;?>
                                                            <?php endif;?>
                                                         </dl>
                                                      
                     
                                                   <div class="cart-prices">
                                                      <div class="cart-prices-line last-line">
                                                         <span class="price cart_block_total ajax_block_cart_total"><?php echo (isset($card) && $card ? $card["total"] : 0)." ".$lang["currencies"][$active_currency] ?></span>
                                                         <span><?php echo $lang["total"]?></span>
                                                      </div>
                                                   </div>
                                                   <p class="cart-buttons <?php echo (!isset($card) || $card && $card["total"] < 1) ? "hidden" : "" ?>">
                                                      <a id="button_order_cart" class="btn btn-default btn-sm icon-right" href="<?php echo url::base()?>checkout" title="<?php echo $lang["checkout"]?>" rel="nofollow">
                                                         <span><?php echo $lang["checkout"]?></span>
                                                      </a>
                                                   </p>
                                                </div>
                                             </div>
                                          </div>
                                          <!-- .cart_block -->
                                       </div>
                                    </div>
<!--                                     <div id="layer_cart">
                                       <div class="clearfix">
                                          <div class="layer_cart_product col-xs-12 col-md-6">
                                             <span class="cross" title="<?php echo $lang["close_window"]?>"></span>
                                             <h2><i class="fa fa-ok"></i><?php echo $lang["prod_successfully"]?></h2>
                                             <div class="product-image-container layer_cart_img"><img class="layer_cart_img img-responsive" src="/upload/goods/%id%/1_thumb.png" ></div>
                                             <div class="layer_cart_product_info">
                                                <span id="layer_cart_product_title" class="product-name">%name%</span>
                                                <span id="layer_cart_product_attributes"></span>
                                                <div>
                                                   <strong class="dark"><?php echo $lang["Quantity"]?></strong>
                                                   <span id="layer_cart_product_quantity">0</span>
                                                </div>
                                                <div>
                                                   <strong class="dark"><?php echo $lang["total"]?></strong>
                                                   <span id="layer_cart_product_price"><?php echo "0 ".$lang["currencies"][$active_currency]?></span>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="layer_cart_cart col-xs-12 col-md-6">
                                             <h2>
                                                
                                                <span class="ajax_cart_product_txt_s  unvisible">
                                                <?php echo $lang["in_cart"]?> <span class="ajax_cart_quantity">0</span> <?php echo $lang["tovariv"]?>
                                                </span>
                                           
                                                <span class="ajax_cart_product_txt ">
                                                   <?php echo $lang["in_cart"]?> <span class="ajax_cart_quantity">0</span> <?php echo $lang["tovariv"]?>
                                                </span>
                                             </h2>
                                             <div class="layer_cart_row"> 
                                                <strong class="dark">
                                                <?php echo $lang["total"]?>
                                                </strong>
                                                <span class="ajax_block_cart_total"><?php echo "0 ".$lang["currencies"][$active_currency]?></span>
                                             </div>
                                             <div class="button-container"> 
                                                <span class="continue btn btn-default btn-md icon-left" title="<?php echo $lang["contine_shopong"]?>">
                                                <span><?php echo $lang["contine_shopong"]?></span>
                                                </span>
                                                <a class="btn btn-default btn-md icon-right" href="<?php echo url::base()?>checkout" title="<?php echo $lang["Proceed_checkout"]?>" rel="nofollow">
                                                <span><?php echo $lang["Proceed_checkout"]?></span>
                                                </a>  
                                             </div>
                                          </div>
                                       </div>
                                       <div class="crossseling"></div>
                                    </div> -->
                                    <!-- #layer_cart -->
                                    <div class="layer_cart_overlay"></div>
                                    <!-- /MODULE Block cart -->

                                    <div id="block_top_menu" class="sf-contener clearfix">
                                       <div class="cat-title"><?php echo $lang["categories"]?></div>
                                       <ul class="sf-menu clearfix menu-content">
                                          <?php foreach($categories as $category):?>
                                             <li>
                                                <a href="<?php echo isset($active_category) && $active_category->id == $category->id ? "#" : $category->url()  ?>" title="<?php echo $category->name()?>"><?php echo $category->name()?></a>
                                                <?php if(count($category->children)):?>
                                                   <ul>
                                                      <?php foreach($category->children as $cat):?>
                                                         <li>
                                                            <a href="<?php echo isset($active_category) && $active_category->id == $cat->id ? "#" : $cat->url()?>" title="<?php echo $cat->name()?>"><?php echo $cat->name()?></a>
                                                            <?php if(count($cat->children)):?>
                                                               <ul>
                                                                  <?php foreach($cat->children as $c_): ?>
                                                                     <li>
                                                                        <a href="<?php echo isset($active_category) && $active_category->id == $c_->id ? "#" : $c_->url()?>" title="<?php echo $c_->name()?>"><?php echo $c_->name()?></a>

                                                                     </li>
                                                                  <?php endforeach;?>
                                                                  <li id="category-thumbnail"></li>
                                                               </ul>
                                                            <?php endif;?>
                                                         </li>
                                                      <?php endforeach;?>
                                                      <li id="category-thumbnail"></li>
                                                   </ul>
                                                <?php endif;?>
                                             </li>
                                          <?php endforeach;?>
                                       </ul>
                                    </div>
                                    <!--/ Menu -->
                                 </div>
                              </div>
                           </div>
                        </header>
                     </div>