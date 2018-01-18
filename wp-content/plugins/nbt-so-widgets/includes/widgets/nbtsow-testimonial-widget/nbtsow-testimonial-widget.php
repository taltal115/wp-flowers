<?php
/*
Widget Name: Testimotial Widget
Description: Show testimonial
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Testimonial_Widget extends SiteOrigin_Widget{
    function __construct()
    {
        parent::__construct(
            'nbtsow-testimonial-widget',
            esc_html__('Testimonial-Widget','nbtsow'),
            array(
                'description' => esc_html__('This widget show testimonial','nbtsow')
            ),
            array(),
            array(
                'image' => array(
                    'type' => 'media',
                    'label' => esc_html__('Image File','nbtsow'),
                    'library' => 'image',
                    'fallback' => true
                ),
                'testimonials' => array(
                    'type' => 'repeater',
                    'label' => esc_html__( 'Testimonial' , 'nbtsow' ),
                    'item_name'  => __( 'Testimonial item', 'nbtsow' ),
                    'item_label' => array(
                        'selector'     => "[id*='repeat_text']",
                        'update_event' => 'change',
                        'value_method' => 'val'
                    ),
                    'fields' => array(
                        't_image'=> array(
                            'type' => 'media',
                            'label' => esc_html__('Image for user','nbtsow'),
                            'library'=> 'image',
                            'fallback' => true
                        ),
                        't_comment' => array(
                            'type' => 'text',
                            'label' => esc_html__( 'Some of user testimonial.', 'nbtsow' )
                        ),
                        't_name' => array(
                            'type' => 'text',
                            'label' => esc_html__('Name of user.', 'nbtsow')
                        )
                    )
                )
            )
        );
    }
    function get_template_variables($instance, $args)
    {
        return array(
            'image' => $instance['image'],
            'testimonials' => $instance['testimonials'],
           /* 'testimonials_image' => $instance['testimonials']['testimonials_image'],
            'testimonials_user_comment' => $instance['testimonials']['testimonials_comment'],
            'testimonials_name' => $instance['testimonials']['testimonials_name']*/
        );
    }
    function get_template_name($instance)
    {
        return 'default';
    }
    function get_style_name($instance)
    {
        return '';
    }
}
siteorigin_widget_register('nbtsow-testimonial-widget', __FILE__,'NBTSOW_Testimonial_Widget');