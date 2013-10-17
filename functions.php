<?php

register_nav_menu( 'menu-topo', 'Menu superior' );

include get_stylesheet_directory() . '/widget.php';

add_action( 'widgets_init', function(){
    register_widget( 'MBIDataTabs_Widget' );
  });

?>