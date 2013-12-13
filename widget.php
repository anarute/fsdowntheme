<?php

/**
 * Featured pages tabs
 */

class MBIFeaturedTabs_Widget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'datatabs_widget', // Base ID
      __('Destaques em Abas', 'text_domain'), // Name
      array( 'description' => __( 'Widget da Home para exibir destaques '
                                  . ' em abas', 
                                  'text_domain' ), ) // Args
    );
    $this->mbi_enqueue_styles();
  }

  public function widget( $args, $instance ) {

    echo $args['before_widget'];
    echo __( $this->render(), 'text_domain' );
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    // outputs the options form on admin
    echo "whee!";
  }

  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
    echo "submitting";
  }


  function render (){
    $headers = array();
    $bodies = array();

    //die(print_r(get_option('sticky_posts'), true);

    $posts = new WP_Query( array('post_type' => 'aba', 'posts_per_page' => '4'));

    while ($posts->have_posts()) { 
      $posts->the_post();
      // Cria um heaer
      $headers[$posts->post->ID] = $this->render_tab_header($posts);
      // Cria um body
      $bodies[$posts->post->ID] = $this->render_tab_body($posts);
    }
    
    //echo "<h3 class='widget-title featured-tabs-widget-title'>Destaques</h3>";
    echo "<div id='featured-tabs-widget'>";
    echo "<ul class='featured-tabs-menu'>";
    foreach($headers as $header){
      echo $header;
    }
    echo "</ul>";
    echo "<div id='featured-tabs-content-wrapper'>";
    foreach($bodies as $body){
      echo $body;
    }
    echo "</div>";      
    echo "</div>";
  } 

  function render_tab_header($posts){
    $result  = "<li class='featured-tabs-menu-item'><a href='#tab-". $posts->post->ID . "'>";
    $result .= get_the_post_thumbnail( $posts->post->ID , array(40,40) );
    $result .= get_the_title();
    $result .= "</a></li>";
    return $result;
  }
  
  function render_tab_body($posts){
    $content = apply_filters('the_content', get_the_content());
    $content = str_replace(']]>', ']]&gt;', $content);

    $result  = "<div class='featured-tabs-post' id='tab-" . $posts->post->ID . "'>";
    //$result .= get_the_content();
    $result .= $content;
    $result .= "</div>";
    return $result;
  }


  function mbi_enqueue_scripts(){
    
  }

  function mbi_enqueue_styles(){
    wp_register_style( 'mbi_featured_tabs_style', get_stylesheet_directory_uri() . '/css/featured-tabs.css' );
    wp_enqueue_style( 'mbi_featured_tabs_style');
  }
}

/**
 * News widget
 */

class MBINewsSlider_Widget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'newsslider_widget', // Base ID
      __('Últimas notícias slider', 'text_domain'), // Name
      array( 'description' => __( 'Widget da Home para exibir as últimas notícias' 
                                  . 'em um slider', 
                                  'text_domain' ), ) // Args
    );
    
    add_image_size( 'news-slider', 195, 130, true ); 

    $this->mbi_enqueue_styles();
    $this->mbi_enqueue_scripts();
  }

  public function widget( $args, $instance ) {

    echo $args['before_widget'];
    echo __( $this->news_slider_render(), 'text_domain' );
    echo $args['after_widget'];
  }

  public function form( $instance ) {
    // outputs the options form on admin
  }

  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }


  function news_slider_render (){
    $news = array();

    $posts = new WP_Query( array(
      'category_name' => 'noticias', 
      'posts_per_page' => '9' )
    );
    
    //die(print_r($posts, true));

    while ($posts->have_posts()) { 
      $posts->the_post();
      // Cria um item de notícia
      $news[$posts->post->ID] = $this->render_news_item($posts);
    }
    echo "<h2 class='widget-title new-slider-widget-title'>Notícias</h2>";
    echo "<div id='news-slider-widget'>";
    echo "<div class='news-slider-controls-wrapper'>";
    echo "<a id='news-slider-slide-left' href='#slide-left'><</a> &nbsp; ";
    echo "<a id='news-slider-slide-right' href='#slide-right'>></a>";
    echo "</div>";
    echo "<div id='news-slider-wrapper'>";
    echo "<ul class='news-slider-items'>";
    foreach($news as $new){
      echo $new;
    }
    echo "</ul>";
    echo "</div>";
    echo "</div>";
  } 

  function render_news_item($posts){
    $thumb_options = array(
      'class' => 'news-slider-widget-thumbnail',

    );
      
    $result  = "<li class='news-slider-item'>";
    $result .= "<h3 class='news-slider-item-title'>";
    $result .= "<a class='news-slider-item-link' href='" 
      . get_permalink() . "'>";
    $result .= get_the_title() . "</a>";
    $result .= "</h3>";
    /*$result .= get_the_post_thumbnail($posts->post->ID, 
                                      'thumbnail', 
                                      $thumb_options);*/
    $result .= "<div class='news-slider-item-excerpt'>" 
      . get_the_excerpt() . "</div>";
    $result .= "<div class='news-slider-item-read-all'>";
    $result .= "<a class='news-slider-item-link-read-more' href='" 
      . get_permalink() . "'>";
    $result .= "Ler tudo</a>";
    $result .= "</div>";
    $result .= "</li>";
    return $result;
  }
  
  function mbi_enqueue_scripts(){
    wp_enqueue_script('jquery');
    
    wp_register_script( 'mbi_news_slider_script', get_stylesheet_directory_uri() . '/js/news-slider.js' );
    wp_enqueue_script( 'mbi_news_slider_script' );
  }

  function mbi_enqueue_styles(){
    wp_register_style( 'mbi_news_slider_style', get_stylesheet_directory_uri() . '/css/news-slider.css' );
    wp_enqueue_style( 'mbi_news_slider_style');
  }
}

?>
