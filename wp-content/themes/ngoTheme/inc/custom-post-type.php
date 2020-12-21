<?php 
//custom post register

//custom post register


add_post_type_support( "sliders", "thumbnail" ); 

add_post_type_support( "news", "thumbnail" ); 
add_post_type_support( "events", "thumbnail" );
add_post_type_support( "programs", "thumbnail" );
add_post_type_support( "teammates", "thumbnail" );

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
   register_post_type("news", array(
      'show_in_rest' => true,
      "has_archive" => true,
      "supports" => array("title", "page-attributes", 'editor'), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "News", 
         "add_new_item" => "Add New News", 
         "edit_item" => "Edit News", 
         "all_items" => "All News", 
         "singular_name" => "News"
      ), 
      "menu_icon" => "dashicons-welcome-widgets-menus"
   )
   );
   //news post type
   register_post_type("events", array(
      'show_in_rest' => true,
      "has_archive" => true,
      "supports" => array("title", "page-attributes", "editor"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Events", 
         "add_new_item" => "Add New Event", 
         "edit_item" => "Edit Event", 
         "all_items" => "All Events", 
         "singular_name" => "Event"
      ), 
      "menu_icon" => "dashicons-welcome-write-blog"
   )
   );
   //blogs post type
   register_post_type("programs", array(
      'show_in_rest' => true,
      "has_archive" => true,
      "supports" => array("title", "page-attributes", 'editor'), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Programs", 
         "add_new_item" => "Add New Program", 
         "edit_item" => "Edit Program", 
         "all_items" => "All Programs", 
         "singular_name" => "Program"
      ), 
      "menu_icon" => "dashicons-hammer"
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

    //blogs post type
    register_post_type("teammates", array(
      'show_in_rest' => true,
      "supports" => array("title"), 
      "public" => true, 
      "show_ui" => true, 
      "hierarchical" => true,
      "labels" => array(
         "name" => "Teammates", 
         "add_new_item" => "Add New Teammate", 
         "edit_item" => "Edit Teammate", 
         "all_items" => "All Teammates", 
         "singular_name" => "Teammate"
      ), 
      "menu_icon" => "dashicons-admin-users"
   )
   );
   

}

add_action("init", "register_custom_type2"); 



//custom taxonomy
function wpdocs_register_private_taxonomy() {
   $args = array(
       'label'        => __( 'Programs Category', 'textdomain' ),
       'public'       => true,
       'rewrite'      => true,
       'hierarchical' => true
   );
   $argsSlider = array(
      'label'        => __( 'Slider Category', 'textdomain' ),
      'public'       => true,
      'rewrite'      => true,
      'hierarchical' => true
  );
  $argsEvents = array(
   'label'        => __( 'Events Category', 'textdomain' ),
   'public'       => true,
   'rewrite'      => true,
   'hierarchical' => true
);
$argsNews = array(
   'label'        => __( 'News Category', 'textdomain' ),
   'public'       => true,
   'rewrite'      => true,
   'hierarchical' => true
);
    
   register_taxonomy( 'Programs Category', 'programs', $args );
   register_taxonomy( 'news-category', 'news', $argsNews );
   register_taxonomy( 'events-category', 'events', $argsEvents );
   register_taxonomy( 'sliders', 'sliders', $argsSlider );
}
add_action( 'init', 'wpdocs_register_private_taxonomy', 0 );




