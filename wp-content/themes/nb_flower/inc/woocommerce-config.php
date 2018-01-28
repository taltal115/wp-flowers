<?php
// Remove Woocommerce CSS
add_filter( 'woocommerce_enqueue_styles', 'nb_flower_dequeue_styles' );

// Products per row
add_filter('loop_shop_columns', 'nb_flower_loop_columns');
// Product rating star modify
add_filter('woocommerce_product_get_rating_html', 'nb_flower_rating_filter');
// Woocommerce pagination modify
add_filter( 'woocommerce_pagination_args', 	'nb_flower_wc_pagination' );
// Single product thumbnail add wrapper
add_filter( 'woocommerce_single_product_image_html', 'nb_flower_product_thumb_wrapper' );
// Single product gallery thumbnails columns
add_filter( 'woocommerce_product_thumbnails_columns', 'nb_flower_thumbnails_columns' );
// Remove Heading in Woocommerce tabs
add_filter( 'woocommerce_product_additional_information_heading', '__return_empty_string' );
add_filter( 'woocommerce_product_description_heading', '__return_empty_string' );
// Products per page

if ( !is_plugin_active( 'woocommerce-products-per-page/woocommerce-products-per-page.php' ) ) {
  add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );
} 

// Remove Woocommerce actions
add_action('init', 'nb_flower_remove_wc_action');
// Woocommerce Pages header
add_action('woocommerce_before_main_content', 'nb_flower_get_page_header', 25);
// Add Wishlist button
add_action( 'woocommerce_after_shop_loop_item', 'nb_flower_wishlist_button', 11);
// Sale flash reorder
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 20 );
// Product List view buttons and details
add_action( 'nb_flower_list_view_after_shop_loop_item_title', 'nb_flower_list_view_section', 10 );
add_action( 'nb_flower_list_view_after_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20 );
add_action( 'nb_flower_list_view_after_shop_loop_item_title', 'nb_flower_wishlist_button', 30 );
//Link for product thumbnail
add_action( 'woocommerce_before_shop_loop_item_title', 'nb_flower_product_thumb_link_open', 9 );
add_action( 'woocommerce_before_shop_loop_item_title', 'nb_flower_product_thumb_link_close', 11 );
// Product intro
add_action( 'woocommerce_single_product_summary', 'nb_flower_product_intro', 11 );
// Add stock status
add_action( 'woocommerce_single_product_summary', 'nb_flower_stock_and_sku', 16 );
// Rearrange up-sell products
add_action('nb_flower_single_after_main_content', 'woocommerce_upsell_display', 5);    
// Add share button in product details page
add_action('woocommerce_share', 'nb_flower_share_buttons');
// Add product-intro term to quickview popup
add_action('yith_wcqv_product_summary', 'nb_flower_product_intro', 16);
// Hide variation product's max price in shop and category pages
add_filter( 'woocommerce_variable_sale_price_html', 'nb_flower_variation_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'nb_flower_variation_price_format', 10, 2 );
// add product info
add_action('woocommerce_single_product_summary', 'nb_flower_get_product_info', 15);

function nb_flower_variation_price_format( $price, $product ) {
 
    if(is_shop() || is_product_category() || is_front_page() || is_page_template('layouts/home-page.php')) {
        $prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
        $price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'nb_flower' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        
        // Sale Price
        $prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
        sort( $prices );
        $saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'nb_flower' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
        
        if ( $price !== $saleprice ) {
        $price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
        }
        return $price;
    }
    return $price;
}

function nb_flower_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-layout'] );
    unset( $enqueue_styles['woocommerce-smallscreen'] );
	return $enqueue_styles;
}

function nb_flower_loop_columns() {
    if(nb_flower_get_option('products_per_row')) {
        $products_per_row = nb_flower_get_option('products_per_row');
        
    } else {
        $products_per_row = 3;
    }
    return $products_per_row;
}

function nb_flower_remove_wc_action() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 10 );
    remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
}

function nb_flower_rename_wc_tabs( $tabs ) {
    global $product;
    if($product->has_attributes() || $product->has_dimensions() || $product->has_weight()){
        $tabs['additional_information']['title'] = esc_html__( 'Specs','nb_flower');
        $tabs['description']['title'] = esc_html__( 'פירוט','nb_flower' );
        // $tabs['template'] = array(
        //     'title' => esc_html__('Template','nb_flower'),
        //     'priority' => 10,
        //     'callback' => 'nb_flower_template_tab_content'
        // );
        $tabs['reviews']['priority'] = 30;
        $tabs['description']['priority'] = 15;
        $tabs['additional_information']['priority'] = 5;
    }
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'nb_flower_rename_wc_tabs' );

function nb_flower_template_tab_content(){
    global $product;
    $images = $product->get_gallery_image_ids();
    echo '<div class="template_tabs owl-carousel">';
        foreach ($images as $image){
            echo '<img src="'.wp_get_attachment_url($image).'" alt="'.esc_html('gallery','nb_flower').'" />';
        }
    echo '</div>';
}

function nb_flower_get_page_header() {
    if ( nb_flower_get_option('page_title') ): ?> 
	<div class="page-title-wrap">
		<div class="container">

			<h1 class="page-entry-title">
				<?php if(is_product()) {
                    echo esc_html(get_the_title());
                } else {
                    woocommerce_page_title();
                }
                ?>
			</h1>
			<div class="page-breadcrumb">
				<?php esc_html_e('אתה כאן: ', 'nb_flower'); ?><?php bcn_display(); ?>
			</div>
						
		</div>
	</div>
<?php endif;
}

function nb_flower_wishlist_button() {
    if(shortcode_exists('yith_wcwl_add_to_wishlist')) {
        echo do_shortcode('[yith_wcwl_add_to_wishlist]');
    }
}

function nb_flower_rating_filter($rating = null) {
    global $product;
    $rating_html = '';

    if ( ! is_numeric( $rating ) ) {
        $rating = $product->get_average_rating();
    } 

    if ( $rating > 0 ) {

        $rating_html  = '<div class="star-rating" title="' . sprintf( __( 'Rated %s out of 5', 'nb_flower' ), $rating ) . '">';

        $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';

        $rating_html .= '</div>';

    } else {
        $rating_html = '<div class="empty-rating"></div>';
    }

    return $rating_html;
}

function nb_flower_list_view_section() {
    echo '<p class="product-description">' . wp_trim_words(esc_html( get_the_excerpt() ), 40, '...') . '</p>';
}

function nb_flower_product_thumb_link_open() {
    echo '<a href="' . esc_html(get_the_permalink()) . '">';
}

function nb_flower_product_thumb_link_close() {
    echo '</a>';
}

function nb_flower_wc_pagination( $args ) {
	$args['prev_text'] = '<i class="icon-right-open"></i>';
	$args['next_text'] = '<i class="icon-left-open"></i>';
	return $args;
}

function nb_flower_product_thumb_wrapper() {
    global $product;
    global $post;
    $attachment_count = count( $product->get_gallery_image_ids() );
    $gallery          = $attachment_count > 0 ? '[product-gallery]' : '';
    $props            = wc_get_product_attachment_props( get_post_thumbnail_id(), $post );
    $image            = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
        'title'  => $props['title'],
        'alt'    => $props['alt'],
    ) );
    return sprintf(
        '<div class="single-product-thumb"><a href="%s" itemprop="image" class="woocommerce-main-image zoom" title="%s" data-rel="prettyPhoto%s">%s</a></div>',
        esc_url( $props['url'] ),
        esc_attr( $props['caption'] ),
        $gallery,
        $image
    );
}

function nb_flower_thumbnails_columns() {
    return 4;
}

function nb_flower_product_intro() {
    global $product;

    $terms = get_the_terms( $product->get_id(), 'pa_product-intro');
    if(false !== $terms && ! is_wp_error( $terms )) {
        echo '<ul class="product-intro">';
        foreach ( $terms as $term ) {
            echo '<li>' . $term->name . '</li>';
        }
        echo '</ul>';
    }
    
}

function nb_flower_stock_and_sku() {
    global $product;

    echo '<div class="stock-and-sku-wrap">';
    if ( $product->is_in_stock() ) {
        echo '<span class="product-stock">במלאי</span>';
    } else {
        echo '<span class="product-stock">לא במלאי</span>';
    }

    if( $product_sku = $product->get_sku() ) {
        echo '<span>SKU:' . $product->get_sku() . '</span>';
    }
    echo '</div>';
}

function nb_flower_share_buttons() {
    global $post;
	if ( '' != get_the_post_thumbnail( $post->ID ) ) {
		$pinterestimage = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$pinImage = $pinterestimage[0];
	} else {
		$pinImage = '';
	}
    echo '<span class="wc-details-share-button">';
        echo '<i class="icon-share"></i>';
        echo '<span>' . esc_html__( 'Share', 'nb_flower' ) . '</span>';
        echo '<div class="button-wrap">';

            // Facebook button
            echo  '<a rel="nofollow" href="http://www.facebook.com/sharer.php?u='. urlencode(get_permalink( $post->ID )) .'&amp;t='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;" ><i class="icon-facebook"></i></a>';
            // Google Plus button
            echo  '<a rel="nofollow" href="https://plus.google.com/share?url='. urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;source='. esc_url( home_url( '/' )) .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;"><i class="icon-gplus"></i></a>' ;
            // Pinterest button
            echo  '<a rel="nofollow" href="http://pinterest.com/pin/create/bookmarklet/?url='. urlencode(get_permalink( $post->ID )) .'&amp;media='. esc_attr($pinImage).'&amp;description='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;"><i class="icon-pinterest"></i></a>';
            // Linkedin button            
            echo  '<a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='. urlencode(get_permalink( $post->ID )) .'&amp;title='. htmlspecialchars(urlencode(html_entity_decode(get_the_title( $post->ID ), ENT_COMPAT, 'UTF-8')), ENT_COMPAT, 'UTF-8') .'&amp;source='. esc_url( home_url( '/' )) .'" onclick="window.open(this.href,\'targetWindow\',\'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width=700,height=450\');return false;"><i class="icon-linkedin"></i></a>';        

        echo '</div>';
    echo '</span>';
}