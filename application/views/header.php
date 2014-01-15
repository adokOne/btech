<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="<?php echo Router::$base_cls; ?>">
<head>
    <title><?php echo Router::$title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name="description" content="<?php echo Router::$desc; ?>">
    <meta name="keywords" content="<?php echo Router::$keywords; ?>">
    <?php echo javascript::render();?>
    <?php echo stylesheet::render();?>
    <!--[if lt IE 9]>
      <link rel="stylesheet" type="text/css" href="/css/ie_6_8.css" />
    <![endif]-->  
    <!--[if gte IE 9]>
      <style type="text/css">
        <link rel="stylesheet" type="text/css" href="/css/ie_9.css" />
      </style>
    <![endif]-->  
</head>
<body>
<div id="page" >
    <!-- header -->
    <div id="header">
    	<div class="header_ins">
        	<div class="wrapper">
            	<!-- logo -->
                <div class="logo"><h1><a href="<?php echo url::lang_url()?>">Logo not ready</a></h1></div>
            	<!-- end logo -->
                <!-- nav -->
                <ul id="nav">
                    <?php foreach($lang["top_menu"] as $link=>$text):?>
                        <li><a href="<?php echo url::lang_url().$link?>"><?php echo $text; ?></a></li>
                    <?php endforeach;?>
                </ul>
                <!-- end nav -->
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- end header -->