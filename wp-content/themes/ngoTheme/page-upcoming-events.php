<?php 
get_header(); 
?>

<!-- BLOG AREA START -->
<!-- portfolio_area -->
<div class="portfolio_area4">
		<div class="container_fluid">		
			<div class="row ">
				<div class="col-md-12">
					<div class="section-title  t_center port">
						<!-- title -->
						<h2>Events</h2>						
							<!-- IMAGE -->
							
							<!-- TEXT -->
							<p class=" text-alignm">Subscribe to our Newsletter to get notify of upcoming events. </p>
					</div>			
					<div class="portfolio_menu ">
						<ul class="filter_menu ">
                            <li data-filter="*" class="">All </li>
							<li data-filter=".events" class="">Events</li>
							<li data-filter=".news" class="">News</li>
							
						</ul>
					</div>
				</div>
			</div>
			<div class="row li">
				<div class="em_load">
                <?php 
                    $today = date('Ymd');
                    $homepageEvents = new WP_Query(array(
                        'posts_per_page' => -1,
                        'post_type' => 'events',
                        'meta_key' => 'event_date',
                        'orderby' => 'meta_value_num',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                              'key' => 'event_date',
                              'compare' => '>=',
                              'value' => $today,
                              'type' => 'numeric'
                            )
                          )
                    ));

                    while($homepageEvents->have_posts()) {
                        $homepageEvents->the_post(); 
                        $eventDate = new DateTime(get_field('event_date'));
                        ?>
                        <div class="col-md-3 col-sm-6 col-lg-4 col-xs-12 grid-item events">
                            <div class="single_event_adn  kc-elm kc-css-73682">
                                <div class="astute-single-event_adn ">					
                                <!-- BLOG THUMB -->
                               
                                    <div class="astute-event-thumb_adn">
                                        <img width="950" height="550" src="<?php echo get_the_post_thumbnail_url(null, 'small'); ?>" class="attachment-astute-event-default size-astute-event-default wp-post-image" alt="">
                                        <div class="readmore_icon_adn">
                                            <a href="<?php the_permalink(); ?>"> <i class="fa fa-link"></i></a>
                                        </div>							
                                        <div class="event_date">
                                            <span><?php echo $eventDate->format('M')?></span>
                                            <span><?php echo $eventDate->format('d')?></span>
                                        </div>												
                                    </div>																				
                                    <div class="em-event-content-area_adn ">										
                                        <!-- BLOG TITLE -->
                                        <div class="event-page-title_adn ">
                                            <h2><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
                                            <div class="astute-event-meta-left_adn">
                                                <span><i class="fa fa-clock-o"></i><?php echo get_field('event_duration');?></span>
                                                <span><i class="fa fa-map-marker"></i><?php echo get_field('event_location');?></span>
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
					        <!-- news  -->
                         <?php 

                    $newsArg = array(
                        'post_type' => 'news',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                            'orderby' => 'date', 
                            'order' => 'ASC'
                    );
                    $news = new WP_Query( $newsArg );
                    while($news->have_posts()){
                        $news->the_post();
                        ?>			
					<div class="col-md-3 col-sm-6 col-lg-4 col-xs-12 grid-item news">			
						<div class="astute-single-blog_adn ">					
						<!-- BLOG THUMB -->
							<div class="blog_adn_thumb_inner">
								<div class="astute-blog-thumb_adn ">
									<a href="single-blog.html">
										<img src="<?php echo get_the_post_thumbnail_url(null, 'medium');?>"  alt="blog1">
									</a>
									<div class="blog_add_icon">
										<a href="single-blog.html"><i class="fa fa-link"></i></a>
									</div>
								</div>
								<!-- BLOG TITLE -->
								<div class="blog-page-title_adn2 ">
									<h2><a href="<?php the_permalink();?>"><?php echo wp_trim_words(get_the_title(), 5);?></a></h2>			
								</div>
							</div>
							<div class="em-blog-content-area_adn ">
								<div class="learn_more_adn">
									<a href="<?php the_permalink();?>" class="learn_btn adnbtn2">Read More 
										<i class="fa fa-long-arrow-right"></i>
									</a>
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
		</div>		
	</div>
<?php 
get_footer(); 
?>