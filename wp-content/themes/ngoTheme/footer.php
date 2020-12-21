<!-- FOOTER MIDDLE AREA -->
<div class="footer-middle"> 
		<div class="container">
			<div class="row">
				<div class=" col-md-3 col-sm-6">
					<div class="widget widget_mc4wp_form_widget">
						<h2 class="widget-title">Newsletter</h2>
						<?php echo do_shortcode('[mc4wp_form id="47"]'); ?>		
					</div>					
				</div>
				
				<div class="col-sm-6 col-md-3 ">
					<div class="widget widget_nav_menu">
						<h2 class="widget-title">Help Link</h2>
						<div class="menu-quick-link-container">
							<?php  
								wp_nav_menu(array(
									'menu'=> 'footer-useful-links', 
									'menu_class' => 'menu', 
									'menu_id' => 'menu-quick-link'
								))
							?>
							
						</div>
					</div>
				</div>	

				<div class="col-sm-6 col-md-3 ">
					<div class="widget widget_nav_menu">
						<h2 class="widget-title">Working With</h2>
						<div class="menu-quick-link-container">
							<div class="work-with">
								<img src="<?php echo get_site_url();?>/wp-content/uploads/2020/12/dn-logo.png" alt="Salvation Army">
								<img src="<?php echo get_site_url();?>/wp-content/uploads/2020/12/logo-2.png" alt="Salvation Army">
								<img src="<?php echo get_site_url();?>/wp-content/uploads/2020/12/secon_logo_inversed.png" alt="Salvation Army">
								<img src="<?php echo get_site_url();?>/wp-content/uploads/2020/12/NZBlood-4col-resample.png" alt="Salvation Army">

							</div>
							
						</div>
					</div>
				</div>	
                   
                   
				
			</div>
		</div>
	</div>
				
	<!-- END FOOTER MIDDLE AREA -->

<!-- footer bottom start -->
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="copy-right-text">
						<!-- FOOTER COPYRIGHT TEXT -->
							<p>Copyright Shah Satnam Ji Greens 2020. All Rights Reserved.	</p>		
					</div>
				</div>
			
			</div>
		</div>
	</div>
	
<!-- footer bottom end -->

<?php wp_footer();?>

  <!-- Main jquery js -->	
  <script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/vendor/jquery-3.2.1.min.js"></script>
	<!-- bootstrap js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/bootstrap.min.js"></script>
	<!-- directional js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery.directional-hover.min.js"></script>
	<!-- imagesloaded js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/imagesloaded.pkgd.min.js"></script>
	<!-- meanmenu js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery.meanmenu.js"></script>
	<!-- isotope js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/isotope.pkgd.min.js"></script>
	<!-- owl-carousel js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/owl.carousel.min.js"></script>
	<!-- scrollUp js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery.scrollUp.js"></script>
	<!-- nivo-slider js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery.nivo.slider.pack.js"></script>
	<!-- counterup js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery.counterup.min.js"></script>
	<!-- slick js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/slick.min.js"></script>
	<!-- jquery Nav js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery.nav.js"></script>
	<!-- wow js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/wow.js"></script>
	<!-- scrolltofixed js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery-scrolltofixed-min.js"></script>
	<!-- venobox js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/venobox/venobox.min.js"></script>
	<!-- waypoints js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/waypoints.min.js"></script>
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/jquery.countdown.min.js"></script>
	<!-- Main js -->	
	<script type="text/javascript" src="<?php echo get_site_url();?>/wp-content/themes/ngoTheme/assets/js/theme.js"></script>

</body>
</html>