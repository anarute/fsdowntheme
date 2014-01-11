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

if ( is_active_sidebar( 'sociais' ) ) : ?>
	<div class="sidebar-sociais" role="complementary">
		<?php dynamic_sidebar( 'sociais' ); ?>
	</div><!-- #secondary -->
<?php endif; ?>