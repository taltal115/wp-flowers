<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
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
 * @version 3.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

do_action( 'woocommerce_before_cart' ); ?>

<form action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post" class="cart-form">
<div class="cart-top-section">
	<span><?php esc_html_e('shopping cart', 'nb_flower'); ?></span>
	<span>(<?php echo WC()->cart->get_cart_contents_count(); ?>)</span>
	<span>
		<a href="<?php echo esc_url(get_permalink( woocommerce_get_page_id( 'shop' ) ));?>"><?php esc_html_e('continue shopping', 'nb_flower'); ?></a>
		<i class="icon-right-circled"></i>
	</span>
	<?php if($cart_notice = nb_flower_get_option('cart_notice') ):?>
	<p>
		<?php
		echo wp_kses($cart_notice, array(
			'a' => array(
				'href' => array(),
				'title' => array(),
			),
		)); ?>
	</p>
	<?php endif;?>
</div>
<?php do_action( 'woocommerce_before_cart_table' ); ?>

<table class="shop_table shop_table_responsive cart" cellspacing="0">
	<thead>
		<tr>
			<th class="product-thumbnail"><?php esc_html_e( 'Product', 'nb_flower' ); ?></th>
			<th class="product-price"><?php esc_html_e( 'Price', 'nb_flower' ); ?></th>
			<th class="product-quantity"><?php esc_html_e( 'Quantity', 'nb_flower' ); ?></th>
			<th class="product-subtotal"><?php esc_html_e( 'Total', 'nb_flower' ); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php do_action( 'woocommerce_before_cart_contents' ); ?>

		<?php
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
			$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
				?>
				<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

					<td class="product-meta">
						<div class="product-thumbnail">
						<?php
							$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

							if ( ! $product_permalink ) {
								printf( '%s', $thumbnail );
							} else {
								printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
							}
						?>
						<?php
							echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
								'<a href="%s" class="remove" title="%s" data-product_id="%s" data-product_sku="%s"><i class="icon-cancel"></i></a>',
								esc_url( WC()->cart->get_remove_url( $cart_item_key ) ),
								esc_html__( 'Remove this item', 'nb_flower' ),
								esc_attr( $product_id ),
								esc_attr( $_product->get_sku() )
							), $cart_item_key );
						?>
						</div>
						
						<div class="product-name">
						<?php
							if ( ! $product_permalink ) {
								echo apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key ) . '&nbsp;';
							} else {
								echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<h2><a href="%s">%s</a></h2>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key );
							}

							// Meta data
							echo WC()->cart->get_item_data( $cart_item );

							// Backorder notification
							if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
								echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'nb_flower' ) . '</p>';
							}
						?>
						</div>
					</td>

					<td class="product-price" data-title="<?php esc_html_e( 'Price', 'nb_flower' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
						?>
					</td>

					<td class="product-quantity" data-title="<?php esc_html_e( 'Quantity', 'nb_flower' ); ?>">
						<?php
							if ( $_product->is_sold_individually() ) {
								$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
							} else {
								$product_quantity = woocommerce_quantity_input( array(
									'input_name'  => "cart[{$cart_item_key}][qty]",
									'input_value' => $cart_item['quantity'],
									'max_value'   => $_product->backorders_allowed() ? '' : $_product->get_stock_quantity(),
									'min_value'   => '0'
								), $_product, false );
							}

							echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item );
						?>
					</td>

					<td class="product-subtotal" data-title="<?php esc_html_e( 'Total', 'nb_flower' ); ?>">
						<?php
							echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );
						?>
					</td>
				</tr>
				<?php
			}
		}

		do_action( 'woocommerce_cart_contents' );
		?>

		<?php do_action( 'woocommerce_after_cart_contents' ); ?>
	</tbody>
</table>
<div class="cart-table-bot-section clear">
<?php if ( wc_coupons_enabled() ) { ?>
	<div class="coupon">
	
		<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'nb_flower' ); ?>" /> <input type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply Coupon', 'nb_flower' ); ?>" />

		<?php do_action( 'woocommerce_cart_coupon' ); ?>
	</div>
<?php } ?>
<div class="cart-update">
	<input type="submit" class="button" name="update_cart" value="<?php esc_attr_e( 'Update Cart', 'nb_flower' ); ?>" />
</div>
<?php do_action( 'woocommerce_cart_actions' ); ?>

<?php wp_nonce_field( 'woocommerce-cart' ); ?>
</div>
<?php do_action( 'woocommerce_after_cart_table' ); ?>

</form>

<div class="woocommerce-sub-sidebar">
	<?php if(is_active_sidebar('wc-sub-sidebar')) {
		dynamic_sidebar( 'wc-sub-sidebar' );
	}?>
</div>

<div class="cart-collaterals">

	<?php do_action( 'woocommerce_cart_collaterals' ); ?>

</div>



<?php do_action( 'woocommerce_after_cart' ); ?>


