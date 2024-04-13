<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Tooltip extends Widget_Base {

	public function get_name() {
		return 'cj-tooltip';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Tooltip', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-tooltip','cj-lib-animate' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-tooltip' ];
	}

	public function get_icon() {
		return 'eicon-info-circle-o';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'content_section',
  			[
  				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 

        $this->add_control(
			'content_type',
			[
				'label' => esc_html__( 'Content Type', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'icon',
				'options' => [
					'icon'  => esc_html__( 'Icon', 'keystone-elements-addons' ),
                    'text'  => esc_html__( 'Text', 'keystone-elements-addons' ),
					'image'  => esc_html__( 'Image', 'keystone-elements-addons' ),
                    'shortcode'  => esc_html__( 'Shortcode', 'keystone-elements-addons' )
				],
			]
		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
                'condition' => ['content_type' => 'icon'],
			]
		);
        
        $this->add_control(
			'text', [
				'label' => esc_html__( 'Text', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'condition' => ['content_type' => 'text'],
				'default' => '',
				'show_label' => false,
			]
		);
        
        $this->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => ['content_type' => 'image'],
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $this->add_control(
			'shortcode',
			[
				'label' => esc_html__('Shortcode', 'keystone-elements-addons'),
                'condition' => ['content_type' => 'shortcode'],
				'type' => Controls_Manager::TEXTAREA
			]
		); 
        
        $this->add_control(
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
        
        $this->end_controls_section();
        
        // section start
  		$this->start_controls_section(
  			'content_tooltip',
  			[
  				'label' => esc_html__( 'Tooltip', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
 
        $this->add_control(
			'tooltip_content', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'show_label' => false,
			]
		);
        
        $this->end_controls_section();
        
        // section start
  		$this->start_controls_section(
  			'content_tooltip_settings',
  			[
  				'label' => esc_html__( 'Tooltip Settings', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		); 
        
        $this->add_control(
			'anim',
			[
				'label' => esc_html__( 'Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'frontend_available' => true,
                'label_block' => true
			]
		);
        
        $this->add_control(
			'follow_mouse',
			[
				'label' => esc_html__( 'Follow Mouse', 'keystone-elements-addons' ),
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
                'description' => esc_html__( 'If set to enabled the tooltip will follow the users mouse cursor.', 'keystone-elements-addons' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'mouse_on_to_popup',
			[
				'label' => esc_html__( 'Mouse on to Popup', 'keystone-elements-addons' ),
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
                'description' => esc_html__( 'Allow the mouse to hover on the tooltip. This lets users interact with the content in the tooltip. Only applies if Follow Mouse is disabled.', 'keystone-elements-addons' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'placement',
			[
				'label' => esc_html__( 'Placement', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Placement location of the tooltip relative to the element it is open for.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'n',
				'options' => [
					'n'  => esc_html__( 'Top', 'keystone-elements-addons' ),
					'e'  => esc_html__( 'Right', 'keystone-elements-addons' ),
                    'w'  => esc_html__( 'Left', 'keystone-elements-addons' ),
                    's'  => esc_html__( 'Bottom', 'keystone-elements-addons' ),
                    'nw'  => esc_html__( 'Top-Left', 'keystone-elements-addons' ),
					'ne'  => esc_html__( 'Top-Right', 'keystone-elements-addons' ),
                    'sw'  => esc_html__( 'Bottom-Left', 'keystone-elements-addons' ),
                    'se'  => esc_html__( 'Bottom-Right', 'keystone-elements-addons' ),
                    'nw-alt'  => esc_html__( 'Top-Left-Alt', 'keystone-elements-addons' ),
					'ne-alt'  => esc_html__( 'Top-Right-Alt', 'keystone-elements-addons' ),
                    'sw-alt'  => esc_html__( 'Bottom-Left-Alt', 'keystone-elements-addons' ),
                    'se-alt'  => esc_html__( 'Bottom-Right-Alt', 'keystone-elements-addons' ),
				],
			]
		);
        
        $this->add_control(
			'smart_placement',
			[
				'label' => esc_html__( 'Smart Placement', 'keystone-elements-addons' ),
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
                'description' => esc_html__( 'When enabled the plugin will try to keep tips inside the browser viewport. Only applies if follow mouse is disabled.', 'keystone-elements-addons' ),
				'toggle' => false,
			]
		);
        
        $this->add_control(
			'offset',
			[
				'label' => esc_html__( 'Offset', 'keystone-elements-addons' ),
                'description' => esc_html__( 'This will be the offset from the element the tooltip is open for, or from the mouse cursor if follow mouse is enabled.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 10
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'style_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['content_type' => 'icon']
			]
		);

		$this->add_responsive_control(
			'icon_h_align',
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
					'{{WRAPPER}} .cj-tooltip-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_control(
			'icon_duration',
			[
				'label' => esc_html__( 'Animation Duration', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10,
				'step' => 0.1,
				'default' => 0.2,
                'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper i' => 'transition-duration: {{VALUE}}s;',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'transition-duration: {{VALUE}}s;'
				],
			]
		);

		$this->start_controls_tabs( 'tabs_icon' );
        
        $this->start_controls_tab(
			'icon_normal',
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
                    '{{WRAPPER}} .cj-tooltip-wrapper i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'fill: {{SIZE}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
                    '{{WRAPPER}} .cj-tooltip-wrapper i' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'background-color: {{SIZE}}{{UNIT}};'
				]
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'icon_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);

		$this->add_control(
			'icon_color_hover',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper i:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg:hover' => 'fill: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'icon_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper i:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

        $this->end_controls_tab();
		$this->end_controls_tabs();
		
		$this->add_control(
			'icon_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => esc_html__( 'Font Size', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
                    '{{WRAPPER}} .cj-tooltip-wrapper i' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
                    '{{WRAPPER}} .cj-tooltip-wrapper i' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'icon_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-tooltip-wrapper i,{{WRAPPER}} .cj-tooltip-wrapper svg'
			]
		);

		$this->add_responsive_control(
			'icon_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper i' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
					'{{WRAPPER}} .cj-tooltip-wrapper i' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cj-tooltip-wrapper svg' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_thumbnail',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['content_type' => 'image']
			]
		);

		$this->add_responsive_control(
			'max_img_size',
			[
				'label' => esc_html__( 'Max. Image Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 2000,
				'step' => 10,
                'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper img' => 'max-width: {{VALUE}}px;'
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
					'{{WRAPPER}} .cj-tooltip-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
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
					'{{WRAPPER}} .cj-tooltip-wrapper img' => 'transition-duration: {{VALUE}}s;'
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
					'{{WRAPPER}} .cj-tooltip-wrapper img' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_css_filter',
				'label' => esc_html__( 'CSS Filters', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-tooltip-wrapper img'
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
					'{{WRAPPER}} .cj-tooltip-wrapper:hover img' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_hover_css_filter',
				'label' => esc_html__( 'CSS Filters', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-tooltip-wrapper:hover img'
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
				'selector' => '{{WRAPPER}} .cj-tooltip-wrapper img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-tooltip-wrapper img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ), 
				'selector' => '{{WRAPPER}} .cj-tooltip-wrapper img',
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'style_tooltip',
			[
				'label' => esc_html__( 'Tooltip', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'tooltip_heading_color',
			[
				'label' => esc_html__( 'Heading Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
					'#cj-tooltip-popup.cj-tooltip-{{ID}} h1' => 'color: {{VALUE}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h2' => 'color: {{VALUE}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h3' => 'color: {{VALUE}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h4' => 'color: {{VALUE}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h5' => 'color: {{VALUE}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h6' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Heading Typography', 'keystone-elements-addons' ),
				'name' => 'tooltip_heading_typography',
				
				'selector' => '#cj-tooltip-popup.cj-tooltip-{{ID}} h1,#cj-tooltip-popup.cj-tooltip-{{ID}} h2,#cj-tooltip-popup.cj-tooltip-{{ID}} h3,#cj-tooltip-popup.cj-tooltip-{{ID}} h4,#cj-tooltip-popup.cj-tooltip-{{ID}} h5,#cj-tooltip-popup.cj-tooltip-{{ID}} h6',
			]
		);
        
        $this->add_control(
			'tooltip_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
                    '#cj-tooltip-popup.cj-tooltip-{{ID}}' => 'color: {{VALUE}};',
					'#cj-tooltip-popup.cj-tooltip-{{ID}}' . ' p' => 'color: {{VALUE}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}}' . ' a' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Text Typography', 'keystone-elements-addons' ),
				'name' => 'tooltip_text_typography',
				
				'selector' => '#cj-tooltip-popup.cj-tooltip-{{ID}}, #cj-tooltip-popup.cj-tooltip-{{ID}} p'
			]
		);
        
        $this->add_control(
			'tooltip_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => 'rgba(0, 0, 0, 0.8)',
				'selectors' => [
                    '#cj-tooltip-popup.cj-tooltip-{{ID}}' => 'background-color: {{VALUE}};border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'tooltip_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_control(
			'tooltip_max_width',
			[
				'label' => esc_html__( 'Maximum Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 10,
				'default' => 300,
                'selectors' => [
					'#cj-tooltip-popup.cj-tooltip-{{ID}}' => 'max-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '#cj-tooltip-popup.cj-tooltip-{{ID}}' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'#cj-tooltip-popup.cj-tooltip-{{ID}}' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'tooltip_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '#cj-tooltip-popup.cj-tooltip-{{ID}}'
			]
		);
        
        $this->add_control(
			'tooltip_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'tooltip_h_margin',
			[
				'label' => esc_html__( 'Heading Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h5' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} h6' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'tooltip_p_margin',
			[
				'label' => esc_html__( 'Paragraph Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '#cj-tooltip-popup.cj-tooltip-{{ID}} p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
        $url = $settings['website_link']['url'];
        $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
        <div class="cj-tooltip-wrapper" data-tpid="cj-tooltip-<?php echo esc_attr($this->get_id()); ?> animated fast <?php echo esc_attr($settings['anim']); ?>" data-followmouse="<?php echo esc_attr($settings['follow_mouse']); ?>" data-motp="<?php echo esc_attr($settings['mouse_on_to_popup']); ?>" data-placement="<?php echo esc_attr($settings['placement']); ?>" data-smart="<?php echo esc_attr($settings['smart_placement']); ?>" data-offset="<?php echo esc_attr($settings['offset']); ?>">
        <?php
        if ($url) {
            $open_tag = '<a href="' . $url . '" ' . $target . $nofollow . ' class="cj-tooltip cj-tooltip-type-' . $settings['content_type'] . '" data-powertip="' . esc_attr($settings['tooltip_content']) . '">';
            $close_tag = '</a>';
        } else {
            $open_tag = '<div class="cj-tooltip cj-tooltip-type-' . $settings['content_type'] . '" data-powertip="' . esc_attr($settings['tooltip_content']) . '">';
            $close_tag = '</div>';
        }
        echo $open_tag;
        if ($settings['content_type'] == 'icon') {
            \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] );
        } elseif ($settings['content_type'] == 'text') {
            echo wp_kses_post($settings['text']);
        } elseif ($settings['content_type'] == 'image') {
            echo '<img src="' . $settings['image']['url'] . '" />';
        } elseif ($settings['content_type'] == 'shortcode') {
            echo do_shortcode($settings['shortcode']);
        }
        echo $close_tag; ?>
        </div>
   <?php } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Tooltip() );