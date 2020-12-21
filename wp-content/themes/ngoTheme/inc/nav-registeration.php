<?php 
 //add nav menu
 function liquorhut_config(){ 
    register_nav_menus( 
       array(
           "main-navbar" => "Main Navbar",
          "footer-useful-links" => 'Footer Help Links'

       )
       );  

       add_theme_support( "title-tag");
       
         add_post_type_support( "gd_list", "thumbnail" );      
  }
 
  add_action("after_setup_theme", "liquorhut_config", 0);
?>