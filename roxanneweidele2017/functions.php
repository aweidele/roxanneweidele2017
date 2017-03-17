<?php
/*** ADD SCRIPTS AND STYLES ***/
function rw_scripts() {
  // styles
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond:300|Open+Sans:300' );
  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/main.css' );
  //wp_enqueue_style( 'main-style', get_stylesheet_uri() );
  
  // scripts
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/inc/script.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'rw_scripts' );

/*** ADD MENUS ***/
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
  //register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );
}

/*** IMAGE SIZES ***/
add_theme_support('post-thumbnails');
add_image_size('Homepage Thumbnail',265,9999);
add_image_size('Homepage Mobile Thumbnail',210,210,true);
add_image_size('Mobile Max',668,668);
add_image_size('XLarge',2000,2000);
add_image_size('Large',1600,99999);
add_image_size('Med',1200,99999);
add_image_size('Small',800,99999);
?>