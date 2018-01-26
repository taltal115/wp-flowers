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
					<h1><?php esc_html_e('סליחה, העמוד לא נמצא!', 'nb_flower'); ?></h1>
					<p><?php esc_html_e('הדף שחיפשת אינו זמין או שהוסר.', 'nb_flower'); ?></p>
					<p><?php
					printf(wp_kses( __('נסה לחזור ל <a href="%s">דף הבית</a> בעזרת הכפתור למטה.', 'nb_flower'), array('a' => array('href' => array())) ), home_url())
					?></p>
				</div>
				<p class="home-link"><a href="<?php echo esc_url(home_url()); ?>"><span class="icon-home"><?php esc_html_e('חזור לדף הבית', 'nb_flower'); ?></span></a></p>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
