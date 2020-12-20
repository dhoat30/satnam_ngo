<?php 
//custom post register

//custom post register


add_post_type_support( "sliders", "thumbnail" ); 

add_post_type_support( "special_cards", "thumbnail" ); 
add_post_type_support( "product_categories", "thumbnail" );
add_post_type_support( "shop-my-fav", "thumbnail" );
add_post_type_support( "shop_by_brand", "thumbnail" );

function register_custom_type2(){ 

   //sliders psot type
   register_post_type("sliders", array(
      "supports" => array("title", "page-attributes"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Sliders", 
         "add_new_item" => "Add New Slider", 
         "edit_item" => "Edit Slider", 
         "all_items" => "All Sliders", 
         "singular_name" => "Slider"
      ), 
      "menu_icon" => "dashicons-slides"   )
   ); 

   //loving post type
   register_post_type("special_cards", array(
      "supports" => array("title", "page-attributes"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Special Cards", 
         "add_new_item" => "Add New Special Card", 
         "edit_item" => "Edit Special Card", 
         "all_items" => "All Special Cards", 
         "singular_name" => "Special Card"
      ), 
      "menu_icon" => "dashicons-welcome-widgets-menus",
      'taxonomies'          => array('category')
   )
   );

   //blogs post type
   register_post_type("blogs", array(
      'show_in_rest' => true,
      "supports" => array("title", "page-attributes", 'editor'), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Blogs", 
         "add_new_item" => "Add New Blog", 
         "edit_item" => "Edit Blog", 
         "all_items" => "All Blogs", 
         "singular_name" => "Blog"
      ), 
      "menu_icon" => "dashicons-welcome-write-blog",
      'taxonomies'          => array('category')
   )
   );

   //loving post type
   register_post_type("product_categories", array(
      "supports" => array("title", "page-attributes"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Product Categories", 
         "add_new_item" => "Add New Product Category", 
         "edit_item" => "Edit Product Category", 
         "all_items" => "All Product Categories", 
         "singular_name" => "Product Category"
      ), 
      "menu_icon" => "dashicons-welcome-write-blog"
   )
   );
   
   //shop by brand page post type
   register_post_type("contact_details", array(
      "supports" => array("title", "page-attributes"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Contact Details", 
         "add_new_item" => "Add New Contact Detail", 
         "edit_item" => "Edit Contact Detail", 
         "all_items" => "All Contact Details", 
         "singular_name" => "Contact Detail"
      ), 
      "menu_icon" => "dashicons-location
      "
   )
   );
   

}

add_action("init", "register_custom_type2"); 



//custom taxonomy
function wpdocs_register_private_taxonomy() {
   $args = array(
       'label'        => __( 'favorite', 'textdomain' ),
       'public'       => true,
       'rewrite'      => true,
       'hierarchical' => true
   );
   $argsSlider = array(
      'label'        => __( 'hero-section-slider', 'textdomain' ),
      'public'       => true,
      'rewrite'      => true,
      'hierarchical' => true
  );
    
   register_taxonomy( 'favorite', 'shop-my-fav', $args );
   register_taxonomy( 'hero-section-slider', 'sliders', $argsSlider );
}
add_action( 'init', 'wpdocs_register_private_taxonomy', 0 );




