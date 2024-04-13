<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Shape extends Widget_Base {

	public function get_name() {
		return 'cj-shape';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Shape', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-shape' ];
	}

	public function get_icon() {
		return 'eicon-circle-o';
	}
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'section_shape',
  			[
  				'label' => esc_html__( 'Shape', 'keystone-elements-addons' )
  			]
  		);   

		$this->add_control(
			'shape_value_1',
			[
				'label' => esc_html__( 'Point 1', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_2',
			[
				'label' => esc_html__( 'Point 2', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_control(
			'shape_value_3',
			[
				'label' => esc_html__( 'Point 3', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_control(
			'shape_value_4',
			[
				'label' => esc_html__( 'Point 4', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_5',
			[
				'label' => esc_html__( 'Point 5', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_6',
			[
				'label' => esc_html__( 'Point 6', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 30,
				],
			]
		);
        
        $this->add_control(
			'shape_value_7',
			[
				'label' => esc_html__( 'Point 7', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_control(
			'shape_value_8',
			[
				'label' => esc_html__( 'Point 8', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 70,
				],
			]
		);
        
        $this->add_responsive_control(
			'rotate',
			[
				'label' => esc_html__( 'Rotate', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 360,
					],
				],
                'default' => [
					'unit' => 'deg',
					'size' => 0,
				],
                'selectors' => [
					'{{WRAPPER}} .cj-custom-shape' => 'transform:rotate({{SIZE}}{{UNIT}});'
				],
			]
		);

		$this->end_controls_section();
        
        $this->start_controls_section(
  			'section_shape_icon',
  			[
  				'label' => esc_html__( 'Icon', 'keystone-elements-addons' )
  			]
  		);
        
        $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas long-arrow-alt-down',
					'library' => 'solid',
				],
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
        
        $this->add_control(
			'shape_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_shape_style',
			[
				'label' => esc_html__( 'Shape', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'shape_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-custom-shape' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'shape_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 2000,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-custom-shape' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-custom-shape',
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-custom-shape'
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-custom-shape'
			]
		);
        
        $this->add_responsive_control(
			'shave_align',
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
					'{{WRAPPER}} .cj-custom-shape-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
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
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj-custom-shape i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-custom-shape-link i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-custom-shape svg' => 'fill: {{VALUE}};',
                    '{{WRAPPER}} .cj-custom-shape-link svg' => 'fill: {{VALUE}};',
				]
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
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
					'{{WRAPPER}} .cj-custom-shape i' => 'font-size: {{SIZE}}{{UNIT}};'
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
					'{{WRAPPER}} .cj-custom-shape svg' => 'width: {{VALUE}}px;'
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
					'{{WRAPPER}} .cj-custom-shape svg' => 'height: {{VALUE}}px;'
				],
			]
		);

		$this->add_responsive_control(
			'icon_rotate',
			[
				'label' => esc_html__( 'Rotate', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'deg' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 360,
					],
				],
                'default' => [
					'unit' => 'deg',
					'size' => 0,
				],
                'selectors' => [
					'{{WRAPPER}} .cj-custom-shape i' => 'transform:rotate({{SIZE}}{{UNIT}});',
					'{{WRAPPER}} .cj-custom-shape svg' => 'transform:rotate({{SIZE}}{{UNIT}});'
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
        $target = $settings['website_link']['is_external'] ? ' target="_blank"' : '';
        $nofollow = $settings['website_link']['nofollow'] ? ' rel="nofollow"' : '';
        ?>
		<div class="cj-custom-shape-wrapper elementor-animation-<?php echo esc_attr($settings['shape_animation']); ?>">
        <div class="cj-custom-shape" style="border-radius:<?php echo esc_attr($settings['shape_value_1']['size']); ?>% <?php echo esc_attr($settings['shape_value_2']['size']); ?>% <?php echo esc_attr($settings['shape_value_3']['size']); ?>% <?php echo esc_attr($settings['shape_value_4']['size']); ?>% / <?php echo esc_attr($settings['shape_value_5']['size']); ?>% <?php echo esc_attr($settings['shape_value_6']['size']); ?>% <?php echo esc_attr($settings['shape_value_7']['size']); ?>% <?php echo esc_attr($settings['shape_value_8']['size']); ?>% "><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		<?php if ($settings['website_link']['url']) { echo '<a class="cj-custom-shape-link" href="' . $settings['website_link']['url'] . '"' . $target . $nofollow . '></a>'; } ?>
		</div>
        </div>
        <?php

	} 

	/**
	 * Content Template 
	 */
	protected function content_template() {	
        ?>
        <# var iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
        <div class="cj-custom-shape-wrapper elementor-animation-{{ settings.shape_animation }}">   
        <div class="cj-custom-shape" style="border-radius:{{ settings.shape_value_1.size }}% {{ settings.shape_value_2.size }}% {{ settings.shape_value_3.size }}% {{ settings.shape_value_4.size }}% / {{ settings.shape_value_5.size }}% {{ settings.shape_value_6.size }}% {{ settings.shape_value_7.size }}% {{ settings.shape_value_8.size }}% ">{{{ iconHTML.value }}}<a href="#" class="cj-custom-shape-link"></a></div>
		</div>    
	<?php }
}


Plugin::instance()->widgets_manager->register( new Widget_KEA_Shape() );