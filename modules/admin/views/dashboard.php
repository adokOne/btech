<!DOCTYPE html>
<html lang="en-us"><head>
	<head>
		<meta charset="utf-8">
		<title>Sushi Do Admin</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
		<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
		<?php echo css::render();?>
	    <!--[if lt IE 9]>
	    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	    <![endif]-->
		<?php echo js::render();?>
	</head>
	<body class="desktop-detected" style="min-height: <?php echo isset($main_height) && is_numeric($main_height)? $main_height : "900" ?>px;">
		<!-- possible classes: minified, fixed-ribbon, fixed-header, fixed-width-->
		<script type="text/javascript">
			window.language = '<?php echo Router::$current_language?>';
		</script>
		
		<!-- HEADER -->
		<header id="header">
			<div id="logo-group">

				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"><img src="/img/logo.png" alt="B1Dev"></span>
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
						<a style="cursor: pointer!important;" href="/admin/logout">
						<i class="fa fa-sign-out"></i>
						</a>
					</span>
				</div>
				<!-- end logout button -->
			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel" style="min-height:<?php echo isset($main_height) && is_numeric($main_height)? $main_height : "900" ?>px;">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					<img src="/img/avatar_missing.png" alt="B1Dev" class="online">
					<a href="#" id="show-shortcut">
						<?php echo $user->name?>
					</a> 
				</span>
			</div>
			<!-- end user info -->

			<nav>
				<ul style="">
					<li class="">
						<a href="/admin" title="<?php echo $admin_lang["admin_index"]?>"><i class="fa fa-lg fa-fw fa-home"></i> <span class="menu-item-parent"><?php echo $admin_lang["admin_index"]?></span></a>
					</li>
					<?php foreach($modules as $mod):?>
						<li>
							<a href="#">
								<i class="fa fa-lg fa-fw <%=mod.ico%>"></i> 
								<span class="menu-item-parent"><?php echo $mod->name?></span>
								<?php if(count($mod->children)):?>
									<b class="collapse-sign"><em class="fa fa-expand-o"></em></b>
								<?php endif;?>
							</a>
						
							<?php if(count($mod->children)):?>
								<ul>
									<?php foreach($mod->children as $mod):?>
										<li>
											<a href="/admin/<?php echo $mod->action?>"><?php echo $mod->name?></a>
										</li>
									<?php endforeach;?>
								</ul>
							<?php endif;?>
						</li>
					<?php endforeach;?>
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

			<!-- MAIN CONTENT -->
			<div id="content" style="opacity: 1;">
				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							
							
						</h1>
					</div>
					<?php echo isset($actions) ? $actions  : "";?>
				</div>
				<section class="">
					<?php if(isset($_GET["success"])):?>
						<div class="alert alert-success fade in">
							<button class="close" data-dismiss="alert">
								×
							</button>
							<i class="fa-fw fa fa-check"></i>
							<strong>Успешно!</strong>
						</div>
					<?php endif;?>
					<?php echo isset($content) ? $content : '<article><div class="widget-body no-padding"><div class="row"><div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm"><img src="/img/admin_baner.png" width="810" height="355" class="login_img pull-right display-image"></div></div></div></article>'; ?>
				</section>
				
			</div>
			<!-- END MAIN CONTENT -->

		</div>	
	</body>
</html>