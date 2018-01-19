<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Nb_flower
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container">
				<img src="<?php echo get_template_directory_uri(); ?>/images/404.png" alt="404">
				<div class="text-wrap">
					<h1><?php esc_html_e('sorry page not found', 'nb_flower'); ?></h1>
					<p><?php esc_html_e('The page are looking for is not available or has been removed.', 'nb_flower'); ?></p>
					<p><?php
					printf(wp_kses( __('Try going to <a href="%s">home page</a> by using the button below', 'nb_flower'), array('a' => array('href' => array())) ), home_url())
					?></p>
				</div>
				<p class="home-link"><a href="<?php echo esc_url(home_url()); ?>"><span class="icon-home"><?php esc_html_e('go to home', 'nb_flower'); ?></span></a></p>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
