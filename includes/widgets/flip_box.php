<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Flip_Box extends Widget_Base {

	public function get_name() {
		return 'cj-flip_box';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Flip Box', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-flip_box', 'cj-button'];
    }
    
    public function get_script_depends() {
		return [ 'cj-flip_box' ];
	}
    
    public function get_icon() {
		return 'eicon-flip-box';
	}
	
	public function get_btn_skins() {
        $output_skins = apply_filters('cj-btn-skins', array( 
            '' => esc_html__( 'None', 'keystone-elements-addons' ),
            'cj-btn-1' => esc_html__( 'Animation 1', 'keystone-elements-addons' ),
            'cj-btn-2' => esc_html__( 'Animation 2', 'keystone-elements-addons' ),
            'cj-btn-3' => esc_html__( 'Animation 3', 'keystone-elements-addons' ),
            'cj-btn-4' => esc_html__( 'Animation 4', 'keystone-elements-addons' ),
            'cj-btn-5' => esc_html__( 'Animation 5', 'keystone-elements-addons' ),
            'cj-btn-6' => esc_html__( 'Animation 6', 'keystone-elements-addons' ),
            'cj-btn-7' => esc_html__( 'Animation 7', 'keystone-elements-addons' ),
            'cj-btn-8' => esc_html__( 'Animation 8', 'keystone-elements-addons' ),
            
        ));
        return $output_skins;
    }

	protected function register_controls() {
		$this->start_controls_section(
			'front_section',
			[
				'label' => esc_html__( 'Front', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'front_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::ICONS
			]
		);

		$this->add_control(
			'front_title_html_tag',
			[
				'label' => esc_html__( 'Title HTML Tag', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'span' => 'span'
				],
				'default' => 'h5',
			]
		);

		$this->add_control(
			'front_title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title Here...', 'keystone-elements-addons' )
			]
		);

		$this->add_control(
			'front_content', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Content Here...', 'keystone-elements-addons' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'back_section',
			[
				'label' => esc_html__( 'Back', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'back_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::ICONS
			]
		);

		$this->add_control(
			'back_title_html_tag',
			[
				'label' => esc_html__( 'Title HTML Tag', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'span' => 'span'
				],
				'default' => 'h5',
			]
		);

		$this->add_control(
			'back_title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
				'default' => esc_html__( 'Title Here...', 'keystone-elements-addons' )
			]
		);

		$this->add_control(
			'back_content', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Content Here...', 'keystone-elements-addons' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_content',
			[
				'label' => esc_html__( 'Button', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'btn_text', [
				'label' => esc_html__( 'Text', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'BUY NOW', 'keystone-elements-addons' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'btn_website_link',
			[
				'label' => esc_html__( 'Link to', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://www.keystonethemes.com', 'keystone-elements-addons' ),
				'show_external' => true,
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
			'btn_size',
			[
				'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cj-btn-md',
				'options' => [
					'cj-btn-md'  => esc_html__( 'Normal', 'keystone-elements-addons' ),
					'cj-btn-lg'  => esc_html__( 'Large', 'keystone-elements-addons' ),
                    'cj-btn-sm'  => esc_html__( 'Small', 'keystone-elements-addons' )
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_text_align',
			[
				'label' => esc_html__( 'Alignment', 'keystone-elements-addons' ),
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
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,
			]
		);
        
        $this->add_control(
			'btn_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);
        
        $this->add_control(
			'btn_icon_position',
			[
				'label' => esc_html__( 'Icon Position', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'before',
				'options' => [
					'after'  => esc_html__( 'After', 'keystone-elements-addons' ),
					'before'  => esc_html__( 'Before', 'keystone-elements-addons' )
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_icon_spacing',
			[
				'label' => esc_html__( 'Icon Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-btn-wrapper a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'btn_id',
			[
				'label' => esc_html__( 'Button ID', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'description' => esc_html__( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows A-Z 0-9  & underscore chars without spaces.', 'keystone-elements-addons' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->end_controls_section();
		
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Animation', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

		$this->add_control(
			'direction',
			[
                'label' => esc_html__( 'Animation Direction', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'flip-right' => esc_html__( 'Flip Right', 'keystone-elements-addons' ),
					'flip-left' => esc_html__( 'Flip Left', 'keystone-elements-addons' ),
					'flip-up' => esc_html__( 'Flip Up', 'keystone-elements-addons' ),
					'flip-down' => esc_html__( 'Flip Down', 'keystone-elements-addons' ),
					'flip-diagonal-right' => esc_html__( 'Flip Diagonal Right', 'keystone-elements-addons' ),
					'flip-diagonal-left' => esc_html__( 'Flip Diagonal Left', 'keystone-elements-addons' ),
					'flip-inverted-diagonal-right' => esc_html__( 'Flip Inverted Diagonal Right', 'keystone-elements-addons' ),
					'flip-inverted-diagonal-left' => esc_html__( 'Flip Inverted Diagonal Left', 'keystone-elements-addons' ),
				],
				'label_block' => true,
                'default' => 'flip-right'
			]
		);

		$this->add_control(
			'duration',
			[
				'label' => esc_html__( 'Animation Duration', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
				'default' => 0.4,
                'selectors' => [
					'{{WRAPPER}} .kea-flip-card-inner' => 'transition-duration: {{VALUE}}s;'
				],
			]
		);

		$this->add_control(
			'timing',
			[
                'label' => esc_html__( 'Animation Timing', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'linear' => esc_html__( 'Linear', 'keystone-elements-addons' ),
					'ease' => esc_html__( 'Ease', 'keystone-elements-addons' ),
					'ease-in' => esc_html__( 'Ease In', 'keystone-elements-addons' ),
					'ease-out' => esc_html__( 'Ease Out', 'keystone-elements-addons' ),
					'ease-in-out' => esc_html__( 'Ease In Out', 'keystone-elements-addons' ),
					'custom' => esc_html__( 'Custom', 'keystone-elements-addons' )
				],
				'label_block' => true,
                'default' => 'linear'
			]
		);

		$this->add_control(
			'custom_timing', [
				'label' => esc_html__( 'Custom Timing', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'cubic-bezier(0.75, 0, 0.85, 1)',
				'label_block' => true,
				'condition' => ['timing' => 'custom']
			]
		);

		$this->end_controls_section();

          // section start
		$this->start_controls_section(
			'box_style_section',
			[
				'label' => esc_html__( 'Box', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'box_align',
			[
				'label' => esc_html__( 'Box Align', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .kea-flip-card-outer' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'box_max_width',
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
                'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper' => 'max-width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .kea-flip-card-inner' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'box_min_height',
			[
				'label' => esc_html__( 'Minimum Height', 'keystone-elements-addons' ),
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
                'default' => [
					'unit' => 'px',
					'size' => 400,
				],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper' => 'min-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .kea-flip-card-inner' => 'min-height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();

        // section start
		$this->start_controls_section(
			'front_style_section',
			[
				'label' => esc_html__( 'Front', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'front_horizontal_align',
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
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'front_vertical_align',
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
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'front_text_align',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'front_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'front_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'front_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front',
			]
		);

		$this->add_control(
			'front_bg_overlay',
			[
				'label' => esc_html__( 'Background Overlay Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-overlay' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'front_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'front_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front'
			]
		);
        
        $this->add_responsive_control(
			'front_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'front_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->start_controls_tabs( 'tabs_front_style' );
        
        $this->start_controls_tab(
			'tab_front_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons'),
			]
		);
		
		$this->add_responsive_control(
			'front_icon_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'front_icon_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon' => 'height: {{VALUE}}px;',
				],
			]
        );

        $this->add_control(
			'front_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'front_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'front_icon_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon'
			]
		);

        $this->add_control(
			'front_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon svg' => 'fill: {{VALUE}};',
				]
			]
		);
        
        $this->add_responsive_control(
			'front_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
                    'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'front_icon_svg_width',
			[
				'label' => esc_html__( 'SVG Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
				'default' => 100,
                'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon svg' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'front_icon_svg_height',
			[
				'label' => esc_html__( 'SVG Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
				'default' => 100,
                'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-icon svg' => 'height: {{VALUE}}px;'
				],
			]
        );
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_front_title',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons'),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_title_typography',
				
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-title'
			]
		);

		$this->add_control(
			'front_title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'front_title_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-title' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'front_title_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'front_title_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'tab_front_content',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons'),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'front_content_typography',
				
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-content'
			]
		);

		$this->add_control(
			'front_content_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-content' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'front_content_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-content' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'front_content_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'front_content_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .front .kea-flip-card-front-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
		
		$this->end_controls_section();

		 // section start
		 $this->start_controls_section(
			'back_style_section',
			[
				'label' => esc_html__( 'Back', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'back_horizontal_align',
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
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'back_vertical_align',
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
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_responsive_control(
			'back_text_align',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => false,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'back_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'back_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'back_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back',
			]
		);

		$this->add_control(
			'back_bg_overlay',
			[
				'label' => esc_html__( 'Background Overlay Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-overlay' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'back_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'back_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back'
			]
		);
        
        $this->add_responsive_control(
			'back_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'back_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->start_controls_tabs( 'tabs_back_style' );
        
        $this->start_controls_tab(
			'tab_back_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons'),
			]
		);
		
		$this->add_responsive_control(
			'back_icon_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'back_icon_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon' => 'height: {{VALUE}}px;',
				],
			]
        );

        $this->add_control(
			'back_icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'back_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'back_icon_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon'
			]
		);

        $this->add_control(
			'back_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon svg' => 'fill: {{VALUE}};',
				]
			]
		);
        
        $this->add_responsive_control(
			'back_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
                    'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'back_icon_svg_width',
			[
				'label' => esc_html__( 'SVG Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
				'default' => 100,
                'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon svg' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'back_icon_svg_height',
			[
				'label' => esc_html__( 'SVG Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
				'default' => 100,
                'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-icon svg' => 'height: {{VALUE}}px;'
				],
			]
        );
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_back_title',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons'),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_title_typography',
				
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-title'
			]
		);

		$this->add_control(
			'back_title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'back_title_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-title' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'back_title_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'back_title_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_tab();
		
		$this->start_controls_tab(
			'tab_back_content',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons'),
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'back_content_typography',
				
				'selector' => '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-content'
			]
		);

		$this->add_control(
			'back_content_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-content' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'back_content_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-content' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'back_content_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'back_content_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-flip-card-wrapper .kea-flip-card-inner .back .kea-flip-card-back-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
		
		$this->end_controls_section();

        // section start
		$this->start_controls_section(
			'btn_style_section',
			[
				'label' => esc_html__( 'Button', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'btn_text_shadow',
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a',
			]
		);
        
        $this->add_control(
			'btn_skin',
			[
				'label' => esc_html__( 'Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_btn_skins(),
			]
		);
        
        $this->add_control(
			'btn_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);  
        
        $this->start_controls_tabs( 'tabs_button_style' );
        
        $this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper a' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper a' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color_gradient',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a',
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a'
			]
		);
        
        $this->add_responsive_control(
			'btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper a,{{WRAPPER}} .cj-btn-wrapper a:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'btn_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper a:hover' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'btn_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper a:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color_hover_gradient',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a:hover',
			]
		);
        
        $this->add_control(
			'btn_animation_color',
			[
				'label' => esc_html__( 'Animation Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper a:before' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a:hover'
			]
		);
        
        $this->add_responsive_control(
			'btn_border_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-btn-wrapper a:hover,{{WRAPPER}} .cj-btn-wrapper a:hover:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_border_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-btn-wrapper a:hover'
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'btn_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-btn-wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_width',
			[
				'label' => esc_html__( 'Button Width', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .cj-btn-wrapper a' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
      
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
		$target = $settings['btn_website_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_website_link']['nofollow'] ? ' rel="nofollow"' : '';
		$icon_position = $settings['btn_icon_position'];
        ?>
		<div class="kea-flip-card-outer" style="display:flex;">
			<div class="kea-flip-card-wrapper <?php echo $settings['direction']; ?>">
				<div class="kea-flip-card-inner" style="transition-timing-function: <?php if ($settings['custom_timing']) { echo $settings['custom_timing']; } else { echo $settings['timing']; } ?>;">
					<div class="front">
						<div class="kea-flip-card-overlay"></div>
						<div class="kea-flip-card-front-icon">
							<?php \Elementor\Icons_Manager::render_icon( $settings['front_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</div>
						<?php 
						if ($settings['front_title']) {
							echo '<' . $settings['front_title_html_tag'] . ' class="kea-flip-card-front-title">' . esc_html($settings['front_title']) . '</' . $settings['front_title_html_tag'] . '>';
						}
						if ($settings['front_content']) {
							echo '<div class="kea-flip-card-front-content">' . wp_kses_post($settings['front_content']) . '</div>';
						}
						?>
					</div>
					<div class="back">
						<div class="kea-flip-card-overlay"></div>
						<div class="kea-flip-card-back-icon">
							<?php \Elementor\Icons_Manager::render_icon( $settings['back_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						</div>
						<?php 
						if ($settings['back_title']) {
							echo '<' . $settings['back_title_html_tag'] . ' class="kea-flip-card-back-title">' . esc_html($settings['back_title']) . '</' . $settings['back_title_html_tag'] . '>';
						}
						if ($settings['back_content']) {
							echo '<div class="kea-flip-card-back-content">' . wp_kses_post($settings['back_content']) . '</div>';
						}
						if ($settings['btn_website_link']['url']) { ?>
						<div class="cj-btn-wrapper">
							<a id="<?php echo esc_attr($settings['btn_id']); ?>" class="<?php echo esc_attr($settings['btn_size']); ?> <?php echo esc_attr($settings['btn_skin']); ?>" href="<?php echo esc_url($settings['btn_website_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
								<?php 
								if ($icon_position == 'before') {
									\Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] ); 
									echo esc_html($settings['btn_text']);
								} else {
									echo esc_html($settings['btn_text']); 
									\Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] );
									} 
								?>
							</a>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>


		<?php 
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Flip_Box() );