<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nb_flower
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php nb_flower_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</div><!-- .entry-header -->

	<?php if(has_post_thumbnail()) {
		echo '<div class="entry-thumb">';
		if(!is_single()) {
			echo '<a href="' . esc_url(get_the_permalink()) . '">';
		}
		the_post_thumbnail( 'blog-thumb' );
		if(!is_single()) {
			echo '</a>';
		}
		echo '</div>';
	}?>
	

	<div class="entry-content">
		<?php the_excerpt();?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
