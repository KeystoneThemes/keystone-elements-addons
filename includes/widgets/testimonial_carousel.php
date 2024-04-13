<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Testimonial_Carousel extends Widget_Base {

	public function get_name() {
		return 'cj-testimonial_carousel';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Testimonial Carousel', 'keystone-elements-addons' );
	}
    
    public function get_categories() {
		return [ 'keystone-elements-addons' ];
    }
    
    public function get_script_depends() {
		return [ 'cj-lib-slick', 'cj-testimonial_carousel' ];
    }
    
    public function get_style_depends(){
		return [ 'cj-lib-slick','cj-testimonial', 'elementor-icons-fa-solid', 'elementor-icons-fa-regular' ];
    }
    
    public function get_icon() {
		return 'eicon-testimonial-carousel';
    }

	protected function register_controls() {
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Testimonials', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
			]
		);
        
        $repeater->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
			]
		);
        
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Thumbnail', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);
        
        $repeater->add_control(
			'content', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pugnant Stoici cum Peripateticis. Et quidem, inquit, vehementer errat; Quamquam id quidem, infinitum est in hac urbe; Duo Reges: constructio interrete.</p>',
				'label_block' => true,
			]
		);
        
        $this->add_control(
			'testimonials', [
				'label' => esc_html__( 'Testimonials', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
                    [
                        'title' => esc_html__( 'Title #1', 'keystone-elements-addons' ),
                        'subtitle' => esc_html__( 'Subtitle #1', 'keystone-elements-addons' ),
                        'image' => '',
                        'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pugnant Stoici cum Peripateticis. Et quidem, inquit, vehementer errat; Quamquam id quidem, infinitum est in hac urbe; Duo Reges: constructio interrete.</p>'
				    ],
                    [
                        'title' => esc_html__( 'Title #2', 'keystone-elements-addons' ),
                        'subtitle' => esc_html__( 'Subtitle #2', 'keystone-elements-addons' ),
                        'image' => '',
                        'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pugnant Stoici cum Peripateticis. Et quidem, inquit, vehementer errat; Quamquam id quidem, infinitum est in hac urbe; Duo Reges: constructio interrete.</p>'
					],
					[
                        'title' => esc_html__( 'Title #3', 'keystone-elements-addons' ),
                        'subtitle' => esc_html__( 'Subtitle #3', 'keystone-elements-addons' ),
                        'image' => '',
                        'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pugnant Stoici cum Peripateticis. Et quidem, inquit, vehementer errat; Quamquam id quidem, infinitum est in hac urbe; Duo Reges: constructio interrete.</p>'
					],
					[
                        'title' => esc_html__( 'Title #4', 'keystone-elements-addons' ),
                        'subtitle' => esc_html__( 'Subtitle #4', 'keystone-elements-addons' ),
                        'image' => '',
                        'content' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pugnant Stoici cum Peripateticis. Et quidem, inquit, vehementer errat; Quamquam id quidem, infinitum est in hac urbe; Duo Reges: constructio interrete.</p>'
				    ]
			     ],
                'title_field' => '{{{ title }}}',
            ]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
			'carousel_settings',
			[
				'label' => esc_html__( 'Carousel Settings', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'three',
				'options' => [
                    'one'  => esc_html__( '1 Column', 'keystone-elements-addons' ),
					'two'  => esc_html__( '2 Column', 'keystone-elements-addons' ),
					'three'  => esc_html__( '3 Column', 'keystone-elements-addons' ),
                    'four'  => esc_html__( '4 Column', 'keystone-elements-addons' ),
                    'five'  => esc_html__( '5 Column', 'keystone-elements-addons' )
				],
			]
		);
        
        $this->add_control(
			'display_nav', [
				'label' => esc_html__( 'Display Navigation Arrows', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'display_dots', [
				'label' => esc_html__( 'Display Navigation Dots', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'infinite', [
				'label' => esc_html__( 'Infinite Loop', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'autoplay', [
				'label' => esc_html__( 'Autoplay', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Infinite loop should be on.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'autoplay_duration',
			[
				'label' => esc_html__( 'Autoplay Duration (Second)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 120,
				'step' => 1,
				'default' => 5,
			]
		);

        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_item',
			[
				'label' => esc_html__( 'Testimonial', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'item_direction',
			[
				'label' => esc_html__( 'Flex Direction', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'column',
				'options' => [
                    'column'  => esc_html__( 'Column', 'keystone-elements-addons' ),
                    'column-reverse'  => esc_html__( 'Column Reverse', 'keystone-elements-addons' ),
					'row'  => esc_html__( 'Row', 'keystone-elements-addons' ),
                    'row-reverse'  => esc_html__( 'Row Reverse', 'keystone-elements-addons' )
                ],
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-item' => 'flex-direction: {{VALUE}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'item_width',
			[
				'label' => esc_html__( 'Max Width (px)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
                    'px' => [
						'min' => 100,
						'max' => 1000,
					],
				],
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-item' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'item_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'item_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-item' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'item_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-item',
			]
		);
        
        $this->add_responsive_control(
			'item_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-item' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_shadow',
				'label' => esc_html__( 'Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-item',
			]
        );
        
        $this->add_control(
			'item_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_control(
			'carousel_overflow_hidden', [
				'label' => esc_html__( 'Overflow Hidden', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'cj-overflow-hidden',
				'default' => '',
				'show_label' => true,
			]
		);

		$this->add_responsive_control(
			'carousel_spacing',
			[
				'label' => esc_html__( 'Spacing', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .slick-slide' => 'margin-left: {{LEFT}}{{UNIT}};margin-right: {{RIGHT}}{{UNIT}};margin-top: {{TOP}}{{UNIT}};margin-bottom: {{BOTTOM}}{{UNIT}};',
                    '{{WRAPPER}} .slick-list' => 'margin-left: -{{LEFT}}{{UNIT}};margin-right: -{{RIGHT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'item_margin',
			[
				'label' => esc_html__( 'Item Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'item_padding',
			[
				'label' => esc_html__( 'Item Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'section_info',
			[
				'label' => esc_html__( 'Author Info', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'info_direction',
			[
				'label' => esc_html__( 'Flex Direction', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'row',
				'options' => [
                    'column'  => esc_html__( 'Column', 'keystone-elements-addons' ),
                    'column-reverse'  => esc_html__( 'Column Reverse', 'keystone-elements-addons' ),
					'row'  => esc_html__( 'Row', 'keystone-elements-addons' ),
                    'row-reverse'  => esc_html__( 'Row Reverse', 'keystone-elements-addons' )
                ],
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'flex-direction: {{VALUE}};'
				],
			]
        );

        $this->add_responsive_control(
			'info_min_width',
			[
				'label' => esc_html__( 'Min Width (px)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
				'range' => [
                    'px' => [
						'min' => 100,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 150,
                ],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'item_direction',
                            'operator' => '==',
                            'value' => 'row'
                        ],
                        [
                            'name' => 'item_direction',
                            'operator' => '==',
                            'value' => 'row-reverse'
                        ]
                    ]
                ],
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->add_responsive_control(
			'info_horizontal_align_column',
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
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'column'
                        ],
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'column-reverse'
                        ]
                    ]
                ],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
        );
        
        $this->add_responsive_control(
			'info_vertical_align_column',
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
                'conditions' => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'info_direction',
                                    'operator' => '==',
                                    'value' => 'column'
                                ],
                                [
                                    'name' => 'info_direction',
                                    'operator' => '==',
                                    'value' => 'column-reverse'
                                ]
                            ]
                        ],
                        [
                            'relation' => 'or',
                            'terms' => [
                                [
                                    'name' => 'item_direction',
                                    'operator' => '==',
                                    'value' => 'row'
                                ],
                                [
                                    'name' => 'item_direction',
                                    'operator' => '==',
                                    'value' => 'row-reverse'
                                ]
                            ]
                        ]
                    ]
                ],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'info_horizontal_align_row',
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
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row'
                        ],
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row-reverse'
                        ]
                    ]
                ],
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
        );
        
        $this->add_responsive_control(
			'info_vertical_align_row',
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
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row'
                        ],
                        [
                            'name' => 'info_direction',
                            'operator' => '==',
                            'value' => 'row-reverse'
                        ]
                    ]
                ],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'info_text_align',
			[
				'label' => esc_html__( 'Text Alignment', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'keystone-elements-addons' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'keystone-elements-addons' ),
						'icon' => 'fa fa-align-right',
					],
                ],
                'default' => 'left',
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'text-align: {{VALUE}};',
				],
				'toggle' => false,
			]
        );
        
        $this->add_control(
			'info_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'info_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'info_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-person' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'content_font_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj-testimonials-content p' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_font_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-testimonials-content,{{WRAPPER}} .cj-testimonials-content p',
			]
		);
        
        $this->add_control(
			'content_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content h1' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-content h2' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-content h3' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-content h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-content h5' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-content h6' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_heading_typography',
				'label' => esc_html__( 'Heading Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-testimonials-content h1,{{WRAPPER}} .cj-testimonials-content h2,{{WRAPPER}} .cj-testimonials-content h3,{{WRAPPER}} .cj-testimonials-content h4,{{WRAPPER}} .cj-testimonials-content h5,{{WRAPPER}} .cj-testimonials-content h6',
			]
		);
        
        $this->add_responsive_control(
			'content_text_align',
			[
				'label' => esc_html__( 'Text Alignment', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'keystone-elements-addons' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'keystone-elements-addons' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content' => 'text-align: {{VALUE}};',
					'{{WRAPPER}} .cj-testimonials-content p' => 'text-align: {{VALUE}};'
				],
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-content',
			]
		);
        
        $this->add_responsive_control(
			'content_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'label' => esc_html__( 'Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-content',
			]
        );
        
        $this->add_control(
			'content_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'content_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_arrow',
			[
				'label' => esc_html__( 'Content Arrow', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
			'content_arrow',
			[
				'label' => esc_html__( 'Arrow', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'no-arrow',
				'options' => [
                    'no-arrow'  => esc_html__( 'None', 'keystone-elements-addons' ),
                    'top-arrow'  => esc_html__( 'Top', 'keystone-elements-addons' ),
                    'bottom-arrow'  => esc_html__( 'Bottom', 'keystone-elements-addons' ),
                    'left-arrow'  => esc_html__( 'Left', 'keystone-elements-addons' ),
                    'right-arrow'  => esc_html__( 'Right', 'keystone-elements-addons' ),
				],
			]
        );
        
        $this->add_responsive_control(
			'content_arrow_top',
			[
				'label' => esc_html__( 'Top Spacing', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 500,
                    ],
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'left-arrow'
                        ],
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'right-arrow'
                        ]
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .cj-testimonials-content.left-arrow:after' => 'top: {{SIZE}}{{UNIT}};transform:translateY(0) translateX(-100%);',
                    '{{WRAPPER}} .cj-testimonials-content.right-arrow:after' => 'top: {{SIZE}}{{UNIT}};transform:translateY(0) translateX(100%);'
				],
			]
        );
        
        $this->add_responsive_control(
			'content_arrow_left',
			[
				'label' => esc_html__( 'Left Spacing', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 1000,
                    ],
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'conditions' => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'top-arrow'
                        ],
                        [
                            'name' => 'content_arrow',
                            'operator' => '==',
                            'value' => 'bottom-arrow'
                        ]
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .cj-testimonials-content.top-arrow:after' => 'left: {{SIZE}}{{UNIT}};transform:none;',
                    '{{WRAPPER}} .cj-testimonials-content.bottom-arrow:after' => 'left: {{SIZE}}{{UNIT}};transform:none;'
				],
			]
		);

        $this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content:after' => 'border-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Arrow Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 200,
				'step' => 1,
				'default' => 15,
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-content:after' => 'border-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Name', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-title' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-testimonials-title',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-title',
			]
        );

        $this->add_control(
			'title_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_subtitle',
			[
				'label' => esc_html__( 'Info', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-subtitle' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-testimonials-subtitle',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-subtitle',
			]
        );

        $this->add_control(
			'subtitle_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-subtitle' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_thumbnail',
			[
				'label' => esc_html__( 'Thumbnail', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'img_size',
			[
				'label' => esc_html__( 'Thumbnail Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'thumbnail',
				'options' => KEA_get_image_sizes(),
			]
		);
        
        $this->add_responsive_control(
			'thumb_width',
			[
				'label' => esc_html__( 'Max Width (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 500,
				'step' => 1,
				'default' => 70,
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-thumb' => 'width: {{VALUE}}px;'
				],
			]
        );
        
        $this->add_control(
			'thumb_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-thumb img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-thumb img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'label' => esc_html__( 'Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-testimonials-thumb img',
			]
        );

        $this->add_control(
			'thumb_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'thumb_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-thumb' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
			'section_navigation',
			[
				'label' => esc_html__( 'Navigation Arrows', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['display_nav' => 'yes']
			]
        );
        
        $this->add_control(
			'nav_arrow_next_icon',
			[
				'label' => esc_html__( 'Next Icon', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'solid',
				],
			]
        );
        
        $this->add_control(
			'nav_arrow_prev_icon',
			[
				'label' => esc_html__( 'Previous Icon', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-arrow-left',
					'library' => 'solid',
				],
			]
        );
        
        $this->start_controls_tabs( 'tabs_arrow_style' );
        
        $this->start_controls_tab(
			'tab_arrow_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
        );
        
        $this->add_control(
			'nav_arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-prev' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-next' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'nav_arrow_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-prev' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-next' => 'background-color: {{VALUE}};'
				],
			]
		);
 
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_arrow_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);

        $this->add_control(
			'nav_arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-prev:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-next:hover' => 'color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'nav_arrow_bg_hover_color',
			[
				'label' => esc_html__( 'Background Hover Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-prev:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-next:hover' => 'background-color: {{VALUE}};'
				],
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
			'nav_arrow_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'nav_arrow_size',
			[
				'label' => esc_html__( 'Icon Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 1,
				'default' => 30,
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-prev' => 'font-size: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-next' => 'font-size: {{VALUE}}px;',
				],
			]
		);
        
        $this->add_responsive_control(
			'nav_arrow_box_size',
			[
				'label' => esc_html__( 'Box Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 200,
				'step' => 1,
				'default' => 60,
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-prev' => 'height: {{VALUE}}px;width: {{VALUE}}px;line-height: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-next' => 'height: {{VALUE}}px;width: {{VALUE}}px;line-height: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'nav_arrow_radius',
			[
				'label' => esc_html__( 'Box Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-next' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-prev' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'nav_arrow_box_margin',
			[
				'label' => esc_html__( 'Box Right/Left Margin (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -100,
				'max' => 100,
				'step' => 1,
				'default' => 0,
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-next' => 'right: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-prev' => 'left: {{VALUE}}px;'
				],
			]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_navigation_dots',
			[
				'label' => esc_html__( 'Navigation Dots', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['display_dots' => 'yes']
			]
		);
        
        $this->add_control(
			'dots_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-dots li button:before' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'dots_size',
			[
				'label' => esc_html__( 'Dot Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 1,
				'default' => 20,
                'selectors' => [
					'{{WRAPPER}} .cj-testimonials-carousel .slick-dots li button:before' => 'font-size: {{VALUE}}px;line-height: {{VALUE}}px;width: {{VALUE}}px;height: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-dots li button' => 'width: {{VALUE}}px;height: {{VALUE}}px;',
				],
			]
		);
        
        $this->add_responsive_control(
			'dot_margin',
			[
				'label' => esc_html__( 'Dot Right/Left Padding (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 1,
				'default' => 2,
                'selectors' => [
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-dots li' => 'margin-left: {{VALUE}}px !important;margin-right: {{VALUE}}px !important;',
				],
			]
		);
        
        $this->add_responsive_control(
			'dots_bottom_margin',
			[
				'label' => esc_html__( 'Dots Bottom Margin (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -100,
				'max' => 100,
				'step' => 1,
				'default' => -40,
                'selectors' => [
                    '{{WRAPPER}} .cj-testimonials-carousel .slick-dots' => 'bottom: {{VALUE}}px;',
				],
			]
		);
        
        $this->end_controls_section();

	}
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div id="cj-testimonials-carousel-<?php echo esc_attr($this->get_id()); ?>" class="cj-testimonials-carousel <?php echo esc_attr($settings['carousel_overflow_hidden']); ?>" data-prv="<?php echo $settings['nav_arrow_prev_icon']['value']; ?>" data-nxt="<?php echo $settings['nav_arrow_next_icon']['value']; ?>" data-autoplay="<?php if ($settings['autoplay']) { echo 'true'; } else { echo 'false'; } ?>" data-duration="<?php echo esc_attr($settings['autoplay_duration']); ?>000" data-infinite="<?php if ($settings['infinite']) { echo 'true'; } else { echo 'false'; } ?>" data-nav="<?php if ($settings['display_nav']) { echo 'true'; } else { echo 'false'; } ?>" data-dots="<?php if ($settings['display_dots']) { echo 'true'; } else { echo 'false'; } ?>" data-postcolumns="<?php echo esc_attr($settings['columns']); ?>" data-rtl="<?php if (is_rtl()) { echo 'true'; } else { echo 'false'; } ?>">
        <?php foreach ( $settings['testimonials'] as $item ) { ?>
        <?php $img_url = wp_get_attachment_image_url( $item['image']['id'], $settings['img_size'] ); ?>
            <div class="cj-testimonials-slide">
                <div class="cj-testimonials-item">
                    <div class="cj-testimonials-content <?php echo $settings['content_arrow']; ?>">
                        <?php echo wp_kses_post($item['content']); ?>
                    </div>
                    <div class="cj-testimonials-person">
                        <?php if ($img_url) { ?>
                        <div class="cj-testimonials-thumb"><img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($item['title']); ?>" /></div>
                        <?php } ?>
                        <div class="cj-testimonials-info">
                            <?php if ($item['title']) { ?>
                            <span class="cj-testimonials-title"><?php echo wp_kses_post($item['title']); ?></span>
                            <?php } ?>
                            <?php if ($item['subtitle']) { ?>
                            <span class="cj-testimonials-subtitle"><?php echo wp_kses_post($item['subtitle']); ?></span>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
<?php }
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Testimonial_Carousel() );
?>