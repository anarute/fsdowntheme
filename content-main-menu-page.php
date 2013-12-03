<?php
/**
 * The template for displaying posts in the Aside post format
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<div id="post-<?php the_ID(); ?>" 
    <?php post_class(); ?>>
  <h4 class="">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h4>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div><!-- .entry-summary -->
</div>
