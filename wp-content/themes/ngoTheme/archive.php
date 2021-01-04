<?php 
get_header(); 
?>
<!-- News -->
<div class="archive margin-50" id="archive">
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<div class="section-title  t_center">
						<!-- title -->
							<h2>Achievements & News</h2>						
							<!-- IMAGE -->
							<!-- TEXT -->
					</div>	
				</div>	
			</div>
			<div class="row title-margin">
				<div class="news">
                    <?php 

                   
                    
                    while(have_posts()){
                        the_post();
                        ?>

                        <?php 
                        
                        ?>			
					<div class="col-md-12">			
						<div class="astute-single-blog_adn ">					
						<!-- BLOG THUMB -->
							<div class="blog_adn_thumb_inner">
								<div class="astute-blog-thumb_adn ">
									<a href="single-blog.html">
                                        <?php 
                                        if(get_field('link')){
                                            ?>
                                            <img src="<?php echo get_the_post_thumbnail_url(null, 'medium');?>"  alt="blog1">
                                            <?php
                                        }
                                        else{
                                           the_content();
                                        }
                                        ?>
										
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

    

<?php 
    get_footer();
?> 

