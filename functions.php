<?php

register_nav_menu( 'menu-topo', 'Menu superior' );

register_nav_menu( 'como-ajudar-pf', 'Como ajudar pessoa física' );
register_nav_menu( 'como-ajudar-pj', 'Como ajudar pessoa jurídica' );

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


add_filter('siteorigin_panels_row_classes', 'siteorigin_panels_row_classes');

/** Adding filter to grid class */
function siteorigin_panels_row_classes ($grid_classes){
  global $post;
  
  $panels_data = get_post_meta( $post->ID, 'panels_data', true );
  $panels_data = apply_filters( 'siteorigin_panels_data', $panels_data, $post->ID );
  if(!empty($panels_data)){
    $grid_class = 'panel-grid-' . $panels_data['grids'][0]['style'];
    $grid_classes = array_merge($grid_classes, array($grid_class));
    return $grid_classes;
  } else {
    return $grid_classes;
  }
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
    $styles['simple'] = __('Simple', 'fsdowntheme');
    $styles['double'] = __('Double', 'fsdowntheme');
    return $styles;
}
add_filter('siteorigin_panels_row_styles', 'fsdown_panels_row_styles');

function fsdown_panels_row_styles_wide($styles) {
    $styles['wide'] = __('Wide', 'fsdowntheme');
    return $styles;
}
add_filter('siteorigin_panels_row_styles', 'fsdown_panels_row_styles_wide');


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

register_sidebar(array(
  'name' => __( 'Slider home' ),
  'id' => 'home',
  'description' => __( 'Sidebar para inserir o slider na home' ),
  'before_title' => '<h1>',
  'after_title' => '</h1>'
));

register_sidebar(array(
  'name' => __( 'Sitemap footer' ),
  'id' => 'sitemap-footer',
  'description' => __( 'Sitemap que é exibido no footer' ),
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
