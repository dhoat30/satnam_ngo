<?php 
/* Template Name: Places * Template Post Type: post*/ /*The template for displaying full width single posts. */
get_header(); 

?>

<div class="slider-container">


        <div class="slider">
                        
                            
                                        <?php 

                                                $argsSlider = array(
                                                    'post_type' => 'sliders',
                                                    'posts_per_page' => -1,
                                                    'post_status' => 'publish',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'sliders',
                                                            'field'    => 'slug',
                                                            'terms'    => array('home-page-hero'),
                                                        )
                                                        ), 
                                                        'orderby' => 'date', 
                                                        'order' => 'ASC'
                                                );
                                                $slider = new WP_Query( $argsSlider );
                                                while($slider->have_posts()){
                                                    $slider->the_post();
                                                    ?>
                                            <div class="slide"  style='background: url("<?php echo get_the_post_thumbnail_url(null, 'full');?>") no-repeat;'>
                                                    <?php 
                                                        if(get_field('button_text') || get_field('title') || get_field('subtitle')){
                                                            ?>
                                                            <div class='hero-overlay'></div>
                                                            <?php
                                                        }
                                                    ?>
                                                    <div class="content">
                                                        <div class="banner_content overflow-hidden">
                                                            <h2 class="em-slider-sub-title" data-animation="slideInLeft" data-animation-delay="0.5s"><?php echo get_field('title');?></h2>
                                                            <h5 class="em-slider-descript" data-animation="slideInLeft" data-animation-delay="1s"><?php echo get_field('subtitle');?></h5>
                                                            <?php if(get_field('button_text')){
                                                                ?>
                                                                <div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0s">

                                                                    <a data-animation-delay="1.5s" class='em-active-button' href="<?php echo get_field('button_link');?>" data-animation="slideInLeft" data-animation-delay="1.5s"><?php echo  get_field('button_text');?></a>
                                                                </div>
                                                                <?php
                                                            }?>
                                                        </div>
                                                    </div>
                                                
                                                
                                            </div>

                                            <?php

                                       
                                        }
                                        wp_reset_postdata();

                                        ?>
                            
                                
                            
        </div>
                
                    
            <div class="buttons">
                            <button id="prev"><i class="fas fa-arrow-left"></i></button>
                            <button id="next"><i class="fas fa-arrow-right"></i></button>
            </div>
</div>

<!-- Events -->
<div class="event_area">
		<div class="container">			
			<div class="row">	
                    <div class="section-title  t_center">
                                <!-- title -->
                                <h2>Upcoming Events</h2>						
                                    
					</div>		
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
                        <div class=" col-md-4 col-xs-12 col-sm-6 title-margin">
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
			</div>
		</div>
</div>


<!-- News -->
<div class="blog_area" id="blog">
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<div class="section-title  t_center">
						<!-- title -->
							<h2>Latest News</h2>						
							<!-- IMAGE -->
							<!-- TEXT -->
					</div>	
				</div>	
			</div>
			<div class="row title-margin">
				<div class="blog_carousel owl-carousel curosel-style">
                    <?php 

                    $argsSlider = array(
                        'post_type' => 'news',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                            'orderby' => 'date', 
                            'order' => 'ASC'
                    );
                    $slider = new WP_Query( $argsSlider );
                    while($slider->have_posts()){
                        $slider->the_post();
                        ?>			
					<div class="col-md-12">			
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
<!-- News END -->



<script>
        const slides = document.querySelectorAll('.slide');
const next = document.querySelector('#next');
const prev = document.querySelector('#prev');
const auto = true; // Auto scroll
const intervalTime = 50000;
let slideInterval;
slides[0].classList.add('current');

const nextSlide = () => {
  // Get current class
  const current = document.querySelector('.current');
  // Remove current class
  current.classList.remove('current');
  // Check for next slide
  if (current.nextElementSibling) {
    // Add current to next sibling
    current.nextElementSibling.classList.add('current');
  } else {
    // Add current to start
    slides[0].classList.add('current');
  }
  setTimeout(() => current.classList.remove('current'));
};

const prevSlide = () => {
  // Get current class
  const current = document.querySelector('.current');
  // Remove current class
  current.classList.remove('current');
  // Check for prev slide
  if (current.previousElementSibling) {
    // Add current to prev sibling
    current.previousElementSibling.classList.add('current');
  } else {
    // Add current to last
    slides[slides.length - 1].classList.add('current');
  }
  setTimeout(() => current.classList.remove('current'));
};

// Button events
next.addEventListener('click', e => {
    console.log('clicked');
  nextSlide();
  if (auto) {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, intervalTime);
  }
});

prev.addEventListener('click', e => {
  prevSlide();
  if (auto) {
    clearInterval(slideInterval);
    slideInterval = setInterval(nextSlide, intervalTime);
  }
});

// Auto slide
if (auto) {
  // Run next slide at interval time
  slideInterval = setInterval(nextSlide, intervalTime);
}

    </script>
<?php 



get_footer(); 
?>