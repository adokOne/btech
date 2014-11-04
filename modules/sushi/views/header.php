<!DOCTYPE html>
<html dir="ltr" lang="en">
   <head>
      <meta charset="UTF-8" />
      <title><?php echo Kohana::config("core.site_name")." - ".Router::$title?></title>
      <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
      <meta name="description" content="<?php echo Router::$desc?>" />
      <meta name="keywords" content="<?php echo Router::$keywords?>" />
      
      <script>
         if (navigator.userAgent.match(/Android/i)) {
             var viewport = document.querySelector("meta[name=viewport]");
             
         }
         if(navigator.userAgent.match(/Android/i)){
         window.scrollTo(0,1);
         }
      </script> 
      <link rel="shortcut icon" href="/img/favicon.ico" />
      <?php echo css::render();?>
      <?php echo js::render();?>
      <!--[if  IE 8]>
      <style>
         .success, #header #cart .content  { border:1px solid #e7e7e7;}
      </style>
      <![endif]-->
      <!--[if  IE 8]>
      <link rel="stylesheet" type="text/css" href="catalog/view/theme/theme267/stylesheet/ie7.css" />
      <![endif]-->
      <!--[if lt IE 7]>
      <link rel="stylesheet" type="text/css" href="catalog/view/theme/theme267/stylesheet/ie6.css" />
      <script type="text/javascript" src="catalog/view/javascript/DD_belatedPNG_0.0.8a-min.js"></script>
      <script type="text/javascript">
         DD_belatedPNG.fix('#logo img');
      </script>
      <![endif]-->
   </head>
   <body class="<?php echo isset($body_cls) ? $body_cls : "common-home"?>" data-auto-controller="All">
      <div class="swipe-left"></div>
      <div id="body">
      <div class="swipe">
         <div class="swipe-menu">
            <div id="language" class="header-button">
               <div class="heading"><?php echo Router::$current_language;?><i class="icon-angle-down"></i></div>
               <ul>
                  <?php foreach(Kohana::config("multi_lang.allowed_languages") as $l=>$text):?>
                  <li>  
                     <a onclick="window.location.href=this.href" href="<?php echo ($l==Kohana::config("multi_lang.default_language") ? "" : "/".$l )."/".trim((Router::$current_uri==Kohana::config("routes._default") ? "" : Router::$current_uri), '/')?>" alt="<?php echo $text?>" title="<?php echo $text?>"  ><?php echo $l?></a>
                  </li>
                  <?php endforeach;?>
               </ul>
            </div>
            <ul class="foot">
               <li><a class="" href="<?php echo url::base()?>"><?php echo Kohana::lang("global.home")?></a></li>
               <li><a class="" href="<?php echo url::base()?>pages/about"><?php echo Kohana::lang("global.about")?></a></li>
               <li><a class="" href="<?php echo url::base()?>pages/delivery"><?php echo Kohana::lang("global.delivery")?></a></li>
               <!-- <li><a class="" href="<?php echo url::base()?>feedbacks"><?php echo Kohana::lang("global.feedbacks")?></a></li> -->
               <li><a class="" href="<?php echo url::base()?>contacts"><?php echo Kohana::lang("global.contacts")?></a></li>
            </ul>
         </div>
      </div>
      <div id="page">
      <div id="shadow">
      <div class="shadow"></div>
      <header id="header">
         <div class="top-blocks">
            <div class="container">
               <div class="row">
                  <div class="span12">
                     <div class="toprow-1">
                        <a class="swipe-control" href="#"><i class="icon-reorder"></i></a>
                     </div>
                     <div class="toprow">
                        <!-- phone -->
                        <div id="language" class="header-button">
                           <div class="heading"><?php echo Router::$current_language;?><i class="icon-angle-down"></i></div>
                           <ul>
                              <?php foreach(Kohana::config("multi_lang.allowed_languages") as $l=>$text):?>
                              <li>  
                                 <a onclick="window.location.href=this.href" href="<?php echo ($l==Kohana::config("multi_lang.default_language") ? "" : "/".$l )."/".trim((Router::$current_uri==Kohana::config("routes._default") ? "" : Router::$current_uri), '/')?>" alt="<?php echo $text?>" title="<?php echo $text?>"  ><?php echo $l?></a>
                              </li>
                              <?php endforeach;?>
                           </ul>
                        </div>
                        <ul class="links">
                           <li><a class="active" href="<?php echo url::base()?>"><i class="icon-home"></i><?php echo Kohana::lang("global.home")?></a></li>
                           <li><a class="" href="<?php echo url::base()?>pages/about"><i class="icon-home"></i><?php echo Kohana::lang("global.about")?></a></li>
                           <li><a class="" href="<?php echo url::base()?>pages/delivery"><i class="icon-home"></i><?php echo Kohana::lang("global.delivery")?></a></li>
                           <!-- <li><a class="" href="<?php echo url::base()?>feedbacks"><i class="icon-home"></i><?php echo Kohana::lang("global.feedbacks")?></a></li> -->
                           <li><a class="" href="<?php echo url::base()?>contacts"><i class="icon-home"></i><?php echo Kohana::lang("global.contacts")?></a></li>
                        </ul>
                        <div class="clear"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="container">
            <div class="row">
               <div class="span12">
                  <div id="logo"><a href="<?php echo url::base()?>"><img src="/img/logo.png" title="<?php echo Kohana::config("core.site_domain")?>" alt="<?php echo Kohana::config("core.site_domain")?>" /></a></div>
<div id="search">
   <div class="inner">
      <ul style="height: 100px;border-left: 1px solid grey;padding-left: 13px;">
         <li style="padding-bottom: 10px;">
            <div style="float:left">
               <img src="/img/clock.png">
            </div>
            <div style="margin-left:34px;width: 264px;">
               <span style="color:white"><?php echo Kohana::lang("global.we_work")?></span>
               <br/>
               <span style="color:#e07946;font-size: 26px;line-height: 1.2;">8:00-22:00</span>
            </div>
         </li>
         <li>
            <div style="float:left">
               <img src="/img/phone.png">
            </div>
            <div style="margin-left: 10px;float: left;width: 264px;">
               <span style="color:white"><?php echo Kohana::lang("global.wait_for_call")?></span>
               <br/>
               <span style="color:#e07946;font-size: 26px;line-height: 1.2;"><?php echo Kohana::lang("global.foter_phone")?></span>
            </div>
         </li>
      </ul>

   </div>
</div>
                  <div class="cart-position">
                     <div class="cart-inner">
                        <div id="cart" >
                           <div class="heading">
                              <span class="link_a">
                                 <i class="icon-shopping-cart"></i>
                                 <b><?php echo  Kohana::lang("global.cart");?></b>
                                 <div class="hr"></div>
                                 <span class="sc-button"></span>
                                 <span id="cart-total2"><?php echo count($cart["items"]);?></span>
                                 <span id="cart-total"><?php echo sprintf(Kohana::lang("global.in_cart_items",count($cart["ids"]),$cart["total"])) ?></span>
                                 <i class="icon-angle-down"></i>
                                 <span class="clear"></span>
                              </span>
                           </div>
                           <div class="content">
                              <div class="content-scroll">
                                 <span class="latest-added"><?php echo  Kohana::lang("global.in_cart");?></span>
                                 <br />
                                 <br />
                                 <div class="mini-cart-info">
                                    <table class="cart">
                                       <?php foreach($cart["items"] as $item):?>
                                          <tr>
                                             <td class="image">
                                                <a target="_blank" href="<?php echo url::base()."item/".$item["id"]?>">
                                                   <img height="70px" width="70px" src="<?php echo url::base()?>upload/goods/<?php echo $item["id"]?>/main_pic_home.png" />
                                                </a>
                                             </td>
                                             <td class="name">
                                                <a target="_blank" href="<?php echo url::base()."item/".$item["id"]?>"><?php echo $item["name"]?></a>
                                                <div>
                                                </div>
                                                <span class="quantity"><?php echo $item["count"]?>&nbsp;x</span>
                                                <span class="total"><?php echo sprintf(Kohana::lang("global.price"),$item["price"])?></span>
                                                <div class="remove" data-id="<?php echo $item["id"]?>">
                                                   <span><i class="icon-remove-sign"></i><?php echo Kohana::lang("global.remove")?></span>
                                                </div>
                                             </td>
                                             <!--td class="quantity">x&nbsp;</td-->
                                             <!--td class="total"></td-->
                                          </tr>
                                       <?php endforeach;?>
                                    </table>
                                 </div>
                                 <div>
                                    <table class="total">
                                       <tr>
                                          <td align="right" class="total-right"><b><?php echo  Kohana::lang("global.total");?></b></td>
                                          <td align="left" class="total-left"><span class="t-price"><?php echo sprintf(Kohana::lang("global.price"),$cart["total"])?></span></td>
                                       </tr>
                                    </table>
                                 </div>
                                 <div class="checkout" style="display:<?php echo ($cart["items"]) ? "block" : "none" ;?>">
                                    <a class="button" href="/checkout"><span><?php echo  Kohana::lang("global.checkout");?></span></a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="span12">
                  <div id="menu-gadget">
                     <div id="menu-icon"><?php echo Kohana::lang("global.categories")?></div>
                     <ul id="nav" class="sf-menu sf-menu-phone">
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
         </div>
      </header>