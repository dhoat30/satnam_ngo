<?php 
get_header(); 
?>

<!-- BLOG AREA START -->
<div class="single-blog astute-blog-area astute-blog-single em-single-page-comment single-blog-details">
	<div class="container">				
		<div class="row">	
        <?php 
            while(have_posts()){
                the_post(); 
                $eventDate = new DateTime(get_field('event_date'));
				$url = get_the_permalink();
			
                ?>
			<div class="col-md-12  col-sm-12 col-xs-12 blog-lr">
				<div class="astute-single-blog-details">
					<div class="astute-single-blog--thumb">
						<img width="900" height="550" src="<?php echo get_the_post_thumbnail_url(null, 'large'); ?>" alt="<?php echo get_the_title();?>">	
					</div>									
					<div class="astute-single-blog-title">
						<h2><?php echo get_the_title();?></h2>	
					</div>
					<!-- BLOG POST META  -->
					<div class="astute-blog-meta">
						<div class="astute-blog-meta-left">
							<span><i class="fa fa-calendar"></i><?php echo get_the_date();?></span>
							<a href="#"><i class="fa fa-user"></i> <?php echo get_the_author();?></a>
						</div>
					</div>
						<div class="astute-single-blog-content">
							<div class="single-blog-content">
								<div>
                                    <?php the_content();?>
                                </div>
                                <?php if(strpos($url, '/events/')){
                                    ?>
                                        <div class="astute_single_event">
											<div class="astute_event_thumb">
												<div class="event_date_list">
													<span><?php echo $eventDate->format('d')?></span>
													<span><?php echo $eventDate->format('M')?></span>
												</div>
											</div>
											<div class="event_content_area">
												<div class="event_page_title">
													<h2><a href="#"><?php echo get_the_title(); ?></P></a></h2>
												</div>
												
												<div class="astute_event_icon">
													<span><i class="fa fa-clock-o"></i><?php echo get_field('event_duration');?></span>
													<span><i class="fa fa-map-marker"></i><?php echo get_field('event_location');?></span>
												</div>
											</div>
										</div>
                                    <?php
                                }
                                    ?>
								
								<div class="page-list-single"></div>
							</div>
						</div>
				
			</div>
            <?php } 
            ?>
			
		</div>	
	</div>
</div>
            </div>
<?php 
get_footer(); 
?>