<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="masthead" class="site-header" role="banner">
		<div id="navbar" class="navbar">
			<nav id="site-navigation" class="navigation main-navigation" role="navigation">
				<a id="logo" href="<?php echo home_url(); ?>" title="Fundação Síndrome de Down">
					<?php echo do_shortcode('[site_logo]'); ?>
				</a>
				<span class="slogan">Inclusão não é para maioria. Inclusão é total.</span>
				<h3 class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></h3>
				<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
				<div class="nav-menus">
				<?php wp_nav_menu( array( 'theme_location' => 'menu-topo', 
											'menu_class' => 'top-menu' ,
											'container'    => '' 
										)); ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 
											'menu_class'   => 'nav-menu',
											'container'    => ''
										) ); ?>
				</div>
				<?php get_search_form(); ?>
			</nav><!-- #site-navigation -->
		</div><!-- #navbar -->
	</header><!-- #masthead -->
	<div id="page" class="hfeed site">
		
		<div id="main" class="site-main">
