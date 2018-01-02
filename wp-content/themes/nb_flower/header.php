<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Nb_flower
 */
	global $nb_flower_options;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url('http://gmpg.org/xfn/11'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body dir="rtl" <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php /*$data = $nb_flower_options['header_blocker'];*/
		$header = get_field('choice_header');
		switch ($header) {
			case 'default':
				echo get_template_part( 'headers/header', 'default' );
				break;
			case 'header4':
				echo get_template_part( 'headers/header', 'home4' );
				break;
			case 'header5':
				echo get_template_part( 'headers/header', 'home5' );
				break;		
			default: 
				echo get_template_part( 'headers/header', 'default' );
				break;
		}
	?>
	<div id="content" class="site-content">