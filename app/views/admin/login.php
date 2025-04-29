<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	

	

		<!-- TITLE -->
		<title>Speeder</title>

		<!-- DASHBOARD CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/style.css" rel="stylesheet"/>
		<link href="<?php echo URLROOT; ?>/assets/css/style-modes.css" rel="stylesheet"/>

		<!-- SINGLE-PAGE CSS -->
		<link href="<?php echo URLROOT; ?>/assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

		<!--C3.JS CHARTS PLUGIN -->
		<link href="<?php echo URLROOT; ?>/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

		<!-- CUSTOM SCROLL BAR CSS-->
		<link href="<?php echo URLROOT; ?>/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- FONT-ICONS CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/icons.css" rel="stylesheet"/>

		<!-- Skin css-->
		<link href="<?php echo URLROOT; ?>/assets/skins/skins-modes/color1.css"  id="theme" rel="stylesheet" type="text/css" media="all" />

	</head>

	<body>

		<!-- BACKGROUND-IMAGE -->
		<div class="login-img">

			<!-- GLOABAL LOADER -->
			<div id="global-loader">
				<img src="<?php echo URLROOT; ?>/assets/images/svgs/loader.svg" class="loader-img" alt="Loader">
			</div>

			<!-- <div class="page">
				<div class="">
			
					<div class="col col-login mx-auto">
						<div class="text-center">
							<img src="<?php echo URLROOT; ?>/assets/logo.png" class="header-brand-img" alt=""><br><br>
						</div>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-6"> -->
						<form method="post" action="<?php echo URLROOT;?>/admin/login" autocomplete="off" onsubmit="console.log('Form action:', this.action);">
								<span class="login100-form-title">
									Member Login
								</span>
								
								<div class="wrap-input100 validate-input" >
									<input class="input100" type="text" placeholder="Email" name="username" value="admin@gmail.com">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-email" aria-hidden="true"></i>
									</span>
								</div>
								<div class="wrap-input100 validate-input" >
									<input class="input100" type="password" name="password" placeholder="Password" value="admin">
									<span class="focus-input100"></span>
									<span class="symbol-input100">
										<i class="zmdi zmdi-lock" aria-hidden="true"></i>
									</span>
								</div>
								
								<div class="container-login100-form-btn">
									<button type="submit" class="login100-form-btn btn-primary">
										Login1
									</button>
								</div>

								<div class="text-center pt-3">
									<p class="text-dark mb-0">Not a member?<a href="#" class="text-primary ml-1">Contact Admin.</a></p>
								</div>
								<div class=" flex-c-m text-center mt-3">
								   
								</div>
							</form>
						<!-- </div>
					</div>
					
				</div>
			</div>
		</div> -->
		<!-- BACKGROUND-IMAGE CLOSED -->

		<!-- JQUERY SCRIPTS -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!-- BOOTSTRAP SCRIPTS -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/bootstrap.bundle.min.js"></script>

		<!-- SPARKLINE -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- CHART-CIRCLE -->
		<script src="<?php echo URLROOT; ?>/assets/js/vendors/circle-progress.min.js"></script>

		<!-- RATING STAR -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- SELECT2 JS -->
		<script src="<?php echo URLROOT; ?>/assets/plugins/select2/select2.full.min.js"></script>
		<script src="<?php echo URLROOT; ?>/assets/js/select2.js"></script>

		<!-- INPUT MASK PLUGIN-->
		<script src="<?php echo URLROOT; ?>/assets/plugins/input-mask/jquery.mask.min.js"></script>

		<!-- CUSTOM SCROLL BAR JS-->
		<script src="<?php echo URLROOT; ?>/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- CUSTOM JS-->
		<script src="<?php echo URLROOT; ?>/assets/js/custom.js"></script>

	</body>
</html>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(isset($_SESSION['success'])){ ?>
    <script type="text/javascript">
        swal("<?php echo $_SESSION['success']; ?>");
    </script>
<?php } unset($_SESSION['success']); ?>

<!-- <?php 
  require APPROOT . '/views/inc/footer.php'; 
  ?> -->