<?php
/**
 * The sidebar containing the posts scroll widget
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'noticias' ) ) : ?>
	<div class="sidebar-noticias" role="complementary">
		<div class="widget-wrapper">
			<?php dynamic_sidebar( 'noticias' ); ?>
		</div><!-- .widget-area -->
	</div><!-- #secondary -->
<?php endif; ?>