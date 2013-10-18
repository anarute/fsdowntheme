<?php

register_nav_menu( 'menu-topo', 'Menu superior' );

include get_stylesheet_directory() . '/widget.php';

function mbi_excerpt_length( $length ) {
  return 15;
}
add_filter( 'excerpt_length', 'mbi_excerpt_length', 999 );

add_action( 'widgets_init', function(){
    register_widget( 'MBIFeaturedTabs_Widget' );
  });

add_action( 'widgets_init', function(){
    register_widget( 'MBINewsSlider_Widget' );
  });

?>