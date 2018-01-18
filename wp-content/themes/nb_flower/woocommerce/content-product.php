<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php post_class(); ?>>
	<?php
	/**
	 * woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

    echo '<div class="product-thumb">';
		/**
		* woocommerce_before_shop_loop_item_title hook.
		*
		* @hooked woocommerce_show_product_loop_sale_flash - 10
		* @hooked woocommerce_template_loop_product_thumbnail - 10
		*/
		do_action( 'woocommerce_before_shop_loop_item_title' );	
		
		echo '<div class="product-action-buttons">';
		/**
		* woocommerce_after_shop_loop_item hook.
		*
		* @hooked woocommerce_template_loop_product_link_close - 5
		* @hooked woocommerce_template_loop_add_to_cart - 10
		*/
		do_action( 'woocommerce_after_shop_loop_item' );
		echo '</div>'; // close product-action-buttons
	echo '</div>'; //close product-thumb
	echo '<div class="product-meta-wrap">';
		echo '<a href="' . esc_html(get_the_permalink()) . '">';
		/**
		* woocommerce_shop_loop_item_title hook.
		*
		* @hooked woocommerce_template_loop_product_title - 10
		*/
		do_action( 'woocommerce_shop_loop_item_title' );
		echo '</a>';
		
		/**
		* woocommerce_after_shop_loop_item_title hook.
		*
		* @hooked woocommerce_template_loop_rating - 5
		* @hooked woocommerce_template_loop_price - 10
		*/
		do_action( 'woocommerce_after_shop_loop_item_title' );

		echo '<div class="list-view-section">';
		/**
		* nb_flower_list_view_after_shop_loop_item_title hook.
		*
		*/
		do_action( 'nb_flower_list_view_after_shop_loop_item_title' );
		echo '</div>'; // close list-view-section
	echo '</div>'; // close product-meta-wrap
	?>
</li>
