<?php
/**
 * Nb_flower functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Nb_flower
 */


@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );


if ( ! function_exists( 'nb_flower_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nb_flower_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Jewelry, use a find and replace
	 * to change 'nb_flower' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'nb_flower', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'nb_flower-blog-thumb', 750, 370, array('center', 'center') );
	add_image_size( 'nb_flower-quick-view', 220, 220, array('center', 'center') );
	add_image_size( 'nb_home_new_product', 285, 340, array('center', 'center') );
	add_image_size( 'nb_home_bestseller_long', 480, 800, array('center', 'center') );
	add_image_size( 'nb_home_bestseller_short', 480, 400, array('center', 'center') );
	add_image_size( 'nb_home_blog', 232, 180, array('center', 'center') );
	add_image_size( 'nb_about_blog', 330, 430, array('center', 'center') );
	add_image_size( 'home2-blog', 360, 250, array('center', 'center') );
	add_image_size( 'home2_img_banner_short', 360, 300, array('center', 'center') );
	add_image_size( 'home2_img_banner_long', 360, 640, array('center', 'center') );
	add_image_size( 'home2_service_horizol', 550, 320, array('center', 'center') );
	add_image_size( 'home2_service_vertical_short', 260, 320, array('center', 'center') );
	add_image_size( 'home2_service_vertical_long', 260, 670, array('center', 'center') );
	add_image_size( 'home3_work1', 360, 240, array('center', 'center') );
	add_image_size( 'home3_work2', 360, 360, array('center', 'center') );
	add_image_size( 'home3_work3', 750, 310, array('center', 'center') );
	add_image_size( 'home3_work4', 360, 290, array('center', 'center') );
	add_image_size( 'home3_birthday', 550, 250, array('center', 'center') );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'nb_flower' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nb_flower_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Woocommerce compatible
	add_theme_support( 'woocommerce' );
}
endif;
add_action( 'after_setup_theme', 'nb_flower_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nb_flower_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nb_flower_content_width', 640 );
}
add_action( 'after_setup_theme', 'nb_flower_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function nb_flower_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'nb_flower' ),
		'id'            => 'blog-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'nb_flower' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Shop Sidebar', 'nb_flower' ),
		'id'            => 'wc-shop-sidebar',
		'description'   => esc_html__( 'Sidebar in Woocommerce shop pages', 'nb_flower' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Product Sidebar', 'nb_flower' ),
		'id'            => 'wc-product-sidebar',
		'description'   => esc_html__( 'Sidebar in Woocommerce single product pages', 'nb_flower' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Sub Sidebar', 'nb_flower' ),
		'id'            => 'wc-sub-sidebar',
		'description'   => esc_html__( 'Sidebar in cart and login page', 'nb_flower' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'nb_flower' ),
		'id'            => 'footer-1',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'nb_flower' ),
		'id'            => 'footer-2',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'nb_flower' ),
		'id'            => 'footer-3',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'nb_flower' ),
		'id'            => 'footer-4',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 5', 'nb_flower' ),
		'id'            => 'footer-5',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 6', 'nb_flower' ),
		'id'            => 'footer-6',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 7', 'nb_flower' ),
		'id'            => 'footer-7',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 8', 'nb_flower' ),
		'id'            => 'footer-8',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 9', 'nb_flower' ),
		'id'            => 'footer-9',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 10', 'nb_flower' ),
		'id'            => 'footer-10',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 11', 'nb_flower' ),
		'id'            => 'footer-11',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 12', 'nb_flower' ),
		'id'            => 'footer-12',
		'description'   => esc_html__('Footer widget area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Languages', 'nb_flower' ),
		'id'            => 'header-languages',
		'description'   => esc_html__('header languages area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s nb_flower-language-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Currency', 'nb_flower' ),
		'id'            => 'header-currency',
		'description'   => esc_html__('header currency area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s nb_flower-currency-widget">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top', 'nb_flower' ),
		'id'            => 'footer-top',
		'description'   => esc_html__('footer top content area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Top Two', 'nb_flower' ),
		'id'            => 'footer-top-two',
		'description'   => esc_html__('footer top two content area', 'nb_flower'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'nb_flower_widgets_init' );

function nb_flower_google_fonts() {
	$fonts_url = '';
	 
	$roboto = _x( 'on', 'Roboto font: on or off', 'nb_flower' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'nb_flower' );
	 
	if ( 'off' !== $roboto || 'off' !== $raleway) {
		$font_families = array();
		 
		if ( 'off' !== $roboto ) {
			$font_families[] = 'Roboto:100,200,300,400,500,600,700,800,900,bold';
		}
		 
		 if ( 'off' !== $raleway ) {
			$font_families[] = 'Raleway:100,200,300,400,500,600,700,800,900,bold';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		 
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	 
	return esc_url_raw( $fonts_url );
}

/**
 * Enqueue scripts and styles.
 */
function nb_flower_scripts() {
	wp_enqueue_style( 'nb-flower-google-fonts', nb_flower_google_fonts(), array(), null );

	wp_enqueue_style( 'compare-style', get_template_directory_uri() . '/woocommerce/compare.css');
	
	wp_enqueue_style( 'nb_flower-style', get_template_directory_uri().'/style.css' );

	wp_enqueue_style( 'fontello-style', get_template_directory_uri() . '/css/fontello.css');

	wp_enqueue_style( 'stacktable-style', get_template_directory_uri() . '/css/stacktable.css');

	wp_enqueue_style('nb_home45_styles', get_template_directory_uri().'/assets/css/style.min.css');

	wp_enqueue_style('nb_home45_styles_headers', get_template_directory_uri().'/assets/css/style_headers.min.css');

	wp_enqueue_style('nb_home45_styles_footers', get_template_directory_uri().'/assets/css/style_footer.min.css');

	wp_enqueue_style('nb_home45_styles_responsive', get_template_directory_uri().'/assets/css/responsive.min.css');

	wp_enqueue_script( 'nb_flower-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'nb_flower-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'nb_flower-owl-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), '20151215', true );

	wp_enqueue_script( 'stacktable-script', get_template_directory_uri() . '/js/stacktable.min.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), true );
	
	wp_enqueue_script( 'nb_flower-main', get_template_directory_uri() . '/js/theme.js', array(), '20151215', true );

	wp_enqueue_script( 'nb_flower-main-header45', get_template_directory_uri() . '/assets/js/custom_header.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nb_flower_scripts' );

function nb_flower_admin_scripts() {
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/css/admin.css');
}
add_action( 'admin_enqueue_scripts', 'nb_flower_admin_scripts' );

require_once ABSPATH . 'wp-admin/includes/plugin.php';
/**
 * Recomend plugins via TGM activation class
 */
require_once( trailingslashit(get_template_directory()) . '/inc/tgm/plugin-activation.php' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Woocommerce Configuration
 */
require get_template_directory() . '/inc/woocommerce-config.php';

/**
 * Theme Options
 */
require get_template_directory() . '/inc/flower-options.php';

add_filter( 'pt-ocdi/import_files', 'nb_flower_get_import_files' );
add_action( 'pt-ocdi/after_import', 'nb_flower_after_import' );


function nb_flower_get_import_files()
{
    return array(
        array(
            'import_file_name'             => 'Nb_flower',
            'local_import_file'            => trailingslashit( get_template_directory() ).'inc/import-files/content.xml',
            'local_import_widget_file'     => trailingslashit( get_template_directory() ).'inc/import-files/widgets.wie',
            'local_import_redux' => array(
                array(
                  'file_path'   =>  trailingslashit( get_template_directory() ).'inc/import-files/theme_options.json',
                  'option_name' => 'nb_flower_options',
                )
            )           
        )
    );
}

function nb_flower_after_import( $selected_import ) {
    if ( 'Nb_flower' === $selected_import['import_file_name'] ) {

        $sub_mega_menu = get_term_by('name', 'sub_mega_menu', 'nav_menu');
        $main_menu = get_term_by('name', 'main-menu', 'nav_menu');
        $footer_menu = get_term_by('name', 'footer-menu-02', 'nav_menu');
        set_theme_mod( 'nav_menu_locations' , array(
                'primary' => $main_menu->term_id,
            )
        );

        $page = get_page_by_title( 'Flower Home 2');
        if ( isset( $page->ID ) ) {
            update_option( 'page_on_front', $page->ID );
            update_option( 'show_on_front', 'page' );
        }

        if ( class_exists( 'RevSlider' ) ) {
            $slider_array = array(
                trailingslashit( get_template_directory() ).'inc/import-files/revolution_sliders/home1_slider.zip',
                trailingslashit( get_template_directory() ).'inc/import-files/revolution_sliders/home2_slider.zip',
                trailingslashit( get_template_directory() ).'inc/import-files/revolution_sliders/home3_slider.zip'
            );

            $slider = new RevSlider();

            foreach($slider_array as $filepath){
                $slider->importSliderFromPost(true,true,$filepath);
            }

            echo 'Slider processed';
        }

        import_save_options();
    }
}

function import_save_options(){
    /* Site Orgin Widgets Active */
    $siteorigin_widgets_active = array(
		'button' => '1',
		'google-map' => '1',
		'image' => '1',
		'slider' => '1',
		'post-carousel' => '1',
		'editor' => '1',
		'tabs' => '1',
		'headline' => '1',
		'nbtsow-our-service-widget' => '1',
		'nbtsow-products-widget' => '1',
		'nbtsow-members-widget' => '1',
		'nbtsow-blog-posts-widget' => '1',
		'blog-style-one' => '1',
		'nbtsow-time-working-widget' => '1',
		'nbtsow-testimonial-widget' => '1',
		'nbtsow-tabs-widget' => '1',
		'nbtsow-our-team-widget' => '1',
		'nbtsow-related-products-widget' => '1',
		'social-media-buttons' => '1',
		'nbtsow-image-widget' => '1',
		'nbtsow-breadcrumb-widget' => '1',
		'nbtsow-wc-hotdeal-widget' => '1',
		'nbtsow-wc-category-widget' => '1',
		'nbtsow-faq-widget' => '1',
		'nbtsow-social-share-widget' => '1',
		'nbtsow-icon-widget' => '1',
		'nbtsow-services-box' => '1',
		'nbtsow-image-banner-widget' => '1',
		'nbtsow-tab-woocommerce-widget' => '1',
		'nbtsow-headline-widget' => '1',
		'nbtsow-testimonials2-widget' => '1'
    );
    update_option('siteorigin_widgets_active', $siteorigin_widgets_active);

    update_option('wppp_dropdown_location', 'none');
    update_option('wppp_default_ppp', '9');
    update_option('wppp_shop_columns', '3');

    echo 'Active siteorigin widgets success!';


}


remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'action_woocommerce_shop_loop_item_title', 10 );
function action_woocommerce_shop_loop_item_title(  ) { 
    echo '<h3>' . get_the_title() . '</h3>';
}

add_filter('yith_wcqv_button_label', '_yith_wcqv_button_label', 10, 1);
function _yith_wcqv_button_label($label){
	return '';
}
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/* remove efect zoom */
add_action( 'after_setup_theme', 'remove_pgz_theme_support', 100 );

function remove_pgz_theme_support() { 
remove_theme_support( 'wc-product-gallery-zoom' );
}

add_action( 'woocommerce_checkout_process', 'wc_minimum_order_amount' );
add_action( 'woocommerce_before_cart' , 'wc_minimum_order_amount' );

function wc_minimum_order_amount() {
    // Set this variable to specify a minimum order value
    $minimum = 200;

    if ( WC()->cart->total < $minimum ) {

        if( is_cart() ) {

            wc_print_notice(
//                sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' ,
                sprintf( 'אתה חייב הזמנה עם מינימום של% s כדי לבצע את ההזמנה, סה"כ ההזמנה הנוכחית שלך היא% s.' ,
                    wc_price( $minimum ),
                    wc_price( WC()->cart->total )
                ), 'error'
            );

        } else {

            wc_add_notice(
//                sprintf( 'You must have an order with a minimum of %s to place your order, your current order total is %s.' ,
                sprintf( 'אתה חייב הזמנה עם מינימום של %s כדי לבצע את ההזמנה, סה"כ ההזמנה הנוכחית שלך היא %s.' ,
                    wc_price( $minimum ),
                    wc_price( WC()->cart->total )
                ), 'error'
            );

        }
    }

}
