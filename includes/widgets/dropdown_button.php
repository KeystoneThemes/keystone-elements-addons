<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Dropdown_Button extends Widget_Base {

	public function get_name() {
		return 'cj-dropdown_button';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Dropdown Button', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-button','cj-dropdown_button' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-dropdown_button' ];
	}
    
    public function get_icon() {
		return 'eicon-dual-button';
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
        // section start
		$this->start_controls_section(
			'button_content',
			[
				'label' => esc_html__( 'Button', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'text', [
				'label' => esc_html__( 'Button Text', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Click Here', 'keystone-elements-addons' )
			]
		);
        
        $this->add_control(
			'size',
			[
				'label' => esc_html__( 'Button Size', 'keystone-elements-addons' ),
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
			'h_align',
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
					'{{WRAPPER}} .cj-dropdown-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Button Text Align', 'keystone-elements-addons' ),
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
        
        $this->add_responsive_control(
			'dropdown_align',
			[
				'label' => esc_html__( 'Dropdown Text Align', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .cj-dd-menu li a' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,
			]
		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Button Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-caret-down',
					'library' => 'solid',
				],
			]
		);
        
        $this->add_control(
			'icon_position',
			[
				'label' => esc_html__( 'Button Icon Position', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'after',
				'options' => [
					'after'  => esc_html__( 'After', 'keystone-elements-addons' ),
					'before'  => esc_html__( 'Before', 'keystone-elements-addons' )
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

		// section start
		$this->start_controls_section(
			'dropdown_content',
			[
				'label' => esc_html__( 'Dropdown Items', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'title_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS
			]
		);
        
        $repeater->add_control(
			'title_icon_position',
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
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'website_link',
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
				]
			]
		);
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Menu Items', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
                        'title_icon' => '',
                        'title_icon_position' => 'before',
						'title' => esc_html__( 'Menu Item #1', 'keystone-elements-addons' ),
						'website_link' => ''
					],
					[
                        'title_icon' => '',
                        'title_icon_position' => 'before',
						'title' => esc_html__( 'Menu Item #2', 'keystone-elements-addons' ),
						'website_link' => ''
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);
        
		$this->end_controls_section();
		
		// section start
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => esc_html__( 'Button', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				
				'selector' => '{{WRAPPER}} .cj-dd-button',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .cj-dd-button',
			]
		);
        
        $this->add_control(
			'skin',
			[
				'label' => esc_html__( 'Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_btn_skins(),
			]
		);
        
        $this->add_control(
			'dropdown_hr_3',
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
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-dd-button' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-dd-button' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color_gradient',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-dd-button',
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-dd-button'
			]
		);
        
        $this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-dd-button' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-dd-button'
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
			'text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-dropdown:hover .cj-dd-button' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-dropdown:hover .cj-dd-button' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'bg_color_hover_gradient',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-dropdown:hover .cj-dd-button',
			]
		);
        
        $this->add_control(
			'animation_color',
			[
				'label' => esc_html__( 'Animation Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-dd-button:before' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-dropdown:hover .cj-dd-button'
			]
		);
        
        $this->add_responsive_control(
			'border_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-dropdown:hover .cj-dd-button' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-dropdown:hover .cj-dd-button'
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'dropdown_hr_4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-dd-button i' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'icon_spacing',
			[
				'label' => esc_html__( 'Icon Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-dd-button i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_margin',
			[
				'label' => esc_html__( 'Icon Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-dd-button i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-dd-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .cj-dd-button' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-dropdown' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_dropdown_style',
			[
				'label' => esc_html__( 'Dropdown', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'dropdown_typography',
				
				'selector' => '{{WRAPPER}} .cj-dd-menu li a',
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'dropdown_text_shadow',
				'selector' => '{{WRAPPER}} .cj-dd-menu li a',
			]
		);
        
        $this->add_responsive_control(
			'dropdown_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-dd-menu' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'dropdown_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-dd-menu'
			]
		);
        
        $this->add_control(
			'dropdown_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->start_controls_tabs( 'tabs_dropdown_style' );
        
        $this->start_controls_tab(
			'tab_dropdown_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
         $this->add_control(
			'dropdown_text_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-dd-menu li a' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'dropdown_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .cj-dd-menu li a' => 'background-color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'seperator_color',
			[
				'label' => esc_html__( 'Seperator Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-dd-menu li' => 'border-bottom-color: {{VALUE}};'
				]
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dropdown_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'dropdown_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-dd-menu li a:hover' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'dropdown_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#cccccc',
				'selectors' => [
					'{{WRAPPER}} .cj-dd-menu li a:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'seperator_hover_color',
			[
				'label' => esc_html__( 'Seperator Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-dd-menu li:hover' => 'border-bottom-color: {{VALUE}};'
				]
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'dropdown_hr_5',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);  
        
        $this->add_control(
			'dropdown_position',
			[
				'label' => esc_html__( 'Dropdown Position', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cj-dd-menu-bottom',
				'options' => [
					'cj-dd-menu-bottom'  => esc_html__( 'Bottom', 'keystone-elements-addons' ),
					'cj-dd-menu-top'  => esc_html__( 'Top', 'keystone-elements-addons' ),
                    'cj-dd-menu-right'  => esc_html__( 'Right', 'keystone-elements-addons' ),
                    'cj-dd-menu-left'  => esc_html__( 'Left', 'keystone-elements-addons' ),
				],
			]
		);
        
        $this->add_responsive_control(
			'dropdown_width',
			[
				'label' => esc_html__( 'Dropdown Width', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .cj-dd-menu' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-dd-menu li' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-dd-menu li a' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'dropdown_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);    

		$this->add_responsive_control(
			'dropdown_icon_spacing',
			[
				'label' => esc_html__( 'Icon Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-dd-menu li a i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'dropdown_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-dd-menu li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'dropdown_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-dd-menu' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        $icon_position = $settings['icon_position'];
        ?>
        <div class="cj-btn-wrapper cj-dropdown-wrapper">
            <div class="cj-dropdown">
                <div tabindex="1" class="cj-dd-button <?php echo esc_attr($settings['size']); ?> <?php echo esc_attr($settings['skin']); ?>">
					<?php 
					if ($icon_position == 'before') {
						\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); 
						echo esc_html($settings['text']);
					} else {
						echo esc_html($settings['text']);
						\Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
					} ?>
                </div>
                <?php if ( $settings['list'] ) { ?>
                <ul class="cj-dd-menu <?php echo esc_attr($settings['dropdown_position']); ?>">
                    <?php foreach ( $settings['list'] as $item ) {
						$target = $item['website_link']['is_external'] ? ' target="_blank"' : '';
						$nofollow = $item['website_link']['nofollow'] ? ' rel="nofollow"' : '';
					?>
                    <li>
                        <a href="<?php echo esc_url($item['website_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>>
							<?php 
							if ($item['title_icon_position'] == 'before') {
								\Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] );
								echo esc_html($item['title']);
							} else {
								echo esc_html($item['title']); 
								\Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] );
							} ?>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
                <?php } ?>
            </div>
        </div>
<?php
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Dropdown_Button() );