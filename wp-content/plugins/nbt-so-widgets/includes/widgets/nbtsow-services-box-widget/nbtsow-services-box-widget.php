<?php
/*
Widget Name: NetBaseTeam Services Box
Description: Display a Services Box
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/
class NBTSOW_Services_Box_Widget extends SiteOrigin_Widget {

    function __construct() {
        parent::__construct(
            'nbtsow-services-box-widget',
            esc_html__('NetBaseTeam Service Box', 'nbtsow'),
            array(
                'description' => esc_html__('Service Box.', 'nbtsow'),
            ),
            array(),
            array(
                'widget_title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Widget Title', 'nbtsow'),
                    'default' => ''
                ),
                'opt_selector' => array(
                    'type' => 'select',
                    'label' => esc_html__( 'First choose an option', 'nbtsow' ),
                    'default' => 'blank',
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args' => array( 'opt_selector' )
                    ),
                    'options' => array(
                        'blank' => esc_html__( 'Select an option', 'nbtsow' ),
                        'icon' => esc_html__( 'Icon', 'nbtsow' ),
                        'icon_image' => esc_html__( 'Icon Image', 'nbtsow' ),
                    )
                ),
                'icon_selection' => array(
                    'type' => 'radio',
                    'label' => esc_html__( 'Choose Alignment', 'nbtsow' ),
                    'default' => 'top',
                    'options' => array(
                        'top' => esc_html__( 'Top', 'nbtsow' ),
                        'left' => esc_html__( 'Left', 'nbtsow' ),
                        'right' => esc_html__( 'Right', 'nbtsow' ),
                    )
                ),
                //ICON SECTION
                'icon_section' => array(
                    'type' => 'section',
                    'label' => esc_html__( 'Icon' , 'nbtsow' ),
                    'hide' => true,
                    'state_handler' => array(
                        'opt_selector[icon]' => array('show'),
                        'opt_selector[icon_image]' => array('hide'),
                        'opt_selector[blank]' => array('hide'),
                    ),

                    'fields' => array(

                        'icon_size' => array(
                            'type' => 'slider',
                            'label' => esc_html__( 'Set icon size', 'nbtsow' ),
                            'default' => 3,
                            'min' => 2,
                            'max' => 500,
                            'integer' => true
                        ),

                        'icon' => array(
                            'type' => 'icon',
                            'label' => esc_html__('Select an icon', 'nbtsow'),
                        ),


                    )
                ),
                //ICON IMAGE SECTION
                'icon_image_section' => array(
                    'type' => 'section',
                    'label' => esc_html__( 'Icon Image' , 'nbtsow' ),
                    'hide' => true,
                    'state_handler' => array(
                        'opt_selector[icon_image]' => array('show'),
                        'opt_selector[icon]' => array('hide'),
                        'opt_selector[blank]' => array('hide'),
                    ),
                    'fields' => array(

                        'icon_img_width' => array(
                            'type' => 'slider',
                            'label' => esc_html__( 'Set Image Width', 'nbtsow' ),
                            'default' => 3,
                            'min' => 2,
                            'max' => 500,
                            'integer' => true
                        ),

                        'icon_image' => array(
                            'type' => 'media',
                            'label' => esc_html__( 'Choose Image', 'nbtsow' ),
                            'choose' => esc_html__( 'Choose image', 'nbtsow' ),
                            'update' => esc_html__( 'Set image', 'nbtsow' ),
                            'library' => 'image'
                        ),

                    )
                ),
                'title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Title', 'nbtsow'),
                    'default' => ''
                ),
                'content' => array(
                    'type' => 'tinymce',
                    'label' => esc_html__( 'Content', 'nbtsow' ),
                    'default' => '',
                    'rows' => 10,
                    'default_editor' => 'html',
                    'button_filters' => array(
                        'mce_buttons' => array( $this, 'filter_mce_buttons' ),
                        'mce_buttons_2' => array( $this, 'filter_mce_buttons_2' ),
                        'mce_buttons_3' => array( $this, 'filter_mce_buttons_3' ),
                        'mce_buttons_4' => array( $this, 'filter_mce_buttons_5' ),
                        'quicktags_settings' => array( $this, 'filter_quicktags_settings' ),
                    ),
                ),
                'btn_text' => array(
                    'type' => 'text',
                    'label' => esc_html__('Button Text', 'nbtsow'),
                    'default' => ''
                ),
                'btn_url' => array(
                    'type' => 'text',
                    'label' => esc_html__('Link', 'nbtsow'),
                    'default' => ''
                ),
                'styling' => array(
                    'type' => 'section',
                    'label' => esc_html__( 'Widget styling' , 'nbtsow' ),
                    'hide' => true,
                    'fields' => array(

                        'bg_color' => array(
                            'type' => 'color',
                            'label' => esc_html__( 'Background color', 'nbtsow' ),
                            'default' => ''
                        ),

                        'icon_color' => array(
                            'type' => 'color',
                            'label' => esc_html__( 'Icon color', 'nbtsow' ),
                            'default' => ''
                        ),
                        'title_color' => array(
                            'type' => 'color',
                            'label' => esc_html__( 'Title color', 'nbtsow' ),
                            'default' => ''
                        ),

                        'content_color' => array(
                            'type' => 'color',
                            'label' => esc_html__( 'Content color', 'nbtsow' ),
                            'default' => ''
                        ),
                        'border_color' => array(
                            'type' => 'color',
                            'label' => esc_html__( 'Border color', 'nbtsow' ),
                            'default' => ''
                        ),

                        'box_padding' => array(
                            'type' => 'slider',
                            'label' => esc_html__( 'Service box padding', 'nbtsow' ),
                            'default' => 24,
                            'min' => 2,
                            'max' => 37,
                            'integer' => true
                        ),
                        'box_border' => array(
                            'type' => 'select',
                            'label' => esc_html__( 'Border styled', 'nbtsow' ),
                            'default' => '',
                            'options' => array(
                                'solid' => esc_html__( 'Solid', 'nbtsow' ),
                                'dashed' => esc_html__( 'Dashed', 'nbtsow' ),
                                'dotted' => esc_html__( 'Dotted', 'nbtsow' ),
                            )
                        ),
                        'box_border_width' => array(
                            'type' => 'slider',
                            'label' => esc_html__( 'Border Width', 'nbtsow' ),
                            'default' => 0,
                            'min' => 2,
                            'max' => 37,
                            'integer' => true
                        ),
                    )
                ),
            )
        );
    }

    function get_template_variables( $instance,$args) {
        return array(
            'background_color' => $instance['styling']['bg_color'],
            'icon_color' => $instance['styling']['icon_color'],
            'title_color' => $instance['styling']['title_color'],
            'content_color' => $instance['styling']['content_color'],
            'box_padding' => $instance['styling']['box_padding'].'px',
            'box_border' => $instance['styling']['box_border'],
            'box_border_width' => $instance['styling']['box_border_width'].'px',
            'box_border_color' => $instance['styling']['border_color'],
            'square_shape_bg_color' => isset($instance['styling']['square_shape_bg_color']) ? $instance['styling']['square_shape_bg_color'] : '',
            'square_shape_padding' => isset($instance['styling']['square_shape_padding']) ? $instance['styling']['square_shape_padding'].'px' : '0'.'px',
        );
    }

    function get_template_name($instance) {
        return 'default';
    }

    function get_style_name($instance) {
        return '';
    } 
}

siteorigin_widget_register('nbtsow-services-box-widget', __FILE__, 'NBTSOW_Services_Box_Widget');