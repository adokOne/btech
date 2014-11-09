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
                        <li class="  first">  
                           <a href="<?php echo url::base()?>page/prowuwku">  
                           <span class="corner"></span> 
                           <span>  
                           <span><?php echo $lang["prowuwku"]?></span>  
                           </span>  
                           </a>  
                        </li>
                        <li class="  ">  
                           <a href="<?php echo url::base()?>page/delivery">  
                           <span class="corner"></span> 
                           <span>  
                           <span><?php echo $lang["contact_us"]?></span>  
                           </span>  
                           </a>  
                        </li>
                        <li class=" last ">  
                           <a href="<?php echo url::base()?>page/contact_us">  
                           <span class="corner"></span> 
                           <span>  
                           <span><?php echo $lang["delivery_and_pay"]?></span>  
                           </span>  
                           </a>  
                        </li>
                     </ul>
                  </div>
                  <!-- ========================== -->
               </div>
               <div class="currencies">
                  <div>
                     <span class="label"><?php echo $lang["lang"]?>: &nbsp;</span>
                     <select name="lang" class="select" onchange="window.location.href = this.value">
                     <?php foreach(Kohana::config("multi_lang.allowed_languages") as $l=>$v):?>
                        <option value="<?php echo ($l==Kohana::config("multi_lang.default_language") ? "" : "/".$l )."/".trim((Router::$current_uri==Kohana::config("routes._default") ? "" : Router::$current_uri), '/')?>" <?php echo Router::$current_language == $l ? 'selected="selected"' : ""?> ><?php echo strtoupper($l);?></option>
                     <?php endforeach;?>
                     </select>                
                  </div>
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
