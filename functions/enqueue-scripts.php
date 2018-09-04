<?php
function site_scripts() {
  
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
  
  wp_register_script( 'slick',   get_template_directory_uri() . '/assets/scripts/vendors/slick.min.js', array('jquery'), '', true );
      
  // Adding scripts file in the footer
  wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery', 'slick' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
  
  // Adding theme-scripts file in the footer
  wp_enqueue_script( 'theme-js', get_template_directory_uri() . '/assets/scripts/theme-scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );  
  
  // Register main stylesheet
  wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );


 // Register main stylesheet
  wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/assets/styles/theme-styles.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );
  
  // Comment reply script for threaded comments
  if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
    wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

function admin_scripts(){
    wp_enqueue_script('cmb2-conditionals', get_template_directory_uri() . '/includes/libraries/js-cmb2-conditionals.js', array( 'jquery' ), '', true  );

}

add_action( 'admin_enqueue_scripts', 'admin_scripts' );