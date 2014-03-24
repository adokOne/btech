<html lang="en-us"><head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->

		<title>BKT ADMIN</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<?php echo stylesheet::render();?>
		<?php echo javascript::render();?>
		<!-- Use the correct meta names below for your web application
			 Ref: http://davidbcalhoun.com/2010/viewport-metatag 
			 
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">-->
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>
	<body class="desktop-detected" style="min-height: 900px;">
		<!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->

		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"><img src="/images/admin_logo.png"></span>
				<!-- END LOGO PLACEHOLDER -->
			</div>

			<!-- pulled right: nav area -->
			<div class="pull-right">

				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:void(0);" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> 
						<a style="cursor: pointer!important;" href="<%=admin_exit_path%>">
						<i class="fa fa-sign-out"></i>
						</a>
					</span>
				</div>
				<!-- end logout button -->

				<!-- search mobile button (this is hidden till mobile view port) -->
				<div id="search-mobile" class="btn-header transparent pull-right">
					<span> <a href="#" title="Search"><i class="fa fa-search"></i></a> </span>
				</div>
				<!-- end search mobile button -->

				<!-- input: search field --
				<form action="#ajax/search.html" class="header-search pull-right">
					<input type="text" placeholder="Find reports and more" id="search-fld">
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
					<a href="#" id="cancel-search-js" title="Cancel Search"><i class="fa fa-times"></i></a>
				</form>
				<!-- end input: search field -->

				<!-- multiple lang dropdown : find all flags in the image folder -->
				<ul class="header-dropdown-list hidden-xs">
					<li>
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
							<i class="fa fa-angle-down"></i> </a>
						<ul class="dropdown-menu pull-right">
							<?php foreach(array("ua","ru") as $lang):?>
							<li class="active">
								<a href="#"> <img src="/images/flags/<?php $lang ?>.png"> <?php echo strtoupper($lang);?> </a>
							</li>
							<?php endforeach; ?>
						</ul>
					</li>
				</ul>
				<!-- end multiple lang -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel" style="min-height: 900px;">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="#" id="show-shortcut">
						<?php echo $user->name?> <i class="fa fa-angle-down"></i>
					</a> 
				</span>
			</div>
			<!-- end user info -->

			<nav>
				<ul style="">
					<li class="">
						<a href="/admin" title=""><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent">Головна</span></a>
					</li>
					<?php foreach($modules as $module):?>
						<li>
							<a href="#">
								<i class="fa fa-lg fa-fw <?php echo $module->icon?>"></i> 
								<span class="menu-item-parent"><?php echo $module->name?></span>
								<?php if($module->children->count()): ?>
									<b class="collapse-sign"><em class="fa fa-expand-o"></em></b>
								<?php endif;?>
							</a>
						
							<?php if($module->children->count()): ?>
								<ul>
									<?php foreach($module->children as $mod):?>
											<li>

												<a href="/admin/<?php echo $mod->class_name ?>"><?php echo $mod->name ?></a>
											</li>
									<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
					<?php endforeach; ?>
				</ul>
			</nav>
			

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				
				<!-- breadcrumb -->
				
			</div>
			<!-- END RIBBON -->