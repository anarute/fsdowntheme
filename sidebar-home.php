<?php

if ( is_active_sidebar( 'home' ) ) : ?>
	<div class="sidebar-home" role="complementary">
		<div class="widget-wrapper">
			<?php dynamic_sidebar( 'home' ); ?>
		</div><!-- .widget-area -->
	</div><!-- #secondary -->
<?php endif; ?>