<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">
   <head>
      <title><?php echo Router::$title?></title>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="<?php echo Router::$keywords?>" />
      <meta name="description" content="<?php echo Router::$desc?>" />
      <meta http-equiv="imagetoolbar" content="no" />
      <script type="text/javascript">
         //<![CDATA[
         try{if (!window.CloudFlare) {var CloudFlare=[{verbose:0,p:0,byc:0,owlid:"cf",bag2:1,mirage2:0,oracle:0,paths:{cloudflare:"/cdn-cgi/nexp/dok2v=1613a3a185/"},atok:"28fddc8785a5de0a48b1e8704ce64501",petok:"b9521ca6db71c06f47353c2b0901c2dd7813d35e-1415532149-1800",zone:"template-help.com",rocket:"0",apps:{"abetterbrowser":{"ie":"7"},"ga_key":{"ua":"UA-7078796-5","ga_bs":"2"}}}];!function(a,b){a=document.createElement("script"),b=document.getElementsByTagName("script")[0],a.async=!0,a.src="//ajax.cloudflare.com/cdn-cgi/nexp/dok2v=919620257c/cloudflare.min.js",b.parentNode.insertBefore(a,b)}()}}catch(e){};
         //]]>
      </script>
      <link rel="shortcut icon" href="FAVICON" type="image/x-icon" />
      <link href='http://fonts.googleapis.com/css?family=Roboto:300' rel='stylesheet' type='text/css' />
      <link href='http://fonts.googleapis.com/css?family=Roboto:400' rel='stylesheet' type='text/css' />
      <link href='http://fonts.googleapis.com/css?family=Roboto:500' rel='stylesheet' type='text/css' />
      <link href='http://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css' />
      <?php css::render();?>
      <?php js::render();?>
      <!--[if IE]>
      <script type="text/javascript" src="/js/front/jquery.fancybox-1.3.4-iefix.js"></script>
      <![endif]--> 
      <!--[if lt IE 8]>
      <div style='clear:both;height:59px;padding:0 15px 0 15px;position:relative;z-index:10000;text-align:center;'><a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>
      <![endif]-->
      <script type="text/javascript">
         $(document).ready(function(){
            $("a.tooltips").easyTooltip();
         });
         $(function(){
            $('.currencies').jqTransform({imgPath:'/zencart_51374/images/'}).css('display', 'block');
            });
      </script>
      <script type="text/javascript">
         $(function(){
            $('.currencies form').jqTransform({imgPath:'jqtransformplugin/img/'});
         });
      </script>
      <script type="text/javascript">
         $(function(){
            $(document).ready(function(){
               $(".cart a.on").click(function(){
                  $(this).toggleClass("active");
               });
            });
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function(){
            $('.cart .cart-down, .cart .none').hide();
            $('.cart').hover(function(){
               $('.cart .cart-down, .cart .none').stop(true, true).slideDown(400);
               },function(){
               $('.cart .cart-down, .cart .none').stop(true, true).delay(400).slideUp(300);
            });
         });
      </script>
      <script type="text/javascript">
         $(function() {
         $('.messageStackSuccess').delay(5000).fadeOut('slow');
         });
      </script>
   </head>
   <body id="indexHomeBody">
      <!-- ========== HEADER ========== -->
      <div id="header">
         <div class="extra">
            <div class="main-width">
               <div class="logo">
                  <!-- ========== LOGO ========== -->
                  <a href="<?php echo url::base();?>"><img src="/img/front/logo.png" alt="" width="262" height="31" /></a>
                  <!-- ========================== -->
               </div>
               <div class="menu">
                  <!-- ========== MENU ========== -->
                  <div id="navEZPagesTop">
                     <ul>
                        <li class="selected  first">  
                           <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index">  
                           <span class="corner"></span> 
                           <span>  
                           <span>Home</span>  
                           </span>  
                           </a>  
                        </li>
                        <li class="  ">  
                           <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=products_new">  
                           <span class="corner"></span> 
                           <span>  
                           <span>New products</span>  
                           </span>  
                           </a>  
                        </li>
                        <li class="  ">  
                           <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=specials">  
                           <span class="corner"></span> 
                           <span>  
                           <span>Specials</span>  
                           </span>  
                           </a>  
                        </li>
                        <li class="  ">  
                           <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=products_all">  
                           <span class="corner"></span> 
                           <span>  
                           <span>All products</span>  
                           </span>  
                           </a>  
                        </li>
                        <li class="  ">  
                           <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=reviews">  
                           <span class="corner"></span> 
                           <span>  
                           <span>Reviews</span>  
                           </span>  
                           </a>  
                        </li>
                        <li class="  ">  
                           <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=contact_us">  
                           <span class="corner"></span> 
                           <span>  
                           <span>Contacts</span>  
                           </span>  
                           </a>  
                        </li>
                        <li class=" last ">  
                           <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=gv_faq">  
                           <span class="corner"></span> 
                           <span>  
                           <span>FAQs</span>  
                           </span>  
                           </a>  
                        </li>
                     </ul>
                  </div>
                  <!-- ========================== -->
               </div>
               <div class="navigation">
                  <!-- ========== NAVIGATION LINKS ========== -->
                  <a class="frst home" href="http://livedemo00.template-help.com/zencart_51374/">Home</a>
                  <a class="" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=login">Log In</a>  
                  <!-- ====================================== -->
               </div>
               <div class="lang">
                  <!-- ========== LANGUAGES ========== -->        
                  <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;language=en"><img src="includes/languages/english/images/icon.gif" alt="English" title=" English " width="21" height="15"  style="vertical-align:middle;" /></a>            <!-- =============================== -->
               </div>
               <div class="cart">
                  <!-- ========== SHOPPING CART ========== -->
                  <a class="st1" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=shopping_cart"><span>:</span></a><a class="on" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=shopping_cart"><span class="count">0</span></a> 
                  <div class="none"> Your cart is empty.</div>
                  <!-- =================================== -->
               </div>
               <div id="head-search">
                  <!-- ========== SEARCH ========== -->
                  <span class="label">Search:</span>
                  <form name="quick_find_header" action="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=advanced_search_result" method="get">
                     <div>
                        <input type="hidden" name="main_page" value="advanced_search_result" /><input type="hidden" name="search_in_description" value="1" />                <input type="text" name="keyword" size="18" class="input1" maxlength="100" style="width: -30px" />               <span class="input2"><input class="cssButton search" onmouseover="this.className='cssButtonHover search searchHover'" onmouseout="this.className='cssButton search'" type="submit" value="Search" style="width: 80px;" /></span>
                     </div>
                  </form>
                  <!-- ============================ -->
               </div>
               <div class="phone">
               </div>
               <div class="currencies">
                  <!-- ========== CURRENCIES ========= -->
                  <form name="currencies" action="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index" method="get">
                     <div>
                        <span class="label">Currencies: &nbsp;</span>
                        <select name="currency" class="select" onchange="this.form.submit();">
                           <option value="USD" selected="selected">US Dollar</option>
                           <option value="EUR">Euro</option>
                           <option value="GBP">GB Pound</option>
                        </select>
                        <input type="hidden" name="main_page" value="index" />                    
                     </div>
                  </form>
                  <!-- ====================================== -->
               </div>
               <div class="categories">
                  <!--bof-drop down menu display-->
                  <!-- menu area -->
                  <div id="dropMenuWrapper">
                     <div id="dropMenu">
                        <ul class="level1">
                           <?php foreach($categories as $category):?>
                           <li class="<?php echo count($category->children) ? "submenu" : "";?>">
                              <a href="<?php echo $category->url();?>"><?php echo $category->name();?></a>
                              <?php if(count($category->children)):?>
                                 <ul class="level2">
                                    <?php foreach($category->children as $cat):?>
                                       <li>
                                          <a href="<?php echo $cat->url();?>"><?php echo $cat->url();?></a>
                                       </li>
                                    <?php endforeach;?>
                                 </ul>
                              <?php endif;?>
                           </li>
                           <?php endforeach;?>
                        </ul>
                     </div>
                  </div>
                  <div class="clearBoth"></div>
                  <!--eof-drop down menu display-->
               </div>
            </div>
         </div>
      </div>
      <!-- ========== CATEGORIES TABS ========= -->
      <!-- ==================================== -->
      <!-- ============================ -->
      <div class="slider">
         <!-- begin edit for ZX Slideshow -->
         <script language="javascript" type="text/javascript">
            jQuery(window).load(function() {
                    jQuery('#slider').nivoSlider({
                     effect: 'fold',
                     animSpeed: 500,
                       pauseTime: 4000,
                     directionNav: true,
                     directionNavHide: false,
                       controlNav: false,
                     pauseOnHover: true,
                     captionOpacity: 0.8        });
                });
            
         </script>
         <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
               <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=redirect&amp;action=banner&amp;goto=1"><img src="images/slide1.jpg" alt="" width="1919" height="382" /></a>         
               <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=redirect&amp;action=banner&amp;goto=2"><img src="images/slide2.jpg" alt="" width="1919" height="382" /></a>
               <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=redirect&amp;action=banner&amp;goto=3"><img src="images/slide3.jpg" alt="" width="1919" height="382" /></a>      
            </div>
         </div>
         <!-- end edit for ZX Slideshow --> 
      </div>
      <div class="banner-content">
         <div class="extra">
            <div class="main-width">
               <div class="banners1">
                 <?php foreach($categories as $i=>$category):?>
                     <div class="item_<?php echo $i+1?>">
                        <a href="<?php echo $category->url()?>"><img src="<?php echo $category->main_image()?>" alt="<?php echo $category->name()?>" title="<?php echo $category->name()?> " width="269" height="269" /></a>
                        <a class="title" href="<?php echo $category->url()?>">
                           <span>
                              <h3><?php echo $category->name()?></h3>
                              <b><?php echo text::limit_chars($category->desc(),30);?></b>
                              <p></p>
                           </span>
                        </a>
                     </div>
                  <?php endforeach;?>
               </div>
            </div>
         </div>
      </div>
      <div class="middle-content">
         <div class="extra">
            <div class="main-width">
               <table border="0" cellspacing="0" cellpadding="0" width="100%" id="contentMainWrapper">
                  <tr>
                     <td id="column-center" valign="top">
                        <div class="column-center-padding">
                           <!--content_center--> 
                           <!-- bof breadcrumb -->
                           <!-- eof breadcrumb --> 
                           <!-- bof upload alerts -->
                           <!-- eof upload alerts -->
                           <div class="centerColumn" id="indexDefault">
                              <!-- deprecated - to use uncomment this section
                                 <div id="" class="content">This is the main define statement for the page for english when no template defined file exists. It is located in: <strong>/includes/languages/english/index.php</strong></div>
                                 -->
                              <!-- deprecated - to use uncomment this section
                                 <div id="" class="content">Define your main Index page copy here.</div>
                                 -->
                              <div id="indexDefaultMainContent"></div>
                              <!-- bof: featured products  -->
                              <div class="centerBoxWrapper" id="featuredProducts">
                                 <h2 class="centerBoxHeading">Featured Products</h2>
                                 <div class="centerBoxContentsFeatured centeredContent back first">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=1"><img src="images/01.png" alt="Lorem ipsum dolor sit amet conse ctetur adipisicing elit" title=" Lorem ipsum dolor sit amet conse ctetur adipisicing elit " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=1">Lorem ipsum dolor sit amet conse ctetur adipisicing elit</a>
                                          <div class="price">
                                             <strong><span class="normalprice">$50.00 </span><span class="productSpecialPrice">$79.40</span></strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=1"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="centerBoxContentsFeatured centeredContent back ">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=2"><img src="images/02.png" alt="Dolor sit amet conse ctetur adipisicing elit" title=" Dolor sit amet conse ctetur adipisicing elit " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=2">Dolor sit amet conse ctetur adipisicing elit</a>
                                          <div class="price">
                                             <strong><span class="normalprice">$60.00 </span><span class="productSpecialPrice">$85.40</span></strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=2"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="centerBoxContentsFeatured centeredContent back ">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=3"><img src="images/03.png" alt="Excepteur sint occaecat cupidatat non proident sunt in" title=" Excepteur sint occaecat cupidatat non proident sunt in " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=3">Excepteur sint occaecat cupidatat non proident sunt in</a>
                                          <div class="price">
                                             <strong>$41.00</strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=3"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="centerBoxContentsFeatured centeredContent back ">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=4"><img src="images/04.png" alt="Culpa qui officia deserunt mollit anim id e" title=" Culpa qui officia deserunt mollit anim id e " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=1_31&amp;products_id=4">Culpa qui officia deserunt mollit anim id e</a>
                                          <div class="price">
                                             <strong>$51.00</strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=4"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <br class="clearBoth" />
                                 <div class="centerBoxContentsFeatured centeredContent back first">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=5"><img src="images/05.png" alt="Ipsum dolor sit amet conse ctetur adipisicing elit" title=" Ipsum dolor sit amet conse ctetur adipisicing elit " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=5">Ipsum dolor sit amet conse ctetur adipisicing elit</a>
                                          <div class="price">
                                             <strong>$11.00</strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=5"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="centerBoxContentsFeatured centeredContent back ">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=6"><img src="images/06.png" alt="Sint occaecat cupidatat non proident, sunt in culpa qui" title=" Sint occaecat cupidatat non proident, sunt in culpa qui " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=6">Sint occaecat cupidatat non proident, sunt in culpa qui</a>
                                          <div class="price">
                                             <strong>$83.00</strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=6"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="centerBoxContentsFeatured centeredContent back ">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=7"><img src="images/07.png" alt="Occaecat cupidatat non proident, sunt in culpa qui officia" title=" Occaecat cupidatat non proident, sunt in culpa qui officia " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=7">Occaecat cupidatat non proident, sunt in culpa qui officia</a>
                                          <div class="price">
                                             <strong>$53.00</strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=7"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="centerBoxContentsFeatured centeredContent back ">
                                    <div class="product-col" >
                                       <div class="img">
                                          <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=8"><img src="images/08.png" alt="Proident sunt in culpa qui officia deserunt mollit anim id e" title=" Proident sunt in culpa qui officia deserunt mollit anim id e " width="200" height="200" /></a>
                                       </div>
                                       <div class="prod-info">
                                          <a class="name" href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=product_info&amp;cPath=2&amp;products_id=8">Proident sunt in culpa qui officia deserunt mollit anim id e</a>
                                          <div class="price">
                                             <strong>$14.00</strong>
                                          </div>
                                          <div class="product-buttons">
                                             <div class="button"><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index&amp;action=buy_now&amp;products_id=8"><span class="cssButton button_add_to_cart" onmouseover="this.className='cssButtonHover button_add_to_cart button_add_to_cartHover'" onmouseout="this.className='cssButton button_add_to_cart'" style="width: 80px;" >&nbsp;Add to Cart&nbsp;</span></a></div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <br class="clearBoth" />
                              </div>
                              <!-- eof: featured products  -->
                           </div>
                           <div class="clear"></div>
                           <!--eof content_center--> 
                        </div>
                  </tr>
               </table>
            </div>
         </div>
      </div>
      <!-- ========== FOOTER ========== -->
      <div id="footer">
         <div class="extra">
            <div class="main-width">
               <div class="wrapper">
                  <div class="footer-menu">
                     <div id="navSupp">
                        <div class="ezpagesFooterCol col1" style="width: 14%">
                           <ul>
                              <li><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index" class="activeILPage">Home</a></li>
                           </ul>
                        </div>
                        <div class="ezpagesFooterCol col2" style="width: 14%">
                           <ul>
                              <li><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=products_new">New products</a></li>
                           </ul>
                        </div>
                        <div class="ezpagesFooterCol col3" style="width: 14%">
                           <ul>
                              <li><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=specials">Specials</a></li>
                           </ul>
                        </div>
                        <div class="ezpagesFooterCol col4" style="width: 14%">
                           <ul>
                              <li><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=products_all">All products</a></li>
                           </ul>
                        </div>
                        <div class="ezpagesFooterCol col5" style="width: 14%">
                           <ul>
                              <li><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=reviews">Reviews</a></li>
                           </ul>
                        </div>
                        <div class="ezpagesFooterCol col6" style="width: 14%">
                           <ul>
                              <li><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=contact_us">Contacts</a></li>
                           </ul>
                        </div>
                        <div class="ezpagesFooterCol col7" style="width: 14%">
                           <ul>
                              <li><a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=gv_faq">FAQs</a></li>
                           </ul>
                        </div>
                        <br class="clearBoth" />                  
                     </div>
                  </div>
                  <div class="copyright">
                     <!-- ========== COPYRIGHT ========== -->
                     Copyright &copy; 2014 <a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=index" target="_blank">Games Store</a>. Powered by <a href="http://www.zen-cart.com" target="_blank">Zen Cart</a> &nbsp;| &nbsp;<a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=privacy">Privacy Notice</a> &nbsp;| &nbsp;<a href="http://livedemo00.template-help.com/zencart_51374/index.php?main_page=page_2">Template settings</a>
                     <!-- =============================== -->
                  </div>
                  <div>
                     <!-- {%FOOTER_LINK} -->
                  </div>
                  <!--<div class="cards">
                     <img src="includes/templates/template_default/images/paypal.gif" alt="" />    </div>-->
                  <div class="back_to_top">
                     <a href="#"><span>&uarr;</span> TOP</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- ============================ --> 
      <!--bof- parse time display -->
      <!--eof- parse time display --> 
      <!-- BOF- BANNER #6 display -->
      <!-- EOF- BANNER #6 display --> 
      <!-- ========== IMAGE BORDER BOTTOM ========== --> 
      <!-- ========================================= -->
      <script type="text/javascript">/* CloudFlare analytics upgrade */</script>
   </body>
</html>