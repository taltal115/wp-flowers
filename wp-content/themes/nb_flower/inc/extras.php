<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Jewelry
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nb_flower_body_classes( $classes ) {

	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Product per row classes
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if ( is_shop() || is_product_category() || is_product_tag() ) {
			$products_per_row = nb_flower_get_option('products_per_row');
			$classes[] = 'nb_flower-' . $products_per_row . '-columns';
		}
	}
	

	if ( is_page() ) {
		$page_layout = nb_flower_get_option('page_layout');
		$classes[] = $page_layout;
	}
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if ( (is_archive() && !is_shop() || is_author()) && !is_front_page() && !is_shop() || is_single() && !is_product() || is_search() ) {
			$archive_layout = nb_flower_get_option('blog_layout');
			$classes[] = $archive_layout;
		}
	}
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if ( is_shop() || is_product_category() || is_product_tag() ) {
			$shop_layout = nb_flower_get_option('shop_layout');
			$classes[] = $shop_layout;
		}
	}
	
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if( is_product()  ) {
			$single_product_layout = nb_flower_get_option('single_product_layout');
			$classes[] = $single_product_layout;
		}	
	}
	
	if(nb_flower_get_option('page_title')) {		
		$classes[] = 'has-page-title';
	}

	if(nb_flower_get_option('header_position')) {
		if(is_front_page()) {
			$classes[] = 'header-absolute';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'nb_flower_body_classes' );

// Add site's favicon via theme option
function nb_flower_favicons() {
	$favicons = null;

	if ( $site_favicon = nb_flower_get_option('site_favicon', false, 'url') ) $favicons .= '
	<link rel="shortcut icon" href="'. esc_url( $site_favicon ) .'">';

	if ( nb_flower_get_option('site_iphone_icon', '', 'url') ) $favicons .= '
	<link rel="apple-touch-icon-precomposed" href="'. esc_url(nb_flower_get_option('site_iphone_icon', '', 'url')) .'">';

	if ( nb_flower_get_option('site_iphone_icon_retina', '', 'url') ) $favicons .= '
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url(nb_flower_get_option('site_iphone_icon_retina', '', 'url')) .'">';

	if ( nb_flower_get_option('site_ipad_icon', '', 'url') ) $favicons .= '
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'. esc_url(nb_flower_get_option('site_ipad_icon', '', 'url')) .'">';

	if ( nb_flower_get_option('site_ipad_icon_retina', '', 'url') ) $favicons .= '
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'. esc_url(nb_flower_get_option('site_ipad_icon_retina', '', 'url')) .'">';

	printf("%s", $favicons);
}
add_action( 'wp_head', 'nb_flower_favicons' );

add_filter( 'get_the_archive_title', 'nb_flower_archive_title_custom');

function nb_flower_archive_title_custom($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

}


function nb_flower_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="pingback">
		<p><?php _e( 'Pingback:', 'nb_flower' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'nb_flower' ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
		    if ( 'div' === $args['style'] ) {
		        $tag       = 'div';
		        $add_below = 'comment';
		    } else {
		        $tag       = 'li';
		        $add_below = 'div-comment';
		    }
		    ?>
		    <<?php echo esc_attr($tag) ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		    <?php if ( 'div' != $args['style'] ) : ?>
		        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		    <?php endif; ?>
		    <div class="comment-author vcard">
		        <?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>        
		    </div>
		    

		    <div class="comment-details commentmetadata">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'nb_flower' ); ?></em>
					<br />
				<?php endif; ?>
				<div class="comment-meta">
					<?php printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?>
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
					<span>
					<?php
					/* translators: 1: date, 2: time */
					printf( esc_html__('%1$s at %2$s' , 'nb_flower'), get_comment_date(),  get_comment_time() ); ?>
					</a>
					<?php edit_comment_link( esc_html__( 'Edit', 'nb_flower' ), '  ', '' );?>
					</span>
				</div>
				
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div>
		    </div>

		    
		    
		    <?php if ( 'div' != $args['style'] ) : ?>
		    </div>
		    <?php endif;
	    break; 
	endswitch;?>


    <?php
}

function nb_flower_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Continue Reading<span>&rarr;</span></a>';
}
add_filter( 'the_content_more_link', 'nb_flower_read_more_link' );

function nb_flower_removeDemoModeLink() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'nb_flower_removeDemoModeLink');

if ( ! function_exists('nb_flower_get_option') ) {
	function nb_flower_get_option($id, $fallback = false, $key = false ) {
		global $nb_flower_options;
		if ( $fallback == false ) $fallback = '';
		$output = ( isset($nb_flower_options[$id]) && $nb_flower_options[$id] !== '' ) ? $nb_flower_options[$id] : $fallback;
		if ( !empty($nb_flower_options[$id]) && $key ) {
			$output = $nb_flower_options[$id][$key];
		}
		return $output;
	}
}