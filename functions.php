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


/***
 * Stuff to run when theme is activated
 */

add_action( 'load-themes.php', 'mbi_fsdown_theme_init' );
function mbi_fsdown_theme_init(){
  global $pagenow;

  if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) ){ // Test if
                                                                  // theme is
                                                                  // activate
    term_exists('noticias', 'category');
    if ($term == 0 || $term == null) { //Category exists
      wp_insert_term(
        'Notícias',
        'category',
        array(
          'description'=> 'Notícias',
          'slug' => 'noticias'
        )
      );  
    }
  }
}

?>