<?php

    /**
     * ReduxFramework Jewelry WordPress Theme Config File
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = "nb_flower_options";

    /**
     * ---> SET ARGUMENTS
     * All the arguments for Redux.
     * */

    $theme = wp_get_theme();

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => true,
        'menu_title'           => esc_html__( 'Nb_flower Options', 'nb_flower' ),
        'page_title'           => esc_html__( 'Nb_flower Options', 'nb_flower' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => false,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => false,
        'update_notice'        => true,
        'customizer'           => true,
        'page_priority'        => null,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => 'nb_flower_options',
        'save_defaults'        => true,
        'default_show'         => true,
        'default_mark'         => '',
        'show_import_export'   => true,
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        'output_tag'           => true,
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.
        'use_cdn'              => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => 'http://docs.reduxframework.com/',
        'title' => esc_html__( 'Documentation', 'nb_flower' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support', 'nb_flower' ),
    );


    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
        'title' => 'Visit us on GitHub',
        'icon'  => 'el el-github'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
        'title' => 'Like us on Facebook',
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://twitter.com/reduxframework',
        'title' => 'Follow us on Twitter',
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => 'http://www.linkedin.com/company/redux-framework',
        'title' => 'Find us on LinkedIn',
        'icon'  => 'el el-linkedin'
    );

    // Panel Intro text -> before the form
    // if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    //     if ( ! empty( $args['global_variable'] ) ) {
    //         $v = $args['global_variable'];
    //     } else {
    //         $v = str_replace( '-', '_', $args['opt_name'] );
    //     }
    //     $args['intro_text'] = sprintf( esc_html__( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'nb_flower' ), $v );
    // } else {
    //     $args['intro_text'] = esc_html__( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'nb_flower' );
    // }

    // // Add content after the form.
    // $args['footer_text'] = esc_html__( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'nb_flower' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */

    /*

     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'nb_flower' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'nb_flower' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'nb_flower' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'nb_flower' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'nb_flower' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START GENERAL SECTION
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'nb_flower' ),
        'id'     => 'jw-general',
        'desc'   => esc_html__( 'Change some site main options', 'nb_flower' ),
        'icon'   => 'el-icon-cog el-icon-large',
        'fields' => array(
            array(
                'id'       =>'header_logo',
                'type'     => 'media',
                'title'    => esc_html__('Site\'s header logo', 'nb_flower'),
            ),
            array(
                'id'       =>'header_logo_white',
                'type'     => 'media',
                'title'    => esc_html__('Logo white', 'nb_flower'),
            ),
            array(
                'id'       =>'site_favicon',
                'url'      => false,
                'type'     => 'media', 
                'title'    => esc_html__('Site Favicon', 'nb_flower'),
                'default'  => '',
                'subtitle' => esc_html__('Upload a 16px x 16px .png or .gif image that will be your favicon.', 'nb_flower'),
            ),
            array(
                'id'       =>'site_iphone_icon',
                'url'      => false,
                'type'     => 'media', 
                'title'    => esc_html__('Apple iPhone Icon ', 'nb_flower'),
                'default'  => '',
                'subtitle' => esc_html__('Custom iPhone icon (57px x 57px).', 'nb_flower'),
            ),            
            array(
                'id'       =>'site_iphone_icon_retina',
                'url'      => false,
                'type'     => 'media', 
                'title'    => esc_html__('Apple iPhone Retina Icon ', 'nb_flower'),
                'default'  => '',
                'subtitle' => esc_html__('Custom iPhone retina icon (114px x 114px).', 'nb_flower'),
            ),            
            array(
                'id'       =>'site_ipad_icon',
                'url'      => false,
                'type'     => 'media', 
                'title'    => esc_html__('Apple iPad Icon ', 'nb_flower'),
                'default'  => '',
                'subtitle' => esc_html__('Custom iPad icon (72px x 72px).', 'nb_flower'),
            ),            
            array(
                'id'       =>'site_ipad_icon_retina',
                'url'      => false,
                'type'     => 'media', 
                'title'    => esc_html__('Apple iPad Retina Icon ', 'nb_flower'),
                'default'  => '',
                'subtitle' => esc_html__('Custom iPad retina icon (144px x 144px).', 'nb_flower'),
            ),
        )
    ) );

    // -> START HEADER
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'nb_flower' ),
        'id'     => 'jw-header',
        'desc'   => esc_html__( 'Change display of header area', 'nb_flower' ),
        'icon'   => 'el el-lines',
        'fields' => array(
            array(
                'id'      => 'header_blocker',
                'type'    => 'radio',
                'title'   => esc_html__('Header Layouts', 'nb_flower'),
                'options'  => array(
                    'default' => 'Default Header',
                    'header4' => 'Header Home 4',
                    'header5' => 'Header Home 5'
                ),
                'default' => 'default',
            )
        )
    ) );

    // -> START FOOTER
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'nb_flower' ),
        'id'     => 'jw-footer',
        'desc'   => esc_html__( 'Change display of footer area', 'nb_flower' ),
        'icon'   => 'el el-icon-photo',
        'fields' => array(
            array(
                'id'       =>'footer_bottom_copyright',
                'type'     => 'textarea',
                'title'    => esc_html__('Footer Copyright', 'nb_flower'),
                'subtitle' => esc_html__('Enter the copyright section text(allow link tag).', 'nb_flower'),
            ),
            array(
                'id'      => 'footer_bottom_home_new',
                'type'    => 'textarea',
                'title'   => esc_html__('Footer Copyright New', 'nb_flower'),
                'subtitle' => esc_html__('Enter the copyright section text(allow link tag).', 'nb_flower')
            ),
            array(
                'id'       =>'footer_bottom_image',
                'type'     => 'media',
                'title'    => esc_html__('Footer Bottom Image', 'nb_flower'),
            ),
            array(
                'id'      => 'footer_layout',
                'type'    => 'radio',
                'title'   => esc_html__('Footer Layouts', 'nb_flower'),
                'options'  => array(
                    'footer_main' => 'Default Footer',
                    'footer4' => 'Footer Home 4',
                    'footer5' => 'Footer Home 5'
                ),
                'default' => 'footer_main',
            )
        )
    ) );

    // -> START WOOCOMMERCE
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'nb_flower' ),
        'id'     => 'jw-woocommerce',
        'desc'   => esc_html__( 'Woocommerce Configuration', 'nb_flower' ),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'id' => 'page_title',
                'type' => 'switch',
                'title' => esc_html__('Page title', 'nb_flower'),
                'subtitle' => esc_html__('Show page title and breadcrumb for Woocommerce\'s page', 'nb_flower'),
                'default' => true,
            ),
            array(
                'id' => 'shop_top_banner',
                'type' => 'media',
                'title' => esc_html__('Banner in top of shop page', 'nb_flower'),
            ),
            array(
                'id' => 'shop_bottom_banner',
                'type' => 'media',
                'title' => esc_html__('Banner in bottom of shop page', 'nb_flower'),
            ),
            array(
                'id' => 'cart_notice',
                'type' => 'textarea',
                'title' => esc_html__('Cart Notice', 'nb_flower'),
                'desc' => esc_html__('Notice on cart page', 'nb_flower')
            )
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Blog', 'nb_flower'),
        'id' => 'jw-blog',
        'desc' => esc_html__('Blog layout configuration', 'nb_flower'),
        'icon' => 'el el-list',
        'fields' => array(
            array(
                'id' => 'blog_top_banner',
                'type' => 'media',
                'title' => esc_html__('Blog top banner', 'nb_flower'),
            ),
        )
    ) );

    // -> START lAYOUTS
    Redux::setSection( $opt_name, array(
        'title' => esc_html__('Layouts', 'nb_flower'),
        'id'     => 'jw-layouts',
        'desc'   => esc_html__( 'Layouts Configuration', 'nb_flower' ),
        'icon'   => 'el el-website',
        'fields' => array(            
            array(
                'id' => 'page_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Page Layout', 'nb_flower' ),
                'subtitle' => esc_html__( 'Default page layout.', 'nb_flower' ),
                'options'  => array(
                    'left-sidebar'  => 'Left Sidebar',
                    'no-sidebar'    => 'No Sidebar',
                    'right-sidebar' => 'Right Sidebar'
                ),
                'default'  => 'left-sidebar'
            ),
            array(
                'id'       => 'blog_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Blog Layout', 'nb_flower' ),
                'subtitle' => esc_html__( 'Default blog layout ( category, tag, single, search, author, archive ).', 'nb_flower' ),
                'options'  => array(
                    'left-sidebar'  => 'Left Sidebar',
                    'no-sidebar'    => 'No Sidebar',
                    'right-sidebar' => 'Right Sidebar'
                ),
                'default'  => 'left-sidebar'
            ),
            array(
                'id'       => 'shop_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'WooCommerce Shop Page Layout', 'nb_flower' ),
                'subtitle' => esc_html__( 'Layout for Woocommerce shop page.', 'nb_flower' ),
                'options'  => array(
                    'left-sidebar'  => 'Left Sidebar',
                    'no-sidebar'    => 'No Sidebar',
                    'right-sidebar' => 'Right Sidebar'
                ),
                'default'  => 'left-sidebar'
            ),
            array(
                'id'       => 'single_product_layout',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Single WooCommerce Product Layout', 'nb_flower' ),
                'subtitle' => esc_html__( 'Layout for single product', 'nb_flower' ),
                'options'  => array(
                    'left-sidebar'  => 'Left Sidebar',
                    'no-sidebar'    => 'No Sidebar',
                    'right-sidebar' => 'Right Sidebar'
                ),
                'default'  => 'left-sidebar'
            ),
            array(
                'id'       => 'header_position',
                'type'     => 'switch',
                'title'    => esc_html__('Header position', 'nb_flower'),
                'desc'     => esc_html__('Overlap header or not ?', 'nb_flower'),
                'default'  => true,
            ),
            array(
                'id'       => 'hide_home_title',
                'type'     => 'switch',
                'title'    => esc_html__('Hide Page Title', 'nb_flower'),
                'default'  => true,
            ),
        )
    ) );      
    /*
     * <--- END SECTIONS
     */