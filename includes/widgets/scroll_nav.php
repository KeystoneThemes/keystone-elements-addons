<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Scroll_Nav extends Widget_Base {

	public function get_name() {
		return 'cj-scroll_nav';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Scroll Navigation', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-scroll_nav', 'elementor-icons-fa-solid', 'elementor-icons-fa-regular' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-scroll_nav' ];
	}

	public function get_icon() {
		return ' eicon-navigation-vertical';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'scroll_nav_content',
  			[
  				'label' => esc_html__( 'Scroll Navigation', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
        );
        
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
			'section_id',
			[
                'label' => esc_html__( 'ID', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Use only use latin characters and dashes. You must enter the same ID to the destination section.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
		);

        $repeater->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'section-id-1',
                'label_block' => true
			]
        );
        
        $repeater->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
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
						'title' => esc_html__( 'Title #1', 'keystone-elements-addons' ),
						'section_id' => esc_html__( 'section-id-1', 'keystone-elements-addons' )
					],
					[
                        'title' => esc_html__( 'Title #2', 'keystone-elements-addons' ),
						'section_id' => esc_html__( 'section-id-2', 'keystone-elements-addons' )
					],
				],
				'title_field' => '{{{ title }}}',
			]
        );
        
        $this->end_controls_section();  

		$this->start_controls_section(
			'section_container_style',
			[
				'label' => esc_html__( 'Container', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_control(
			'position',
			[
				'label' => esc_html__( 'Position', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'ks-scroll-nav-right',
				'options' => [
					'ks-scroll-nav-right'  => esc_html__( 'Center Right', 'keystone-elements-addons' ),
                    'ks-scroll-nav-left'  => esc_html__( 'Center Left', 'keystone-elements-addons' ),
                    'ks-scroll-nav-right-top'  => esc_html__( 'Top Right', 'keystone-elements-addons' ),
                    'ks-scroll-nav-left-top'  => esc_html__( 'Top Left', 'keystone-elements-addons' ),
                    'ks-scroll-nav-right-bottom'  => esc_html__( 'Bottom Right', 'keystone-elements-addons' ),
					'ks-scroll-nav-left-bottom'  => esc_html__( 'Bottom Left', 'keystone-elements-addons' ),
				],
			]
        );
        
        $this->add_responsive_control(
			'container_margin',
			[
				'label' => esc_html__( 'Container Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-scroll-nav' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'label_spacing',
			[
				'label' => esc_html__( 'Item Spacing (px)', 'keystone-elements-addons' ),
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
					'size' => 5,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-scroll-nav li' => 'margin: {{SIZE}}{{UNIT}} 0;'
				],
			]
        );

        $this->add_control(
			'display_text', [
				'label' => esc_html__( 'Display Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
		);

        $this->end_controls_section();

		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['display_text' => 'yes'],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				
				'selector' => '{{WRAPPER}} .cj-scroll-nav-item-text',
			]
        );
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-scroll-nav-item-text' => 'color: {{VALUE}};'
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-scroll-nav-item-text',
			]
        );
        
        $this->add_control(
			'hr_title_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-scroll-nav-item-text'
			]
		);
        
        $this->add_responsive_control(
			'title_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-scroll-nav-item-text' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-scroll-nav-item-text'
			]
		);

        $this->add_control(
			'hr_title_2',
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
                    '{{WRAPPER}} .cj-scroll-nav-item-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                    '{{WRAPPER}} .cj-scroll-nav-item-text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        $this->add_control(
			'hr_title_3',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_responsive_control(
			'title_icon_size',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 1,
					],
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-scroll-nav-item-text i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
        );

        $this->add_control(
			'title_icon_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cj-scroll-nav-item-text i' => 'color: {{VALUE}};'
				],
			]
        );

        $this->add_responsive_control(
			'title_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-scroll-nav-item-text i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
    
        $this->end_controls_section();

        $this->start_controls_section(
			'section_dots_style',
			[
				'label' => esc_html__( 'Navigation Dots', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->start_controls_tabs( 'tabs_dots_style' );
        
        $this->start_controls_tab(
			'tab_dots_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons'),
			]
        );
        
        $this->add_responsive_control(
			'dots_size',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
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
					'size' => 14,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-scroll-nav-item-icon' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'dots_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(0,0,0,0.5)',
				'selectors' => [
					'{{WRAPPER}} .cj-scroll-nav-item-icon' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_dots_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons'),
			]
        );
        
        $this->add_responsive_control(
			'dots_hover_size',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
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
					'size' => 14,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-scroll-nav-item-icon' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-scroll-nav-item-icon:hover' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-scroll-nav-item-active .cj-scroll-nav-item-icon' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-scroll-nav-item-hover .cj-scroll-nav-item-icon' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
        );

        $this->add_control(
			'dots_hover_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
                    '{{WRAPPER}} .cj-scroll-nav-item-icon:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj-scroll-nav-item-active .cj-scroll-nav-item-icon' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj-scroll-nav-item-hover .cj-scroll-nav-item-icon' => 'color: {{VALUE}};',
				],
			]
		);

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();  
  
	}

	/**
	 * Render 
	 */
	protected function render( ) {
        $settings = $this->get_settings_for_display();
        if ( $settings['list'] ) {
        ?>
        <div id="cj-scroll-nav-<?php echo esc_attr($this->get_id()); ?>" class="cj-scroll-nav-wrapper <?php echo $settings['position']; ?>">
           <ul class="cj-scroll-nav">
           <?php $i = 0; ?>
           <?php foreach ( $settings['list'] as $item ) { ?>
                <li id="cj-scroll-nav-item-<?php echo $item['_id']; ?>" class="<?php if ($i == 0) { echo 'cj-scroll-nav-item-active'; } ?>">
                    <a href="#<?php echo $item['section_id']; ?>">
                    <?php if ( $settings['display_text'] ) { ?><span class="cj-scroll-nav-item-text"><?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?><?php echo $item['title']; ?></span><?php } ?><span class="cj-scroll-nav-item-icon"><i class="fas fa-circle"></i></span>
                    </a>
                </li>
            <?php $i ++; ?>     
            <?php } ?>
           </ul> 
		</div>
	    <?php
        }
    } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Scroll_Nav() );