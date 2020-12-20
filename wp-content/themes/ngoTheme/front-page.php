<?php 
/* Template Name: Places * Template Post Type: post*/ /*The template for displaying full width single posts. */
get_header(); 

?>

<!-- SLIDER  AREA -->
<div class="main-slider-area">
        <div class="container-fluid">
            <div class="row">
                <div class="em-nivo-slider-wrapper kc-elm kc-css-242493">
                    <div id="mainSlider" class="nivoSlider em-slider-image">						  									  
						<img src="<?php echo get_site_url(); ?>/wp-content/themes/ngoTheme/assets/images/az.jpg" alt="" title="#htmlcaption1_30" />
						
						<img src="<?php echo get_site_url(); ?>/wp-content/themes/ngoTheme/assets/images/slider-1.jpg" alt="" title="#htmlcaption1_28"/>
				   </div>
				   
									   
					<!-- em_slider style-1 start -->
					<div id="htmlcaption1_30" class="nivo-html-caption em-slider-content-nivo">
						<div class="em_slider_inner container  text-left">								
							<div class="wow slideInRight" data-wow-duration="2s" data-wow-delay="0s">										
									<h1 class="em-slider-sub-title">welcome to astute </h1>											
							</div>														
							<div class="wow slideInRight" data-wow-duration="3s" data-wow-delay="0s">											
								<p  class="em-slider-descript">Korem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt u labore et dolore magna aliqua Ut enim ad minim veniam quis </p>
							</div>					
							<div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0s">
								<a class="em-active-button" href="#">contact us</a>										 
								<a class="withput-active" href="#">vote now</a>
							</div>
						</div>
					</div>
					<!-- em_slider style-1 end -->
								   
					<!-- em_slider style-1 start -->
					<div id="htmlcaption1_28" class="nivo-html-caption em-slider-content-nivo">
						<div class="em_slider_inner container  text-center">
							<div class="wow fadeInUpBig" data-wow-duration="1.2s" data-wow-delay="0s">											
								<h2 class="em-slider-title">Money Doesn't come Without </h2>										
							</div>										 
							<div class="wow fadeInUpBig" data-wow-duration="1.5s" data-wow-delay="0s">									
								<h1 class="em-slider-sub-title">hard work </h1>	
							</div>														
							<div class="wow fadeInUpBig" data-wow-duration="2s" data-wow-delay="0s">											
								<p  class="em-slider-descript">Korem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor incididunt u labore et dolore magna aliqua Ut enim ad minim veniam quis </p>
							</div>				
							<div class="em-slider-button wow  bounceInUp  em-button-button-area" data-wow-duration="3s" data-wow-delay="0s">
								<a class="em-active-button" href="#">contact us</a>									 
								<a class="withput-active" href="#">vote now</a>
							</div>
						</div>
					</div>						
			   </div>
			</div>
		</div>
	</div>
	<!-- style center -->
         
<!-- START SECTION BANNER -->
<div class="slider-container">


        <div class="slider">
                        
                            
                                        <?php 

                                                $argsSlider = array(
                                                    'post_type' => 'sliders',
                                                    'posts_per_page' => -1,
                                                    'post_status' => 'publish',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'hero-section-slider',
                                                            'field'    => 'slug',
                                                            'terms'    => array('hero section'),
                                                        )
                                                        ), 
                                                        'orderby' => 'date', 
                                                        'order' => 'ASC'
                                                );
                                                $slider = new WP_Query( $argsSlider );
                                                while($slider->have_posts()){
                                                    $slider->the_post();
                                                    ?>
                                           
                                            <div class="slide"  style='background: url("<?php echo get_the_post_thumbnail_url(null,"full"); ?>") no-repeat;'>
                                               
                                                <div class="content">
                                                    <div class="banner_content overflow-hidden">
                                                        <!--<h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s"><?php //echo get_field('title');?></h2>
                                                        <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s"><?php //echo get_field('subtitle');?></h5>
                                                        -->
                                                        <a data-animation-delay="1.5s" class='btn btn-black black btn-hover' href="<?php echo get_field('button_link');?>" data-animation="slideInLeft" data-animation-delay="1.5s"><?php echo get_field('button_text');?></a>
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


<!-- START SECTION BANNER --> 
<div class="section pb_20 small_pt">
	<div class="container">
    	<div class="row">
                        <?php 

                $argsCategory = array(
                    'post_type' => 'product_categories',
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                        'orderby' => 'date', 
                        'order' => 'ASC'
                );
                $categoryCard = new WP_Query( $argsCategory );
                while($categoryCard->have_posts()){
                    $categoryCard->the_post();
                    ?>
        	<div class="col-md-6">
            	<div class="single_banner">
                	<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="shop_banner_img1">
                    <div class="single_banner_info">
                        <h5 class="single_bn_title1"> </h5>
                        <h3 class="single_bn_title"><?php the_title();?></h3>
                        <a href="<?php echo get_field('link');?>" class="single_bn_link">Explore Now</a>
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
<!-- END SECTION BANNER --> 

        <!-- START SECTION SHOP -->
<div class="section small_pb">
	<div class="container">
		<div class="row">
			<div class="col-12">
            	<div class="heading_tab_header">
                    <div class="heading_s2">
                        <h2>Exclusive Products</h2>
                    </div>
                    <div class="tab-style2">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tabmenubar" aria-expanded="false"> 
                            <span class="ion-android-menu"></span>
                        </button>
                        <ul class="nav nav-tabs ex-product-nav justify-content-center justify-content-md-end" id="tabmenubar" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="true">Special Offer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Best Sellers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Featured</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
		</div>
        <div class="row">
        	<div class="col-12">
                <div class="tab_slider">
                	<div class="tab-pane fade show active" id="special" role="tabpanel" aria-labelledby="special-tab">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 8,
                                'meta_query'     => array(
                                    'relation' => 'OR',
                                    array( // Simple products type
                                        'key'           => '_sale_price',
                                        'value'         => 0,
                                        'compare'       => '>',
                                        'type'          => 'numeric'
                                    ))
                                );
                            $loop = new WP_Query( $args );
                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;
                                $product = get_product( get_the_ID() ); 
                                    //echo the_title();
                                    //echo get_the_post_thumbnail_url();
                                   // echo the_permalink();
                                   // woocommerce_template_loop_add_to_cart(); 
                                ?>
                                <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <?php echo $product->get_image();?>
                                        </a>
                                        
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <!--<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>-->
                                                <li> <div data-item_id="<?php the_ID();?>" data-action="alg-wc-wl-toggle" class="alg-wc-wl-btn add alg-wc-wl-thumb-btn alg-wc-wl-thumb-btn-abs alg-wc-wl-thumb-btn-loop" style="inset: 17px auto auto 17px; display: block;">
                                                            <div class="alg-wc-wl-view-state alg-wc-wl-view-state-add">
                                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="alg-wc-wl-view-state alg-wc-wl-view-state-remove">
                                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                                            </div>
                                                               
                                                     </div>
                                                </li>
                                                
   
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="#"><?php the_title();?></a></h6>
                                        <div class="product_price">
                                            <?php 
                                                if( $product->get_sale_price()){
                                                    ?>
                                                    <span class="price">$<?php echo $product->get_sale_price();?></span>
                                                        <del>$<?php echo $product->get_regular_price(); ?></del>
                                                        
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <span class="price">$<?php echo $product->get_regular_price();?></span>

                                                    <?php
                                                }
                                            ?>
                                            
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                                <?php 
                                endwhile;
                                   
                            } else {
                                echo __( 'No products found' );
                            }
                            wp_reset_postdata();
	                        ?>
                           
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 14,
                                'tax_query' => array( array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => 'best-sellers'
                                )
                                )
                                );
                            $loop = new WP_Query( $args );
                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;
                                $product = get_product( get_the_ID() ); 
                                    //echo the_title();
                                    //echo get_the_post_thumbnail_url();
                                   // echo the_permalink();
                                   // woocommerce_template_loop_add_to_cart(); 
                                ?>
                                <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <?php echo $product->get_image();?>
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <!--<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>-->
                                                <li> <div data-item_id="<?php the_ID();?>" data-action="alg-wc-wl-toggle" class="alg-wc-wl-btn add alg-wc-wl-thumb-btn alg-wc-wl-thumb-btn-abs alg-wc-wl-thumb-btn-loop" style="inset: 17px auto auto 17px; display: block;">
                                                            <div class="alg-wc-wl-view-state alg-wc-wl-view-state-add">
                                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="alg-wc-wl-view-state alg-wc-wl-view-state-remove">
                                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                                            </div>
                                                               
                                                     </div>
                                                </li>
                                                
   
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html"><?php the_title();?></a></h6>
                                        <div class="product_price">
                                            <?php 
                                                if( $product->get_sale_price()){
                                                    ?>
                                                    <span class="price">$<?php echo $product->get_sale_price();?></span>
                                                        <del>$<?php echo $product->get_regular_price(); ?></del>
                                                        
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <span class="price">$<?php echo $product->get_regular_price();?></span>

                                                    <?php
                                                }
                                            ?>
                                            
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                                <?php 

                            

                                endwhile;
                                   
                            } else {
                                echo __( 'No products found' );
                            }
                            wp_reset_postdata();
	                        ?>
                            
                        </div>
                    </div>
                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                        <div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                        <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => 14,
                                'tax_query' => array( array(
                                    'taxonomy' => 'product_tag',
                                    'field' => 'slug',
                                    'terms' => 'featured'
                                )
                                )
                                );
                            $loop = new WP_Query( $args );
                            if ( $loop->have_posts() ) {
                                while ( $loop->have_posts() ) : $loop->the_post();
                                global $product;
                                $product = get_product( get_the_ID() ); 
                                    //echo the_title();
                                    //echo get_the_post_thumbnail_url();
                                   // echo the_permalink();
                                   // woocommerce_template_loop_add_to_cart(); 
                                ?>
                                <div class="item">
                                <div class="product">
                                    <div class="product_img">
                                        <a href="shop-product-detail.html">
                                            <?php echo $product->get_image();?>
                                        </a>
                                        <div class="product_action_box">
                                            <ul class="list_none pr_action_btn">
                                                <!--<li class="add-to-cart"><a href="#"><i class="icon-basket-loaded"></i> Add To Cart</a></li>
                                                <li><a href="shop-compare.html" class="popup-ajax"><i class="icon-shuffle"></i></a></li>-->
                                                <li> <div data-item_id="<?php the_ID();?>" data-action="alg-wc-wl-toggle" class="alg-wc-wl-btn add alg-wc-wl-thumb-btn alg-wc-wl-thumb-btn-abs alg-wc-wl-thumb-btn-loop" style="inset: 17px auto auto 17px; display: block;">
                                                            <div class="alg-wc-wl-view-state alg-wc-wl-view-state-add">
                                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                                            </div>
                                                            <div class="alg-wc-wl-view-state alg-wc-wl-view-state-remove">
                                                                <i class="fas fa-heart" aria-hidden="true"></i>
                                                            </div>
                                                               
                                                     </div>
                                                </li>
                                                
   
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product_info">
                                        <h6 class="product_title"><a href="shop-product-detail.html"><?php the_title();?></a></h6>
                                        <div class="product_price">
                                            <?php 
                                                if( $product->get_sale_price()){
                                                    ?>
                                                    <span class="price">$<?php echo $product->get_sale_price();?></span>
                                                        <del>$<?php echo $product->get_regular_price(); ?></del>
                                                        
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                        <span class="price">$<?php echo $product->get_regular_price();?></span>

                                                    <?php
                                                }
                                            ?>
                                            
                                        </div>
                                        
                                       
                                    </div>
                                </div>
                            </div>
                                <?php 

                            

                                endwhile;
                                   
                            } else {
                                echo __( 'No products found' );
                            }
                            wp_reset_postdata();
	                        ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- END SECTION SHOP -->



<!-- START SECTION BANNER --> 
<div class="section pb_20 small_pt">
	<div class="container-fluid px-2">
    	<div class="row no-gutters">
        <?php 

                $argsSpecial = array(
                    'post_type' => 'special_cards',
                    'posts_per_page' => 3,
                    'post_status' => 'publish',
                        'orderby' => 'date', 
                        'order' => 'ASC'
                );
                $special = new WP_Query( $argsSpecial );
                while($special->have_posts()){
                    $special->the_post();
                    ?>
        	<div class="col-md-4">
            	<div class="sale_banner">
                	<a class="hover_effect1" href="<?php echo get_field('link'); ?>">
                		<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="shop_banner_img3">
                    </a>
                </div>
            </div>
            <?php
                }
            ?>
           
        </div>
    </div>
</div>
<!-- END SECTION BANNER --> 
<?php 

                $argsContact = array(
                    'post_type' => 'contact_details',
                    'posts_per_page' => 1,
                    'post_status' => 'publish',
                        'orderby' => 'date', 
                        'order' => 'ASC'
                );
                $contact = new WP_Query( $argsContact );
                while($contact->have_posts()){
                    $contact->the_post();
                    ?>
<div class='map'>
<iframe src="<?php echo get_field('map_url');?>" width="100" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
            

<?php 
                }
                            wp_reset_postdata();
	                        ?>

<script>
        const slides = document.querySelectorAll('.slide');
const next = document.querySelector('#next');
const prev = document.querySelector('#prev');
const auto = true; // Auto scroll
const intervalTime = 5000;
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