<?php

register_nav_menu( 'menu-topo', 'Menu superior' );

include get_stylesheet_directory() . '/widget.php';

function mbi_excerpt_length( $length ) {
  return 15;
}

add_filter( 'excerpt_length', 'mbi_excerpt_length', 999 );

add_action( 'widgets_init', mbi_featured_tabs_register()); //function(){

add_action( 'widgets_init', mbi_news_slider_register());

function mbi_news_slider_register(){
    register_widget( 'MBINewsSlider_Widget' );
}

function mbi_featured_tabs_register(){
    register_widget( 'MBIFeaturedTabs_Widget' );
}

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

/***
 *  Adding page builder support for visual style
 */

function fsdown_panels_row_styles($styles) {
    $styles['wide-blue'] = __('Wide Blue', 'fsdowntheme');
    return $styles;
}
add_filter('siteorigin_panels_row_styles', 'fsdown_panels_row_styles');


/***
 *  Registering noticias scroll sidebar
 */

register_sidebar(array(
  'name' => __( 'Noticias scroll sidebar' ),
  'id' => 'noticias',
  'description' => __( 'Sidebar que aparecerá na página interna de notícia' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));

/***
* Function to get the first image of a post - used in the blog
*/
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
    $first_img = "";
  }
  return $first_img;
}

?>
