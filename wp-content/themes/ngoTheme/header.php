<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
 

    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="profile" href="https://gmpg.org/xfn/11"/>
    <?php wp_head(); ?>
    

				
</head>

<body <?php body_class( );?> data-archive='<?php echo $archive ?>'>
 
 <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->



		
	 <!-- HEADER DEFAULT MANU AREA -->
 	<div class="astute-main-menu one_page hidden-xs hidden-sm">
		<div class="astute_nav_area scroll_fixed">
			<div class="container"> 			
				<div class="row logo-left">				
					<!-- LOGO -->
					<div class="col-md-3 col-sm-3 col-xs-4">
						<div class="logo">
							<a class="main_sticky_main_l" href="index.html" title="astute">
								<img src="assets/images/1.png" alt="astute" />
							</a>
							<a class="main_sticky_l" href="index.html" title="astute">
								<img src="assets/images/logo-trns.png" alt="astute" />
							</a>
						</div>	  
	  				</div>
					<!-- END LOGO -->
					
					<!-- MAIN MENU -->
					<div class="col-md-9 col-sm-9 col-xs-8">
						<nav class="astute_menu main-search-menu">						
							<ul class="sub-menu">
								<li><a href="<?php echo get_site_url(); ?>">Home</a>
																								
								</li>
								<li><a href="<?php echo get_site_url(); ?>#about-us">About</a></li>
								<li><a href="<?php echo get_site_url(); ?>/program">Programs</a></li>								
								<li><a href="<?php echo get_site_url(); ?>/gallery">Gallery</a></li>
												
								<li><a href="<?php echo get_site_url(); ?>#contact">Contact</a></li>
							</ul>																						
							<div class="donate-btn-header">
								<a class="dtbtn" href="#">Donate Now</a>	
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
					<li><a href="index.html">Home</a>
						<ul class="sub-menu">
							<li><a href="index-2.html">Home 2</a></li>
							<li><a href="index-3.html">Home 3</a></li>
							<li><a href="index-onepage.html">Home OnePage</a></li>
						</ul>																
					</li>
					<li><a href="about.html">About</a></li>
					<li><a href="project.html">Project</a></li>				
					<li><a href="service.html">Service</a></li>
					<li><a href="#">pages</a>
						<ul class="sub-menu">
							<li><a href="event.html">Event</a></li>
							<li><a href="team.html">Team</a></li>										
						</ul>
					</li>
					<li><a href="blog.html">Blog</a>
						<ul class="sub-menu">
							<li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
							<li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
							<li><a href="single-blog.html">Single Blog</a></li>
						</ul>								
					</li>								
					<li><a href="contact.html">Contact</a></li>
				</ul>			
			</nav>
		</div>					
	</div>			
	<!-- END MOBILE MENU AREA  -->
