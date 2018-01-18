<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Nb_flower
 */

get_header(); ?>
<div class="container">
	<div class="row">
		<div class="page-head">
			<!-- <?php if( $blog_top_banner = nb_flower_get_option('blog_top_banner', false, 'url') ) {
				echo '<img src="' . esc_url($blog_top_banner) . '" />';
			}?> -->
		</div>
		<section id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
            $args = array('post_type' => array('post'),'post_status' => 'any', 's' => get_search_query());
            $posts = new WP_Query($args);
			if ( $posts->have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'nb_flower' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( $posts->have_posts() ) : $posts->the_post();

					/**
					* Run the loop for the search to output the results.
					* If you want to overload this in a child theme then include a file
					* called content-search.php and that will be used instead.
					*/
					get_template_part( 'template-parts/content', 'search' );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->
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
