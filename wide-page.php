<?php
/*
Template Name: Página sem sidebar
*/

/**
 * The template for displaying pages without sidebar.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area page-wide">
		<div id="content" class="site-content" role="main">
			<?php if (function_exists('HAG_Breadcrumbs')) { HAG_Breadcrumbs(array(
			  'excluded_taxonomies' => array(
			    'category'
			  )
			  
			)); } 
			?>
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>">
					<header class="entry-header">
						<div class="entry-thumbnail">

						<?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>				
							<?php the_post_thumbnail('full'); ?>
						<?php } else { ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-generico.jpg"/>
						<?php }; ?>

						</div>

						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div> <!-- para ter o fundinho branco -->
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
						</div>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

				<?php comments_template(); ?>
			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>