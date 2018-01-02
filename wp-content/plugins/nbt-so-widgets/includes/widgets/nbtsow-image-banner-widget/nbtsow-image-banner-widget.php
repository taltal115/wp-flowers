<?php
/*
Widget Name: NBTSOW Image Banner
Description: A very simple image widget.
Author: Netbase Team
Author URI: http://netbaseteam.com/
*/

class NBTSOW_Image_Banner_Widget extends SiteOrigin_Widget {
	function __construct() {
		parent::__construct(
			'nbtsow-image-banner',
			esc_html__('NetBaseTeam Image banner', 'nbtsow'),
			
			array(
				'description' => esc_html__('NetBaseTeam image banner.', 'nbtsow'),
                'panels_icon' => 'dashicons dashicons-welcome-widgets-menus',
                'panels_groups' => array('netbaseteam')
			),
			array(

			),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	function initialize_form() {

		return array(
			'image' => array(
				'type' => 'media',
				'label' => esc_html__('Image file', 'nbtsow'),
				'library' => 'image',
				'fallback' => true,
			),

			'size' => array(
				'type' => 'image-size',
				'label' => esc_html__('Image size', 'nbtsow'),
			),

			'align' => array(
				'type' => 'select',
				'label' => esc_html__('Image alignment', 'nbtsow'),
				'default' => 'default',
				'options' => array(
					'default' => esc_html__('Default', 'nbtsow'),
					'left' => esc_html__('Left', 'nbtsow'),
					'right' => esc_html__('Right', 'nbtsow'),
					'center' => esc_html__('Center', 'nbtsow'),
				),
			),

			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Title text', 'nbtsow'),
			),
			
			'caption' => array(
				'type' => 'text',
				'label' => esc_html__('Caption text', 'nbtsow'),
			),
			'txt_primary' => array(
				'type' => 'text',
				'label' => esc_html__('Primary Text', 'nbtsow'),
			),
			
			'txt_btn' => array(
				'type' => 'text',
				'label' => esc_html__('Button text', 'nbtsow'),
			),
			
			'nbtclass' => array(
				'type' => 'text',
				'label' => esc_html__('Add class', 'nbtsow'),
			),

			'title_position' => array(
				'type' => 'select',
				'label' => esc_html__('Title position', 'nbtsow'),
				'default' => 'hidden',
				'options' => array(
					'hidden' => esc_html__( 'Hidden', 'nbtsow' ),
					'above' => esc_html__( 'Above', 'nbtsow' ),
					'below' => esc_html__( 'Below', 'nbtsow' ),
				),
			),

			'alt' => array(
				'type' => 'text',
				'label' => esc_html__('Alt text', 'nbtsow'),
			),
			'linksc' => array(
				'type' => 'text',
				'label' => esc_html__('Add link by shortcode', 'nbtsow'),
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

			'bound' => array(
				'type' => 'checkbox',
				'default' => true,
				'label' => esc_html__('Bound', 'nbtsow'),
				'description' => esc_html__("Make sure the image doesn't extend beyond its container.", 'nbtsow'),
			),
			'full_width' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => esc_html__('Full Width', 'nbtsow'),
				'description' => esc_html__("Resize image to fit its container.", 'snbtsow'),
			),
			'link_addimg' => array(
				'type' => 'checkbox',
				'default' => false,
				'label' => esc_html__('Add link Image', 'nbtsow'),
				'description' => esc_html__("Resize image to fit its container.", 'nbtsow'),
			),

		);
	}

	function get_style_hash($instance) {
		return substr( md5( serialize( $this->get_less_variables( $instance ) ) ), 0, 12 );
	}

	public function get_template_variables( $instance, $args ) {
		return array(
			'title' => $instance['title'],
			'caption' => $instance['caption'],
			'txt_primary' => $instance['txt_primary'],
			'txt_btn' => $instance['txt_btn'],
			'nbtclass' => $instance['nbtclass'],

			'title_position' => $instance['title_position'],
			'image' => $instance['image'],
			'size' => $instance['size'],
			'image_fallback' => ! empty( $instance['image_fallback'] ) ? $instance['image_fallback'] : false,
			'alt' => $instance['alt'],
			'url' => $instance['url'],
			'linksc' => $instance['linksc'],
			'new_window' => $instance['new_window'],
			'link_addimg' => $instance['link_addimg'],
		);
	}

	function get_less_variables($instance){
		return array(
			'image_alignment' => $instance['align'],
			'image_display' => $instance['align'] == 'default' ? 'block' : 'inline-block',
			'image_max_width' => ! empty( $instance['bound'] ) ? '100%' : '',
			'image_height' => ! empty( $instance['bound'] ) ? 'auto' : '',
			'image_width' => ! empty( $instance['full_width'] ) ? '100%' : '',
		);
	}
}

siteorigin_widget_register('nbtsow-image-banner', __FILE__, 'NBTSOW_Image_Banner_Widget');
