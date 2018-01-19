<?php
/**
 * Template part for displaying posts.
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
		<?php if(is_single()):
			the_content();
			if ( '' != get_the_post_thumbnail( $post->ID ) ) {
				$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
				$pinImage = $pinterestimage[0];
			} else {
				$pinImage = '';
			}
			?>
			<div class="blog-social-share">
				<div class="social-button">
					<?php echo  '<span class="icon icon-facebook"><a rel="nofollow" href="http://www.facebook.com/sharer.php?u='. urlencode(get_permalink( $post->ID )) .'&amp;t='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" >Share</a></span>';?>
				</div>
				<div class="social-button">
					<?php echo  '<span class="icon icon-twitter"><a rel="nofollow" href="http://twitter.com/share?text='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;url='.  urlencode(get_permalink( $post->ID )) .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" >Tweet</a></span>' ;?>
				</div>
				<div class="social-button">
					<?php echo  '<span class="icon icon-pinterest"><a rel="nofollow" href="http://pinterest.com/pin/create/bookmarklet/?url='. urlencode(get_permalink( $post->ID )) .'&amp;media='. esc_attr($pinImage).'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;">Pin it</a></span>';?>
				</div>
				<div class="social-button">
					<?php echo  '<span class="icon icon-gplus"><a rel="nofollow" href="https://plus.google.com/share?url='. urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;source='. esc_url( home_url( '/' )) .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;">Share</a></span>' ;?>
				</div>
			</div>
			<?php
			wp_link_pages( array(
				'before' => '<div class="single-page-links">' . esc_html( 'Pages:', 'nb_flower' ),
				'after'  => '</div>',
			) );
			?>
			<?php elseif(is_home()):
			the_content();
			else:
			the_excerpt();
			endif;
		?>
	</div><!-- .entry-content -->
	<?php
	if (is_home()) {
		echo '<div class="entry-meta-footer">';
			echo '<span class="meta-category">';
			esc_html_e('Category: ', 'nb_flower');
			the_category(', ');
			echo '</span>';
			echo '<span class="meta-tag">';
			the_tags();
			echo '</span>';
		echo '</div>';
	}
	?>
	
</article><!-- #post-## -->
