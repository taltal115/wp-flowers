<?php
/*
Widget Name: NetBaseTeam Call To Action Button
Description: Call to action button with text, image and icon
Author: NetBaseTeam
Author URI: http://netbaseteam.com
*/

class NBTSOW_Cta_Widget extends SiteOrigin_Widget {

	function __construct() {

		parent::__construct(
			'nbtsow-cta-widget',
			esc_html__('NetBaseTeam Call to action button', 'nbtsow'),
			array(
				'description' => esc_html__('Powerful call to action button', 'nbtsow'),
			),
			array(),
			array(
				'image' => array(
					'type' => 'section',
					'label' => esc_html__('Image', 'nbtsow'),
					'hide' => false,
					'fields' => array(
						'upload_image' => array(
							'type' => 'media',
							'label' => esc_html__('Upload Image', 'nbtsow'),
							'library' => 'image',
						),
						'size' => array(
							'type' => 'image-size',
							'label' => esc_html__('Image Size', 'nbtsow'),
						),
						'alt' => array(
							'type' => 'text',
							'label' => esc_html__('Image Alt', 'nbtsow'),
						),
					),
				),
				'headlines' => array(
					'type' => 'section',
					'label' => esc_html__('Headlines', 'nbtsow'),
					'hide' => true,
					'fields' => array(
						'headline_text' => array(
							'type' => 'text',
							'label' => esc_html__('Headline Text', 'nbtsow'),
						),
						'headline_tag' => array(
							'type' => 'select',
							'label' => esc_html__( 'HTML Tag', 'nbtsow' ),
							'default' => 'h2',
							'options' => array(
								'h1' =>esc_html__( 'H1', 'nbtsow' ),
								'h2' =>esc_html__( 'H2', 'nbtsow' ),
								'h3' =>esc_html__( 'H3', 'nbtsow' ),
								'h4' =>esc_html__( 'H4', 'nbtsow' ),
								'h5' =>esc_html__( 'H5', 'nbtsow' ),
								'h6' =>esc_html__( 'H6', 'nbtsow' ),
								'p' =>esc_html__( 'Paragraph', 'nbtsow' ),
							),
						),
						'subhead_text' => array(
							'type' => 'text',
							'label' => esc_html__('Sub Headline Text', 'nbtsow'),
						),
						'subhead_tag' => array(
							'type' => 'select',
							'label' => esc_html__( 'HTML Tag', 'nbtsow' ),
							'default' => 'h3',
							'options' => array(
								'h1' => esc_html__( 'H1', 'nbtsow' ),
								'h2' => esc_html__( 'H2', 'nbtsow' ),
								'h3' => esc_html__( 'H3', 'nbtsow' ),
								'h4' => esc_html__( 'H4', 'nbtsow' ),
								'h5' => esc_html__( 'H5', 'nbtsow' ),
								'h6' => esc_html__( 'H6', 'nbtsow' ),
								'p' => esc_html__( 'Paragraph', 'nbtsow' ),
							),
						),
						'button_text' => array(
							'type' => 'text',
							'label' => esc_html__('Button Text', 'nbtsow'),
						),
						'href' => array(
							'type' => 'text',
							'label' => esc_html__('Button Link', 'nbtsow'),
						),
					),
				),
				'order' => array(
					'type' => 'order',
					'label' => esc_html__( 'Element Order', 'nbtsow' ),
					'options' => array(
						'image' => esc_html__( 'Image', 'nbtsow' ),
						'headlines' => esc_html__( 'Headlines', 'nbtsow' )
					),
					'default' => array( 'image', 'headlines' ),
				),
			)
		);

	}

	function get_template_variables($instance, $args) {
		return array(
			'upload_image' => $instance['image']['upload_image'],
			'size' => $instance['image']['size'],
			'alt' => $instance['image']['alt'],
			'headline_text' => $instance['headlines']['headline_text'],
			'headline_tag' => $instance['headlines']['headline_tag'],
			'subhead_text' => $instance['headlines']['subhead_text'],
			'subhead_tag' => $instance['headlines']['subhead_tag'],
			'button_text' => $instance['headlines']['button_text'],
			'href' => $instance['headlines']['href'],
			'order' => $instance['order'],
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}

}

siteorigin_widget_register('nbtsow-cta-widget', __FILE__, 'NBTSOW_Cta_Widget');
