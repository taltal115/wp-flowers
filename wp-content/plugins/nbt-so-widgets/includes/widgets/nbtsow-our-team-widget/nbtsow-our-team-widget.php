<?php
/*
    Widget Name: NBT our team
    Author: Netbaseteam
    Description: Show team work info 
*/
class NBTSOW_Our_Team_Widget extends SiteOrigin_Widget{
    function __construct()
    {
        parent::__construct(
            'nbtsow-our-team-widget',
            esc_html__('NBT Our Team Widget', 'nbtsow'),
            array(
                'description' => esc_html__('Show info of team work','nbtsow')
            ),
            array(),
            array(
                'name' => array(
                    'type' => 'text',
                    'label' => esc_html__('Name', 'nbtsow')
                ),
                'job' => array(
                    'type' => 'text',
                    'label' => esc_html__('Job', 'nbtsow')
                ),
                'image' => array(
                    'type' => 'media',
                    'label' => esc_html__('Image File', 'nbtsow'),
                    'library' => 'image',
                    'fallback' => true
                ),
                'size' => array(
                    'type' => 'image-size',
                    'label' => esc_html__('Size', 'nbtsow')
                ),
                'alt' => array(
                    'type'=> 'text',
                    'label' => esc_html__('Alt', 'nbtsow')
                ),
                'facebook_url' => array(
                    'type' => 'link',
                    'label' => esc_html__('Faceook URL', 'nbtsow'),
                ),
                'twiter_url' => array(
                    'type' => 'link',
                    'label' => esc_html__('Twiter URL', 'nbtsow'),
                ),
                'google_url' => array(
                    'type' => 'link',
                    'label' => esc_html__('Google Plus URL', 'nbtsow'),
                ),
                'in_url' => array(
                    'type' => 'link',
                    'label' => esc_html__('In Link', 'nbtsow'),
                ),
            )
        );
    }
    function get_template_variables($instance, $args)
    {
        return array(
            'name' => $instance['name'],
            'job' => $instance['job'],
            'image' => $instance['image'],
            'size' => $instance['size'],
            'alt' => $instance['alt'],
            'facebook_url' => $instance['facebook_url'],
            'twiter_url' => $instance['twiter_url'],
            'google_url' => $instance['google_url'],
            'in_url' => $instance['in_url']
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
siteorigin_widget_register('nbtsow-our-team-widget',__FILE__,'NBTSOW_Our_Team_Widget');