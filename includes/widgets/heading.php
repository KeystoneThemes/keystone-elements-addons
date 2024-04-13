<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Heading extends Widget_Base {

	public function get_name() {
		return 'cj-heading';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Heading', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-heading' ];
	}

	public function get_icon() {
		return 'eicon-t-letter';
	}

	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'heading_content',
  			[
  				'label' => esc_html__( 'Heading', 'keystone-elements-addons' )
  			]
		);

		$this->add_control(
			'heading_text',
			[
				'label' => esc_html__('Heading Text', 'keystone-elements-addons'),
				'type' => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Enter your title', 'keystone-elements-addons' ),
				'default' => esc_html__( 'Add Your Heading Text Here', 'keystone-elements-addons' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);  
 
		$this->add_control(
			'html_tag',
			[
				'label' => esc_html__( 'HTML Tag', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1' => 'H1',
					'h2' => 'H2',
					'h3' => 'H3',
					'h4' => 'H4',
					'h5' => 'H5',
					'h6' => 'H6',
					'div' => 'div',
					'span' => 'span',
					'p' => 'p',
				],
				'default' => 'h2',
			]
		);

		$this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'keystone-elements-addons' ),
				'type' => Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => '',
				],
				'separator' => 'before',
			]
		);

		$this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'Heading', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-heading, {{WRAPPER}} .cj-heading a' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'typography',
				
				'selector' => '{{WRAPPER}} .cj-heading',
			]
		);

		$this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'selector' => '{{WRAPPER}} .cj-heading',
			]
		);

		$this->add_control(
			'blend_mode',
			[
				'label' => esc_html__( 'Blend Mode', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'' => esc_html__( 'Normal', 'keystone-elements-addons' ),
					'multiply' => 'Multiply',
					'screen' => 'Screen',
					'overlay' => 'Overlay',
					'darken' => 'Darken',
					'lighten' => 'Lighten',
					'color-dodge' => 'Color Dodge',
					'saturation' => 'Saturation',
					'color' => 'Color',
					'difference' => 'Difference',
					'exclusion' => 'Exclusion',
					'hue' => 'Hue',
					'luminosity' => 'Luminosity',
				],
				'selectors' => [
					'{{WRAPPER}} .cj-heading' => 'mix-blend-mode: {{VALUE}}',
				],
				'condition' => ['gradient_heading' => '', 'rotate_switch' => ''],
				'separator' => 'none',
			]
		);
        
        $this->add_control(
			'flex_direction',
			[
				'label' => esc_html__( 'Before/After Layout', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'column' => esc_html__( 'Vertical', 'keystone-elements-addons' ),
                    'row' => esc_html__( 'Horizontal', 'keystone-elements-addons' )
				],
                'default' => 'column',
				'selectors' => [
					'{{WRAPPER}} .cj-heading' => 'flex-direction: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
        
        $this->add_responsive_control(
			'justify',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'flex-start' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'flex-end' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
                'condition' => ['flex_direction' => 'row'],
				'selectors' => [
					'{{WRAPPER}} .cj-heading' => 'justify-content: {{VALUE}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'align',
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
				'default' => '',
                'condition' => ['flex_direction' => 'column'],
				'selectors' => [
					'{{WRAPPER}} .cj-heading' => 'text-align: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'hr_heading_1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'max_width',
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
					'{{WRAPPER}} .cj-heading' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-heading' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-heading' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'hr_heading_2',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'gradient_heading',
			[
				'label' => esc_html__( 'Gradient Heading', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Off', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'gradient_heading_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-heading',
				'condition' => ['gradient_heading' => 'yes'],
			]
		);

		$this->add_control(
			'hr_heading_3',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'rotate_switch',
			[
				'label' => esc_html__( 'Rotate Text', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'On', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Off', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_responsive_control(
			'text_rotate',
			[
				'label' => esc_html__( 'Rotate', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'condition' => ['rotate_switch' => 'yes'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 360,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 180,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-heading' => 'writing-mode: vertical-rl;transform: rotate({{SIZE}}deg);'
				],
			]
        );
        
        $this->end_controls_section();

		// section start
		$this->start_controls_section(
			'section_line1_style',
			[
				'label' => esc_html__( 'Before', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'line1_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
                    '%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-heading:before' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line1_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-heading:before' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'line1_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-heading:before' => 'background: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'line1_align',
			[
				'label' => esc_html__( 'Alignment', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'flex-start' => esc_html__( 'Start', 'keystone-elements-addons' ),
					'center' => esc_html__( 'Center', 'keystone-elements-addons' ),
                    'flex-end' => esc_html__( 'End', 'keystone-elements-addons' ),
				],
                'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .cj-heading:before' => 'align-self: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
        
        $this->add_responsive_control(
			'line1_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-heading:before' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line1_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-heading:before' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'line1_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-heading:before',
			]
		);

		$this->end_controls_section();	
        
        // section start
		$this->start_controls_section(
			'section_line2_style',
			[
				'label' => esc_html__( 'After', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'line2_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','%' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
                    '%' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-heading:after' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line2_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					]
				],
				'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-heading:after' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'line2_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-heading:after' => 'background: {{VALUE}};',
				],
			]
		);
        
        $this->add_control(
			'line2_align',
			[
				'label' => esc_html__( 'Alignment', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'flex-start' => esc_html__( 'Start', 'keystone-elements-addons' ),
					'center' => esc_html__( 'Center', 'keystone-elements-addons' ),
                    'flex-end' => esc_html__( 'End', 'keystone-elements-addons' ),
				],
                'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .cj-heading:after' => 'align-self: {{VALUE}}',
				],
				'separator' => 'none',
			]
		);
        
        $this->add_responsive_control(
			'line2_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-heading:after' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'line2_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-heading:after' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'line2_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-heading:after',
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();

		if ( '' === $settings['heading_text'] ) {
			return;
		}

		$heading_output = $settings['heading_text'];
		$this->add_render_attribute( 'heading_text', 'class', "cj-heading" );

		if ($settings['gradient_heading'] === 'yes') {
			$this->add_render_attribute( 'heading_text', 'class', "cj-gradient-heading" );
		}

		// link
		if ( ! empty( $settings['link']['url'] ) ) {

			$this->add_render_attribute( 'url', 'href', $settings['link']['url'] );

			if ( $settings['link']['is_external'] ) {
				$this->add_render_attribute( 'url', 'target', '_blank' );
			}

			if ( ! empty( $settings['link']['nofollow'] ) ) {
				$this->add_render_attribute( 'url', 'rel', 'nofollow' );
			}

			$heading_output = sprintf( '<a %1$s>%2$s</a>', $this->get_render_attribute_string( 'url' ), $heading_output );
		}

		// heading tag
		printf( '<%1$s %2$s><span>%3$s</span></%1$s>', $settings['html_tag'], $this->get_render_attribute_string( 'heading_text' ), $heading_output );
	} 

}


Plugin::instance()->widgets_manager->register( new Widget_KEA_Heading() );