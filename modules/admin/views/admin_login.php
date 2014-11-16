
<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<meta charset="utf-8">
		<title> Lesia Admin</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php echo css::render();?>
		<?php echo js::render();?>

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
		<link rel="icon" href="/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	</head>
	
	<body class="animated fadeInDown">

		<header id="header">

			<div id="logo-group">
				<span id="logo"> <img src="/img/logo.png" alt="B1Dev"> </span>
			</div>

		</header>

		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8 hidden-xs hidden-sm">
						<h1 class="txt-color-red login-header-big"></h1>
						<div class="hero">	
							<img src="/img/admin_baner.png" width="810" height="355" class="login_img pull-right display-image">					
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<div class="well no-padding">
							<form data-auto-controller="AdminLogin" action="/admin/login" id="login-form" class="smart-form client-form">
								<header>
									<?php echo $admin_lang["login_text"]?>
								</header>

								<fieldset>
									
									<section>
										<label class="label"><?php echo $admin_lang["username"]?></label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="email" name="email">
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> <?php echo $admin_lang["login_tip"]?></b></label>
									</section>

									<section>
										<label class="label"><?php echo $admin_lang["password"]?></label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="password">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> <?php echo $admin_lang["pass_tip"]?></b> </label>
										<div class="note">
											<a href="/admin/forgot"><?php echo $admin_lang["forgot"]?></a>
										</div>
									</section>

									<section>
										<label class="checkbox">
											<input type="checkbox" name="remember" checked="">
											<i></i><?php echo $admin_lang["stay_signed"]?></label>
									</section>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										<?php echo $admin_lang["submit"]?>
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