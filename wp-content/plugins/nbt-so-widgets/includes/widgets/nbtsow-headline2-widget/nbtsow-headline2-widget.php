<?php
/*
Widget Name: NetBaseTeam Headline 2
Description: A simple extended headline widget
Author: NetBaseTeam
Author URI: https://netbaseteam.com
*/

class NBTSOW_Headline2_Widget extends SiteOrigin_Widget {
  function __construct() {
    parent::__construct(
			'nbtsow-headline2-widget',
			esc_html__( 'NetBaseTeam Extended Headline 2', 'nbtsow' ),
			array(
				'description' => esc_html__( 'A extended headline 2 widget.', 'nbtsow' )
			),
			array(),
			array(
				'headline' => array(
					'type' => 'section',
					'label' => esc_html__( 'Headline', 'nbtsow' ),
					'hide' => false,
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => esc_html__( 'Headline Text', 'nbtsow' ),
						),
						'tag' => array(
							'type' => 'select',
							'label' => esc_html__( 'HTML Tag', 'nbtsow' ),
							'default' => 'h2',
							'options' => array(
								'h1' => esc_html__( 'H1', 'nbtsow' ),
								'h2' => esc_html__( 'H2', 'nbtsow' ),
								'h3' => esc_html__( 'H3', 'nbtsow' ),
								'h4' => esc_html__( 'H4', 'nbtsow' ),
								'h5' => esc_html__( 'H5', 'nbtsow' ),
								'h6' => esc_html__( 'H6', 'nbtsow' ),
								'p' => esc_html__( 'Paragraph', 'nbtsow' ),
							)
						),
					),
				),
				'first_sub' => array(
					'type' => 'section',
					'label' => esc_html__( 'Sub Headline', 'nbtsow' ),
					'hide' => true,
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => esc_html__( 'Text', 'nbtsow' ),
						),
						'tag' => array(
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
							)
						),
					),
				),
				'second_sub' => array(
					'type' => 'section',
					'label' => esc_html__( 'Another Sub Headline', 'nbtsow' ),
					'hide' => true,
					'fields' => array(
						'text' => array(
							'type' => 'text',
							'label' => esc_html__( 'Text', 'nbtsow' ),
						),
						'tag' => array(
							'type' => 'select',
							'label' => esc_html__( 'HTML Tag', 'nbtsow' ),
							'default' => 'p',
							'options' => array(
								'h1' => esc_html__( 'H1', 'nbtsow' ),
								'h2' => esc_html__( 'H2', 'nbtsow' ),
								'h3' => esc_html__( 'H3', 'nbtsow' ),
								'h4' => esc_html__( 'H4', 'nbtsow' ),
								'h5' => esc_html__( 'H5', 'nbtsow' ),
								'h6' => esc_html__( 'H6', 'nbtsow' ),
								'p' => esc_html__( 'Paragraph', 'nbtsow' ),
							)
						),
					),
				),
				'order' => array(
					'type' => 'order',
					'label' => esc_html__( 'Element Order', 'nbtsow' ),
					'options' => array(
						'headline' => esc_html__( 'Headline', 'nbtsow' ),
						'first_sub' => esc_html__( 'First Sub Headline', 'nbtsow' ),
						'second_sub' => esc_html__( 'Second Sub Headline', 'nbtsow' ),
					),
					'default' => array( 'headline', 'first_sub', 'second_sub' ),
				),
			)
		);
  }

	function get_template_variables($instance, $args) {
		return array(
			'headline_text' => $instance['headline']['text'],
			'headline_tag' => $instance['headline']['tag'],
			'first_sub_text' => $instance['first_sub']['text'],
			'first_sub_tag' => $instance['first_sub']['tag'],
			'second_sub_text' => $instance['second_sub']['text'],
			'second_sub_tag' => $instance['second_sub']['tag'],
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

siteorigin_widget_register('nbtsow-headline2-widget', __FILE__, 'NBTSOW_Headline2_Widget');
