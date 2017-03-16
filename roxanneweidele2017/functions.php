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
?>