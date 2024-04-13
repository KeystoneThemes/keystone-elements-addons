<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Logo_Grid extends Widget_Base {

	public function get_name() {
		return 'cj-logo_grid';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Logo Grid', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-logo_grid', 'cj-tooltip','cj-lib-animate' ];
	}

	public function get_script_depends() {
		return [ 'cj-tooltip' ];
	}

	public function get_icon() {
		return 'eicon-logo';
	}
    
	protected function register_controls() {

        // section start
		$this->start_controls_section(
			'settings_section',
			[
				'label' => esc_html__( 'Logos', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Logo', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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
			'list', [
				'label' => esc_html__( 'Logos', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
                    [
                        'image' => \Elementor\Utils::get_placeholder_image_src()
				    ],
				    [
                        'image' => \Elementor\Utils::get_placeholder_image_src()
					],
					[
                        'image' => \Elementor\Utils::get_placeholder_image_src()
				    ],
				    [
                        'image' => \Elementor\Utils::get_placeholder_image_src()
				    ]
			     ]
            ]
		);
		
		$this->add_control(
			'hr_img_size',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'img_size',
			[
				'label' => esc_html__( 'Image Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'large',
				'options' => KEA_get_image_sizes(),
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
			'enable_tooltip',
			[
				'label' => esc_html__( 'Tooltip', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'ON', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'OFF', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'description' => esc_html__( 'Display the caption of the image.', 'keystone-elements-addons' )
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

        $this->start_controls_section(
			'grid_section',
			[
				'label' => esc_html__( 'Grid', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_responsive_control(
			'columns',
			[
				'label' => esc_html__( 'Columns', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 1,
						'max' => 12,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-logo-grid' => 'grid-template-columns:repeat({{SIZE}}, 1fr);'
				],
			]
		);
        
        $this->add_responsive_control(
			'gap',
			[
				'label' => esc_html__( 'Grid Gap (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-logo-grid' => 'grid-gap: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
        $this->start_controls_section(
			'section_grid_item',
			[
				'label' => esc_html__( 'Grid Item', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'grid_item_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-logo-grid-item' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'hr_grid_item_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_responsive_control(
			'grid_item_min_height',
			[
				'label' => esc_html__( 'Minimum Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem', 'vh' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 1000,
					],
                    'vh' => [
						'min' => 0,
						'max' => 100,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-logo-grid-item' => 'min-height: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'grid_item_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-logo-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );

        $this->add_control(
			'hr_grid_item_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'grid_item_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item'
			]
		);
        
        $this->add_control(
			'grid_item_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-logo-grid-item' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'grid_item_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item'
			]
		);
        
        $this->end_controls_section();

        
        // section start
        $this->start_controls_section(
			'section_thumbnail',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'thumbnail_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION
			]
        );

		$this->add_responsive_control(
			'thumbnail_max_width',
			[
				'label' => esc_html__( 'Maximum Width', 'keystone-elements-addons' ),
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
				'selectors' => [
                    '{{WRAPPER}} .cj-logo-grid-item img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'hr_thumbnail_1',
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
        
        $this->add_responsive_control(
			'thumbnail_opacity',
			[
				'label' => esc_html__( 'Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-logo-grid-item img' => 'opacity: {{VALUE}};'
				],
			]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-logo-grid-item img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item img',
			]
		);
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_css_filter',
				'label' => esc_html__( 'CSS Filters', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item img'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_thumbnail_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_responsive_control(
			'thumbnail_opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-logo-grid-item:hover img' => 'opacity: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'thumb_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item:hover img',
			]
		);
        
        $this->add_responsive_control(
			'thumb_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-logo-grid-item:hover img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'thumb_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item:hover img',
			]
		);
		
		$this->add_group_control(
			Group_Control_Css_Filter::get_type(),
			[
				'name' => 'thumbnail_css_filter_hover',
				'label' => esc_html__( 'CSS Filters', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-logo-grid-item:hover img'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
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
			'tooltip_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
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
                'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
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
        
        $this->end_controls_section();
  
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
		$settings_id = $this->get_id();
        if ( $settings['list'] ) { ?>
        <div class="cj-logo-grid">
        <?php foreach ( $settings['list'] as $item ) { ?>
            <?php
            $target = $item['website_link']['is_external'] ? ' target="_blank"' : '';
			$nofollow = $item['website_link']['nofollow'] ? ' rel="nofollow"' : '';
			$img_url = \Elementor\Utils::get_placeholder_image_src();
			$img_alt = '';
			$img_caption = '';
			if ($item['image']['url'] != $img_url) {
            	$img_array = wp_get_attachment_image_src($item['image']['id'], $settings['img_size'], true);
            	$img_url = $img_array[0];
				$img_alt = get_post_meta( $item['image']['id'], '_wp_attachment_image_alt', true );
				$img_caption = wp_get_attachment_caption($item['image']['id']);
			}
            ?>
			<div id="cj-logo-<?php echo $item['_id']; ?>" class="cj-logo-grid-item">
				<?php if ($settings['enable_tooltip'] && !empty($img_caption)) { ?>
					<div class="cj-logo-grid-item-inner cj-tooltip-wrapper elementor-animation-<?php echo esc_attr($settings['thumbnail_animation']); ?>" data-tpid="cj-tooltip-<?php echo esc_attr($settings_id); ?> animated fast <?php echo esc_attr($settings['anim']); ?>" data-followmouse="<?php echo esc_attr($settings['follow_mouse']); ?>" data-motp="<?php echo esc_attr($settings['mouse_on_to_popup']); ?>" data-placement="<?php echo esc_attr($settings['placement']); ?>" data-smart="<?php echo esc_attr($settings['smart_placement']); ?>" data-offset="<?php echo esc_attr($settings['offset']); ?>">
					<?php if ($item['website_link']['url']) { ?>
					<a href="<?php echo esc_url($item['website_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
					<?php } ?>
						<img src="<?php echo esc_url($img_url); ?>" class="cj-tooltip cj-tooltip-type-text" data-powertip="<?php echo esc_attr($img_caption); ?>" alt="<?php echo esc_attr($img_alt); ?>"/>
					<?php if ($item['website_link']['url']) { ?>
					</a>
					<?php } ?>
					</div>
				<?php } else { ?>
					<div class="cj-logo-grid-item-inner elementor-animation-<?php echo esc_attr($settings['thumbnail_animation']); ?>">
					<?php if ($item['website_link']['url']) { ?>
					<a href="<?php echo esc_url($item['website_link']['url']); ?>" <?php echo esc_attr($target); ?> <?php echo esc_attr($nofollow); ?>>
					<?php } ?>
					<img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($img_alt); ?>" />
					<?php if ($item['website_link']['url']) { ?>
					</a>
					<?php } ?>
					</div>
				<?php } ?>
            </div>
        <?php } ?>
        </div>
    <?php } ?>
    <?php } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Logo_Grid() );