<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->
		
	</div><!-- #page -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-topo">
			<?php get_sidebar( 'sitemap-footer' ); ?>

			<?php get_sidebar( 'contato-footer' ); ?>
		</div>
		<div class="site-info">
			<span class="fundacao">2013 - Fundação Síndrome de Down</span>
			<span>fsdown@fsdown.org.br</span>
			<span>(19) 3289 2818</span>
			<a href="http://mupi.me" target="_blank" title="Mupi desenvolvimento" class="logo-mupi">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/mupi.png" alt="Mupi"/>
			</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
	<?php wp_footer(); ?>
	
</body>
</html>