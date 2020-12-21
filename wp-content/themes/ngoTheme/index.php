<?php 
get_header(); 
?>
<div class="body-container index-page">
    <div class="row-container">
        <?php 
            while(have_posts()){
                the_post(); 
                ?>
                    <div class="col-md-12">
                        <div class="section-title  t_center">
                            <!-- title -->
                                <h2><?php the_title();?></h2>						
                                <!-- IMAGE -->
                                <!-- TEXT -->
                        </div>	
                    </div>
                    <div>
                        <?php the_content();?>
                    </div>

                <?php
            }
        ?>
    </div>
</div>
    

<?php 
    get_footer();
?> 

