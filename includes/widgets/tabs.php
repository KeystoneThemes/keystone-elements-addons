<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Tabs extends Widget_Base {

	public function get_name() {
		return 'cj-tabs';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Tabs', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-tabs' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-lib-tabs', 'cj-tabs' ];
	}
    
    public function get_icon() {
		return 'eicon-tabs';
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
			'title_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS
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
			'image',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::MEDIA
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
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Tabs', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
						'title_icon' => '',
						'title' => esc_html__( 'Title #1', 'keystone-elements-addons' ),
						'image' => '',
						'text' => esc_html__( 'Item content...', 'keystone-elements-addons' )
					],
					[
                        'title_icon' => '',
						'title' => esc_html__( 'Title #2', 'keystone-elements-addons' ),
						'image' => '',
						'text' => esc_html__( 'Item content...', 'keystone-elements-addons' )
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->add_control(
			'tabs_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
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
				
				'selector' => '{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title',
			]
		);
        
        $this->start_controls_tabs( 'tabs_title_style' );
        
        $this->start_controls_tab(
			'tab_title_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_responsive_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_border_color',
			[
				'label' => esc_html__( 'Border Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title' => 'background: {{VALUE}};'
				]
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_title_active',
			[
				'label' => esc_html__( 'Active', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_responsive_control(
			'title_active_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li.is-open,{{WRAPPER}} .keaccordion-mobile-title.is-open' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_active_border_color',
			[
				'label' => esc_html__( 'Border Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li.is-open,{{WRAPPER}} .keaccordion-mobile-title.is-open' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_active_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li.is-open,{{WRAPPER}} .keaccordion-mobile-title.is-open' => 'background: {{VALUE}};'
				]
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'title_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'tab_layout',
			[
				'label' => esc_html__( 'Layout', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 't-horizontal',
				'options' => [
                    't-horizontal'  => esc_html__( 'Horizontal', 'keystone-elements-addons' ),
                    't-vertical'  => esc_html__( 'Vertical', 'keystone-elements-addons' ),
					't-vertical-reverse'  => esc_html__( 'Vertical Reverse', 'keystone-elements-addons' )
                ]
			]
        );
		
		$this->add_responsive_control(
			'title_h_align',
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
					'{{WRAPPER}} .cj_tab_head' => 'justify-content: {{VALUE}};',
				],
				'condition' => [
                    'tabs_layout' => 'horizontal'
                ],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'title_width',
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
					'{{WRAPPER}} .cj_tab_head li' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'title_align',
			[
				'label' => esc_html__( 'Text Alignment', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title' => 'text-align: {{VALUE}};'
				],
				'toggle' => true,
			]
		);

        $this->add_control(
			'title_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'title_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'title_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj_tab_head li,{{WRAPPER}} .keaccordion-mobile-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
           
        $this->end_controls_section();
        
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
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj_tab_head li svg' => 'fill: {{VALUE}}',
					'{{WRAPPER}} .keaccordion-mobile-title i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .keaccordion-mobile-title svg' => 'fill: {{VALUE}}',
				]
			]
		);
        
        $this->add_control(
			'icon_active_color',
			[
				'label' => esc_html__( 'Active Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_head li.is-open i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .keaccordion-mobile-title.is-open i' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px','rem' ],
                'selectors' => [
					'{{WRAPPER}} .cj_tab_head li i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .keaccordion-mobile-title i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'icon_block',
			[
				'label' => esc_html__( 'Block', 'keystone-elements-addons' ),
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
        
        $this->add_responsive_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj_tab_head li i,{{WRAPPER}} .keaccordion-mobile-title i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
				
				'selector' => '{{WRAPPER}} .keaccordion__body,{{WRAPPER}} .keaccordion__body p',
			]
		);

		$this->add_responsive_control(
			'v_align',
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
				'default' => 'flex-start',
				'selectors' => [
					'{{WRAPPER}} .keaccordion-inner' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'content_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .keaccordion__body,{{WRAPPER}} .keaccordion__body p' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'content_border_color',
			[
				'label' => esc_html__( 'Border Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_item.keaccordion' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj_tab_item.keaccordion' => 'background-color: {{VALUE}};'
				]
			]
		);

        $this->add_responsive_control(
			'content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj_tab_item.keaccordion' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj_tab_item.keaccordion,{{WRAPPER}} .keaccordion-mobile-title',
			]
        );
        
        $this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj_tab_item.keaccordion' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_image_style',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'content_img_width',
			[
				'label' => esc_html__( 'Maximum Container Width', 'keystone-elements-addons' ),
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
				'default' => [
					'unit' => '%',
					'size' => 30,
				],
				'selectors' => [
                    '{{WRAPPER}} .keaccordion-img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'content_img_max_width',
			[
				'label' => esc_html__( 'Maximum Image Width', 'keystone-elements-addons' ),
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
                    '{{WRAPPER}} .keaccordion-img img' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'content_img_h_align',
			[
				'label' => esc_html__( 'Horizontal Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'row' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-left',
					],
					'row-reverse' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-h-align-right',
					],
				],
				'default' => 'row',
				'selectors' => [
					'{{WRAPPER}} .keaccordion-inner' => 'flex-direction: {{VALUE}};',
				],
                'toggle' => false
			]
		);

		$this->add_control(
			'content_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .keaccordion-img img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_img_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .keaccordion-img img',
			]
        );
		
		$this->add_responsive_control(
			'content_img_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .keaccordion-img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();

	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
		$rand = '-' . wp_rand();
        if ( $settings['list'] ) { ?>
            <div class="cj-tabs <?php echo $settings['tab_layout']; ?>">
                <ul class="cj_tab_head <?php if ($settings['icon_block'] == 'true') { ?>cj-tabs-block-icon<?php } ?>">
                    <?php $menu_count = 0; ?>
                    <?php $tab_count = 0; ?>
                    <?php foreach ( $settings['list'] as $item ) { ?> 
                    <li <?php if ($menu_count == 0) { ?>class="is-open"<?php } ?> data-opentab="cj-<?php echo $item['_id'] . $rand; ?>">
                        <?php \Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $item['title']; ?>
                    </li>
                    <?php $menu_count++; ?>
                    <?php } ?>
                </ul>
				<?php foreach ( $settings['list'] as $item ) { ?>	
				<div class="keaccordion-mobile-title <?php if ($tab_count == 0) { ?>is-open<?php } ?>" data-opentab="cj-<?php echo $item['_id'] . $rand; ?>">
				<?php \Elementor\Icons_Manager::render_icon( $item['title_icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $item['title']; ?>
				</div>	
                <div class="keaccordion cj_tab_item <?php if ($tab_count == 0) { ?>is-open<?php } ?>" id="cj-<?php echo $item['_id'] . $rand; ?>" <?php if ($settings['hash']) { ?>data-hash="#cj-<?php echo $item['_id'] . $rand; ?>"<?php } ?>>
                    <div class="keaccordion__body">
						<div class="keaccordion-inner">
							<?php if ($item['image']['url']) { ?>
							<div class="keaccordion-img">
								<img src="<?php echo esc_url($item['image']['url']); ?>" alt="<?php echo esc_attr($item['title']); ?>" />
							</div>
							<?php } ?>
							<div class="keaccordion-text"><?php echo $item['text']; ?></div>
						</div>
                    </div>
                </div>
                <?php $tab_count++; ?>
                <?php } ?>
			</div>
			<?php 
			$breakpoint = get_option('elementor_viewport_md');
			if (empty($breakpoint)) { $breakpoint = '768'; }
			?>
			<style>
				@media screen and (max-width: <?php echo $breakpoint; ?>px) {
					.keaccordion-mobile-title {display:block !important;}
					ul.cj_tab_head {display:none !important;}
					.cj_tab_item.keaccordion {margin-bottom:-1px !important;}
					.cj-tabs.t-vertical,.cj-tabs.t-vertical-reverse {flex-direction: column !important;}
				}
			</style>
            <?php
		}
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Tabs() );