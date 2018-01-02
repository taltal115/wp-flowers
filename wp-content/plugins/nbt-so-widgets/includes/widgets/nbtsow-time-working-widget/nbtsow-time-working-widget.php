<?php
/*
Widget Name: Time working widget
Description: Show time working in a week
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/
class NBTSOW_Our_Working_Widget extends SiteOrigin_Widget{
    function __construct(){
        parent::__construct(
            'nbtsow-our-working-widget',
            esc_html__('Our Working Widget', 'nbtsow'),
            array(
                'description' => esc_html__('This widget show time working in a week','nbtsow')
            ),
            array(),
            array(
                'title' => array(
                    'type' => 'text',
                    'label' => esc_html__('Title','nbtsow'),
                    'default' => esc_html__('Our Working Hours','nbtsow'),
                ),
                'mon' => array(
                    'type' => 'text',
                    'label' => esc_html__('Monday time working','nbtsow'),
                    'default' => esc_html__('07am-08pm','nbtsow')
                ),
                'tues' => array(
                    'type' => 'text',
                    'label' => esc_html__('Tuesday time working','nbtsow'),
                    'default' => esc_html__('07am-08pm','nbtsow')
        
                ),
                'wednes' => array(
                    'type' => 'text',
                    'label' => esc_html__('Wednesday time working','nbtsow'),
                    'default' => esc_html__('07am-08pm','nbtsow')
                ),
                'thurs' => array(
                    'type' => 'text',
                    'label' => esc_html__('Thurday time working','nbtsow'),
                    'default' => esc_html__('07am-08pm','nbtsow')
                ),
                'fri' => array(
                    'type' => 'text',
                    'label' => esc_html__('Fri time working','nbtsow'),
                    'default' => esc_html__('07am-08pm','nbtsow')
                ),
                'sun_sat' => array(
                    'type' => 'text',
                    'label' => esc_html__('Sunday and Saturday time working','nbtsow'),
                    'default' => esc_html__('Not working','nbtsow')
                )
            )
        );
    }
    function  get_template_variables($instance, $args)
    {
        return array(
            'title' => $instance['title'],
            'mon' => $instance['mon'],
            'tues' => $instance['tues'],
            'wednes' => $instance['wednes'],
            'thurs' => $instance['thurs'],
            'fri' => $instance['fri'],
            'sun_sat' => $instance['sun_sat']
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
siteorigin_widget_register('nbtsow-our-working-widget', __FILE__, 'NBTSOW_Our_Working_Widget');