<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>


	<meta charset="<?php bloginfo('charset');?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>



</head>

<body <?php body_class( );?> data-archive='<?php echo $archive ?>'>

	<!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
	<!--START HEADER TOP AREA -->
	<div class="astute-header-top">
		<div class="container">
			<div class="row">
				<!-- TOP LEFT -->
				<div class="col-xs-12 col-md-8 col-sm-9">
					<div class="top-address">
						<p>

						</p>
					</div>
				</div>
				<!-- TOP RIGHT -->
				<div class="col-xs-12 col-md-4 col-sm-3">
					<div class="top-right-menu">
						<ul class="social-icons text-right">
							<?php 
								if(is_user_logged_in()){
									?>
							<li><a class="account social-icon" href="<?php echo get_site_url(); ?>/my-account"
									title="account"><i class="far fa-user-alt"></i> My Account</a></li>
							<?php
								}
								else{
									?>
							<li><a class="account social-icon" href="<?php echo get_site_url(); ?>/my-account"
									title="account"><i class="far fa-user-alt"></i> Log In </a></li>

							<?php
								}
							?>

						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- HEADER DEFAULT MANU AREA -->
	<div class="astute-main-menu one_page hidden-xs hidden-sm">
		<div class="astute_nav_area scroll_fixed">
			<div class="container">
				<div class="row logo-left">
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<div class="logo">
							<a class="main_sticky_main_l" href="index.html" title="astute">
								<img class="header-logo"
									src="<?php echo get_site_url();?>/wp-content/uploads/2021/01/green-s-logo-High-Res-New-Zealand-150x150.png"
									alt="Shah Satnam" />
							</a>
							<a class="main_sticky_l" href="<?php echo get_site_url();?>" title="astute">
								<img class="header-logo"
									src="<?php echo get_site_url();?>/wp-content/uploads/2021/01/green-s-logo-High-Res-New-Zealand-150x150.png"
									alt="Shah Satnam" />
							</a>
						</div>
					</div>
					<!-- END LOGO -->

					<!-- MAIN MENU -->
					<div class="col-md-12 col-sm-9 col-xs-8">
						<nav class="astute_menu main-search-menu">
							<ul class="sub-menu">
								<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
								<li><a href="<?php echo get_site_url(); ?>#about-us">About</a></li>
								<li><a href="<?php echo get_site_url(); ?>/program">Programs</a></li>
								<li><a href="<?php echo get_site_url(); ?>/upcoming-events">Events</a></li>
								<li><a href="<?php echo get_site_url(); ?>/achievements">Achievements & News</a></li>
								<li><a href="<?php echo get_site_url(); ?>/gallery">Gallery</a></li>
								<li><a href="<?php echo get_site_url(); ?>#contact">Contact</a></li>
							</ul>

							<div class="donate-btn-header">
								<a class="dtbtn"
									href="<?php echo get_site_url(); ?>/product/wc-donation-your-payment-options/">Donate/Parmarth</a>
							</div>

						</nav>
					</div>
					<!-- END MAIN MENU -->
				</div>
			</div>
		</div>
	</div>
	<!-- END HEADER MENU AREA -->

	<!-- MOBILE MENU AREA -->
	<div class="home-2 mbm hidden-md hidden-lg header_area main-menu-area">
		<div class="menu_area mobile-menu">
			<nav>
				<ul class="main-menu clearfix">
					<li><a href="<?php echo get_site_url(); ?>">Home</a></li>
					<li><a href="<?php echo get_site_url(); ?>#about-us">About</a></li>
					<li><a href="<?php echo get_site_url(); ?>/program">Programs</a></li>
					<li><a href="<?php echo get_site_url(); ?>/upcoming-events">Events</a></li>
					<li><a href="<?php echo get_site_url(); ?>/achievements">Achievements & News</a></li>
					<li><a href="<?php echo get_site_url(); ?>/gallery">Gallery</a></li>
					<li><a href="<?php echo get_site_url(); ?>#contact">Contact</a></li>
					<li><a
							href="<?php echo get_site_url(); ?>/product/wc-donation-your-payment-options/">Donate/Parmarth</a>
					</li>

				</ul>
			</nav>
		</div>
	</div>
	<!-- END MOBILE MENU AREA  -->