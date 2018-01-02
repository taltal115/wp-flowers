<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Nb_flower
 */

get_header(); ?>
<?php if (nb_flower_get_option('hide_home_title')): ?>
	<div class="page-title-wrap">
		<div class="container">
			<?php 
				the_archive_title( '<h1 class="page-entry-title">', '</h1>' ); 
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
			<?php		
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</div><!-- .page-header -->

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			
				<?php
				if ( have_posts() ) : ?>

					

					<?php
					/* Start the Loop */
					while ( have_posts() ) : the_post();

						/*
						* Include the Post-Format-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Format name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', get_post_format() );

					endwhile;

					nb_flower_paging_nav();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;?>
				
				
			
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
