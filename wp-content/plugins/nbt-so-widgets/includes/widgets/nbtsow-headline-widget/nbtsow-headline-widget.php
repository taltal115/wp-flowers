<?php
/*
Widget Name: NetBaseTeam Extended Headline
Description: A simple extended headline widget
Author: NetBaseTeam
Author URI: https://netbaseteam.com
*/
class NBTSOW_Headline_Widget extends SiteOrigin_Widget {
  function __construct() {
    parent::__construct(
			'nbtsow-headline-widget',
			esc_html__( 'NetBaseTeam Extended Headline', 'nbtsow' ),
			array(
				'description' => esc_html__( 'A extended headline widget.', 'nbtsow' )
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
						'color' => array(
							'type' => 'color',
							'label' => __('Color', 'nbtsow'),
						),
						'font' => array(
							'type' => 'font',
							'label' => __( 'Font', 'nbtsow' ),
							'default' => 'default'
						),
						'fontsize' => array(
							'type' => 'measurement',
							'label' => __('Font Size', 'nbtsow')
						),
						'align' => array(
							'type' => 'select',
							'label' => __( 'Alignment', 'nbtsow' ),
							'default' => 'center',
							'options' => array(
								'center' => __( 'Center', 'nbtsow' ),
								'left' => __( 'Left', 'nbtsow' ),
								'right' => __( 'Right', 'nbtsow' ),
								'justify' => __( 'Justify', 'nbtsow' )
							)
						),
						'lineheight' => array(
							'type' => 'measurement',
							'label' => __('Line Height', 'nbtsow')
						),
						'margin' => array(
							'type' => 'measurement',
							'label' => __('Top and Bottom Margin', 'nbtsow'),
							'default' => '',
						),
					),
				),
				'sub_line' => array(
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
						'color' => array(
							'type' => 'color',
							'label' => __('Color', 'nbtsow'),
						),
						'font' => array(
							'type' => 'font',
							'label' => __( 'Font', 'nbtsow' ),
							'default' => 'default'
						),
						'fontsize' => array(
							'type' => 'measurement',
							'label' => __('Font Size', 'nbtsow')
						),
						'align' => array(
							'type' => 'select',
							'label' => __( 'Alignment', 'nbtsow' ),
							'default' => 'center',
							'options' => array(
								'center' => __( 'Center', 'nbtsow' ),
								'left' => __( 'Left', 'nbtsow' ),
								'right' => __( 'Right', 'nbtsow' ),
								'justify' => __( 'Justify', 'nbtsow' )
							)
						),
						'lineheight' => array(
							'type' => 'measurement',
							'label' => __('Line Height', 'nbtsow')
						),
						'margin' => array(
							'type' => 'measurement',
							'label' => __('Top and Bottom Margin', 'nbtsow'),
							'default' => '',
						),
					),
				),
				'divider' => array(
					'type' => 'section',
					'label' => __( 'Divider', 'nbtsow' ),
					'hide' => true,
					'fields' => array(
						'style' => array(
							'type' => 'select',
							'label' => __( 'Style', 'nbtsow' ),
							'default' => 'solid',
							'options' => array(
								'none' => __('None', 'nbtsow'),
								'solid' => __('Solid', 'nbtsow'),
								'dotted' => __('Dotted', 'nbtsow'),
								'dashed' => __('Dashed', 'nbtsow'),
								'double' => __('Double', 'nbtsow'),
								'groove' => __('Groove', 'nbtsow'),
								'ridge' => __('Ridge', 'nbtsow'),
								'inset' => __('Inset', 'nbtsow'),
								'outset' => __('Outset', 'nbtsow'),
							)
						),
						'color' => array(
							'type' => 'color',
							'label' => __('Color', 'nbtsow'),
							'default' => '#EEEEEE'
						),
						'thickness' => array(
							'type' => 'slider',
							'label' => __( 'Thickness', 'nbtsow' ),
							'min' => 0,
							'max' => 20,
							'default' => 1
						),
						'align' => array(
							'type' => 'select',
							'label' => __('Alignment', 'nbtsow'),
							'default' => 'center',
							'options' => array(
								'center' => __( 'Center', 'nbtsow' ),
								'left' => __( 'Left', 'nbtsow' ),
								'right' => __( 'Right', 'nbtsow' ),
							),
						),
						'width' => array(
							'type' => 'measurement',
							'label' => __('Divider Width', 'nbtsow'),
							'default' => '80%',
						),
						'margin' => array(
							'type' => 'measurement',
							'label' => __('Top and Bottom Margin', 'nbtsow'),
							'default' => '',
						),
					)
				),
				'order' => array(
					'type' => 'order',
					'label' => esc_html__( 'Element Order', 'nbtsow' ),
					'options' => array(
						'headline' => esc_html__( 'Headline', 'nbtsow' ),
						'sub_line' => esc_html__( 'Sub Headline', 'nbtsow' ),
						'divider' => esc_html__( 'Divider', 'nbtsow' ),
					),
					'default' => array( 'headline', 'divider', 'sub_line' ),
				),
				'fittext' => array(
					'type' => 'checkbox',
					'label' => __( 'Use FitText', 'nbtsow' ),
					'description' => __( 'Dynamically adjust your heading font size based on screen size.', 'nbtsow' ),
					'default' => false,
				)
			)
		);
  }

	function get_template_variables($instance, $args) {
		return array(

			'headline_text' => $instance['headline']['text'],
			'headline_tag' => $instance['headline']['tag'],
			'headline_color' => $instance['headline']['color'],
			'headline_font' => $instance['headline']['font'],
			'headline_fontsize' => $instance['headline']['fontsize'],
			'headline_align' => $instance['headline']['align'],
			'headline_lineheight' => $instance['headline']['lineheight'],
			'headline_margin' => $instance['headline']['margin'],
			'sub_line_text' => $instance['sub_line']['text'],
			'sub_line_tag' => $instance['sub_line']['tag'],
			'sub_line_color' => $instance['sub_line']['color'],
			'sub_line_font' => $instance['sub_line']['font'],
			'sub_line_fontsize' => $instance['sub_line']['fontsize'],
			'sub_line_align' => $instance['sub_line']['align'],
			'sub_line_lineheight' => $instance['sub_line']['lineheight'],
			'sub_line_margin' => $instance['sub_line']['margin'],
			'divider' => array(
				'divider_style' => $instance['divider']['style'],
				'divider_color' => $instance['divider']['color'],
				'divider_thickness' => $instance['divider']['thickness'],
				'divider_align' => $instance['divider']['align'],
				'divider_width' => $instance['divider']['width'],
				'divider_margin' => $instance['divider']['margin'],
			),
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

siteorigin_widget_register('nbtsow-headline-widget', __FILE__, 'NBTSOW_Headline_Widget');
