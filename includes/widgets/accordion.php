<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Accordion extends Widget_Base {

	public function get_name() {
		return 'cj-accordion';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Accordion', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-accordion' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-lib-tabs', 'cj-accordion' ];
	}
    
    public function get_icon() {
		return 'eicon-accordion';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'icon_txt_switcher',
			[
				'label' => esc_html__( 'Prefix', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'icon' => [
						'title' => esc_html__( 'Icon', 'keystone-elements-addons' ),
						'icon' => 'eicon-star',
					],
					'text' => [
						'title' => esc_html__( 'Text', 'keystone-elements-addons' ),
						'icon' => 'eicon-heading',
					],
				],
				'default' => 'icon',
				'toggle' => true,
			]
		);


        $repeater->add_control(
			'title_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'condition' => ['icon_txt_switcher' => 'icon'],
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);

		$repeater->add_control(
			'title_icon_txt',
			[
				'label' => esc_html__( 'Text', 'keystone-elements-addons' ),
				'condition' => ['icon_txt_switcher' => 'text'],
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '1'
			]
		);
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'text', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'show_label' => false,
			]
		);
        
        $repeater->add_control(
			'status',
			[
				'label' => esc_html__( 'Opened by default', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'is-open' => [
						'title' => esc_html__( 'On', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'is-default' => [
						'title' => esc_html__( 'Off', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'is-default',
				'toggle' => false,
			]
		);
        
        $repeater->add_control(
			'self_block',
			[
				'label' => esc_html__( 'Block close event on click', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Accordion Items', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
                        'title_icon' => '',
						'title' => esc_html__( 'Title #1', 'keystone-elements-addons' ),
						'text' => esc_html__( 'Item content...', 'keystone-elements-addons' ),
                        'status' => 'is-default',
                        'self_block' => 'false',
					],
					[
                        'title_icon' => '',
						'title' => esc_html__( 'Title #2', 'keystone-elements-addons' ),
						'text' => esc_html__( 'Item content...', 'keystone-elements-addons' ),
                        'status' => 'is-default',
                        'self_block' => 'false',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
			'content_settings',
			[
				'label' => esc_html__( 'Settings', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		); 
        
        $this->add_control(
			'html_tag',
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
					'div' => 'div',
					'p' => 'p',
				],
				'default' => 'h5',
			]
		);
        
        $this->add_control(
			'hash', [
				'label' => esc_html__( 'Url Sharing', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Off', 'keystone-elements-addons' ),
				'return_value' => 'on',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'open_single',
			[
				'label' => esc_html__( 'Open Single', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
                'description' => esc_html__( 'Open just one accordion at once.', 'keystone-elements-addons' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'self_close',
			[
				'label' => esc_html__( 'Self Close', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
                'description' => esc_html__( 'Close accordion on click outside.', 'keystone-elements-addons' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'scroll',
			[
				'label' => esc_html__( 'Auto Scroll', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'true' => [
						'title' => esc_html__( 'On', 'keystone-elements-addons' ),
						'icon' => 'fas fa-check',
					],
					'false' => [
						'title' => esc_html__( 'Off', 'keystone-elements-addons' ),
						'icon' => 'fas fa-times',
					],
				],
				'default' => 'false',
                'description' => esc_html__( 'Scroll to accordion on open.', 'keystone-elements-addons' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'scroll_offset',
			[
				'label' => esc_html__( 'Scroll Offset', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 10,
				'default' => 0
			]
		);
        
        $this->add_control(
			'scroll_speed',
			[
				'label' => esc_html__( 'Scroll Speed', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 10,
				'default' => 400
			]
		);
        
        $this->add_control(
			'open_speed',
			[
				'label' => esc_html__( 'Open Speed', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 10,
				'default' => 200
			]
		);
        
        $this->add_control(
			'close_speed',
			[
				'label' => esc_html__( 'Close Speed', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 2000,
				'step' => 10,
				'default' => 200
			]
		);
        
        $this->end_controls_section();  

		$this->start_controls_section(
			'section_accordion_style',
			[
				'label' => esc_html__( 'Accordion', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->start_controls_tabs( 'tabs_accordion_style' );
        
        $this->start_controls_tab(
			'tab_accordion_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .keaccordion'
			]
		);
        
        $this->add_control(
			'accordion_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion'
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'accordion_background',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion',
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_accordion_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion:hover,{{WRAPPER}} .cj-accordions .keaccordion.is-open'
			]
		);
        
        $this->add_control(
			'accordion_hover_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-accordions .keaccordion.is-open' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'accordion_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion:hover,{{WRAPPER}} .cj-accordions .keaccordion.is-open'
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'accordion_hover_background',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion:hover,{{WRAPPER}} .cj-accordions .keaccordion.is-open',
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();  
        
        $this->add_control(
			'hr_accordion_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'accordion_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-accordions .keaccordion' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
       
		$this->end_controls_section();
        
        $this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion__head,{{WRAPPER}} .keaccordion__head button',
			]
		);
        
        $this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Arrow Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
				'default' => 4,
                'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head button::after' => 'padding: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'arrow_thickness',
			[
				'label' => esc_html__( 'Arrow Thickness', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
				'default' => 4,
                'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head button::after' => 'border-width: 0 {{VALUE}}px {{VALUE}}px 0;'
				],
			]
		);
        
        $this->add_control(
			'hr_accordion_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->start_controls_tabs( 'tabs_title_style' );
        
        $this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head,{{WRAPPER}} .cj-accordions .keaccordion__head button' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head,{{WRAPPER}} .cj-accordions .keaccordion__head button' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'arrow_color',
			[
				'label' => esc_html__( 'Arrow Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head button:after' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_title_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion__head'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'title_hover_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head:hover,{{WRAPPER}} .cj-accordions .keaccordion__head button:hover,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head button' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'title_hover_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head:hover,{{WRAPPER}} .cj-accordions .keaccordion__head button:hover,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head button' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'arrow_hover_color',
			[
				'label' => esc_html__( 'Arrow Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
                    '{{WRAPPER}} .cj-accordions .keaccordion__head  button:hover:after,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head  button:after' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'accordion_title_hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head'
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();    
        
        $this->add_control(
			'hr_accordion_3',
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
                    '{{WRAPPER}} .cj-accordions .keaccordion__head > button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-accordions .keaccordion__head::after' => 'right: {{RIGHT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Prefix', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion__head button i,{{WRAPPER}} .cj-accordions .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button .keaccordion-prefix' => 'font-size: {{VALUE}}px;'
				],
			]
		);

		$this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Container Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion__head button i,{{WRAPPER}} .cj-accordions .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button .keaccordion-prefix' => 'width: {{VALUE}}px;min-width: {{VALUE}}px;'
				],
			]
		);

		$this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'Container Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 2,
				'max' => 100,
				'step' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion__head button i,{{WRAPPER}} .cj-accordions .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button .keaccordion-prefix' => 'height: {{VALUE}}px;line-height: {{VALUE}}px;'
				],
			]
		);

		$this->add_control(
			'hr_icon_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->start_controls_tabs( 'tabs_icon_style' );
        
        $this->start_controls_tab(
			'tab_icon_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion__head button i,{{WRAPPER}} .cj-accordions .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button .keaccordion-prefix' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion__head button i,{{WRAPPER}} .cj-accordions .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button .keaccordion-prefix'
			]
		);  
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_icon_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head:hover i,{{WRAPPER}} .cj-accordions .keaccordion__head button:hover i,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head button i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj-accordions .keaccordion__head:hover .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button:hover .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head button .keaccordion-prefix' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_bg_hover',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion__head:hover i,{{WRAPPER}} .cj-accordions .keaccordion__head button:hover i,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head button i',
				'{{WRAPPER}} .cj-accordions .keaccordion__head:hover .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button:hover .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion.is-open .keaccordion__head button .keaccordion-prefix' => 'color: {{VALUE}};'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'hr_icon_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion__head button i,{{WRAPPER}} .cj-accordions .keaccordion__head .keaccordion-prefix,{{WRAPPER}} .cj-accordions .keaccordion__head button .keaccordion-prefix' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-accordions .keaccordion__head i,{{WRAPPER}} .cj-accordions .keaccordion__head .keaccordion-prefix' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion__body,{{WRAPPER}} .keaccordion__body p',
			]
		);
        
        $this->add_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__body,{{WRAPPER}} .keaccordion__body p' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-accordions .keaccordion__body,{{WRAPPER}} .keaccordion__body p' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-accordions .keaccordion__body'
			]
		);
        
        $this->add_control(
			'hr_accordion_4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-accordions .keaccordion__body' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
		$rand = '-' . wp_rand();
        if ( $settings['list'] ) { ?>
            <div class="cj-accordions" data-selfclose="<?php echo $settings['self_close']; ?>" data-opensingle="<?php echo $settings['open_single']; ?>" data-openspeed="<?php echo $settings['open_speed']; ?>" data-closespeed="<?php echo $settings['close_speed']; ?>" data-autoscroll="<?php echo $settings['scroll']; ?>" data-scrollspeed="<?php echo $settings['scroll_speed']; ?>" data-scrolloffset="<?php echo $settings['scroll_offset']; ?>">
            <?php foreach ( $settings['list'] as $item ) { ?>   
                <div id="cj-<?php echo $item['_id'] . $rand; ?>" <?php if ($settings['hash']) { ?>data-hash="#cj-<?php echo $item['_id'] . $rand; ?>"<?php } ?> class="keaccordion <?php echo $item['status']; ?>" data-keaccordion-options='{"selfBlock": <?php echo $item['self_block']; ?>}'>
                    <?php echo '<' . $settings['html_tag'] . ' class="keaccordion__head">'; ?>
						<?php \Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] ); ?>
						<?php if ($item['title_icon_txt']) { echo '<span class="keaccordion-prefix">' . $item['title_icon_txt'] . '</span>'; } ?>
						<?php echo $item['title']; ?>
                    <?php echo '</' . $settings['html_tag'] . '>'; ?>
                    <div class="keaccordion__body">
                        <?php echo $item['text']; ?>
                    </div>
                </div>
            <?php } ?>    
            </div>
            <?php
		}
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Accordion() );