<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Jewelry for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 *
 */
require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'nb_flower_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function nb_flower_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name'              => esc_html__('Advanced Custom Field', 'nb_flower'),
            'slug'              => 'advanced-custom-fields', 
            'required'          => true,
            'force_activation'  => false,
            'external_url'      => 'https://www.advancedcustomfields.com/',
        ),

        array(
            'name'              => esc_html__('Siteorigin Panels', 'nb_flower'),
            'slug'              => 'siteorigin-panels', 
            'required'          => true,
            'force_activation'  => false,
            'external_url'      => 'https://siteorigin.com/',
        ),

        array(
            'name'               => esc_html__('Redux Framework', 'nb_flower'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,
        ),

        array(
            'name'              => esc_html__('YITH WooCommerce Compare', 'nb_flower'),
            'slug'              => 'yith-woocommerce-compare', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('YITH WooCommerce Wishlist', 'nb_flower'),
            'slug'              => 'yith-woocommerce-wishlist', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('YITH WooCommerce Quick View', 'nb_flower'),
            'slug'              => 'yith-woocommerce-quick-view', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('Contact Form 7', 'nb_flower'),
            'slug'              => 'contact-form-7', 
            'required'          => false,
            'force_activation'  => false,
        ),
        
        array(
            'name'              => esc_html__('Max Mega Menu', 'nb_flower'),
            'slug'              => 'megamenu', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'               => esc_html__('So Widgets Bundle', 'nb_flower'),
            'slug'               => 'so-widgets-bundle', 
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,            
        ),

        array(
            'name'              => esc_html__('Breadcrumb NavXT', 'nb_flower'),
            'slug'              => 'breadcrumb-navxt', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('Woocommerce', 'nb_flower'),
            'slug'              => 'woocommerce', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('Woocommerce Products Per Page', 'nb_flower'),
            'slug'              => 'woocommerce-products-per-page', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'              => esc_html__('One Click Import','nb_flower'),
            'slug'              => 'one-click-demo-import', 
            'required'          => false,
            'force_activation'  => false,
        ),

        array(
            'name'               => 'WooCommerce Currency Switcher',
            'slug'               => 'woocommerce-currency-switcher', 
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,            
        ),
        

        array(
            'name'               => esc_html__('Slider Revolution', 'nb_flower'),
            'slug'               => 'revslider',
            'source'             => esc_url('http://netbaseteam.com/wordpress/theme/plugins/revslider.zip'),
            'required'           => false,
            'force_activation'   => false,
            'force_deactivation' => false,
            'external_url'       => 'http://codecanyon.net/item/slider-revolution-responsive-wordpress-plugin/',
        ),
        
        array(
            'name'               => esc_html__('Netbase Widgets For SiteOrigin', 'nb_flower'),
            'slug'               => 'nbt-so-widgets', 
            'source'             => esc_url('http://netbaseteam.com/wordpress/theme/plugins/flower/nbt-so-widgets.zip'),
            'required'           => true,
            'force_activation'   => false,
            'force_deactivation' => false,            
        ),
        
        array(
            'name'              => esc_html__('Max Mega Menu pro', 'nb_flower'),
            'slug'              => 'megamenu-pro', 
            'required'          => false,
            'force_activation'  => false,
            'source'             => esc_url('http://demo7.cmsmart.net/wordpress/plugins/wp_multistore_plugins/megamenu-pro.zip')
        ),

        array(
            'name'              => esc_html__('Netbase Team Woocommerce Swatch', 'nb_flower'),
            'slug'              => 'nbt-woo-swatch', 
            'required'          => false,
            'force_activation'  => false,
            'source'             => esc_url('http://demo7.cmsmart.net/wordpress/plugins/wp_multistore_plugins/nbt-woo-swatch.zip')
        ),
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'nb_flower' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'nb_flower' ),
			'installing'                      => esc_html__( 'Installing Plugin: %s', 'nb_flower' ),
			'updating'                        => esc_html__( 'Updating Plugin: %s', 'nb_flower' ),
			'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'nb_flower' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'nb_flower'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'nb_flower'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'nb_flower'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'nb_flower'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'nb_flower'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'nb_flower'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'nb_flower'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'nb_flower'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'nb_flower'
			),
			'return'                          => esc_html__( 'Return to Required Plugins Installer', 'nb_flower' ),
			'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'nb_flower' ),
			'activated_successfully'          => esc_html__( 'The following plugin was activated successfully:', 'nb_flower' ),
			'plugin_already_active'           => esc_html__( 'No action taken. Plugin %1$s was already active.', 'nb_flower' ),
			'plugin_needs_higher_version'     => esc_html__( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'nb_flower' ),
			'complete'                        => esc_html__( 'All plugins installed and activated successfully. %1$s', 'nb_flower' ),
			'dismiss'                         => esc_html__( 'Dismiss this notice', 'nb_flower' ),
			'notice_cannot_install_activate'  => esc_html__( 'There are one or more required or recommended plugins to install, update or activate.', 'nb_flower' ),
			'contact_admin'                   => esc_html__( 'Please contact the administrator of this site for help.', 'nb_flower' ),
			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
    );

    tgmpa( $plugins, $config );

}