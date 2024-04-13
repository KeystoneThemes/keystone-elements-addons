<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Smart_Menu extends Widget_Base {

	public function get_name() {
		return 'cj-smart_menu';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Smart Menu', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-smart_menu','elementor-icons-fa-solid','cj-lib-animate' ];
    }
    
    public function get_script_depends() {
		return [ 'cj-smart_menu' ];
	}
    
    public function get_icon() {
		return 'eicon-nav-menu';
    }
    
	protected function register_controls() {
        // section start
		$this->start_controls_section(
			'section_settings',
			[
				'label' => esc_html__( 'Smart Menu', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'menu',
			[
				'label' => esc_html__( 'Select a Menu', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => KEA_get_menus(),
			]
        );
        
        $this->add_control(
			'menu_layout',
			[
				'label' => esc_html__( 'Menu Layout', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'sm-horizontal' => esc_html__( 'Horizontal', 'keystone-elements-addons' ),
					'sm-horizontal-justified' => esc_html__( 'Horizontal-Justified', 'keystone-elements-addons' ),
                    'sm-vertical' => esc_html__( 'Vertical', 'keystone-elements-addons' )
				],
                'default' => 'sm-horizontal',
			]
		);
		
		$this->add_control(
			'menu_h_align',
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
				'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'menu_layout',
                            'value' => 'sm-horizontal',
                        ],
                        [
                            'name'  => 'menu_layout',
                            'value' => 'sm-vertical',
                        ]
                    ]
                ],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .kea-smart-menu-desktop.kea-smart-menu-wrapper' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_control(
			'vertical_menu_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'em' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'condition' => [
                    'menu_layout' => 'sm-vertical'
                ],
				'selectors' => [
					'{{WRAPPER}} .kea-smart-menu-desktop.kea-smart-menu-wrapper .kea-sm-skin.sm-vertical' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'smart_menu_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		$this->add_control(
            'menu_breakpoint',
            [
                'label' => esc_html__( 'Mobile Breakpoint', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => get_option('elementor_viewport_lg', true)
            ]
        );

        $this->add_control(
			'menu_toggle', [
				'label' => esc_html__( 'Mobile Menu Toggle', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
		);

		$this->add_control(
			'menu_toggle_text', [
				'label' => esc_html__( 'Mobile Menu Toggle Text', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'MENU', 'keystone-elements-addons' ),
				'condition' => [
                    'menu_toggle' => 'yes'
                ]
			]
		);

		$this->add_control(
			'menu_toggle_text_h_align',
			[
				'label' => esc_html__( 'Mobile Menu Toggle Alignment', 'keystone-elements-addons' ),
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
				'condition' => [
                    'menu_toggle' => 'yes'
                ],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .kea-smart-menu-toggle-container' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
		
		$this->add_control(
			'menu_collapsible_behavior',
			[
				'label' => esc_html__( 'Collapsible Behavior', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__( 'Default', 'keystone-elements-addons' ),
					'toggle' => esc_html__( 'Toggle', 'keystone-elements-addons' ),
					'link' => esc_html__( 'Link', 'keystone-elements-addons' ),
					'accordion' => esc_html__( 'Accordion', 'keystone-elements-addons' ),
					'accordion-toggle' => esc_html__( 'Accordion-Toggle', 'keystone-elements-addons' ),
					'accordion-link' => esc_html__( 'Accordion-Link', 'keystone-elements-addons' ),
				],
                'default' => 'link',
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_main_menu_container',
			[
				'label' => esc_html__( 'Menu Container', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'main_menu_background',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .kea-sm-skin',
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_menu_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin',
			]
		);
        
        $this->add_responsive_control(
			'main_menu_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'main_menu_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin',
			]
        );

        $this->add_control(
			'main_menu_transition_duration',
			[
				'label' => esc_html__( 'Transition Duration (ms)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
                'default' => 0.2,
                'selectors' => [
					'{{WRAPPER}} .kea-sm-skin a' => 'transition: all {{VALUE}}s ease-in-out;'
				]
			]
		);
		
		$this->add_control(
			'main_menu_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_responsive_control(
			'main_menu_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'main_menu_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_main_menu_items',
			[
				'label' => esc_html__( 'Main Menu Items', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'main_menu_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .kea-sm-skin > li > a',
			]
        );
        
        $this->add_control(
			'main_menu_icon',
			[
				'label' => esc_html__( 'Dropdown Menu Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
                    'caret' => esc_html__( 'Caret', 'keystone-elements-addons' ),
                    'caret-square' => esc_html__( 'Caret-Square', 'keystone-elements-addons' ),
					'chevron' => esc_html__( 'Chevron', 'keystone-elements-addons' ),
                    'chevron-circle' => esc_html__( 'Chevron-Circle', 'keystone-elements-addons' ),
                    'plus' => esc_html__( 'Plus', 'keystone-elements-addons' ),
                    'plus-circle' => esc_html__( 'Plus-Circle', 'keystone-elements-addons' ),
				],
                'default' => 'caret',
			]
        );

        $this->add_responsive_control(
            'main_menu_icon_size',
            [
                'label' => esc_html__( 'Dropdown Menu Icon Size', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'selectors' => [
					'{{WRAPPER}} .kea-sm-skin a .sub-arrow:before' => 'font-size: {{VALUE}}px;'
				]
            ]
		);

		$this->add_control(
			'main_menu_icon_color',
			[
				'label' => esc_html__( 'Icon Color (Mobile)', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin a .sub-arrow' => 'color: {{VALUE}};'
				]
			]
        );
		
		$this->add_control(
			'main_menu_icon_bg',
			[
				'label' => esc_html__( 'Icon Background Color (Mobile)', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin a .sub-arrow' => 'background: {{VALUE}};'
				]
			]
		);
		
		$this->add_control(
			'main_menu_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->start_controls_tabs( 'main_menu_link_style' );
        
        $this->start_controls_tab(
			'main_menu_link_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons'),
			]
        );  

        $this->add_control(
			'main_menu_item_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin > li > a' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'main_menu_item_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin > li > a' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_menu_item_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin > li > a',
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'main_menu_link_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons'),
			]
        );

        $this->add_control(
			'main_menu_item_color_hover',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin > li > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li > a:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li > a:active' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'main_menu_item_bg_hover',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin > li > a:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li > a:focus' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li > a:active' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_menu_item_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin > li > a:hover,{{WRAPPER}} .kea-sm-skin > li > a:focus,{{WRAPPER}} .kea-sm-skin > li > a:active',
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
			'main_menu_link_active',
			[
				'label' => esc_html__( 'Active', 'keystone-elements-addons'),
			]
        );  

        $this->add_control(
			'main_menu_item_color_active',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a.highlighted' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'main_menu_item_bg_active',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a.highlighted' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:focus' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:active' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_menu_item_border_active',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a,{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a.highlighted,{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:hover,{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:focus,{{WRAPPER}} .kea-sm-skin > li.current-menu-item > a:active',
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
			'main_menu_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_responsive_control(
			'main_menu_item_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .kea-sm-skin > li > a > .sub-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_sub_menus',
			[
				'label' => esc_html__( 'Sub Menus', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'menu_sub_menu_animation',
			[
				'label' => esc_html__( 'Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'frontend_available' => true
			]
		);

        $this->add_control(
			'menu_sub_menu_max_width',
			[
				'label' => esc_html__( 'Maximum Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'em' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => 'em',
					'size' => 20,
				]
			]
        );
        
        $this->add_control(
			'menu_sub_menu_min_width',
			[
				'label' => esc_html__( 'Minimum Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'em' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => 'em',
					'size' => 10,
				]
			]
        );

        $this->add_control(
            'mainMenuSubOffsetX',
            [
                'label' => esc_html__( 'First-level Offset X', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0
            ]
        );

        $this->add_control(
            'mainMenuSubOffsetY',
            [
                'label' => esc_html__( 'First-level Offset Y', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0
            ]
        );

        $this->add_control(
            'subMenusSubOffsetX',
            [
                'label' => esc_html__( 'Second-level Offset X', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0
            ]
        );

        $this->add_control(
            'subMenusSubOffsetY',
            [
                'label' => esc_html__( 'Second-level Offset Y', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => 0
            ]
        );
        
        $this->add_control(
			'menu_rtl_sub_menus', [
				'label' => esc_html__( 'Right to Left', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);
		
		$this->add_control(
			'sub_menu_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'sub_menu_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin ul' => 'background: {{VALUE}};'
				]
			]
        );
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'sub_menu_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-smart-menu-desktop .kea-sm-skin ul',
			]
		);

		$this->add_control(
			'sub_menu_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-smart-menu-desktop .kea-sm-skin ul' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'sub_menu_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-smart-menu-desktop .kea-sm-skin ul'
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'section_sub_menu_items',
			[
				'label' => esc_html__( 'Sub Menu Items', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'main_sub_menu_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .kea-sm-skin li ul li a',
			]
        );
        
        $this->start_controls_tabs( 'main_sub_menu_link_style' );
        
        $this->start_controls_tab(
			'main_sub_menu_link_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons'),
			]
        );  

        $this->add_control(
			'main_sub_menu_item_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin li ul li a' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'main_sub_menu_item_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin li ul li a' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_sub_menu_item_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin li ul li a',
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'main_sub_menu_link_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons'),
			]
        );

        $this->add_control(
			'main_sub_menu_item_color_hover',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-sm-skin li ul li a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin li ul li a:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin li ul li a:active' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'main_sub_menu_item_bg_hover',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin li ul li a:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin li ul li a:focus' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin li ul li a:active' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_sub_menu_item_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin li ul li a:hover,{{WRAPPER}} .kea-sm-skin li ul li a:focus,{{WRAPPER}} .kea-sm-skin li ul li a:active',
			]
		);

        $this->end_controls_tab();

        $this->start_controls_tab(
			'main_sub_menu_link_active',
			[
				'label' => esc_html__( 'Active', 'keystone-elements-addons'),
			]
        );  

        $this->add_control(
			'main_sub_menu_item_color_active',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:active' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a.highlighted' => 'color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'main_sub_menu_item_bg_active',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a.highlighted' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:focus' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:active' => 'background: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'main_sub_menu_item_border_active',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a,{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a.highlighted,{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:hover,{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:focus,{{WRAPPER}} .kea-sm-skin ul li.current-menu-item > a:active',
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'sub_menu_item_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_responsive_control(
			'main_sub_menu_item_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-sm-skin ul li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .kea-sm-skin ul li a .sub-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'section_mobile_menu',
			[
				'label' => esc_html__( 'Mobile Menu Toggle', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'mobile_menu_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-smart-menu-toggle',
			]
		);
		
		$this->add_control(
			'mobile_menu_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-smart-menu-toggle' => 'color: {{VALUE}};'
				]
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'mobile_menu_background',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-smart-menu-toggle',
			]
        );
		
		$this->add_control(
			'mobile_menu_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'em' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cj-smart-menu-toggle' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'mobile_menu_text_align',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cj-smart-menu-toggle' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'mobile_menu_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mobile_menu_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-smart-menu-toggle',
			]
		);
        
        $this->add_responsive_control(
			'mobile_menu_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-smart-menu-toggle' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mobile_menu_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-smart-menu-toggle',
			]
        );
        
        $this->add_control(
			'mobile_menu_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		$this->add_responsive_control(
			'mobile_menu_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-smart-menu-toggle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'mobile_menu_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-smart-menu-toggle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
       
		$this->end_controls_section();
	}
    
    protected function render() {
        $settings = $this->get_settings_for_display();
		$menu_id = $this->get_id(); 
		$rtl = '';
		if (is_rtl()) {
			$rtl = 'sm-rtl';
		}
		?>
        <div style="display:none;" class="kea-smart-menu-container <?php if ($settings['menu_rtl_sub_menus']) { echo 'kea-smart-menu-rtl-submenu'; } ?>" data-animin="<?php echo $settings['menu_sub_menu_animation']; ?>" data-animout="<?php echo KEA_get_anim_exits($settings['menu_sub_menu_animation']); ?>" data-collapsiblebehavior="<?php echo esc_attr($settings['menu_collapsible_behavior']); ?>" data-mainmenusuboffsetx="<?php echo esc_attr($settings['mainMenuSubOffsetX']); ?>" data-mainmenusuboffsety="<?php echo esc_attr($settings['mainMenuSubOffsetY']); ?>" data-submenussuboffsetx="<?php echo esc_attr($settings['subMenusSubOffsetX']); ?>" data-submenussuboffsety="<?php echo esc_attr($settings['subMenusSubOffsetY']); ?>" data-submenumin="<?php echo esc_attr($settings['menu_sub_menu_min_width']['size'] . $settings['menu_sub_menu_min_width']['unit']); ?>"  data-submenumax="<?php echo esc_attr($settings['menu_sub_menu_max_width']['size'] . $settings['menu_sub_menu_max_width']['unit']); ?>" data-rtlsubmenu="<?php echo esc_attr($settings['menu_rtl_sub_menus']); ?>" data-mtoggle="<?php echo esc_attr($settings['menu_toggle']); ?>" data-bpoint="<?php echo esc_attr($settings['menu_breakpoint']); ?>">
        <?php if ($settings['menu_toggle']) { ?>
            <div class="kea-smart-menu-toggle-container">
                <div class="cj-smart-menu-toggle">
                    <i class="fas fa-bars"></i> <span><?php echo $settings['menu_toggle_text']; ?></span>
                </div>
            </div>
        <?php } ?>
            <?php wp_nav_menu([
                'menu'            => $settings['menu'],
                'container'       => 'nav',
                'container_id' => 'kea-smart-menu-wrapper-' . $menu_id,
                'container_class' => 'kea-smart-menu-wrapper',
                'menu_id'         => 'kea-smart-menu-' . $menu_id,
                'menu_class'      => 'kea-smart-menu sm kea-sm-skin animated ' . $settings['menu_layout'] . ' ' . $settings['main_menu_icon'] . ' ' . $rtl,
                'depth'           => 99
            ]); ?>
        </div>
	<?php }
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Smart_Menu() );