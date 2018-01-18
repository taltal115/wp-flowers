<?php
/*
Widget Name: Netbaseteam Tabs Widget
Description: Tabs widget by netbaseteam
Author: Netbaseteam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Tabs_Widget extends SiteOrigin_Widget{
    function __construct()
    {
        parent::__construct(
            'nbtsow-tabs-widget',
            esc_html__('NBTSOW Tabs Widget','nbtsow'),
            array(
                'description' => esc_html__('NBT Tabs Widget','nbtsow')
            ),
            array(),
            array(
                'widget_title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Title' , 'nbtsow')
                ),
                'tab_name' => array(
                    'type' => 'text',
                    'label' => esc_html__('Name*', 'nbtsow'),
                    'description' => esc_html__('Please enter the name of tabs','nbtsow'),
                    'default' => esc_html__('Tabs_name','nbtsow')
                ),
                'repeater' => array(
                    'type' => 'repeater',
                    'label' => __( 'NBTSOW-Tabs' , 'nbtsow' ),
                    'item_name'  => __( 'NBTSOW-Tab', 'nbtsow' ),
                    'item_label' => array(
                        'selector'     => "[id*='repeat_text']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        'tab_title' => array(
                            'type' => 'text',
                            'label' => esc_html__('Tab Title', 'nbtsow'),
                        ),
                        'tab_content' => array(
                            'type' => 'tinymce',
                            'label' => esc_html__('Tab content', 'nbtsow'),
                            'row' => 10,
                            'default_editor' => 'html',
                        )
                    )
                ),
                'tabs_selection' => array(
                    'type' => 'radio',
                    'label' => __( 'Choose Tabs Style', 'nbtsow' ),
                    'default' => 'horizontal',
                    'options' => array(
                        'horizontal' => __( 'Horizontal Tabs', 'nbtsow' ),
                        'vertical' => __( 'Vertical Tabs', 'nbtsow' ),
                        'accordion' => __( 'Accordion Tabs', 'nbtsow' ),
                    )
                ),
                'tabs_styling' => array(
                    'type' => 'section',
                    'label' => __( 'Widget styling' , 'nbtsow' ),
                    'hide' => true,
                    'fields' => array(

                        'bg_color' => array(
                            'type' => 'color',
                            'label' => __( 'Background Color', 'nbtsow' ),
                            'default' => ''
                        ),

                        'inactive_tab_color' => array(
                            'type' => 'color',
                            'label' => __( 'Inactive Tab Font Color', 'nbtsow' ),
                            'default' => ''
                        ),

                        'active_tab_color' => array(
                            'type' => 'color',
                            'label' => __( 'Active Tab Font Color', 'nbtsow' ),
                            'default' => ''
                        ),

                        'tab_content_color' => array(
                            'type' => 'color',
                            'label' => __( 'Tab Content Color', 'nbtsow' ),
                            'default' => ''
                        ),
                    )
                ),
            )
        );
    }
    // function get_template_variables($instance, $args)
    // {
    //     return array(
    //         'repeater' => $instance['repeater'],
    //         'title' => $instance['title'],
    //         'name' => $instance['name']
    //     );
    // }
    function get_template_name($instance)
    {
        return 'tabs-template';
    }
    function get_style_name($instance)
    {
        return 'tabs-style';
    }
    function get_less_variables( $instance ) {
        return array(
            'bg_color' => isset($instance['tabs_styling']['bg_color']) ? $instance['tabs_styling']['bg_color'] : '',
            'inactive_tab_color' => isset($instance['tabs_styling']['inactive_tab_color']) ? $instance['tabs_styling']['inactive_tab_color'] : '',
            'active_tab_color' => isset($instance['tabs_styling']['active_tab_color']) ? $instance['tabs_styling']['active_tab_color'] : '',
            'tab_content_color' => isset($instance['tabs_styling']['tab_content_color']) ? $instance['tabs_styling']['tab_content_color'] : '',
        );
    }
}
siteorigin_widget_register('nbtsow-tabs-widget', __FILE__,'NBTSOW_Tabs_Widget');