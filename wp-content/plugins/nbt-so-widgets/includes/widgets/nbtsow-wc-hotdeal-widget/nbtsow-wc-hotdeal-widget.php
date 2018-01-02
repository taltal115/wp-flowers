<?php
/*
Widget Name: NetBaseTeam Countdown Widget
Description: NetBaseTeam countdown time widget.
Author: NetBaseTeam
Author URI: https://netbaseteam.com
*/

class NBTSOW_Countdown_Widget extends SiteOrigin_Widget {
    function __construct() {
        parent::__construct(
            'nbtsow-countdown-widget',
            esc_html__('NetBaseTeam Countdown Widget', 'nbtsow'),
            array(
                'description' => esc_html__(' Countdown time widget.', 'nbtsow'),
            ),
            array(),
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Widget title', 'nbtsow'),
                ),

                'sub_title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Widget title', 'nbtsow'),
                ),
                'image' => array(
                    'type' => 'media',
                    'label' => esc_html__('Image file', 'nbtsow'),
                    'library' => 'image',
                    'fallback' => true,
                ),
                'url' => array(
                    'type' => 'link',
                    'label' => esc_html__('Destination URL', 'nbtsow'),
                ),
                'new_window' => array(
                    'type' => 'checkbox',
                    'default' => false,
                    'label' => esc_html__('Open in new window', 'nbtsow'),
                ),
                'countdown' => array(
                    'type' => 'text',
                    'label' => __('Your countdown', 'nbtsow'),
                    'description' => esc_html__(' Example for date input "25 december 2017 23:5"', 'nbtsow'),
                    'default' => '25 december 2017 23:5',
                )
            )
        );
    }

    function get_template_variables($instance, $args) {
        return array(
            'title' => $instance['title'],
            'sub_title' => $instance['sub_title'],
            'image' => $instance['image'],
            'url' => $instance['url'],
            'new_window' => $instance['new_window'],
            'countdown' => $instance['countdown'],
        );
    }

    function get_template_name($instance) {
        return 'default';
    }

    function get_style_name($instance) {
        return '';
    }
}

siteorigin_widget_register('nbtsow-countdown-widget', __FILE__, 'NBTSOW_Countdown_Widget');