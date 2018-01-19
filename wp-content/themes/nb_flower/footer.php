<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Nb_flower
 */
	global $nb_flower_options;
?>
	</div><!-- #content -->
	
	<div class="clear"></div>

	<footer dir="rtl" id="colophon" class="site-footer" >
		<?php 
		// $footer = $nb_flower_options['footer_layout'];
		$footer = get_field('choice_footer');
		switch ($footer) {
			case 'default':
				echo get_template_part( 'footers/footer', 'default' );
				break;
			case 'footer4':
				echo get_template_part( 'footers/footer', 'home4' );
				break;
			case 'footer5':
				echo get_template_part( 'footers/footer', 'home5' );
				break;
			default: 
				echo get_template_part( 'footers/footer', 'default' );
				break;
		}
	?>
	</footer><!-- #colophon -->
	
</div><!-- #page -->

<div id="btt"><i class="fa fa-chevron-up"></i></div>

<?php wp_footer(); ?>

</body>
</html>