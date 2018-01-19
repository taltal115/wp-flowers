<?php
/*
Widget Name: NBT breadcrumb widget
Description: Show breadcrumb
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/
class NBTSOW_Breadcrumb_Widget extends SiteOrigin_Widget{
    function __construct(){
        parent::__construct(
            'nbtsow-breadcrumb-widget',
            esc_html__('Breadcrumb Widget', 'nbtsow'),
            array(
                'description' => esc_html__('This widget show show breadcrumb','nbtsow')
            )
        );
    }
    function  get_template_variables($instance, $args)
    {
        return array(
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
siteorigin_widget_register('nbtsow-breadcrumb-widget', __FILE__, 'NBTSOW_Breadcrumb_Widget');