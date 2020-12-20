<?php 
get_header();
?>
<div class="section small_pt pb_70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Specials</h2>
                </div>
            </div>
		</div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center special-page-nav" id="filters" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="arrival-tab" data-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true" data-filter="*">ALL</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sellers-tab" data-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false" data-filter=".beer">Beer</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="featured-tab" data-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false" data-filter=".wine">Wine</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false" data-filter=".spirits">Spirit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="special-tab" data-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false" data-filter=".rtds">RTD's</a>
                            </li>
                        </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div class="row shop_container special-page-product" id="grid">
                
               



                            <?php
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => -1,
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

                                //category name
                                $cat = strip_tags($product->get_categories());
                                $cat = strtolower($cat); 
                                $cat = str_replace(array(","), " ", $cat);
                                $cat = str_replace(array("rtd's"), "rtds", $cat);
                                

                                ?>
                                <h6  class="col-lg-3 col-md-4 col-6 <?php echo $cat;?>">
                                    
                                        <div class="product">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <?php echo $product->get_image();?>                                        </a>
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
                                                <h5 class="product_title"><a href="#"><?php the_title();?></a></h5>
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
                                   
                                    
                                </h6>

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
                               
                        
   

 



<?php get_footer(); 

?>