<?php
/**
 * The template for artigos archive
 */

get_header(); ?>

<?php get_sidebar(); ?>

	<div id="primary" class="content-area page-single">
		<div id="content" class="site-content" role="main">
			<?php if (function_exists('HAG_Breadcrumbs')) { HAG_Breadcrumbs(array(
			  'excluded_taxonomies' => array(
			    'category'
			  )
			  
			)); } 
			?>

				<article id="post-<?php the_ID(); ?>">
					<header class="entry-header">
						<div class="entry-thumbnail">

						<?php if ( has_post_thumbnail() && ! post_password_required() ) { ?>				
							<?php the_post_thumbnail('full'); ?>
						<?php } else { ?>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/header-generico.jpg"/>
						<?php }; ?>

						</div>

						<h1 class="entry-title">Artigos</h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div> <!-- para ter o fundinho branco -->
							<ul>
								<?php while ( have_posts() ) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
								<?php endwhile; ?>		
							</ul>				
						</div>
					</div><!-- .entry-content -->

					<footer class="entry-meta">
						<?php edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-meta -->
				</article><!-- #post -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>