<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Portfolio_Grid extends Widget_Base {

	public function get_name() {
		return 'cj-portfolio_grid';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Portfolio Grid', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-portfolio_grid', 'dashicons'];
	}

	public function get_script_depends() {
		return [ 'cj-portfolio_grid' ];
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}
    
	protected function register_controls() {

        // section start
		$this->start_controls_section(
			'grid_items_section',
			[
				'label' => esc_html__( 'Grid Items', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
        );

        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
					'active' => true,
				],
			]
        );
        
        $repeater->add_control(
			'info', [
				'label' => esc_html__( 'Info', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'dynamic' => [
					'active' => true,
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

        $repeater->add_control(
			'item_filter_ids', [
				'label' => esc_html__( 'Filter ID(s)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
					'active' => true,
				],
			]
        );

        $repeater->add_responsive_control(
			'column_width',
			[
                'label' => esc_html__( 'Column Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'grid-column: span {{VALUE}};'
				],
			]
		);

		$repeater->add_responsive_control(
			'column_height',
			[
                'label' => esc_html__( 'Column Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 10,
                'step' => 1,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}' => 'grid-row: span {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'list', [
				'label' => esc_html__( 'Portfolio Items', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
                    [
                        'title' => esc_html__( 'Title 1', 'keystone-elements-addons' ),
                        'info' => esc_html__( 'Lorem ipsum dolor...', 'keystone-elements-addons' ),
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'item_filter_ids' => 'filter-1 filter-2'
				    ],
				    [
                        'title' => esc_html__( 'Title 2', 'keystone-elements-addons' ),
                        'info' => esc_html__( 'Lorem ipsum dolor...', 'keystone-elements-addons' ),
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'item_filter_ids' => 'filter-2'
					],
					[
                        'title' => esc_html__( 'Title 3', 'keystone-elements-addons' ),
                        'info' => esc_html__( 'Lorem ipsum dolor...', 'keystone-elements-addons' ),
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'item_filter_ids' => 'filter-3'
				    ],
				    [
                        'title' => esc_html__( 'Title 4', 'keystone-elements-addons' ),
                        'info' => esc_html__( 'Lorem ipsum dolor...', 'keystone-elements-addons' ),
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'item_filter_ids' => 'filter-2 filter-3'
				    ]
                ],
                'title_field' => '{{{ title }}}',
            ]
		);
		
		$this->add_control(
			'hr_img_size',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_control(
			'title_html_tag',
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
			'info_html_tag',
			[
				'label' => esc_html__( 'Info HTML Tag', 'keystone-elements-addons' ),
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
				'default' => 'p',
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

		$this->add_control(
			'layout_default',
			[
				'label' => esc_html__( 'Default Layout', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'kea-fpg-grid-view' => [
						'title' => esc_html__( 'Grid', 'keystone-elements-addons' ),
						'icon' => 'eicon-posts-grid',
					],
					'kea-fpg-list-view' => [
						'title' => esc_html__( 'List', 'keystone-elements-addons' ),
						'icon' => 'eicon-post-list',
					],
				],
				'default' => 'kea-fpg-grid-view',
                'toggle' => false
			]
        );
        
        $this->add_control(
			'layout_menu', [
                'label' => esc_html__( 'Show Layout Switcher', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
        );
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'filters_section',
			[
				'label' => esc_html__( 'Filters', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater2 = new \Elementor\Repeater();

        $repeater2->add_control(
			'filter_name', [
				'label' => esc_html__( 'Filter Name', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
					'active' => true,
				],
			]
        );

        $repeater2->add_control(
			'filter_id', [
                'label' => esc_html__( 'Filter ID', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Please make sure the ID is unique and not used elsewhere on the page this form is displayed. This field allows A-Z 0-9  & underscore chars without spaces.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
					'active' => true,
				],
			]
        );

        $repeater2->add_control(
			'filter_default', [
                'label' => esc_html__( 'Default Filter', 'keystone-elements-addons' ),
                'description' => esc_html__( 'There must be a default filter in the menu.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);

        $this->add_control(
			'list2', [
				'label' => esc_html__( 'Filters', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater2->get_controls(),
                'show_label' => false,
				'default' => [
                    [
                        'filter_name' => esc_html__( 'All', 'keystone-elements-addons' ),
                        'filter_id' => esc_html__( 'all', 'keystone-elements-addons' ),
                        'filter_default' => 'yes'
				    ],
                    [
                        'filter_name' => esc_html__( 'Filter 1', 'keystone-elements-addons' ),
                        'filter_id' => esc_html__( 'filter-1', 'keystone-elements-addons' )
				    ],
				    [
                        'filter_name' => esc_html__( 'Filter 2', 'keystone-elements-addons' ),
                        'filter_id' => esc_html__( 'filter-2', 'keystone-elements-addons' )
					],
					[
                        'filter_name' => esc_html__( 'Filter 3', 'keystone-elements-addons' ),
                        'filter_id' => esc_html__( 'filter-3', 'keystone-elements-addons' )
				    ]
                    ],
                    'title_field' => '{{{ filter_name }}}',
            ]
        );

        $this->add_control(
			'filter_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );

        $this->add_control(
			'filter_menu', [
                'label' => esc_html__( 'Show Menu', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
        );
        
        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'grid_item_style',
			[
				'label' => esc_html__( 'Grid Item', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );
		
		$this->add_control(
			'grid_item_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0, 0, 0, 0.1)',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container li .kea-fpg-inner' => 'background-color: {{VALUE}};'
				],
			]
        );

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'grid_item_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-container li .kea-fpg-inner'
			]
		);

		$this->add_control(
			'grid_item_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container li .kea-fpg-inner' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'grid_item_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-container li .kea-fpg-inner'
			]
		);
        
        
        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'grid_view_style',
			[
				'label' => esc_html__( 'Grid View', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'grid_item_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HOVER_ANIMATION
			]
		);
		
		$this->add_control(
			'grid_item_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_responsive_control(
			'grid_item_width',
			[
				'label' => esc_html__( 'Max. Item Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 1400,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-grid-view' => 'grid-template-columns:repeat(auto-fit, minmax({{SIZE}}{{UNIT}}, 1fr));'
				],
			]
		);
        
        $this->add_responsive_control(
			'grid_gap',
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
					'size' => 30,
				],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-grid-view' => 'grid-gap: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'grid_view_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
		
		$this->add_control(
			'grid_txt_placement',
			[
				'label' => esc_html__( 'Text Box Placement', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'below-img',
				'options' => [
					'in-img'  => esc_html__( 'On the image', 'keystone-elements-addons' ),
					'below-img' => esc_html__( 'Below the image', 'keystone-elements-addons' ),
				]
			]
		);

		$this->add_responsive_control(
			'grid_view_img_height',
			[
                'label' => esc_html__( 'Grid Item Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 100,
				'max' => 2000,
                'step' => 10,
                'selectors' => [
                    '{{WRAPPER}} .kea-fpg-container.in-img.kea-fpg-grid-view li' => 'height: {{VALUE}}px;'
				],
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);
        
        $this->add_responsive_control(
			'grid_view_v_align',
			[
				'label' => esc_html__( 'Text Box Vertical Align', 'keystone-elements-addons' ),
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
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-grid-view figcaption' => 'justify-content: {{VALUE}};'
				],
				'toggle' => false,
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);

		$this->add_responsive_control(
			'grid_view_text_align',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-grid-view figcaption' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'grid_view_txt_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view figcaption',
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);

		$this->add_control(
			'grid_view_txt_border_radius',
			[
				'label' => esc_html__( 'Text Box Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view figcaption' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
				],
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);

		$this->add_responsive_control(
			'grid_view_txt_padding',
			[
				'label' => esc_html__( 'Text Box Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view figcaption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		
		$this->add_responsive_control(
			'grid_view_txt_margin',
			[
				'label' => esc_html__( 'Text Box Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view figcaption' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);

		$this->add_control(
			'grid_view_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);

		$this->start_controls_tabs( 'tabs_overlay_style' );
        
        $this->start_controls_tab(
			'tab_overlay_normal',
			[
				'label' => esc_html__( 'Overlay', 'keystone-elements-addons'),
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'grid_view_txt_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view figcaption',
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_overlay_hover',
			[
				'label' => esc_html__( 'Overlay Hover', 'keystone-elements-addons'),
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'grid_view_txt_bg_hover',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view figcaption:hover',
				'condition' => ['grid_txt_placement' => 'in-img']
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'grid_view_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'grid_view_title_typography',
				'label' => esc_html__( 'Title Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view li .kea-fpg-title',
			]
		);

		$this->add_control(
			'grid_view_title_color',
			[
				'label' => esc_html__( 'Title Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view li .kea-fpg-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'grid_view_title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view li .kea-fpg-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'grid_view_info_typography',
				
				'label' => esc_html__( 'Info Typography', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view li .kea-fpg-info',
			]
		);

		$this->add_control(
			'grid_view_info_color',
			[
				'label' => esc_html__( 'Info Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view li .kea-fpg-info' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'grid_view_info_margin',
			[
				'label' => esc_html__( 'Info Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view li .kea-fpg-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'grid_view_hr_4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'grid_view_img_padding',
			[
				'label' => esc_html__( 'Image Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'grid_view_img_border_radius',
			[
				'label' => esc_html__( 'Image Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-grid-view img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

		 // section start
		 $this->start_controls_section(
			'list_view_style',
			[
				'label' => esc_html__( 'List View', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

		$this->add_responsive_control(
			'list_view_img_width',
			[
				'label' => esc_html__( 'Image Width (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li figure' => 'grid-template-columns: {{SIZE}}{{UNIT}} 1fr;'
				],
			]
		);
        
        $this->add_responsive_control(
			'list_view_grid_gap',
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
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li:last-child' => 'margin-bottom: 0;'
				],
			]
		);

		$this->add_control(
			'list_view_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'list_view_text_align',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-list-view figcaption' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'list_view_txt_padding',
			[
				'label' => esc_html__( 'Text Box Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view figcaption' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'list_view_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_view_title_typography',
				'label' => esc_html__( 'Title Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li .kea-fpg-title',
			]
		);

		$this->add_control(
			'list_view_title_color',
			[
				'label' => esc_html__( 'Title Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li .kea-fpg-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'list_view_title_margin',
			[
				'label' => esc_html__( 'Title Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li .kea-fpg-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'list_view_info_typography',
				
				'label' => esc_html__( 'Info Typography', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li .kea-fpg-info',
			]
		);

		$this->add_control(
			'list_view_info_color',
			[
				'label' => esc_html__( 'Info Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li .kea-fpg-info' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_responsive_control(
			'list_view_info_margin',
			[
				'label' => esc_html__( 'Info Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view li .kea-fpg-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_control(
			'list_view_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'list_view_img_padding',
			[
				'label' => esc_html__( 'Image Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_control(
			'list_view_img_border_radius',
			[
				'label' => esc_html__( 'Image Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-container.kea-fpg-list-view img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->end_controls_section();

        // section start
		$this->start_controls_section(
			'toolbar_style',
			[
				'label' => esc_html__( 'Toolbar', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'toolbar_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'toolbar_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar'
			]
		);

		$this->add_control(
			'toolbar_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'toolbar_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar'
			]
		);

		$this->add_control(
			'toolbar_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'toolbar_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		
		$this->add_responsive_control(
			'toolbar_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();

        // section start
		$this->start_controls_section(
			'filters_style',
			[
				'label' => esc_html__( 'Filters', 'keystone-elements-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => ['filter_menu' => 'yes']
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'filters_typography',
				
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label',
			]
		);

		$this->start_controls_tabs( 'tabs_filters_style' );
        
        $this->start_controls_tab(
			'tab_filters_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons'),
			]
		);

		$this->add_control(
			'filters_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'filters_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.1)',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'filters_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label'
			]
		);

		$this->add_control(
			'filters_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'filters_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_filters_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons'),
			]
		);

		$this->add_control(
			'filters_color_hover',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li label.active' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'filters_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li label.active' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'filters_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label:hover,{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li label.active'
			]
		);

		$this->add_control(
			'filters_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li label.active' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'filters_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label:hover,{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li label.active'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'filters_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'filters_max_width',
			[
				'label' => esc_html__( 'Max. Label Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 100,
						'max' => 900,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 200,
				],
				'selectors' => [
                    '{{WRAPPER}} {{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label' => 'max-width:{{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'filters_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon) label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		
		$this->add_responsive_control(
			'filters_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li:not(.kea-fpg-mobile-icon)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();

        // section start
		$this->start_controls_section(
			'mobile_menu_style',
			[
				'label' => esc_html__( 'Mobile Menu Icon', 'keystone-elements-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => ['filter_menu' => 'yes']
			]
		);

		$this->add_control(
			'mobile_menu_icon_size',
			[
				'label' => esc_html__( 'Icon Size (px)', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label .dashicons:before' => 'font-size:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label .dashicons' => 'font-size:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}};'
				],
			]
        );

		$this->start_controls_tabs( 'tabs_mobile_menu_style' );
        
        $this->start_controls_tab(
			'tab_mobile_menu_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons'),
			]
		);

		$this->add_control(
			'mobile_menu_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'mobile_menu_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mobile_menu_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label'
			]
		);

		$this->add_control(
			'mobile_menu_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mobile_menu_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_mobile_menu_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons'),
			]
		);

		$this->add_control(
			'mobile_menu_color_hover',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label:hover' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'mobile_menu_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'mobile_menu_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label:hover'
			]
		);

		$this->add_control(
			'mobile_menu_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'mobile_menu_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label:hover'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'mobile_menu_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'mobile_menu_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		
		$this->add_responsive_control(
			'mobile_menu_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-search-wrapper li.kea-fpg-mobile-icon' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
			
		$this->end_controls_section();
		
		// section start
		$this->start_controls_section(
			'layout_style',
			[
				'label' => esc_html__( 'Layout Menu', 'keystone-elements-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => ['layout_menu' => 'yes']
			]
		);

		$this->add_responsive_control(
			'layout_icon_size',
			[
				'label' => esc_html__( 'Icon Size (px)', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label .dashicons:before' => 'font-size:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label .dashicons' => 'font-size:{{SIZE}}{{UNIT}};width:{{SIZE}}{{UNIT}};height:{{SIZE}}{{UNIT}};line-height:{{SIZE}}{{UNIT}};'
				],
			]
        );

		$this->start_controls_tabs( 'tabs_layout_style' );
        
        $this->start_controls_tab(
			'tab_layout_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons'),
			]
		);

		$this->add_control(
			'layout_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'layout_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.1)',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'layout_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label'
			]
		);

		$this->add_control(
			'layout_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'layout_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_layout_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons'),
			]
		);

		$this->add_control(
			'layout_color_hover',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label.active' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'layout_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label.active' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'layout_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label:hover,{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label.active'
			]
		);

		$this->add_control(
			'layout_border_radius_hover',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label.active' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'layout_shadow_hover',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label:hover,{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label.active'
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

		$this->add_control(
			'layout_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_responsive_control(
			'layout_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li label' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
		
		$this->add_responsive_control(
			'layout_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-fpg-toolbar .kea-fpg-view-options li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
		$settings_id = $this->get_id();
        if ( $settings['list2'] ) { ?>

       <form id="kea_fpg_form-<?php echo $settings_id; ?>" name="kea_fpg_form-<?php echo $settings_id; ?>" class="kea-fpg-toolbar">
           <?php if ($settings['filter_menu']) { ?>
            <ul class="kea-fpg-search-wrapper">
                <li class="kea-fpg-mobile-icon"><label><span class="dashicons dashicons-menu-alt"></span></label></li>
                <?php foreach ( $settings['list2'] as $item ) { ?> 
                <li>
                    <input id="kea-fpg-filter-<?php echo $settings_id; ?>-<?php echo esc_attr($item['filter_id']); ?>" type="radio" <?php if ($item['filter_default']) { ?>checked="checked"<?php } ?> name="filter" value="<?php echo esc_attr($item['filter_id']); ?>" style="display:none">
                    <label for="kea-fpg-filter-<?php echo $settings_id; ?>-<?php echo esc_attr($item['filter_id']); ?>" <?php if ($item['filter_default']) { ?>class="active"<?php } ?>><?php echo $item['filter_name']; ?></label>
                </li>
                <?php } ?>
            </ul>
            <?php } ?>
            <?php if ($settings['layout_menu']) { ?>
            <ul class="kea-fpg-view-options">
              <li>
				<input id="kea-fpg-show-grid-<?php echo $settings_id; ?>" type="radio" <?php if ($settings['layout_default'] == 'kea-fpg-grid-view') { ?>checked="checked"<?php } ?> name="view" value="show-grid" style="display:none">
                <label for="kea-fpg-show-grid-<?php echo $settings_id; ?>" <?php if ($settings['layout_default'] == 'kea-fpg-grid-view') { ?>class="active"<?php } ?>><span class="dashicons dashicons-grid-view"></span></label>
              </li>
              <li>
                <input id="kea-fpg-show-list-<?php echo $settings_id; ?>" type="radio" <?php if ($settings['layout_default'] == 'kea-fpg-list-view') { ?>checked="checked"<?php } ?> name="view" value="show-list" style="display:none">
                <label for="kea-fpg-show-list-<?php echo $settings_id; ?>" <?php if ($settings['layout_default'] == 'kea-fpg-list-view') { ?>class="active"<?php } ?>><span class="dashicons dashicons-list-view"></span></label>
              </li>
            </ul>
            <?php } ?>
          </form>
        <?php } ?>

        <?php if ( $settings['list'] ) { ?>
          <ol class="kea-fpg-container <?php echo $settings['layout_default'] . ' ' . $settings['grid_txt_placement']; ?> kea-fpg-zoom-in" style="display:none;">
          <?php foreach ( $settings['list'] as $item ) { ?> 
            <li data-filter="<?php echo $item['item_filter_ids']; ?>" class="elementor-repeater-item-<?php echo $item['_id']; ?>">
            <div class="kea-fpg-inner elementor-animation-<?php echo esc_attr($settings['grid_item_animation']); ?>">
            <?php
            $target = $item['website_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $item['website_link']['nofollow'] ? ' rel="nofollow"' : '';
            if ($item['website_link']['url']) {
                echo '<a href="' . esc_url($item['website_link']['url']) . '"' . $target . $nofollow . '>';
            }
            ?>
              <figure>
                <?php
                $img_url = '';
                $img_alt = '';
                if ($item['image']['url'] && $item['image']['url'] != \Elementor\Utils::get_placeholder_image_src()) {
                    $img_array = wp_get_attachment_image_src($item['image']['id'], $settings['img_size'], true);
                    $img_url = $img_array[0];
                    $img_alt = get_post_meta( $item['image']['id'], '_wp_attachment_image_alt', true );
                } else if ($item['image']['url'] == \Elementor\Utils::get_placeholder_image_src()) {
                    $img_url = \Elementor\Utils::get_placeholder_image_src();
                }
                if (!empty($img_url)) {
                    echo '<img src="' . $img_url . '" alt="' . $img_alt . '" />';
                }
                ?>
                <figcaption>
                <?php 
                if (!empty($item['title'])) {
                    echo '<' . $settings['title_html_tag'] . ' class="kea-fpg-title">' . $item['title'] . '</' . $settings['title_html_tag'] . '>'; 
                }
                if (!empty($item['info'])) {
                    echo '<' . $settings['info_html_tag'] . ' class="kea-fpg-info">' . do_shortcode($item['info']) . '</' . $settings['info_html_tag'] . '>'; 
                }
                ?>
                </figcaption>
              </figure>
              <?php if ($item['website_link']['url']) { echo '</a>'; } ?>
            </div>
            </li>
          <?php } ?>
          </ol>
    <?php } 
    }

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Portfolio_Grid() );