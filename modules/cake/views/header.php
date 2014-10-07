<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Cheesecake</title>
<?php echo css::render();?>
<?php echo js::render();?>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


</head>

<body data-auto-controller="Main">

  <header>
    <div class="container">
      <div class="row">
          <div class="col-lg-8 col-md-10">
            <div class="navbar navbar-default">
              <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="responsive-menu">
              <ul class="nav navbar-nav">
                <li class="<?php echo url::current() == "index" ? "active" : "" ?>"><a href="/"><?php echo Kohana::lang("global.menu.home");?></a></li>
                <li class="<?php echo url::current() == "mini" ? "active" : "" ?>"><a href="/mini"><?php echo Kohana::lang("global.menu.mini");?></a></li>
                <li class="<?php echo url::current() == "love" ? "active" : "" ?>"><a href="/love"><?php echo Kohana::lang("global.menu.love");?></a></li>
                <li class="<?php echo url::current() == "copropate" ? "active" : "" ?>"><a href="/copropate"><?php echo Kohana::lang("global.menu.corp");?></a></li>
                <li class="<?php echo url::current() == "cookies" ? "active" : "" ?>"><a href="/cookies"><?php echo Kohana::lang("global.menu.vup");?></a></li>
              </ul>
          </div>
          </div>
          </div>

          <div class="col-lg-4 hidden-sm hidden-xs">
            <a href="#" class="cart">
              <span><?php echo $card ? Kohana::lang("global.vubrano")." <span class='count'>".count($card["ids"]).'</span>' : Kohana::lang("global.card_empty");?></span>
                    <br>
                  <span class="<?php echo $card ? "" : "hidden"?>"><?php echo Kohana::lang("global.na_symmy");?> <span class="total"><?php echo $card["price"]?></span> <?php echo Kohana::lang("global.grn");?></span></span>
            </a>
          </div>
      </div>
      
      
    </div><!-- container -->
    
  </header>
  <div class="corner bottom red"></div>

  <section class="top_bar">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="logo">
            <a href="/<?php echo Router::$language?>">
              <img src="/img/front/logo.png" alt=".">
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          <div class="info_text">
            <p><?php echo Kohana::lang("global.dostavka")?></p>
            <p><?php echo Kohana::lang("global.po_kievu")?></p>
            <p class="tel"><?php echo Kohana::lang("global.site_phone")?></p>
            <p class="mail"><?php echo Kohana::lang("global.site_mail")?></p>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-11 col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-offset-1">
          <div class="social_block">
            <ul class="lang">
              <?php foreach(Kohana::config("locale.allowed_languages") as $k=>$v):?>
                <li class="<?php echo Router::$current_language == $k ? "active" : ""?>"><a href="/<?php echo Kohana::config("multi_lang.default_language") == $k ? "" : $k  ?>"><?php echo $v?></a></li>
              <?php endforeach;?>
            </ul>
              
            <ul class="social">
              <li class="fb"><a target="_blank" href="https://www.facebook.com/Cheesecake.kiev.ua"></a></li>
              <li class="vk"><a href="#"></a></li>
              <li class="inst"><a href="#"></a></li>
            </ul>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
          <div class="row ">
            <a href="#">
              <div class="col-lg-7 col-md-5 hidden-sm col-xs-4 col-lg-offset-0 col-md-offset-0 col-sm-offset-0 col-xs-offset-1">
                <div class="cart_image">
                  <img src="/img/front/cart_big_icon.png" alt=".">
                </div>
              </div>
              <div class="col-lg-5 col-md-7">
                <div class="cart_big">
                  <span><?php echo $card ? Kohana::lang("global.vubrano")." <span class='count'>".count($card["ids"]).'</span>' : Kohana::lang("global.card_empty");?></span>
                    <br>
                  <span class="<?php echo $card ? "" : "hidden"?>"><?php echo Kohana::lang("global.na_symmy");?> <span class="total"><?php echo $card["price"]?></span> <?php echo Kohana::lang("global.grn");?></span></span>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
    <div class="corner top"></div>