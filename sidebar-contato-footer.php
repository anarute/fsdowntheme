<?php
/**
 * The sidebar containing the footer widget area.
 *
 * If no active widgets in this sidebar, it will be hidden completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'contato-footer' ) ) : ?>
	<div id="secondary" class="sidebar-container contato-footer" role="complementary">
		<div class="widget-area">
			<?php dynamic_sidebar( 'contato-footer' ); ?>
		</div><!-- .widget-area -->
	</div><!-- #secondary -->
<?php endif; ?>