<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Section_kea_shape_divider {

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
        add_action( 'elementor/element/container/section_layout_container/after_section_end', [__CLASS__, 'add_section'] );
    }
    
    public static function add_section( Element_Base $element ) {

        $element->start_controls_section(
            '_section_shape_divider',
            [
                'label' => esc_html__( 'KEA Shape Divider', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $element->start_controls_tabs( 'tabs_divider_style' );
        
        $element->start_controls_tab(
			'tab_divider_top',
			[
				'label' => esc_html__( 'TOP', 'keystone-elements-addons'),
			]
        );
        
        $element->add_control(
			'kea_shape_divider_top',
			[
                'label' => esc_html__( 'Type', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'none' => esc_html__( 'None', 'keystone-elements-addons' ),
                    'basic-triangle' => esc_html__( 'Basic Triangle', 'keystone-elements-addons' ),
                    'big-round' => esc_html__( 'Big Round', 'keystone-elements-addons' ),
                    'book' => esc_html__( 'Book', 'keystone-elements-addons' ),
                    'bubbles' => esc_html__( 'Bubbles', 'keystone-elements-addons' ), 
                    'christmas-trees' => esc_html__( 'Christmas Trees', 'keystone-elements-addons' ),
                    'clouds' => esc_html__( 'Clouds', 'keystone-elements-addons' ),
                    'faded-clouds' => esc_html__( 'Faded Clouds', 'keystone-elements-addons' ),
                    'faded-loops' => esc_html__( 'Faded Loops', 'keystone-elements-addons' ),
                    'faded-slant' => esc_html__( 'Faded Slant', 'keystone-elements-addons' ),
                    'faded-triangle' => esc_html__( 'Faded Triangle', 'keystone-elements-addons' ),
                    'fall-leaves' => esc_html__( 'Fall Leaves', 'keystone-elements-addons' ),
                    'fire' => esc_html__( 'Fire', 'keystone-elements-addons' ),
                    'half-sphere' => esc_html__( 'Half Sphere', 'keystone-elements-addons' ),
                    'iceberg' => esc_html__( 'Iceberg', 'keystone-elements-addons' ),
                    'mountain' => esc_html__( 'Mountain', 'keystone-elements-addons' ),
                    'paint-brush' => esc_html__( 'Paint Brush', 'keystone-elements-addons' ),
                    'paint-drip' => esc_html__( 'Paint Drip', 'keystone-elements-addons' ),
                    'pyramid' => esc_html__( 'Pyramid', 'keystone-elements-addons' ),
                    'rough-edges' => esc_html__( 'Rough Edges', 'keystone-elements-addons' ),
                    'sharp-paper' => esc_html__( 'Sharp Paper', 'keystone-elements-addons' ),
                    'sharp-slants' => esc_html__( 'Sharp Slants', 'keystone-elements-addons' ),
                    'shredded-paper' => esc_html__( 'Shredded Paper', 'keystone-elements-addons' ),
                    'side-triangle' => esc_html__( 'Side Triangle', 'keystone-elements-addons' ),
                    'slant' => esc_html__( 'Slant', 'keystone-elements-addons' ),
                    'slant-down' => esc_html__( 'Slant Down', 'keystone-elements-addons' ),
                    'slant-up' => esc_html__( 'Slant Up', 'keystone-elements-addons' ),
                    'small-triangles' => esc_html__( 'Small Triangles', 'keystone-elements-addons' ),
                    'snowflakes' => esc_html__( 'Snowflakes', 'keystone-elements-addons' ),
                    'three-triangles' => esc_html__( 'Three Triangles', 'keystone-elements-addons' ),
                    'tri-triangle' => esc_html__( 'Tri Triangle', 'keystone-elements-addons' ),
                    'triangle-dent' => esc_html__( 'Triangle Dent', 'keystone-elements-addons' ),
                    'triangle-uneven' => esc_html__( 'Triangle Uneven', 'keystone-elements-addons' ),
                    'wavy-dashed' => esc_html__( 'Wavy Dashed', 'keystone-elements-addons' ),
                    'wavy-loops' => esc_html__( 'Wavy Loops', 'keystone-elements-addons' ),
                    'wavy-motion' => esc_html__( 'Wavy Motion', 'keystone-elements-addons' ),
                    'custom' => esc_html__( 'Custom', 'keystone-elements-addons' )
				],
                'default' => 'none',
                'frontend_available' => true
			]
        );

        $element->add_control(
			'kea_shape_divider_top_custom',
			[
				'label' => esc_html__( 'Select File', 'keystone-elements-addons' ),
				'type'	=> 'kea-file-select',
				'placeholder' => esc_html__( 'URL to File', 'keystone-elements-addons' ),
                'default' => KEA_PLUGINS_URL . 'assets/js/library/dividers/big-round-top.svg',
                'condition' => [
                    'kea_shape_divider_top' => 'custom'
                ],
                'frontend_available' => true
			]
        );
        
        $element->add_control(
			'kea_shape_divider_top_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'frontend_available' => true,
                'condition' => [
                    'kea_shape_divider_top!' => 'none'
                ]
			]
        );

        $element->add_control(
            'kea_shape_divider_top_width',
            [
                'label' => esc_html__( 'Width (%)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 100
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 300,
                        'step' => 1
                    ]
                ],
                'condition' => [
                    'kea_shape_divider_top!' => 'none'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_shape_divider_top_height',
            [
                'label' => esc_html__( 'Height (px)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1
                    ]
                ],
                'condition' => [
                    'kea_shape_divider_top!' => 'none'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_shape_divider_top_flip',
            [
                'label' => esc_html__( 'Flip', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'condition' => [
                    'kea_shape_divider_top!' => 'none'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_shape_divider_top_zindex',
            [
                'label' => esc_html__( 'Z-index', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => -1,
                'condition' => [
                    'kea_shape_divider_top!' => 'none'
                ],
                'frontend_available' => true
            ]
        );
        
        $element->end_controls_tab();

		$element->start_controls_tab(
			'tab_divider_bottom',
			[
				'label' => esc_html__( 'BOTTOM', 'keystone-elements-addons'),
			]
		);

        $element->add_control(
			'kea_shape_divider_bottom',
			[
                'label' => esc_html__( 'Type', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'none' => esc_html__( 'None', 'keystone-elements-addons' ),
                    'basic-triangle' => esc_html__( 'Basic Triangle', 'keystone-elements-addons' ),
                    'big-round' => esc_html__( 'Big Round', 'keystone-elements-addons' ),
                    'book' => esc_html__( 'Book', 'keystone-elements-addons' ),
                    'bubbles' => esc_html__( 'Bubbles', 'keystone-elements-addons' ), 
                    'christmas-trees' => esc_html__( 'Christmas Trees', 'keystone-elements-addons' ),
                    'city-skyline' => esc_html__( 'City Skyline', 'keystone-elements-addons' ),
                    'clouds' => esc_html__( 'Clouds', 'keystone-elements-addons' ),
                    'faded-clouds' => esc_html__( 'Faded Clouds', 'keystone-elements-addons' ),
                    'faded-loops' => esc_html__( 'Faded Loops', 'keystone-elements-addons' ),
                    'faded-slant' => esc_html__( 'Faded Slant', 'keystone-elements-addons' ),
                    'faded-triangle' => esc_html__( 'Faded Triangle', 'keystone-elements-addons' ),
                    'fall-leaves' => esc_html__( 'Fall Leaves', 'keystone-elements-addons' ),
                    'fire' => esc_html__( 'Fire', 'keystone-elements-addons' ),
                    'half-sphere' => esc_html__( 'Half Sphere', 'keystone-elements-addons' ),
                    'iceberg' => esc_html__( 'Iceberg', 'keystone-elements-addons' ),
                    'mountain' => esc_html__( 'Mountain', 'keystone-elements-addons' ),
                    'music-notes' => esc_html__( 'Music Notes', 'keystone-elements-addons' ),
                    'paint-brush' => esc_html__( 'Paint Brush', 'keystone-elements-addons' ),
                    'paint-drip' => esc_html__( 'Paint Drip', 'keystone-elements-addons' ),
                    'pyramid' => esc_html__( 'Pyramid', 'keystone-elements-addons' ),
                    'rough-edges' => esc_html__( 'Rough Edges', 'keystone-elements-addons' ),
                    'sharp-paper' => esc_html__( 'Sharp Paper', 'keystone-elements-addons' ),
                    'sharp-slants' => esc_html__( 'Sharp Slants', 'keystone-elements-addons' ),
                    'shredded-paper' => esc_html__( 'Shredded Paper', 'keystone-elements-addons' ),
                    'side-triangle' => esc_html__( 'Side Triangle', 'keystone-elements-addons' ),
                    'slant' => esc_html__( 'Slant', 'keystone-elements-addons' ),
                    'slant-down' => esc_html__( 'Slant Down', 'keystone-elements-addons' ),
                    'slant-up' => esc_html__( 'Slant Up', 'keystone-elements-addons' ),
                    'small-triangles' => esc_html__( 'Small Triangles', 'keystone-elements-addons' ),
                    'snowflakes' => esc_html__( 'Snowflakes', 'keystone-elements-addons' ),
                    'three-triangles' => esc_html__( 'Three Triangles', 'keystone-elements-addons' ),
                    'tri-triangle' => esc_html__( 'Tri Triangle', 'keystone-elements-addons' ),
                    'triangle-dent' => esc_html__( 'Triangle Dent', 'keystone-elements-addons' ),
                    'triangle-uneven' => esc_html__( 'Triangle Uneven', 'keystone-elements-addons' ),
                    'wavy-dashed' => esc_html__( 'Wavy Dashed', 'keystone-elements-addons' ),
                    'wavy-loops' => esc_html__( 'Wavy Loops', 'keystone-elements-addons' ),
                    'wavy-motion' => esc_html__( 'Wavy Motion', 'keystone-elements-addons' ),
                    'custom' => esc_html__( 'Custom', 'keystone-elements-addons' )
				],
                'default' => 'none',
                'frontend_available' => true
			]
        );

        $element->add_control(
			'kea_shape_divider_bottom_custom',
			[
				'label' => esc_html__( 'Select File', 'keystone-elements-addons' ),
				'type'	=> 'kea-file-select',
				'placeholder' => esc_html__( 'URL to File', 'keystone-elements-addons' ),
                'default' => KEA_PLUGINS_URL . 'assets/js/library/dividers/big-round-bottom.svg',
                'condition' => [
                    'kea_shape_divider_bottom' => 'custom'
                ],
                'frontend_available' => true
			]
        );

        $element->add_control(
			'kea_shape_divider_bottom_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'frontend_available' => true,
                'condition' => [
                    'kea_shape_divider_bottom!' => 'none'
                ]
			]
        );

        $element->add_control(
            'kea_shape_divider_bottom_width',
            [
                'label' => esc_html__( 'Width (%)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 100
                ],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 300,
                        'step' => 1
                    ]
                ],
                'condition' => [
                    'kea_shape_divider_bottom!' => 'none'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_shape_divider_bottom_height',
            [
                'label' => esc_html__( 'Height (px)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 500,
                        'step' => 1
                    ]
                ],
                'condition' => [
                    'kea_shape_divider_bottom!' => 'none'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_shape_divider_bottom_flip',
            [
                'label' => esc_html__( 'Flip', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'condition' => [
                    'kea_shape_divider_bottom!' => 'none'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_shape_divider_bottom_zindex',
            [
                'label' => esc_html__( 'Z-index', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => -1,
                'condition' => [
                    'kea_shape_divider_bottom!' => 'none'
                ],
                'frontend_available' => true
            ]
        );

        $element->end_controls_tab();
        $element->end_controls_tabs();

        $element->end_controls_section();
        
    }
}

Section_kea_shape_divider::instance();
