<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Team_Member extends Widget_Base {

	public function get_name() {
		return 'cj-team_member';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Team Member', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'elementor-icons-fa-solid','cj-lib-animate','cj-lib-lightbox','cj-team_member' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-lib-lightbox','cj-team_member' ];
	}

	public function get_icon() {
		return 'eicon-person';
	}
    
	protected function register_controls() {
        // section start
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Team Member', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Thumbnail', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'show_label' => false
			]
		);
        
        $this->add_control(
			'member_name',
			[
				'label' => esc_html__( 'Name', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'default' => esc_html__( 'John Doe', 'keystone-elements-addons' )
			]
		);
        
        $this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Info', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
                'default' => esc_html__( 'Web Designer', 'keystone-elements-addons' )
			]
		);
        
        $this->add_control(
			'heading_lightbox',
			[
				'label' => esc_html__( 'Link to', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'lightbox_style',
			[
				'label' => esc_html__( 'Link to', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
				'options' => [
                    'none'  => esc_html__( 'No link', 'keystone-elements-addons' ),
                    'external'  => esc_html__( 'External Url', 'keystone-elements-addons' ),
					'img'  => esc_html__( 'Image', 'keystone-elements-addons' ),
					'video' => esc_html__( 'Video', 'keystone-elements-addons' ),
				],
                'label_block' => true,
                'show_label' => false
			]
		);
        
        $this->add_control(
			'external_link',
			[
				'label' => esc_html__( 'Destination Url', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'keystone-elements-addons' ),
				'show_external' => true,
                'condition' => ['lightbox_style' => 'external'],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'lightbox_image',
			[
				'label' => esc_html__( 'Lightbox Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => ['lightbox_style' => 'img'],
                'show_label' => false
			]
		);
        
        $this->add_control(
			'oembed',
			[
				'label' => esc_html__( 'Lightbox Video URL', 'keystone-elements-addons' ),
                'description' => esc_html__( 'For example: https://www.youtube.com/watch?v=8AZ8GqW5iak', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => ['lightbox_style' => 'video'],
				'input_type' => 'url',
                'show_label' => false
			]
		);
        
        $this->add_control(
			'heading_lightbox_content',
			[
				'label' => esc_html__( 'Lightbox Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'lightbox_style',
                            'value' => 'img',
                        ],
                        [
                            'name'  => 'lightbox_style',
                            'value' => 'video',
                        ]
                    ]
                ],
			]
		);
        
        $this->add_control(
			'box_content', [
				'label' => esc_html__( 'Lightbox Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'label_block' => true,
                'show_label' => false,
                'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'lightbox_style',
                            'value' => 'img',
                        ],
                        [
                            'name'  => 'lightbox_style',
                            'value' => 'video',
                        ]
                    ]
                ],
			]
		);
        
        $this->end_controls_section();
        
        // section start
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
				'default' => 'large',
				'options' => KEA_get_image_sizes(),
			]
		);
        
        $this->add_responsive_control(
			'max_img_size',
			[
				'label' => esc_html__( 'Max. Thumb Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 2000,
				'step' => 10,
				'default' => 600,
                'selectors' => [
					'{{WRAPPER}} .cj-team-member' => 'max-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'img_h_align',
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
				'selectors' => [
					'{{WRAPPER}} .cj-team-member-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'thumbnail_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .cj-team-member a' => 'background-color: {{VALUE}};'
				],
			]
		);

		$this->add_control(
			'thumbnail_opacity_duration',
			[
				'label' => esc_html__( 'Opacity Animation Duration', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
				'default' => 0.2,
                'selectors' => [
					'{{WRAPPER}} .cj-team-member img' => 'transition-duration: {{VALUE}}s;'
				],
			]
		);

		$this->add_control(
			'thumb_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs( 'tabs_thumbnail_style' );
        
        $this->start_controls_tab(
			'tab_thumbnail_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
		
		$this->add_control(
			'thumbnail_opacity',
			[
				'label' => esc_html__( 'Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-team-member img' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_css_filter',
				'label' => esc_html__( 'CSS Filters', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-member img'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_thumbnail_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);

		$this->add_control(
			'thumbnail_hover_opacity',
			[
				'label' => esc_html__( 'Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-team-member a:hover img' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_hover_css_filter',
				'label' => esc_html__( 'CSS Filters', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-member a:hover img'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'thumb_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-member a',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-member a' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cj-team-member img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cj-team-member' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ), 
				'selector' => '{{WRAPPER}} .cj-team-member',
			]
		);
        
        $this->end_controls_section();
        
        // section start
        $this->start_controls_section(
			'section_caption',
			[
				'label' => esc_html__( 'Box Content', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'caption_placement',
			[
				'label' => esc_html__( 'Placement', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'in-img',
				'options' => [
					'in-img'  => esc_html__( 'On the image', 'keystone-elements-addons' ),
					'below-img' => esc_html__( 'Below the image', 'keystone-elements-addons' ),
				]
			]
		);
        
        $this->add_control(
			'caption_style',
			[
				'label' => esc_html__( 'Show', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'name',
				'options' => [
					'name'  => esc_html__( 'Name & Info', 'keystone-elements-addons' ),
					'icon' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				]
			]
		);
        
        $this->add_responsive_control(
			'caption_align',
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
					'{{WRAPPER}} .cj-team-overlay' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'caption_valign',
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
				'default' => 'flex-end',
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'caption_text_align',
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
					]
				],
                'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .cj-team-texts' => 'text-align: {{VALUE}};'
				],
				'toggle' => false
			]
		);
        
        $this->add_control(
			'box_content_animation',
			[
				'label' => esc_html__( 'Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION
			]
		);

		$this->add_control(
			'overflow_hidden',
			[
				'label' => esc_html__( 'Overflow', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hidden', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Auto', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->add_control(
			'box_content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->start_controls_tabs( 'box_content_style' );
        
        $this->start_controls_tab(
			'box_content_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_responsive_control(
			'box_content_opacity',
			[
				'label' => esc_html__( 'Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-team-overlay' => 'opacity: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_content_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-team-overlay',
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_content_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-overlay'
			]
		);
        
        $this->add_responsive_control(
			'box_content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'box_content_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_responsive_control(
			'box_content_hover_opacity',
			[
				'label' => esc_html__( 'Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-team-overlay:hover' => 'opacity: {{VALUE}};'
				],
			]
		);

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'box_content_hover_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-team-overlay:hover',
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'box_content_hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-overlay:hover'
			]
		);
        
        $this->add_responsive_control(
			'box_content_hover_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
			'box_content_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'box_content_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-team-overlay' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
        $this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['caption_style' => 'name']
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-title' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-team-overlay .cj-team-title',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-title',
			]
		);
        
        $this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-title span' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'title_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'title_entrance_animation',
			[
				'label' => esc_html__( 'Entrance Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'frontend_available' => true
			]
		);
        
        $this->add_control(
			'title_entrance_animation_duration',
			[
				'label' => esc_html__( 'Entrance Animation Duration', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
                'label_block' => 'true',
				'options' => [
					''  => esc_html__( 'Default', 'keystone-elements-addons' ),
					'fast'  => esc_html__( 'Fast', 'keystone-elements-addons' ),
                    'faster'  => esc_html__( 'Faster', 'keystone-elements-addons' ),
                    'slow'  => esc_html__( 'Slow', 'keystone-elements-addons' ),
                    'slower'  => esc_html__( 'Slower', 'keystone-elements-addons' ),
				],
			]
		);
        
        $this->add_control(
			'title_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-title span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
        $this->start_controls_section(
			'section_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['caption_style' => 'name']
			]
		);
        
        $this->add_control(
			'subtitle_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-subtitle' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'subtitle_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-team-overlay .cj-team-subtitle',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'subtitle_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-subtitle',
			]
		);
        
        $this->add_control(
			'subtitle_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-subtitle span' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'subtitle_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'subtitle_entrance_animation',
			[
				'label' => esc_html__( 'Entrance Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'frontend_available' => true
			]
		);
        
        $this->add_control(
			'subtitle_entrance_animation_duration',
			[
				'label' => esc_html__( 'Entrance Animation Duration', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
                'label_block' => 'true',
				'options' => [
					''  => esc_html__( 'Default', 'keystone-elements-addons' ),
					'fast'  => esc_html__( 'Fast', 'keystone-elements-addons' ),
                    'faster'  => esc_html__( 'Faster', 'keystone-elements-addons' ),
                    'slow'  => esc_html__( 'Slow', 'keystone-elements-addons' ),
                    'slower'  => esc_html__( 'Slower', 'keystone-elements-addons' ),
				],
			]
		);
        
        $this->add_control(
			'subtitle_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'subtitle_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-subtitle span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'subtitle_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-overlay .cj-team-texts .cj-team-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
        $this->start_controls_section(
			'section_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['caption_style' => 'icon']
			]
		);
        
        $this->add_control(
			'thumb_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-search',
					'library' => 'solid',
				],
			]
		);
        
        $this->add_control(
			'icon_animation',
			[
				'label' => esc_html__( 'Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 1,
				'default' => 30,
                'selectors' => [
					'{{WRAPPER}} .cj-team-icon i' => 'font-size: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-team-icon i' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'icon_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-icon i',
			]
		);
        
        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-team-icon' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'icon_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 300,
				'step' => 1,
				'default' => 30,
                'selectors' => [
					'{{WRAPPER}} .cj-team-icon' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 300,
				'step' => 1,
				'default' => 30,
                'selectors' => [
					'{{WRAPPER}} .cj-team-icon' => 'height: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-team-icon i' => 'line-height: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-team-icon i',
			]
		);
        
        $this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-team-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
        $this->start_controls_section(
			'section_lightbox',
			[
				'label' => esc_html__( 'Lightbox', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'lightbox_bg_color',
			[
				'label' => esc_html__( 'Content Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff'
			]
		);
        
        $this->add_control(
			'box_width',
			[
				'label' => esc_html__( 'Maximum Lightbox Width (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 3000,
				'step' => 10,
				'default' => 800,
			]
		);
        
        $this->add_control(
			'lightbox_spacing',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-lightbox-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
        $img_url = wp_get_attachment_image_url( $settings['image']['id'], $settings['img_size'] );
        if (!$img_url) {
            $img_url = $settings['image']['url']; 
        } 
        ?>
        <div class="cj-team-member-wrapper">
            <div class="cj-team-member <?php echo esc_attr($settings['caption_placement']); ?>">
                <?php if ($settings['lightbox_style'] == 'external') { ?>
				<?php
				$target = $settings['external_link']['is_external'] ? ' target="_blank"' : '';
				$nofollow = $settings['external_link']['nofollow'] ? ' rel="nofollow"' : '';
				?>
                <a href="<?php echo esc_url($settings['external_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?> data-elementor-open-lightbox="no" class="<?php if ($settings['overflow_hidden']) { echo 'no-overlay'; } ?>">
                <?php } elseif ($settings['lightbox_style'] != 'none') { ?>
                <a href="#cj-lightbox-<?php echo esc_attr($this->get_id()); ?>" data-elementor-open-lightbox="no" class="has-lightbox <?php if ($settings['overflow_hidden']) { echo 'no-overlay'; } ?>">
                <?php } ?>    
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($settings['member_name']); ?>" />
                    <?php if (($settings['caption_style'] == 'name') && (($settings['member_name']) || ($settings['subtitle']))) { ?>
                    <div class="cj-team-overlay elementor-animation-<?php echo esc_attr($settings['box_content_animation']); ?>  <?php if ($settings['overflow_hidden']) { echo 'no-overlay'; } ?>">
                        <div class="cj-team-texts">
                            <?php if ($settings['member_name']) { ?>
                            <div class="cj-team-title <?php if (($settings['title_entrance_animation']) && ($settings['title_entrance_animation'] != 'none')) { ?>animated cj-hide<?php } ?> <?php echo $settings['title_entrance_animation_duration']; ?>" data-animation="<?php echo $settings['title_entrance_animation']; ?>" data-exit="<?php echo KEA_get_anim_exits($settings['title_entrance_animation']); ?>">
                                <span><?php echo esc_html($settings['member_name']); ?></span>
                            </div>
                            <?php } ?>
                            <?php if ($settings['subtitle']) { ?>
                            <div class="cj-team-subtitle <?php if (($settings['subtitle_entrance_animation']) && ($settings['subtitle_entrance_animation'] != 'none')) { ?>animated cj-hide<?php } ?> <?php echo $settings['subtitle_entrance_animation_duration']; ?>" data-animation="<?php echo $settings['subtitle_entrance_animation']; ?>" data-exit="<?php echo KEA_get_anim_exits($settings['subtitle_entrance_animation']); ?>">
                                <span><?php echo esc_html($settings['subtitle']); ?></span>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } elseif ($settings['caption_style'] == 'icon') { ?>
                    <div class="cj-team-overlay elementor-animation-<?php echo esc_attr($settings['icon_animation']); ?> <?php if ($settings['overflow_hidden']) { echo 'no-overlay'; } ?>">
                        <div class="cj-team-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['thumb_icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
                    </div>
                    <?php } ?> 
                <?php if ($settings['lightbox_style'] != 'none') { ?>    
                </a>
                <?php } ?>
            </div>
        </div>
        <?php 
        if (($settings['lightbox_style'] == 'img') || ($settings['lightbox_style'] == 'video')) {
        /**
        * Lightbox content
        */
        $lightbox_image = $settings['lightbox_image'];    
        $video_url = $settings['oembed']; 
        $box_content = $settings['box_content'];
        ?>
        <div id="cj-lightbox-<?php echo esc_attr($this->get_id()); ?>" class="cj-lightbox-oembed">
            <?php if (($video_url) && ($settings['lightbox_style'] == 'video')) { ?>
            <div class="cj-lightbox-iframe">
            <?php
            $args = array(
                'width' => $settings['box_width']
            );
            ?>
            <?php $oembed = wp_oembed_get( $settings['oembed'], $args ); ?>
            <?php echo ( $oembed ) ? $oembed : $settings['oembed']; ?>
            </div>
            <?php } elseif (($settings['lightbox_image']['url']) && ($settings['lightbox_style'] == 'img')) { ?>
            <div class="cj-lightbox-image" style="max-width:<?php echo esc_attr($settings['box_width']); ?>px;">
                <img src="<?php echo esc_url($settings['lightbox_image']['url']); ?>" alt="" />
            </div>
            <?php } ?>
            <?php if ($box_content) { ?>
            <div class="cj-lightbox-content" style="max-width:<?php echo esc_attr($settings['box_width']); ?>px;background-color:<?php echo esc_attr($settings['lightbox_bg_color']); ?>;padding:<?php echo esc_attr($settings['lightbox_spacing']['top'] . $settings['lightbox_spacing']['unit']); ?> <?php echo esc_attr($settings['lightbox_spacing']['right'] . $settings['lightbox_spacing']['unit']); ?> <?php echo esc_attr($settings['lightbox_spacing']['bottom'] . $settings['lightbox_spacing']['unit']); ?> <?php echo esc_attr($settings['lightbox_spacing']['left'] . $settings['lightbox_spacing']['unit']); ?>">
                <?php echo do_shortcode($box_content); ?>
            </div>
            <?php } ?>
        </div>
	<?php
        }
    } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Team_Member() );