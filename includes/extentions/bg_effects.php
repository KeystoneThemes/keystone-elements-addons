<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Section_KEA_BG_Effects {

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
            '_section_css_effects',
            [
                'label' => esc_html__( 'KEA Background Effects', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $element->add_control(
            'kea_bg_effects_enable',
            [
                'label' => esc_html__( 'Enable Background Effects', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_preview',
            [
                'label' => esc_html__( 'Preview', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                'frontend_available' => true,
                'condition' => [
                    'kea_bg_effects_enable' => 'yes'
                ]
            ]
        );

        $element->add_control(
			'kea_bg_effects_selected',
			[
                'label' => esc_html__( 'Background Effects', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'birds' => esc_html__( 'Birds', 'keystone-elements-addons' ),
                    'fog' => esc_html__( 'Fog', 'keystone-elements-addons' ),
                    'waves' => esc_html__( 'Waves', 'keystone-elements-addons' ),
                    'clouds' => esc_html__( 'Clouds', 'keystone-elements-addons' ),
                    'globe' => esc_html__( 'Globe', 'keystone-elements-addons' ),
                    'net' => esc_html__( 'Net', 'keystone-elements-addons' ),
                    'cells' => esc_html__( 'Cells', 'keystone-elements-addons' ),
                    'dots' => esc_html__( 'Dots', 'keystone-elements-addons' ),
                    'rings' => esc_html__( 'Rings', 'keystone-elements-addons' ),
                    'halo' => esc_html__( 'Halo', 'keystone-elements-addons' )
				],
                'default' => 'birds',
                'condition' => [
                    'kea_bg_effects_enable' => 'yes'
                ],
                'frontend_available' => true
			]
        );

        $element->add_control(
            'kea_bg_effects_mouse',
            [
                'label' => esc_html__( 'Mouse Controls', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'frontend_available' => true,
                'condition' => [
                    'kea_bg_effects_enable' => 'yes'
                ],
            ]
        );

        $element->add_control(
            'kea_bg_effects_touch',
            [
                'label' => esc_html__( 'Touch Controls', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'frontend_available' => true,
                'condition' => [
                    'kea_bg_effects_enable' => 'yes'
                ],
            ]
        );

        $element->add_control(
			'kea_bg_effects_opacity',
			[
				'label' => esc_html__( 'Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .kea-bg-effects' => 'opacity: {{VALUE}};'
                ],
                'condition' => [
                    'kea_bg_effects_enable' => 'yes'
                ]
			]
		);

        $element->add_control(
			'kea_bg_effects_color_1',
			[
				'label' => esc_html__( 'Color 1', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'birds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );
        
        $element->add_control(
			'kea_bg_effects_color_2',
			[
				'label' => esc_html__( 'Color 2', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'birds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_highlight',
			[
				'label' => esc_html__( 'Highlight Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'fog',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_midtone',
			[
				'label' => esc_html__( 'Mid Tone Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'fog',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_lowlight',
			[
				'label' => esc_html__( 'Low Light Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'fog',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_base',
			[
				'label' => esc_html__( 'Base Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'fog',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_wavecolor',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'waves',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_skycolor',
			[
				'label' => esc_html__( 'Sky Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'clouds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_cloudcolor',
			[
				'label' => esc_html__( 'Cloud Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'clouds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_cloudshadow',
			[
				'label' => esc_html__( 'Cloud Shadow Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'clouds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_suncolor',
			[
				'label' => esc_html__( 'Sun Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'clouds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_sunglarecolor',
			[
				'label' => esc_html__( 'Sun Glare Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'clouds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_sunlightcolor',
			[
				'label' => esc_html__( 'Sun Light Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'clouds',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_globebg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'globe',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_globe_color_1',
			[
				'label' => esc_html__( 'Color 1', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'globe',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );
        
        $element->add_control(
			'kea_bg_effects_globe_color_2',
			[
				'label' => esc_html__( 'Color 2', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'globe',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_netcolor',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'net',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_netbgcolor',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'net',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_cellcolor_1',
			[
				'label' => esc_html__( 'Color 1', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'cells',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_cellcolor_2',
			[
				'label' => esc_html__( 'Color 2', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'cells',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_dots_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'dots',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_dots_color_1',
			[
				'label' => esc_html__( 'Color 1', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'dots',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_dots_color_2',
			[
				'label' => esc_html__( 'Color 2', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'dots',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_rings_color',
			[
				'label' => esc_html__( 'Base Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'rings',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_halo_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'halo',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );

        $element->add_control(
			'kea_bg_effects_halo_base',
			[
				'label' => esc_html__( 'Base Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'frontend_available' => true,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'halo',
                        ]
                    ]
                ],
                'alpha' => false
			]
        );
        
        $element->add_control(
            'kea_bg_effects_bird_size',
            [
                'label' => esc_html__( 'Bird Size', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 4,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'birds',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_quantity',
            [
                'label' => esc_html__( 'Quantity', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 5,
                'step' => 0.1,
                'default' => 4,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'birds',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_speed_limit',
            [
                'label' => esc_html__( 'Speed Limit', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 10,
                'step' => 0.1,
                'default' => 5,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'birds',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_blurfactor',
            [
                'label' => esc_html__( 'Blur Factor', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 0.9,
                'step' => 0.1,
                'default' => 0.6,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'fog',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_zoom',
            [
                'label' => esc_html__( 'Zoom', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 3,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'fog',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_speed',
            [
                'label' => esc_html__( 'Speed', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 5,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'fog',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_shininess',
            [
                'label' => esc_html__( 'Shininess', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 150,
                'step' => 1,
                'default' => 30,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'waves',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_waveheight',
            [
                'label' => esc_html__( 'Wave Height', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 40,
                'step' => 1,
                'default' => 15,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'waves',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_wavespeed',
            [
                'label' => esc_html__( 'Wave Speed', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 2,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'waves',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_wavezoom',
            [
                'label' => esc_html__( 'Zoom', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.7,
                'max' => 1.8,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'waves',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_cloudspeed',
            [
                'label' => esc_html__( 'Speed', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 3,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'clouds',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_netpoints',
            [
                'label' => esc_html__( 'Points', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 20,
                'step' => 1,
                'default' => 10,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'net',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_netdistance',
            [
                'label' => esc_html__( 'Max. Distance', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 10,
                'max' => 40,
                'step' => 1,
                'default' => 20,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'net',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_netspacing',
            [
                'label' => esc_html__( 'Spacing', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 10,
                'max' => 20,
                'step' => 1,
                'default' => 15,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'net',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_cellsize',
            [
                'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 5,
                'step' => 0.1,
                'default' => 1.5,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'cells',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_cellspeed',
            [
                'label' => esc_html__( 'Speed', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 5,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'cells',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_dotsize',
            [
                'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.5,
                'max' => 10,
                'step' => 0.1,
                'default' => 3,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'dots',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_dotspacing',
            [
                'label' => esc_html__( 'Spacing', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 5,
                'max' => 100,
                'step' => 0.1,
                'default' => 35,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'dots',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_halo_size',
            [
                'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 3,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'halo',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_halo_amplitude',
            [
                'label' => esc_html__( 'Amplitude Factor', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => 0.1,
                'max' => 3,
                'step' => 0.1,
                'default' => 1,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'halo',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_halo_xoffset',
            [
                'label' => esc_html__( 'X Offset', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -0.5,
                'max' => 0.5,
                'step' => 0.1,
                'default' => 0,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'halo',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_bg_effects_halo_yoffset',
            [
                'label' => esc_html__( 'Y Offset', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'min' => -0.5,
                'max' => 0.5,
                'step' => 0.1,
                'default' => 0,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_bg_effects_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_bg_effects_selected',
                            'value' => 'halo',
                        ]
                    ]
                ],
                'frontend_available' => true
            ]
        );

        $element->end_controls_section();
        
    }
}

Section_KEA_BG_Effects::instance();
