<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Section_kea_gradient_bg {

    protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }
    
    public function __construct() {
		$this->init_hooks();
	}

    public static function init_hooks() {
        add_action( 'elementor/element/section/section_layout/after_section_end', [__CLASS__, 'add_section'] );
        add_action( 'elementor/element/column/section_style/before_section_start', [__CLASS__, 'add_section'] );
        add_action( 'elementor/element/container/section_layout_container/after_section_end', [__CLASS__, 'add_section'] );
    }
    
    public static function add_section( Element_Base $element ) {

        $element->start_controls_section(
            '_section_gradient_anim',
            [
                'label' => esc_html__( 'KEA Gradient BG Animation', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $element->add_control(
            'kea_gradient_bg_enable',
            [
                'label' => esc_html__( 'Enable Animation', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'frontend_available' => true
            ]
        );

        $element->add_control(
			'kea_gradient_bg_rotate',
			[
				'label' => esc_html__( 'Rotate', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => -360,
						'max' => 360,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -45,
                ],
                'frontend_available' => true,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ]
			]
        );

        $element->add_control(
            'kea_gradient_bg_size',
            [
                'label' => esc_html__( 'Background Size', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 100,
                'max' => 1000,
                'step' => 10,
                'default' => 400,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_gradient_bg_duration',
            [
                'label' => esc_html__( 'Animation Duration (second)', 'keystone-elements-addons' ),
                'description' => esc_html__( 'How long you want it to last in seconds.', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 100,
                'step' => 1,
                'default' => 15,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
			'kea_gradient_bg_hr_1',
			[
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ],
			]
		); 

        $element->add_control(
			'kea_gradient_bg_color_1',
			[
				'label' => esc_html__( 'Color 1', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ee7752',
                'frontend_available' => true,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ]
			]
        );

        $element->add_control(
			'kea_gradient_bg_color_2',
			[
				'label' => esc_html__( 'Color 2', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#e73c7e',
                'frontend_available' => true,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ]
			]
        );

        $element->add_control(
			'kea_gradient_bg_color_3',
			[
				'label' => esc_html__( 'Color 3', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#23a6d5',
                'frontend_available' => true,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ]
			]
        );

        $element->add_control(
			'kea_gradient_bg_color_4',
			[
				'label' => esc_html__( 'Color 4', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#23d5ab',
                'frontend_available' => true,
                'condition' => [
                    'kea_gradient_bg_enable' => 'yes'
                ]
			]
        );

        $element->end_controls_section();
        
    }
}

Section_kea_gradient_bg::instance();
