<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Nb_flower
 */

get_header(); ?>
<?php if (nb_flower_get_option('hide_home_title')): ?>
	<div class="page-title-wrap">
		<div class="container">
			<?php 
				the_title( '<h1 class="page-entry-title">', '</h1>' ); 
			?>
			<?php if(function_exists('bcn_display')):?>
			<div class="page-breadcrumb">
				<?php esc_html_e('You are here: ', 'nb_flower'); ?><?php bcn_display(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>
<div class="container">
	<div class="row">
		<div class="page-head">
		</div><!-- .page-header -->
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
		if ( nb_flower_get_option('blog_layout') !== 'no-sidebar' && is_active_sidebar( 'blog-sidebar' )) {
			echo '<aside id="secondary" class="widget-area blog-sidebar" role="complementary">';
			dynamic_sidebar( 'blog-sidebar' );
			echo '</aside>';
		} ?>
	</div>
</div>
	

<?php
get_footer();
