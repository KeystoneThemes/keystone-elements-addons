<?php
namespace Elementor;
use WP_Query;
use WC_product;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Woo_Gallery extends Widget_Base {

	public function get_name() {
		return 'cj-woo_gallery';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'WooCommerce Gallery', 'keystone-elements-addons' );
    }
    
    public function get_categories() {
		return [ 'keystone-elements-addons' ];
    }
    
    public function get_script_depends() {
		return [ 'cj-lib-slick', 'cj-woo_gallery' ];
    }

    public function get_style_depends(){
		return [ 'cj-lib-slick', 'cj-slider', 'elementor-icons-fa-solid', 'elementor-icons-fa-regular' ];
	}

	public function get_icon() {
		return 'eicon-woocommerce';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Product', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'product_id', [
				'label' => esc_html__( 'Product', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
                'label_block' => 'true',
                'default' => 0,
				'options' => KEA_get_woo_products()
			]
		);
       
		$this->end_controls_section();
        
        $this->start_controls_section(
			'slider_section',
			[
				'label' => esc_html__( 'Slider Settings', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'autoplay', [
				'label' => esc_html__( 'Autoplay', 'keystone-elements-addons' ),
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
        
        $this->add_control(
			'slide_anim',
			[
				'label' => esc_html__( 'Slide Transition', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
                'label_block' => 'true',
				'options' => [
					'true'  => esc_html__( 'Fade', 'keystone-elements-addons' ),
					'false'  => esc_html__( 'Slide', 'keystone-elements-addons' )
				],
			]
		);
        
        $this->add_control(
			'slide_anim_duration',
			[
				'label' => esc_html__( 'Slide Transition Duration (ms)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 3000,
				'step' => 10,
				'default' => 300,
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'slider_nav',
			[
				'label' => esc_html__( 'Slider Navigation', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'hide_nav', [
				'label' => esc_html__( 'Show Navigation only on Hover', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_dots_title',
			[
				'label' => esc_html__( 'Navigation Dots', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'nav_dots', [
				'label' => esc_html__( 'Enable', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_thumbnails', [
				'label' => esc_html__( 'Enable Thumbnail Mode', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
				'condition' => ['nav_dots' => 'yes']
			]
		);
        
        $this->add_control(
			'nav_dots_desktop', [
				'label' => esc_html__( 'Hide On Desktop', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hide', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Show', 'keystone-elements-addons' ),
				'return_value' => 'hide',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_dots_tablet', [
				'label' => esc_html__( 'Hide On Tablet', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hide', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Show', 'keystone-elements-addons' ),
				'return_value' => 'hide',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_dots_mobile', [
				'label' => esc_html__( 'Hide On Mobile', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hide', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Show', 'keystone-elements-addons' ),
				'return_value' => 'hide',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_arrows_title',
			[
				'label' => esc_html__( 'Navigation Arrows', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'nav_arrows', [
				'label' => esc_html__( 'Enable', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_arrows_desktop', [
				'label' => esc_html__( 'Hide On Desktop', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hide', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Show', 'keystone-elements-addons' ),
				'return_value' => 'hide',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_arrows_tablet', [
				'label' => esc_html__( 'Hide On Tablet', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hide', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Show', 'keystone-elements-addons' ),
				'return_value' => 'hide',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'nav_arrows_mobile', [
				'label' => esc_html__( 'Hide On Mobile', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hide', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Show', 'keystone-elements-addons' ),
				'return_value' => 'hide',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_navigation',
			[
				'label' => esc_html__( 'Navigation Arrows', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['nav_arrows' => 'yes']
			]
        );
        
        $this->add_control(
			'arrow_next_icon',
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
			'arrow_prev_icon',
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
			'arrow_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-prev' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-slider .slick-next' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'arrow_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-prev' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-slider .slick-next' => 'background-color: {{VALUE}};'
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
			'arrow_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-prev:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-slider .slick-next:hover' => 'color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'arrow_bg_hover_color',
			[
				'label' => esc_html__( 'Background Hover Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-prev:hover' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-slider .slick-next:hover' => 'background-color: {{VALUE}};'
				],
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
			'arrow_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'arrow_size',
			[
				'label' => esc_html__( 'Icon Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 1,
				'default' => 30,
                'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-prev' => 'font-size: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-slider .slick-next' => 'font-size: {{VALUE}}px;',
				],
			]
		);
        
        $this->add_responsive_control(
			'arrow_box_size',
			[
				'label' => esc_html__( 'Box Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 10,
				'max' => 200,
				'step' => 1,
				'default' => 60,
                'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-prev' => 'height: {{VALUE}}px;width: {{VALUE}}px;line-height: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-slider .slick-next' => 'height: {{VALUE}}px;width: {{VALUE}}px;line-height: {{VALUE}}px;'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'arrow_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-slider .slick-next,{{WRAPPER}} .cj-slider .slick-prev',
			]
		);
        
        $this->add_responsive_control(
			'arrow_radius',
			[
				'label' => esc_html__( 'Box Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-next' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-slider .slick-prev' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'arrow_box_margin',
			[
				'label' => esc_html__( 'Box Right/Left Margin (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -100,
				'max' => 100,
				'step' => 1,
				'default' => 0,
                'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-next' => 'right: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-slider .slick-prev' => 'left: {{VALUE}}px;'
				],
			]
        );

        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_navigation_thumbnails',
			[
				'label' => esc_html__( 'Navigation Thumbnails', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['nav_dots' => 'yes']
			]
		);
        
                $this->add_control(
			'nav_thumbnails_position',
			[
				'label' => esc_html__( 'Position', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cj-dots-outside',
				'options' => [
					'cj-dots-inside'  => esc_html__( 'Inside', 'keystone-elements-addons' ),
					'cj-dots-outside'  => esc_html__( 'Outside', 'keystone-elements-addons' )
				],
			]
		);
        
        $this->add_responsive_control(
			'nav_thumbnails_margin',
			[
				'label' => esc_html__( 'Container Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'nav_thumbnails_padding',
			[
				'label' => esc_html__( 'Container Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'nav_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'nav_thumbnail_margin',
			[
				'label' => esc_html__( 'Thumbnail Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'nav_thumbnail_padding',
			[
				'label' => esc_html__( 'Thumbnail Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'nav_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_control(
			'nav_thumbnail_size',
			[
				'label' => esc_html__( 'Thumbnail Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'thumbnail',
				'options' => [
					'thumbnail'  => esc_html__( 'Thumbnail', 'keystone-elements-addons' ),
					'medium'  => esc_html__( 'Medium', 'keystone-elements-addons' ),
                    'large'  => esc_html__( 'Large', 'keystone-elements-addons' ),
                    'full'  => esc_html__( 'Full (Not recommended)', 'keystone-elements-addons' )
				],
			]
		);
        
        $this->add_responsive_control(
			'nav_thumbnail_width',
			[
				'label' => esc_html__( 'Thumbnail Max. Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem', '%' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1400,
						'step' => 5,
					],
					'rem' => [
						'min' => 1,
						'max' => 100,
                        'step' => 1
                    ],
                    '%' => [
						'min' => 1,
						'max' => 100,
                        'step' => 1
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 25,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-thumbnail-dots li' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'nav_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->start_controls_tabs( 'tabs_thumbnail_style' );
        
        $this->start_controls_tab(
			'tab_thumbnail_normal',
			[
				'label' => esc_html__( 'Normal', 'wpbits' ),
			]
		);
		
		$this->add_responsive_control(
			'nav_thumbnail_opacity',
			[
				'label' => esc_html__( 'Thumbnail Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots li img' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'nav_thumbnail_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-thumbnail-dots li img',
			]
		);
        
        $this->add_responsive_control(
			'nav_thumbnail_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots li img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_thumbnail_shadow',
				'label' => esc_html__( 'Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-thumbnail-dots li img',
			]
        );
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_thumbnail_hover',
			[
				'label' => esc_html__( 'Active', 'wpbits' ),
			]
		);

		$this->add_responsive_control(
			'nav_thumbnail_hover_opacity',
			[
				'label' => esc_html__( 'Thumbnail Opacity', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots li.slick-active img' => 'opacity: {{VALUE}};',
                    '{{WRAPPER}} .cj-thumbnail-dots li img:hover' => 'opacity: {{VALUE}};'
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'nav_thumbnail_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-thumbnail-dots li.slick-active img,{{WRAPPER}} .cj-thumbnail-dots li img:hover',
			]
		);
        
        $this->add_responsive_control(
			'nav_thumbnail_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-thumbnail-dots li.slick-active img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cj-thumbnail-dots li img:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_thumbnail_shadow_hover',
				'label' => esc_html__( 'Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-thumbnail-dots li.slick-active img,{{WRAPPER}} .cj-thumbnail-dots li img:hover',
			]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_navigation_dots',
			[
				'label' => esc_html__( 'Navigation Dots', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'condition' => ['nav_dots' => 'yes']
			]
		);
        
        $this->add_control(
			'dots_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-slider .slick-dots li button:before' => 'color: {{VALUE}};'
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
					'{{WRAPPER}} .cj-slider .slick-dots li button:before' => 'font-size: {{VALUE}}px !important;line-height: {{VALUE}}px !important;width: {{VALUE}}px;height: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-slider .slick-dots li button' => 'width: {{VALUE}}px;height: {{VALUE}}px;',
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
                    '{{WRAPPER}} .cj-slider .slick-dots li' => 'margin-left: {{VALUE}}px !important;margin-right: {{VALUE}}px !important;',
				],
			]
		);
        
        $this->add_responsive_control(
			'dots_bottom_margin',
			[
				'label' => esc_html__( 'Dots Bottom Margin (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'default' => 20,
                'selectors' => [
                    '{{WRAPPER}} .cj-slider .slick-dots' => 'bottom: {{VALUE}}px;',
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_loader',
			[
				'label' => esc_html__( 'Loader', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'loader_bg_color',
			[
				'label' => esc_html__( 'Container Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#0073aa',
				'selectors' => [
					'{{WRAPPER}} .cj-slider-loader' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'loader_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-css3-loader.cj-slider-loader:before' => 'border-top-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'css_loader_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.1)',
				'selectors' => [
					'{{WRAPPER}} .cj-css3-loader.cj-slider-loader:before' => 'border-left-color: {{VALUE}};border-right-color: {{VALUE}};border-bottom-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'loader_thickness',
			[
				'label' => esc_html__( 'Thickness', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 5,
                'selectors' => [
					'{{WRAPPER}} .cj-css3-loader.cj-slider-loader:before' => 'border-width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_control(
			'loader_size',
			[
				'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 20,
				'max' => 200,
				'step' => 1,
				'default' => 50,
                'selectors' => [
					'{{WRAPPER}} .cj-css3-loader.cj-slider-loader:before' => 'width: {{VALUE}}px; height: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_control(
			'loader_duration',
			[
				'label' => esc_html__( 'Animation Duration (seconds)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
				'step' => 1,
				'default' => 1,
                'selectors' => [
					'{{WRAPPER}} .cj-css3-loader.cj-slider-loader:before' => 'animation-duration: {{VALUE}}s;'
				],
			]
        );
        
        $this->add_control(
			'loader_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_control(
			'loader_image',
			[
				'label' => esc_html__( 'Custom Loading Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);
        
        $this->add_control(
			'loader_image_size',
			[
				'label' => esc_html__( 'Loading Image Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 500,
				'step' => 1,
				'default' => 60,
                'selectors' => [
					'{{WRAPPER}} .cj-slider-loader' => 'background-size: {{VALUE}}px;'
				],
			]
		);
        
        $this->end_controls_section();
	}
    
    protected function render() {
        $cjslider_slider_id = $this->get_id();
		$settings = $this->get_settings_for_display();
		global $product;
        
        ?>
        <div class="cj-slider-wrapper <?php if ($settings['hide_nav']) { echo 'hide-nav'; } ?>">
            <div class="cj-slider-loader <?php if (empty($settings['loader_image']['url'])) { ?>cj-css3-loader<?php } ?>" style="<?php if (!empty($settings['loader_image']['url'])) { echo 'background-image:url(' . $settings['loader_image']['url'] . ');'; } ?>"></div>
            <div id="cj-slider-<?php echo esc_attr($cjslider_slider_id); ?>" class="cj-slider" data-prv="<?php echo $settings['arrow_prev_icon']['value']; ?>" data-nxt="<?php echo $settings['arrow_next_icon']['value']; ?>"  data-autoplay="<?php if ($settings['autoplay']) { echo 'true'; } else { echo 'false'; } ?>" data-duration="<?php echo esc_attr($settings['autoplay_duration']); ?>000" data-nav="<?php if ($settings['nav_arrows']) { echo 'true'; } else { echo 'false'; } ?>" data-dots="<?php if ($settings['nav_dots']) { echo 'true'; } else { echo 'false'; } ?>" data-navthumbnails="<?php echo esc_attr($settings['nav_thumbnails']); ?>" data-rtl="<?php if (is_rtl()) { echo 'true'; } else { echo 'false'; } ?>" data-slideanim="<?php echo esc_attr($settings['slide_anim']); ?>" data-speed="<?php echo esc_attr($settings['slide_anim_duration']); ?>">
            <?php
            $product_id = $settings['product_id'];
            if ($product_id == 0) { ?>
            <div class="cj-danger"><?php esc_html_e( 'Please select a product.', 'keystone-elements-addons' ); ?></div>
            <?php } else {
            $product = new WC_product($product_id);
            $attachment_ids = $product->get_gallery_image_ids();
            if (has_post_thumbnail($product_id)) {
                $image_id = get_post_thumbnail_id($product_id);

                $image_url_array = wp_get_attachment_image_src($image_id, 'full', true);
                $image_url = $image_url_array[0];
                
                $thumb_url_array = wp_get_attachment_image_src($image_id, $settings['nav_thumbnail_size'], true);
                $thumb_url = $thumb_url_array[0];
            } ?>
            <div class="cj-slick-thumb" data-thumbnail="<?php echo esc_url($thumb_url); ?>" data-alt="<?php the_title_attribute($product_id); ?>">
                <a href="<?php echo $image_url; ?>" data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="cj-gallery-<?php echo $cjslider_slider_id; ?>">
                    <img src="<?php echo $image_url; ?>" />
                </a>
            </div> 
            <?php
            foreach( $attachment_ids as $attachment_id ) 
                {
                $image_url_array = wp_get_attachment_image_src($attachment_id, 'full', true);
                $image_url = $image_url_array[0];
                $thumb_url_array = wp_get_attachment_image_src($attachment_id, $settings['nav_thumbnail_size'], true);
                $thumb_url = $thumb_url_array[0];

                ?>
                <div class="cj-slick-thumb" data-thumbnail="<?php echo esc_url($thumb_url); ?>" data-alt="<?php the_title_attribute($product_id); ?>">
                <a href="<?php echo $image_url; ?>" data-elementor-open-lightbox="default" data-elementor-lightbox-slideshow="cj-gallery-<?php echo $cjslider_slider_id; ?>">
                    <img src="<?php echo $image_url; ?>" />
                </a>
                </div> 
            <?php } ?>
            </div>
            <?php if (($settings['nav_dots']) && ($settings['nav_thumbnails'])) { ?>
            <div id="cj-slider-thumbnails-<?php echo esc_js($cjslider_slider_id) ?>" class="cj-slider-thumbnails <?php echo $settings['nav_thumbnails_position']; ?>"></div>
            <?php } ?>
        </div>
		<style type="text/css">
    <?php
    $viewport_lg = get_option('elementor_viewport_lg', true);
    if (empty($viewport_lg)) {
        $viewport_lg = 1025;
    }                              
    $viewport_md = get_option('elementor_viewport_md', true);
    if (empty($viewport_md)) {
        $viewport_md = 768;
    } 
    ?>
    @media screen and (min-width: <?php echo ($viewport_lg + 1) . 'px'; ?>) {
        <?php if ($settings['nav_arrows_desktop']) { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-prev,
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-next {
            display: none !important;
        }
        <?php } else { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-prev,
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-next {
            display: block !important;
        }
        <?php } ?>
        <?php if ($settings['nav_dots_desktop']) { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-dots,
		#cj-slider-thumbnails-<?php echo esc_attr($cjslider_slider_id) ?> {
            display: none !important;
        }
        <?php } else { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-dots,
		#cj-slider-thumbnails-<?php echo esc_attr($cjslider_slider_id) ?> {
            display: block !important;
        }
        <?php } ?>
    }
    @media only screen and (max-width: <?php echo $viewport_lg . 'px'; ?>) {
        <?php if ($settings['nav_arrows_tablet']) { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-prev,
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-next {
            display: none !important;
        }
        <?php } else { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-prev,
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-next {
            display: block !important;
        }
        <?php } ?>
        <?php if ($settings['nav_dots_tablet']) { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-dots,
		#cj-slider-thumbnails-<?php echo esc_attr($cjslider_slider_id) ?> {
            display: none !important;
        }
        <?php } else { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-dots,
		#cj-slider-thumbnails-<?php echo esc_attr($cjslider_slider_id) ?> {
            display: block !important;
        }
        <?php } ?>
    }
    @media screen and (max-width: <?php echo $viewport_md . 'px'; ?>) {
        <?php if ($settings['nav_arrows_mobile']) { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-prev,
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-next {
            display: none !important;
        }
        <?php } else { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-prev,
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-next {
            display: block !important;
        }
        <?php } ?>
        <?php if ($settings['nav_dots_mobile']) { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-dots,
		#cj-slider-thumbnails-<?php echo esc_attr($cjslider_slider_id) ?> {
            display: none !important;
        }
        <?php } else { ?>
		#cj-slider-<?php echo esc_attr($cjslider_slider_id); ?> .slick-dots,
		#cj-slider-thumbnails-<?php echo esc_attr($cjslider_slider_id) ?> {
            display: block !important;
        }
        <?php } ?>
    }
</style>
<?php
}
}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Woo_Gallery() );
?>