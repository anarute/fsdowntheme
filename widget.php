<?php

class MBIFeaturedTabs_Widget extends WP_Widget {
  public function __construct() {
    parent::__construct(
      'datatabs_widget', // Base ID
      __('Conteúdo em Abas', 'text_domain'), // Name
      array( 'description' => __( 'Widget da Home para exibir conteúdo '
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
  }

  public function update( $new_instance, $old_instance ) {
    // processes widget options to be saved
  }


  function render (){
    $headers = array();
    $bodies = array();

    $posts = new WP_Query( array('posts_per_page' => '5' ));

    while ($posts->have_posts()) { 
      $posts->the_post();
      // Cria um heaer
      $headers[$posts->post->ID] = $this->render_tab_header($posts);
      // Cria um body
      $bodies[$posts->post->ID] = $this->render_tab_body($posts);
    }
    
    echo "<div id='data-tabs-widget'>";
    echo "<ul>";
    foreach($headers as $header){
      echo $header;
    }
    echo "</ul>";
    echo "<div>";
    foreach($bodies as $body){
      echo $body;
    }
    echo "</div>";      
    echo "</div>";
  } 

  function render_tab_header($posts){
    $result  = "<li><a href='#tab-". $posts->post->ID . "'>";
    $result .= get_the_title();
    $result .= "</a></li>";
    return $result;

  }
  
  function render_tab_body($posts){
    $result  = "<div id='tab-" . $posts->post->ID . "'>";
    $result .= get_the_content();
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

?>
