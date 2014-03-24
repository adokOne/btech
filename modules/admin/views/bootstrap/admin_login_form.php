<!DOCTYPE html>
<html lang="en-us"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
		<title> <?php echo Kohana::lang("admin.login_page_title")?> </title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php echo stylesheet::render();?>
		<?php echo javascript::render();?>

		<!-- GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>
	<body id="login" class="animated fadeInDown  desktop-detected pace-done" style="min-height: 567px;"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>

		<header id="header">
			<div id="logo-group">
				<span id="logo"><img src="/images/admin_logo.png"></span>
			</div>

		</header>

		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
						<h1 class="txt-color-red login-header-big"><?php echo Kohana::lang("admin.login_page_title")?></h1>
						<div class="hero">	
						<img src="/images/admin_baner.png" width="810" height="355" class="login_img pull-right display-image">				
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<div class="well no-padding">
							<form action="/admin/login" class="smart-form client-form" method="post"> 
								<header>
									Вхід
								</header>

								<fieldset>
									
									<section>
										<label class="label">Логін</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input name="username" type="text" class="btn btn-primary" required="required"/>
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Введіть свій логін</b></label>
									</section>

									<section>
										<label class="label">Пароль</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input name="password" type="password" class="btn btn-primary" required="required"/>
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Введіть свій пароль</b> </label>
<!-- 										<div class="note">
											<a href="#"><%=t("admin.login_page.forgot_password")%></a>
										</div> -->
									</section>

									<section>
										<label class="checkbox">
											<input type="checkbox" name="remember_me" value="1"/>
											<i></i>Запомятати мене?
										</label>
										<?php if(isset($_GET["errors"])): ?>
												<p class="flash_error"><?php echo Kohana::lang('admin.'.$_GET["errors"])?> </p>
										<?php endif?>
									</section>
								</fieldset>
								<footer>
									<input type="submit" class="btn btn-primary" value="Увійти"/>
									</button>
								</footer>
							</form>

						</div>						
					</div>
				</div>
			</div>

		</div>
	
	</body>
</html>