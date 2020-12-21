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