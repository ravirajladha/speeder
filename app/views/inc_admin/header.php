<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<!-- Meta data -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta content="" name="description">
		<meta content="" name="author">
		<meta name="keywords" content="" />

		<!--favicon -->

		<!-- TITLE -->
		<title>Speeder</title>

		<!-- DASHBOARD CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/style.css" rel="stylesheet"/>
		<link href="<?php echo URLROOT; ?>/assets/css/style-modes.css" rel="stylesheet"/>

		<!-- LEFT-MENU CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/sidemenu/sidemenu-toggle.css" rel="stylesheet">

		<!--C3.JS CHARTS PLUGIN -->
		<link href="<?php echo URLROOT; ?>/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet"/>

		<!-- TABS CSS -->
		<link href="<?php echo URLROOT; ?>/assets/plugins/tabs/style-2.css" rel="stylesheet" type="text/css">

		<!-- PERFECT SCROLL BAR CSS-->
		<link href="<?php echo URLROOT; ?>/assets/plugins/pscrollbar/perfect-scrollbar.css" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="<?php echo URLROOT; ?>/assets/css/icons.css" rel="stylesheet"/>

		<!-- Skin css-->
		<link href="<?php echo URLROOT; ?>/assets/skins/skins-modes/color1.css"  id="theme" rel="stylesheet" type="text/css" media="all" />

	</head>


	<body class="app sidebar-mini default-header">

<!-- GLOBAL-LOADER -->
<div id="global-loader">
	<img src="<?php echo URLROOT; ?>/assets/images/svgs/loader.svg" class="loader-img" alt="Loader">
</div>

<div class="page">
	<div class="page-main">
		<!-- HEADER -->
		<div class="header app-header">
			<div class="container-fluid">
				<div class="d-flex">
				   <a class="header-brand" href="index.html">
						<img src="<?php echo URLROOT; ?>/assets/logo.png" class="header-brand-img desktop-logo" alt="Speederlogo">
						<img src="<?php echo URLROOT; ?>/assets/logo.png" class="header-brand-img mobile-view-logo" alt="Speederlogo">
					</a><!-- LOGO -->
					<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
					<div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
					   
						<div class="dropdown d-md-flex">
							<a class="nav-link icon full-screen-link nav-link-bg" id="fullscreen-button">
								<i class="fe fe-maximize-2" ></i>
							</a>
						</div><!-- FULL-SCREEN -->
						<div class="dropdown d-md-flex notifications">
							<a class="nav-link icon" data-toggle="dropdown">
								<i class="fe fe-bell"></i>
								<span class="pulse bg-warning"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<div class="drop-heading">
									<div class="d-flex">
										<h5 class="mb-0 text-dark">Notifications</h5>
										<span class="badge badge-danger ml-auto  brround">0</span>
									</div>
								</div>
								<div class="dropdown-divider mt-0"></div>
								<a href="#" class="dropdown-item mt-2 d-flex pb-3">
									<div class="notifyimg bg-success-transparent">
										<i class="fa fa-thumbs-o-up text-success"></i>
									</div>
									<div>
										<strong>No Notifications</strong>
										<div class="small text-muted">-</div>
									</div>
								</a>
							
							
								<div class="dropdown-divider mb-0"></div>
								<div class=" text-center p-2">
									<a href="#" class="text-dark pt-0">View All Notifications</a>
								</div>
							</div>
						</div><!-- NOTIFICATIONS -->
						
						<div class="dropdown d-md-flex header-settings">
							<a href="#" class="nav-link " data-toggle="dropdown">
								<span><img src="<?php echo URLROOT; ?>/assets/images/users/male/32.jpg" alt="profile-user" class="avatar brround cover-image mb-0 ml-0"></span>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
								<div class="drop-heading  text-center border-bottom pb-3">
									<h5 class="text-dark mb-1"
									><?php 
									if($_SESSION['rexkod_admin_id']){ 
										echo $_SESSION['rexkod_admin_name'];
										} else {
											echo $_SESSION['rexkod_vendor_name'];}
											 ?></h5>
									<small class="text-muted"><?php echo ucfirst($_SESSION['rexkod_login_type']); ?></small>
								</div>
								<a class="dropdown-item" href="profile.html"><i class="mdi mdi-account-outline mr-2"></i> <span>My profile</span></a>
								<a class="dropdown-item" href="#"><i class="mdi mdi-settings mr-2"></i> <span>Settings</span></a>
								
								<a class="dropdown-item" href="#"><i class="mdi mdi-compass-outline mr-2"></i> <span>Support</span></a>
								<a class="dropdown-item" href="<?php echo URLROOT; ?>/admin/logout"><i class="mdi  mdi-logout-variant mr-2"></i> <span>Logout</span></a>
							</div>
						</div><!-- SIDE-MENU -->
						<div class="sidebar-link">
							
						</div><!-- FULL-SCREEN -->
					</div>
				</div>
			</div>
		</div>
		<!-- HEADER END -->
		<?php
    if($_SESSION['rexkod_login_type']=="admin"){
      require APPROOT . '/views/inc_admin/navbar.php';
    } else  if($_SESSION['rexkod_login_type']=="md"){
      require APPROOT . '/views/inc_admin/md_navbar.php';
    } else  if($_SESSION['rexkod_login_type']=="ad"){
		require APPROOT . '/views/inc_admin/ad_navbar.php';
	} else  if($_SESSION['rexkod_login_type']=="rd"){
		require APPROOT . '/views/inc_admin/rd_navbar.php';
	}  else  if($_SESSION['rexkod_login_type']=="company"){
		require APPROOT . '/views/inc_admin/company_navbar.php';
	} 
?>