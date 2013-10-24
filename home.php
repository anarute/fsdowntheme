<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage fsdown
 * @since Fsdown Theme 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php if (function_exists('HAG_Breadcrumbs')) { HAG_Breadcrumbs(); } ?>
		<?php if ( have_posts() ) : ?>
		
			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'news-post' ); ?>>
					<?php
						if ( get_the_post_thumbnail($post_id) != '' ) {

						  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
						   the_post_thumbnail();
						  echo '</a>';

						} else {

						 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
						 echo '<img src="';
						 echo catch_that_image();
						 echo '" alt="" />';
						 echo '</a>';

						}
					?>
					<div class="excerpt-wrapper">
						<header class="entry-header">

							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
						</header><!-- .entry-header -->

						<div class="entry-summary">
							<?php the_excerpt(); ?>
						</div>
					</div>
					
				</article><!-- #post -->

			<?php endwhile; ?>

			<?php twentythirteen_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>