<?php
/**
 * The Template for displaying all single posts.
 *
 */

get_header(); ?>

	<div id="primary" class="content-area post-single">

		<?php if (function_exists('HAG_Breadcrumbs')) { HAG_Breadcrumbs(array(
			  'excluded_taxonomies' => array(
			    'category'
			  )
			  
			)); } 
		?>


		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">

						<?php if ( is_single() ) : ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
						<?php else : ?>
						<h1 class="entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
						</h1>
						<?php endif; // is_single() ?>

					</header><!-- .entry-header -->

					<?php if ( is_search() ) : // Only display Excerpts for Search ?>
					<div class="entry-summary">
						<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->
					<?php else : ?>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
					</div><!-- .entry-content -->
					<?php endif; ?>

					<?php get_sidebar( 'noticias' ); ?>

					<footer class="entry-meta">
						<?php if ( comments_open() && ! is_single() ) : ?>
							<div class="comments-link">
								<?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( 'View all % comments', 'twentythirteen' ) ); ?>
							</div><!-- .comments-link -->
						<?php endif; // comments_open() ?>

						<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
							<?php get_template_part( 'author-bio' ); ?>
						<?php endif; ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post --> 

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>