<?php
/*
    Widget Name: NBT our services
    Author: tungbt
    Version: 1.0
    Description: Show info of services
*/
class NBTSOW_Our_Service extends SiteOrigin_Widget{
    function __construct()
    {
        parent::__construct(
            'nbtsow-services-widget',
            __('NBT our services widget','nbtsow'),
            array(
                'description' => __('Widget show services info','nbtsow')
            ),
            array(),
            array(
                'image' => array(
                    'type' => 'media',
                    'label' => __('Select an image','nbtsow'),
                    'library' => 'image',
                    'fallback' => true
                ),
                'size' => array(
                    'type' => 'image-size',
                    'label' => esc_html__('Image size', 'nbtsow'),
                ),
                'title' => array(
                    'type' => 'text',
                    'label' => __('Title for this info','nbtsow')
                ),
                'content' => array(
                    'type'=> 'text',
                    'label' => __('Main text','nbtsow')
                ),
                'subtext' => array(
                    'type' => 'text',
                    'label' => __('Sub text','nbtsow')
                )
            )
        );
    }
    function get_template_variables($instance, $args)
    {
        return array(
            'image' => $instance['image'],
            'size' => $instance['size'],
            'title' => $instance['title'],
            'content' => $instance['content'],
            'subtext' => $instance['subtext']
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
siteorigin_widget_register('nbtsow-services-widget',__FILE__,'NBTSOW_Our_Service');