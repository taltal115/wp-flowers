<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nb_flower
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php if (nb_flower_get_option('hide_home_title')): ?>
			<div class="page-title-wrap">
				<div class="container">
					<h1 class="page-entry-title">
						<?php echo esc_html(get_the_title()); ?>
					</h1>
					<?php if(function_exists('bcn_display')):?>
					<div class="page-breadcrumb">
						<?php esc_html_e('אתה כאן: ', 'nb_flower'); ?><?php bcn_display(); ?>
					</div>
					<?php endif; ?>
				</div>				
			</div>
			<?php endif; ?>
			<div class="container">
					<div class="row">					
					<?php 
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
				</div>
			</div>			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
