<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Section_KEA_Animations {

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
        add_action( 'elementor/element/common/_section_style/after_section_end', [ __CLASS__, 'add_controls_section' ], 1 );
    }
    
    public static function add_controls_section( Element_Base $element ) {
        $element->start_controls_section(
            '_section_css_effects',
            [
                'label' => esc_html__( 'KEA Animations', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'kea_transform_fx',
            [
                'label' => esc_html__( 'Enable Animation', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_transform_fx_duration',
            [
                'label' => esc_html__( 'Animation Duration', 'keystone-elements-addons' ),
                'description' => esc_html__( 'How long you want it to last in seconds.', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_transform_fx_delay',
            [
                'label' => esc_html__( 'Animation Delay (Second)', 'keystone-elements-addons' ),
                'description' => esc_html__( 'How long you want to wait before the animation starts.', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 0
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
			'kea_transform_fx_timing',
			[
                'label' => esc_html__( 'Animation Timing', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Specifies the speed curve of the animation.', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'linear' => esc_html__( 'Linear', 'keystone-elements-addons' ),
                    'ease' => esc_html__( 'Ease', 'keystone-elements-addons' ),
                    'ease-in' => esc_html__( 'Ease In', 'keystone-elements-addons' ),
                    'ease-out' => esc_html__( 'Ease Out', 'keystone-elements-addons' ),
                    'ease-in-out' => esc_html__( 'Ease In Out', 'keystone-elements-addons' ),
				],
                'default' => 'linear',
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
			]
        );
        
        $element->add_control(
			'kea_transform_fx_direction',
			[
                'label' => esc_html__( 'Animation Direction', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Which direction you want the frames to flow.', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'normal' => esc_html__( 'Normal', 'keystone-elements-addons' ),
                    'reverse' => esc_html__( 'Reverse', 'keystone-elements-addons' ),
                    'alternate' => esc_html__( 'Alternate', 'keystone-elements-addons' ),
                    'alternate-reverse' => esc_html__( 'Alternate Reverse', 'keystone-elements-addons' )
				],
                'default' => 'alternate',
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
			]
        );
        
        $element->add_control(
			'kea_transform_fx_iteration',
			[
                'label' => esc_html__( 'Iteration Count', 'keystone-elements-addons' ),
                'description' => esc_html__( 'How many times you want the animation to repeat.', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'infinite' => esc_html__( 'Infinite', 'keystone-elements-addons' ),
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',
				],
                'default' => 'infinite',
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
			]
        );

        $element->add_control(
			'anim_hr_1',
			[
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
			]
		); 

        $element->start_controls_tabs( 'tabs_transform_style' );
        
        $element->start_controls_tab(
			'tab_transform_translate',
			[
                'label' => esc_html__( 'Translate', 'keystone-elements-addons'),
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ]
			]
		);
        
        $element->add_responsive_control(
            'kea_transform_fx_translate_x',
            [
                'label' => esc_html__( 'Translate X (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_translate_x_to',
            [
                'label' => esc_html__( 'Translate X (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_translate_y',
            [
                'label' => esc_html__( 'Translate Y (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_translate_y_to',
            [
                'label' => esc_html__( 'Translate Y (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );
        
        $element->end_controls_tab();

		$element->start_controls_tab(
			'tab_transform_rotate',
			[
                'label' => esc_html__( 'Rotate', 'keystone-elements-addons'),
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
			]
		);

        $element->add_responsive_control(
            'kea_transform_fx_rotate_x',
            [
                'label' => esc_html__( 'Rotate X (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_rotate_x_to',
            [
                'label' => esc_html__( 'Rotate X (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_rotate_y',
            [
                'label' => esc_html__( 'Rotate Y (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_rotate_y_to',
            [
                'label' => esc_html__( 'Rotate Y (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_rotate_z',
            [
                'label' => esc_html__( 'Rotate Z (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_rotate_z_to',
            [
                'label' => esc_html__( 'Rotate Z (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->end_controls_tab();

        $element->start_controls_tab(
			'tab_transform_scale',
			[
                'label' => esc_html__( 'Scale', 'keystone-elements-addons'),
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
			]
		);

        $element->add_responsive_control(
            'kea_transform_fx_scale_x',
            [
                'label' => esc_html__( 'Scale X (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_scale_x_to',
            [
                'label' => esc_html__( 'Scale X (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_scale_y',
            [
                'label' => esc_html__( 'Scale Y (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_scale_y_to',
            [
                'label' => esc_html__( 'Scale Y (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_transform_fx_opacity',
            [
                'label' => esc_html__( 'Opacity (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );
        
        $element->add_control(
            'kea_transform_fx_opacity_to',
            [
                'label' => esc_html__( 'Opacity (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1,
                        'step' => .1
                    ]
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->end_controls_tab();

        $element->start_controls_tab(
			'tab_transform_skew',
			[
                'label' => esc_html__( 'Skew', 'keystone-elements-addons'),
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
			]
        );
        
        $element->add_responsive_control(
            'kea_transform_fx_skew_x',
            [
                'label' => esc_html__( 'Skew X (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_skew_x_to',
            [
                'label' => esc_html__( 'Skew X (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_skew_y',
            [
                'label' => esc_html__( 'Skew Y (From)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_responsive_control(
            'kea_transform_fx_skew_y_to',
            [
                'label' => esc_html__( 'Skew Y (To)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'px' => [
                        'min' => -360,
                        'max' => 360,
                    ]
                ],
                'default' => [
                    'size' => 0
                ],
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->end_controls_tab();
        $element->end_controls_tabs();

        $element->add_control(
			'anim_hr_2',
			[
				'label' => esc_html__( 'Custom Breakpoints', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
			]
		);
        
        $element->add_control(
            'kea_transform_fx_tablet',
            [
                'label' => esc_html__( 'Tablet', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => get_option('elementor_viewport_lg', true),
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->add_control(
            'kea_transform_fx_mobile',
            [
                'label' => esc_html__( 'Mobile', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => get_option('elementor_viewport_md', true),
                'condition' => [
                    'kea_transform_fx' => 'yes'
                ],
                'frontend_available' => true
            ]
        );

        $element->end_controls_section();
        
    }
}

Section_KEA_Animations::instance();
