<?php 
get_header(); 
?>

<!-- BLOG AREA START -->
<div class="donation-page astute-blog-area astute-blog-single em-single-page-comment single-blog-details">
	<div class="container">				
		<div class="row">	
        <?php 
            while(have_posts()){
                the_post(); 
                $eventDate = new DateTime(get_field('event_date'));
                $url = get_the_permalink();
                ?>
                    <div class="section-title1">
                        <h2><?php echo get_the_title();?></h2>
                        
                    </div>
                    <div>
                        <?php the_content(); 
                            echo do_shortcode('[wc_woo_donation id="91"]');
                        ?>
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