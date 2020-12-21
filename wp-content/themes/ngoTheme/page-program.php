<?php 
/* Template Name: Places * Template Post Type: post*/ /*The template for displaying full width single posts. */
get_header(); 

?>





<!-- service area start	 -->
	
<div class="service_area2">
		<div class="container">			
			<div class="row">
				<div class="col-md-12">
					<div class="section-title  t_center">
						<!-- title -->
							<h2>Our Programs</h2>						
							<!-- IMAGE -->
							<!-- TEXT -->
					</div>	
				</div>	
                <?php 

                $argsSlider = array(
                    'post_type' => 'programs',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                        'orderby' => 'date', 
                        'order' => 'ASC'
                );
                $slider = new WP_Query( $argsSlider );
                while($slider->have_posts()){
                    $slider->the_post();
                    ?>			
			<!-- single service -->
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="em-service">
						<div class="em_service_content">
							<div class="em_single_service_text">
								<div class="service_top_text">
									<div class="em-service-icon">
										
										<i class="<?php echo get_field('icons');?>"></i>
											
										
									</div>			
									<div class="em-service-title">
										<h2><?php the_title();?></h2>
									</div>
								</div>
								<div class="em-service-inner">				
									<div class="em-service-desc">
										<p><?php echo get_the_content();?></p>
									</div>							
								</div>
											
							</div>
						</div>
					</div>
				</div>
				
				<?php
                    }
                    wp_reset_postdata();

                    ?>
			</div>
		</div>
	</div>

<?php 



get_footer(); 
?>