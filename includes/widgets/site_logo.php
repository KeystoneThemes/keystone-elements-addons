<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Site_Logo extends Widget_Base {

	public function get_name() {
		return 'cj-site_logo';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Site Logo', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_icon() {
		return 'eicon-site-logo';
	}
    
	protected function register_controls() {

        // section start
		$this->start_controls_section(
			'logo_section',
			[
				'label' => esc_html__( 'Site Logo', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );
        
        $this->add_control(
			'logo_source',
			[
				'label' => esc_html__( 'Source', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'custom',
				'options' => [
                    'custom'  => esc_html__( 'Custom Logo', 'keystone-elements-addons' ),
					'customizer'  => esc_html__( 'Customizer', 'keystone-elements-addons' )
                ],
                'frontend_available' => true
			]
		);
        
        $this->start_controls_tabs( 'tabs_thumbnail_style' );
        
        $this->start_controls_tab(
			'tab_desktop',
			[
                'label' => esc_html__( 'Desktop', 'keystone-elements-addons' ),
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
        );      
        
        $this->add_control(
			'before_image',
			[
				'label' => esc_html__( 'Logo', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
        );

        $this->add_control(
			'img_size',
			[
				'label' => esc_html__( 'Image Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'full',
                'options' => KEA_get_image_sizes(),
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_mobile',
			[
                'label' => esc_html__( 'Mobile', 'keystone-elements-addons' ),
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
        );
        
        $this->add_control(
			'after_image',
			[
				'label' => esc_html__( 'Logo', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
        );

        $this->add_control(
			'mobile_img_size',
			[
				'label' => esc_html__( 'Image Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'large',
                'options' => KEA_get_image_sizes(),
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
			'logo_hr_1',
			[
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
        );
        
        $this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'keystone-elements-addons' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
                'dynamic' => [
					'active' => true,
                ],
                'default' => [
					'url' => home_url( '/' ),
					'is_external' => false,
					'nofollow' => false,
				],
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
        );

        $this->add_control(
			'logo_hr_2',
			[
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'condition' => [
                    'logo_source' => 'custom'
                ]
			]
        );

        $this->add_control(
            'breakpoint',
            [
                'label' => esc_html__( 'Mobile Breakpoint', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => get_option('elementor_viewport_lg', true),
                'condition' => [
                    'logo_source' => 'custom'
                ]
            ]
        );

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_logo_style',
			[
				'label' => esc_html__( 'Site Logo', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'logo_h_align',
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
					'{{WRAPPER}} .kea-site-logo-container' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'logo_max_width',
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
					'{{WRAPPER}} .kea-site-logo-container img' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'logo_width',
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
						'max' => 1000,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .kea-site-logo-container img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
        );

        $this->add_control(
			'logo_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );

        $this->add_control(
			'logo_bg_color',
			[
                'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} .kea-site-logo-container img' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'logo_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-site-logo-container img'
			]
		);
        
        $this->add_control(
			'logo_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-site-logo-container img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'logo_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-site-logo-container img'
			]
        );
        
        $this->add_control(
			'logo_hr_4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );

		$this->add_responsive_control(
			'logo_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-site-logo-container img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'logo_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-site-logo-container img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();
	}

		/**
 * Render 
 */
protected function render() {
    $settings = $this->get_settings_for_display();

    // Check if the 'link' key exists in $settings and initialize it if not
    $link = isset($settings['link']) ? $settings['link'] : array('is_external' => false, 'nofollow' => false, 'url' => '');

    // Check if the 'before_image' key exists in $settings and initialize it if not
    $before_image = isset($settings['before_image']) ? $settings['before_image'] : array('id' => '', 'url' => '');

    // Check if the 'after_image' key exists in $settings and initialize it if not
    $after_image = isset($settings['after_image']) ? $settings['after_image'] : array('id' => '', 'url' => '');

    // Check if the 'img_size' key exists in $settings and initialize it if not
    $img_size = isset($settings['img_size']) ? $settings['img_size'] : '';

    // Check if the 'mobile_img_size' key exists in $settings and initialize it if not
    $mobile_img_size = isset($settings['mobile_img_size']) ? $settings['mobile_img_size'] : '';

    // Check if the 'breakpoint' key exists in $settings and initialize it if not
    $breakpoint = isset($settings['breakpoint']) ? $settings['breakpoint'] : '';

    $target = $link['is_external'] ? ' target="_blank"' : '';
    $nofollow = $link['nofollow'] ? ' rel="nofollow"' : '';
    ?>
    <div class="stone-site-logo-container" style="display:flex;flex-direction:column;">
    <?php if ($settings['logo_source'] == 'customizer') {
        if (has_custom_logo()) {
            the_custom_logo();
        } else {
            echo '<strong>' . esc_html__( 'Please add a logo from customizer.', 'keystone-elements-addon' ) . '</strong>';
        }
    } else {
        if ($link['url']) {
            if ($before_image['url']) {
                echo '<a href="' . $link['url'] . '" class="stone-logo-desktop"' . $target . ' ' . $nofollow . '><span>' . wp_get_attachment_image( $before_image['id'], $img_size ) . '</span></a>';
            }
            if ($after_image['url'] && $breakpoint) {
                echo '<a href="' . $link['url'] . '" class="stone-logo-mobile"' . $target . ' ' . $nofollow . '><span>' . wp_get_attachment_image( $after_image['id'], $mobile_img_size ) . '</span></a>';
            }
        } else {
            if ($before_image['url']) {
                echo '<div class="stone-logo-desktop"><span>' . wp_get_attachment_image( $before_image['id'], $img_size ) . '</span></div>';
            }
            if ($after_image['url'] && $breakpoint) {
                echo '<div class="stone-logo-mobile"><span>' . wp_get_attachment_image( $after_image['id'], $mobile_img_size ) . '</span></div>';
            }
        }
    } ?>
    </div>
    <?php if ($after_image['url'] && $breakpoint) { ?>
    <style>
    @media screen and (min-width: <?php echo ($breakpoint + 1) . 'px'; ?>) {
        .stone-logo-desktop span {display:block;}
        .stone-logo-mobile span {display:none;}
    }
    @media screen and (max-width: <?php echo $breakpoint . 'px'; ?>) {
        .stone-logo-desktop span {display:none;}
        .stone-logo-mobile span {display:block;}
    }
    </style>
    <?php } ?>
<?php } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Site_Logo() );