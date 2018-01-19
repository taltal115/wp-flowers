<?php
/*
Widget Name: Netbaseteam Doughnut Widget
Description: Display Doughnut canvas
Author: Netbaseteam
Author URI: http://netbaseteam.com
*/
class NBTSOW_Doughtnut_Widget extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'nbtsow-doughnut-widget',
			esc_html__('Netbaseteam Doughnut Widget', 'nbtsow'),
			array(
				'description' => esc_html__('Display Doughnut canvas', 'nbtsow'),
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Widget Title', 'nbtsow'),
				),
				'text' => array(
					'type' => 'text',
					'label' => esc_html__('Text content', 'nbtsow'),
				),
				'style' => array(
					'type' => 'select',
					'label' => esc_html__( 'Choose style for widget', 'nbtsow' ),
					'options' => array(
						'myDoughnut'  => esc_html__( 'myDoughnut', 'nbtsow' ),
						'myDoughnut2' => esc_html__( 'My Doughnut 2', 'nbtsow' ),
						'myDoughnut3'  => esc_html__( 'My Doughnut 3', 'nbtsow' ),
						'myDoughnut4' => esc_html__( 'My Doughnut 4', 'nbtsow' ),
					),
				),
			)
		);
	}

	function get_template_variables($instance, $args) {
		return array(
			'title' => !empty($instance['title']) ? $instance['title'] : '',
			'text' => $instance['text'],
			'style' => $instance['style'],
		);
	}

	function get_template_name($instance) {
		return 'default';
	}

	function get_style_name($instance) {
		return '';
	}
	 function initialize() {

        $this->register_frontend_scripts(
            array(
                array(
                    'nbtsow-doughnut',
                    plugin_dir_url(__FILE__) . 'js/doughnutit.js',
                    array('jquery')
                )
            )
        );

        $this->register_frontend_scripts(
            array(
                array(
                    'nbtsow-doughnut-chart',
                    plugin_dir_url(__FILE__) . 'js/Chart.js',
                    array('jquery')
                )
            )
        );

        $this->register_frontend_scripts(
            array(
                array(
                    'nbtsow-doughnut-cutomine',
                    plugin_dir_url(__FILE__) . 'js/customize.js',
                    array('jquery')
                )
            )
        );

        $this->register_frontend_styles(array(
            array(
                'nbtsow-doughnut-style',
                plugin_dir_url(__FILE__) . 'css/doughnutit.css'
            )
        ));
    }

}

siteorigin_widget_register('nbtsow-doughnut-widget', __FILE__, 'NBTSOW_Doughtnut_Widget');
