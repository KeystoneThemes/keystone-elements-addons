<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Counter extends Widget_Base {

	public function get_name() {
		return 'cj-counter';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Counter', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-counter' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-counter' ];
	}

	public function get_icon() {
		return 'eicon-counter';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'countdown_content',
  			[
  				'label' => esc_html__( 'Counter', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);

		$this->add_control(
			'selected_value',
			[
				'label' => esc_html__( 'Value', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'custom',
				'options' => [
					'custom' => esc_html__( 'Custom Number', 'keystone-elements-addons' ),
                    'posts' => esc_html__( 'Posts', 'keystone-elements-addons' ),
                    'comments' => esc_html__( 'Comments', 'keystone-elements-addons' ),
                    'users' => esc_html__( 'Registered Users (BbPress)', 'keystone-elements-addons' ),
                    'forums' => esc_html__( 'Forums (BbPress)', 'keystone-elements-addons' ),
                    'topics' => esc_html__( 'Topics (BbPress)', 'keystone-elements-addons' ),
                    'replies' => esc_html__( 'Replies (BbPress)', 'keystone-elements-addons' ),
					'topic_tags' => esc_html__( 'Topic Tags (BbPress)', 'keystone-elements-addons' ),
					'members' => esc_html__( 'Members (BuddyPress)', 'keystone-elements-addons' ),
					'groups' => esc_html__( 'Groups (BuddyPress)', 'keystone-elements-addons' ),
					'activity' => esc_html__( 'Activity (BuddyPress)', 'keystone-elements-addons' ),
				],
			]
		);
        
        $this->add_control(
			'starting_number',
			[
				'label' => esc_html__( 'Starting Number', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => '',
                'dynamic' => [
					'active' => true,
				]
			]
		);
        
        $this->add_control(
			'ending_number',
			[
				'label' => esc_html__( 'Ending Number', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'step' => 1,
				'default' => 100,
                'dynamic' => [
					'active' => true,
				],
				'condition' => ['selected_value' => 'custom']
			]
		);
        
        $this->add_control(
			'prefix', [
				'label' => esc_html__( 'Number Prefix', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => '$',
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'suffix', [
				'label' => esc_html__( 'Number Suffix', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Plus', 'keystone-elements-addons' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Cool Number', 'keystone-elements-addons' ),
                'label_block' => true
			]
		);
        
        $this->end_controls_section();
        
        // section start
  		$this->start_controls_section(
  			'settings_content',
  			[
  				'label' => esc_html__( 'Settings', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
        
        $this->add_control(
			'content_layout',
			[
				'label' => esc_html__( 'Layout', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'v-layout',
				'options' => [
					'h-layout'  => esc_html__( 'Horizontal', 'keystone-elements-addons' ),
					'h-layout-reverse' => esc_html__( 'Horizontal Reverse', 'keystone-elements-addons' ),
					'h-layout-alt'  => esc_html__( 'Horizontal Alt', 'keystone-elements-addons' ),
					'h-layout-reverse-alt' => esc_html__( 'Horizontal Reverse Alt', 'keystone-elements-addons' ),
                    'v-layout'  => esc_html__( 'Vertical', 'keystone-elements-addons' ),
					'v-layout-reverse' => esc_html__( 'Vertical Reverse', 'keystone-elements-addons' ),
				],
			]
		);
        
        $this->add_responsive_control(
			'horizontal_h_align',
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
				'default' => 'center',
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse',
						],
						[
                            'name'  => 'content_layout',
                            'value' => 'h-layout-alt',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse-alt',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .cj-counter.h-layout' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .cj-counter.h-layout-reverse' => 'justify-content: {{VALUE}};',
					'{{WRAPPER}} .cj-counter.h-layout-alt' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .cj-counter.h-layout-reverse-alt' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'horizontal_v_align',
			[
				'label' => esc_html__( 'Vertical Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-v-align-middle',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'center',
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse',
                        ],
						[
                            'name'  => 'content_layout',
                            'value' => 'h-layout-alt',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse-alt',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .cj-counter.h-layout' => 'align-items: {{VALUE}};',
					'{{WRAPPER}} .cj-counter.h-layout-reverse' => 'align-items: {{VALUE}};',
					'{{WRAPPER}} .cj-counter.h-layout-alt' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .cj-counter.h-layout-reverse-alt' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'horizontal_text_align',
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
				'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
						[
                            'name'  => 'content_layout',
                            'value' => 'h-layout-alt',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'h-layout-reverse-alt',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .cj-counter-h-alt' => 'text-align: {{VALUE}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'vertical_h_align',
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
				'default' => 'center',
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'content_layout',
                            'value' => 'v-layout',
                        ],
                        [
                            'name'  => 'content_layout',
                            'value' => 'v-layout-reverse',
                        ]
                    ]
                ],
				'selectors' => [
					'{{WRAPPER}} .cj-counter.v-layout' => 'align-items: {{VALUE}};',
                    '{{WRAPPER}} .cj-counter.v-layout-reverse' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

        $this->add_control(
			'anim_duration',
			[
				'label' => esc_html__( 'Animation Duration (ms)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 100,
				'default' => 1000
			]
		);
        
        $this->add_control(
			'scroll_anim_switcher',
			[
				'label' => esc_html__( 'Scroll Based Animation', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Activate animation when the counter scrolls into view.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'seperator_switcher',
			[
				'label' => esc_html__( 'Thousand Seperator', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
  
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_counter_style',
			[
				'label' => esc_html__( 'Counter', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'counter_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-counter',
			]
		);
        
        $this->add_control(
			'counter_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'counter_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-counter'
			]
		);
        
        $this->add_responsive_control(
			'counter_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-counter' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'counter_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-counter'
			]
		);
        
        $this->add_control(
			'counter_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'counter_width',
			[
				'label' => esc_html__( 'Maximum Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .cj-counter' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'counter_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-counter' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-counter-icon i' => 'color: {{VALUE}}',
					'{{WRAPPER}} .cj-counter-icon svg' => 'fill: {{VALUE}}',
				],
			]
		);
        
        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-counter-icon' => 'background-color: {{VALUE}}'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
                    '{{WRAPPER}} .cj-counter-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'SVG Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .cj-counter-icon svg' => 'width: {{VALUE}}px;',
					'{{WRAPPER}} .cj-counter-icon' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'SVG Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .cj-counter-icon' => 'height: {{VALUE}}px;',
					'{{WRAPPER}} .cj-counter-icon i' => 'line-height: {{VALUE}}px;',
					'{{WRAPPER}} .cj-counter-icon svg' => 'height: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_control(
			'icon_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-counter-icon'
			]
		);
        
        $this->add_responsive_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-counter-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-counter-icon'
			]
		);
        
        $this->add_control(
			'icon_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-counter-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-counter-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_number_style',
			[
				'label' => esc_html__( 'Number', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'number_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-counter-number' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				
				'selector' => '{{WRAPPER}} .cj-counter-number'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'number_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-counter-number',
			]
		);
        
        $this->add_control(
			'number_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'number_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-counter-number' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
   
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-counter-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				
				'selector' => '{{WRAPPER}} .cj-counter-title'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-counter-title',
			]
		);
        
        $this->add_control(
			'title_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-counter-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
   
        $this->end_controls_section();
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
        $starting_number = 0;
        $ending_number = 100;
        if ($settings['starting_number']) {
           $starting_number = $settings['starting_number']; 
        }
        if ($settings['ending_number'] && $settings['selected_value'] == 'custom') {
           $ending_number = $settings['ending_number']; 
        } elseif ($settings['selected_value'] == 'posts') {
			$ending_number = KEA_post_count();
		} elseif ($settings['selected_value'] == 'comments') {
			$ending_number = KEA_comment_count();
		} elseif ($settings['selected_value'] == 'users') {
			$ending_number = KEA_bbpress_user_count();
		} elseif ($settings['selected_value'] == 'forums') {
			$ending_number = KEA_bbpress_forum_count();
		} elseif ($settings['selected_value'] == 'topics') {
			$ending_number = KEA_bbpress_topic_count();
		} elseif ($settings['selected_value'] == 'replies') {
			$ending_number = KEA_bbpress_reply_count();
		} elseif ($settings['selected_value'] == 'topic_tags') {
			$ending_number = KEA_bbpress_topic_tag_count();
		} elseif ($settings['selected_value'] == 'members') {
			$ending_number = KEA_bp_member_count();
		} elseif ($settings['selected_value'] == 'groups') {
			$ending_number = KEA_bp_group_count();
		} elseif ($settings['selected_value'] == 'activity') {
			$ending_number = KEA_bp_activity_count();
		}
        ?>
        <div id="cj-counter-<?php echo esc_attr($this->get_id()); ?>" class="cj-counter <?php echo esc_attr($settings['content_layout']); ?>">
            <?php if ($settings['icon']['value']) { ?>
            <div class="cj-counter-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
			<?php } ?>
			<?php if (($settings['content_layout'] == 'h-layout-alt') || ($settings['content_layout'] == 'h-layout-reverse-alt')) { ?>
			<div class="cj-counter-h-alt">
			<?php } ?>	
            <div class="cj-counter-number" data-endingnumber="<?php echo esc_attr($ending_number); ?>" data-animduration="<?php echo $settings['anim_duration']; ?>" <?php if ($settings['scroll_anim_switcher']) { ?>data-scrollanim<?php } ?> <?php if ($settings['seperator_switcher']) { ?>data-seperator<?php } ?>>
                <?php echo esc_html($settings['prefix']); ?><span><?php echo esc_html($starting_number); ?></span><?php echo esc_html($settings['suffix']); ?>
            </div>
            <?php if ($settings['title']) { ?>
            <div class="cj-counter-title"><?php echo esc_html($settings['title']); ?></div>
			<?php } ?>
			<?php if (($settings['content_layout'] == 'h-layout-alt') || ($settings['content_layout'] == 'h-layout-reverse-alt')) { ?>
			</div>
			<?php } ?>
        </div>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Counter() );