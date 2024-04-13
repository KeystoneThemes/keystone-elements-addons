<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_QRcode extends Widget_Base {

	public function get_name() {
		return 'cj-qrcode';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'QR Code', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_script_depends(){
		return [ 'cj-qrcode' ];
	}
    
    public function get_icon() {
		return 'eicon-barcode';
	}

	protected function register_controls() {
        // section start
		$this->start_controls_section(
			'qrcode_content_qrcode',
			[
				'label' => esc_html__( 'QR Code', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'content_type',
			[
				'label' => esc_html__( 'Content Type', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
                    ''  => esc_html__( 'Custom Text or Link', 'keystone-elements-addons' ),
                    'mailto:'  => esc_html__( 'Email Address', 'keystone-elements-addons' ),
					'tel:'  => esc_html__( 'Phone Number', 'keystone-elements-addons' ),
                    'sms:'  => esc_html__( 'SMS', 'keystone-elements-addons' )
				],
			]
        );
        
        $this->add_control(
			'text', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'www.codecanyon.net', 'keystone-elements-addons' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);

        $this->add_control(
			'mode',
			[
				'label' => esc_html__( 'Mode', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'plain',
				'options' => [
                    'plain'  => esc_html__( 'Plain', 'keystone-elements-addons' ),
                    'label'  => esc_html__( 'Label', 'keystone-elements-addons' ),
					'image'  => esc_html__( 'Image', 'keystone-elements-addons' )
				],
			]
        );

        $this->add_control(
			'label', [
				'label' => esc_html__( 'Label', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'KS', 'keystone-elements-addons' ),
                'condition' => ['mode' => 'label'],
                'dynamic' => [
					'active' => true,
				],
			]
		);

        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => ['mode' => 'image'],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

        $this->add_control(
            'msize',
            [
                'label' => esc_html__( 'Label/Image Size', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'default' => [
                    'size' => 30
                ],
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'mode',
                            'value' => 'label',
                        ],
                        [
                            'name'  => 'mode',
                            'value' => 'image',
                        ]
                    ]
                ],
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1
                    ]
                ]
            ]
        );

        $this->add_control(
            'mposx',
            [
                'label' => esc_html__( 'Label/Image Position X', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'default' => [
                    'size' => 50
                ],
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'mode',
                            'value' => 'label',
                        ],
                        [
                            'name'  => 'mode',
                            'value' => 'image',
                        ]
                    ]
                ],
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1
                    ]
                ]
            ]
        );

        $this->add_control(
            'mposy',
            [
                'label' => esc_html__( 'Label/Image Position Y', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'default' => [
                    'size' => 50
                ],
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'mode',
                            'value' => 'label',
                        ],
                        [
                            'name'  => 'mode',
                            'value' => 'image',
                        ]
                    ]
                ],
                'range' => [
                    '%' => [
                        'min' => 10,
                        'max' => 100,
                        'step' => 1
                    ]
                ]
            ]
        );

        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'qrcode_content_settings',
			[
				'label' => esc_html__( 'Settings', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'render',
			[
				'label' => esc_html__( 'Render Method', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'svg',
				'options' => [
                    'svg'  => esc_html__( 'SVG', 'keystone-elements-addons' ),
                    'canvas'  => esc_html__( 'Canvas', 'keystone-elements-addons' ),
                    'image'  => esc_html__( 'Image', 'keystone-elements-addons' )
				],
			]
        );

        $this->add_control(
			'qrsize',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 2000,
				'step' => 1,
				'default' => 200
			]
		);

        $this->add_control(
            'crisp',
            [
                'label' => esc_html__( 'Crisp', 'keystone-elements-addons' ),
                'description'    => esc_html__( 'Render pixel-perfect lines.', 'keystone-elements-addons'), 
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
					'true' => [
						'title' => esc_html__( 'Enable', 'keystone-elements-addons' ),
						'icon' => 'eicons eicon-check',
					],
					'false' => [
						'title' => esc_html__( 'Disable', 'keystone-elements-addons' ),
						'icon' => 'eicons eicon-close',
					],
				],
				'default' => 'true',
				'toggle' => false
            ]
        );

        $this->add_control(
            'minversion',
            [
                'label' => esc_html__( 'Minimum Version', 'keystone-elements-addons' ),
                'description' => esc_html__( 'https://www.qrcode.com/en/about/version.html', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'default' => [
                    'size' => 1
                ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 40,
                        'step' => 1
                    ]
                ]
            ]
        );

        $this->add_control(
			'eclevel',
			[
				'label' => esc_html__( 'Error Correction Level', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'H',
				'options' => [
                    'H'  => esc_html__( 'H - high (30%)', 'keystone-elements-addons' ),
                    'Q'  => esc_html__( 'Q - quartile (25%)', 'keystone-elements-addons' ),
                    'M'  => esc_html__( 'M - medium (15%)', 'keystone-elements-addons' ),
                    'L'  => esc_html__( 'L - low (7%)', 'keystone-elements-addons' )
				],
			]
        );

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'QR Code', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'share_buttons_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .cj-qrcode-wrapper' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .cj-qrcode-wrapper canvas,{{WRAPPER}} .cj-qrcode-wrapper img,{{WRAPPER}} .cj-qrcode-wrapper svg' => 'vertical-align:bottom;',
				],
                'toggle' => false
			]
		);

        $this->add_control(
			'code_color',
			[
				'label' => esc_html__( 'Code Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
                'alpha' => false
			]
		);

        $this->add_control(
            'rounded',
            [
                'label' => esc_html__( 'Code Rounding', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['%'],
                'default' => [
                    'size' => 0
                ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1
                    ]
                ]
            ]
        );

        $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
                'alpha' => false
			]
		);

        $this->add_control(
			'label_family',
			[
				'label' => esc_html__( 'Label Font Family', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
                'default' => "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
                'options' => [
                    "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif" => esc_html__( 'Helvetica Neue', 'tmfeed' ),
                    "Georgia, serif" => esc_html__( 'Georgia', 'tmfeed' ),
                    "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => esc_html__( 'Palatino Linotype', 'tmfeed' ),
                    "'Times New Roman', Times, serif" => esc_html__( 'Times New Roman', 'tmfeed' ),
                    "Arial, Helvetica, sans-serif" => esc_html__( 'Arial', 'tmfeed' ),
                    "'Arial Black', Gadget, sans-serif" => esc_html__( 'Arial Black', 'tmfeed' ),
                    "'Comic Sans MS', cursive, sans-serif" => esc_html__( 'Comic Sans', 'tmfeed' ),
                    "Impact, Charcoal, sans-serif" => esc_html__( 'Impact', 'tmfeed' ),
                    '"Lucida Sans Unicode", "Lucida Grande", sans-serif' => esc_html__( 'Lucida Sans', 'tmfeed' ),
                    "Tahoma, Geneva, sans-serif" => esc_html__( 'Tahoma', 'tmfeed' ),
                    "'Trebuchet MS', Helvetica, sans-serif" => esc_html__( 'Trebuchet', 'tmfeed' ),
                    "Verdana, Geneva, sans-serif" => esc_html__( 'Verdana', 'tmfeed' ),
                    "'Courier New', Courier, monospace" => esc_html__( 'Courier New', 'tmfeed' ),
                    "'Lucida Console', Monaco, monospace" => esc_html__( 'Lucida Console', 'tmfeed' )
				]
			]
		);

        $this->add_control(
			'label_color',
			[
				'label' => esc_html__( 'Label Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
                'alpha' => false
			]
		);

        $this->add_control(
			'wrapper_title',
			[
				'label' => esc_html__( 'Wrapper', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_control(
			'wrapper_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cj-qrcode' => 'background-color: {{VALUE}};'
				]
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'wrapper_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-qrcode'
			]
		);

        $this->add_control(
			'wrapper_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-qrcode' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'wrapper_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-qrcode'
			]
		);

        $this->add_responsive_control(
			'wrapper_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-qrcode' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        echo '<div class="cj-qrcode-wrapper" style="display:flex;visibility:hidden;"><div class="cj-qrcode" 
        data-qrtext="' . esc_attr($settings['content_type'] . $settings['text']) . '" 
        data-qrrender="' . $settings['render'] . '" 
        data-qrcrisp="' . $settings['crisp'] . '" 
        data-qrmode="' . $settings['mode'] . '" 
        data-qrlabel="' . esc_attr($settings['label']) . '" 
        data-qrsize="' . ($settings['qrsize'] ? $settings['qrsize'] : 200) . '" 
        data-qrminversion="' . $settings['minversion']['size'] . '" 
        data-qreclevel="' . $settings['eclevel'] . '" 
        data-qrcolor="' . $settings['code_color'] . '" 
        data-qrbgcolor="' . $settings['bg_color'] . '" 
        data-qrrounded="' . $settings['rounded']['size'] . '" 
        data-qrmsize="' . ($settings['msize'] ? $settings['msize']['size'] : 30) . '" 
        data-qrmposx="' . ($settings['mposx'] ? $settings['mposx']['size'] : 0) . '" 
        data-qrmposy="' . ($settings['mposy'] ? $settings['mposy']['size'] : 0) . '" 
        data-qrfcolor="' . $settings['label_color'] . '" 
        data-qrfamily="' . $settings['label_family'] . '">';
        if ($settings['image'] && !empty($settings['image']['url'])) {
            echo '<img class="cj-qrcode-img" style="display:none;" src="' . esc_url($settings['image']['url']) . '" />';
        }
        echo '</div></div>';
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_QRcode() );