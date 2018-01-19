<?php
/*
Widget Name: Product Tabs Widget
Description: This widget Display product of Tabs.
Author: Netbase Team
Author URI: http://netbaseteam.com/
*/

class NBTSOW_Products_Tabs_Widget extends SiteOrigin_Widget {
	function __construct() {

		parent::__construct(
			'nbtsow-products-tabs-widget',
			__('NetBaseTeam Products Categorys Tabs', 'nbtsow'),
			array(
				'description' => __('Products Tabs Category Component.', 'nbtsow'),
                'panels_icon' => 'dashicons dashicons-welcome-widgets-menus',
                'panels_groups' => array('nbtsow-widgets')
			),
			array(),
			array(
				'widget_title' => array(
					'type' => 'text',
					'label' => __('Widget Title', 'nbtsow'),
					'default' => ''
				),
                'tab_name' => array(
                    'type' => 'text',
                    'label' => __('Tab name  (* Please enter a name for the tab)', 'nbtsow'),
                    'default' => ''
                ),
                'repeater' => array(
                    'type' => 'repeater',
                    'label' => __( 'Tabs' , 'nbtsow' ),
                    'item_name'  => __( 'Tab', 'nbtsow' ),
                    'item_label' => array(
                        'selector'     => "[id*='repeat_text']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(

                        'tab_title' => array(
                            'type' => 'text',
                            'label' => __('Tab Title', 'nbtsow'),
                            'default' => ''
                        ),

                        'tab_cat' => array(
                            "type"    => "select",
                            "label"   => esc_html__( "Category", 'nbtsow' ),
                            "options" => $this->get_term_lists(),
                        )
                        
                        // 'tab_content' => array(
                        //     'type' => 'tinymce',
                        //     'label' => __( 'Tab Content', 'nbtsow' ),
                        //     'default' => '',
                        //     'rows' => 10,
                        //     'default_editor' => 'html',
                        //     'button_filters' => array(
                        //         'mce_buttons' => array( $this, 'filter_mce_buttons' ),
                        //         'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
                        //         'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
                        //         'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
                        //         'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
                        //     ),
                        // )
                    )
                ),
                'tab_product_col' => array(
                    'type'        => 'text',
                    'default' => '4',
                    'label'       => esc_html__( 'Column', 'blackhole' ),
                    'description' => esc_html__( 'Enter number column', 'blackhole' )
                ),
                'tab_product_limit' => array(
                    'type'        => 'text',
                    'default' => '8',
                    'label'       => esc_html__( 'Item show', 'blackhole' ),
                    'description' => esc_html__( 'Enter number you want show product', 'blackhole' )
                ),
    //             'tabs_selection' => array(
    //                 'type' => 'radio',
    //                 'label' => __( 'Choose Tabs Style', 'nbtsow' ),
    //                 'default' => 'horizontal',
    //                 'options' => array(
    //                     'horizontal' => __( 'Horizontal Tabs', 'nbtsow' ),
    //                     'vertical' => __( 'Vertical Tabs', 'nbtsow' ),
    //             		'accordion' => __( 'Accordion Tabs', 'nbtsow' ),
    //                 )
    //             ),				
				// 'tab_block' => array(
    //                 'type' => 'tinymce',
    //                 'label' => __( 'Add Block Bottom Tab', 'nbtsow' ),
    //                 'default' => '',
    //                 'rows' => 10,
    //                 'default_editor' => 'html',
    //                 'button_filters' => array(
    //                     'mce_buttons' => array( $this, 'filter_mce_buttons' ),
    //                     'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
    //                     'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
    //                     'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
    //                     'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
    //                 ),
    //             ),
    //             'tabs_styling' => array(
    //                 'type' => 'section',
    //                 'label' => __( 'Widget styling' , 'nbtsow' ),
    //                 'hide' => true,
    //                 'fields' => array(
    //                     'bg_color' => array(
    //                         'type' => 'color',
    //                         'label' => __( 'Background Color', 'nbtsow' ),
    //                         'default' => ''
    //                     ),
    //                     'inactive_tab_color' => array(
    //                         'type' => 'color',
    //                         'label' => __( 'Inactive Tab Font Color', 'nbtsow' ),
    //                         'default' => ''
    //                     ),
    //                     'active_tab_color' => array(
    //                         'type' => 'color',
    //                         'label' => __( 'Active Tab Font Color', 'nbtsow' ),
    //                         'default' => ''
    //                     ),
    //                     'tab_content_color' => array(
    //                         'type' => 'color',
    //                         'label' => __( 'Tab Content Color', 'nbtsow' ),
    //                         'default' => ''
    //                     ),
    //                 )
    //             ),
			),
			plugin_dir_path(__FILE__)
		);

        // add_action('wp_ajax_walt_widget_content', array(&$this, 'ajax_walt_widget_content'));
        // add_action('wp_ajax_nopriv_walt_widget_content', array(&$this, 'ajax_walt_widget_content'));
	}

    // function ajax_walt_widget_content(){
    //     $cat = intval($_REQUEST['cat']);
    //     $limit = intval($_REQUEST['limit']);
    //     $col = intval($_REQUEST['col']);
        
    //     echo do_shortcode('[netbase_product_category per_page="'.$limit.'" columns="'.$col.'" category="'.$cat.'" style="default"]');
    //     die();
    // }

    function get_template_variables($instance, $args) {
        return array(
            'title_widget' => $instance['widget_title'],
            'tab_name' => $instance['tab_name'],
            'repeater' => $instance['repeater'],
            'tab_product_col' => $instance['tab_product_col'],
            'tab_product_limit' => $instance['tab_product_limit'],
        );
    }

	function get_template_name($instance) {
		return 'nbtsow-products-tabs-widget-template';
	}

	function get_style_name($instance) {
		return 'tabs-style';
	}

    function get_less_variables( $instance ) {
        return array(
            'bg_color' => $instance['tabs_styling']['bg_color'],
            'inactive_tab_color' => $instance['tabs_styling']['inactive_tab_color'],
            'active_tab_color' => $instance['tabs_styling']['active_tab_color'],
            'tab_content_color' => $instance['tabs_styling']['tab_content_color'],
        );
    }

    function get_term_lists()
    {
        global $wpdb;
        $terms = $wpdb->get_results( "SELECT * FROM $wpdb->terms LEFT JOIN $wpdb->term_taxonomy ON $wpdb->terms.term_id = $wpdb->term_taxonomy.term_id WHERE taxonomy = 'product_cat'", OBJECT );
        if($terms){
            $option = array();
            foreach ($terms as $key => $term) {
                $option[$term->term_id] = esc_html__( $term->name, 'nbtsow' );
            }
            return $option;
        }
    }

}

siteorigin_widget_register('nbtsow-products-tabs-widget', __FILE__, 'NBTSOW_Products_Tabs_Widget');