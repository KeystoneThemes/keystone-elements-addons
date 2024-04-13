<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Business_Hours extends Widget_Base {

	public function get_name() {
		return 'cj-business_hours';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Business Hours', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-business_hours' ];
	}
    
    public function get_icon() {
		return 'eicon-clock-o';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Business Hours', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT
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
				'default' => 'h3',
			]
		);

		$this->add_control(
			'hr_bh_1',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'day', [
				'label' => esc_html__( 'Day', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'time', [
				'label' => esc_html__( 'Time', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'style_row',
			[
				'label' => esc_html__( 'Style This Day', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $repeater->add_control(
			'day_color',
			[
				'label' => esc_html__( 'Day Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'condition' => ['style_row' => 'yes'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cj-business-day' => 'color: {{VALUE}};'
				]
			]
		);
        
        $repeater->add_control(
			'time_color',
			[
				'label' => esc_html__( 'Time Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'condition' => ['style_row' => 'yes'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cj-business-time' => 'color: {{VALUE}};'
				]
			]
		);
        
        $repeater->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'condition' => ['style_row' => 'yes'],
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Items', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
						'day' => esc_html__( 'Monday', 'keystone-elements-addons' ),
						'time' => esc_html__( '08:00 - 19:00', 'keystone-elements-addons' ),
                        'day_color' => '',
                        'time_color' => '',
                        'bg_color' => '',
					],
                    [
						'day' => esc_html__( 'Tuesday', 'keystone-elements-addons' ),
						'time' => esc_html__( '08:00 - 19:00', 'keystone-elements-addons' ),
                        'day_color' => '',
                        'time_color' => '',
                        'bg_color' => '',
					],
                    [
						'day' => esc_html__( 'Wednesday', 'keystone-elements-addons' ),
						'time' => esc_html__( '08:00 - 19:00', 'keystone-elements-addons' ),
                        'day_color' => '',
                        'time_color' => '',
                        'bg_color' => '',
					],
                    [
						'day' => esc_html__( 'Thursday', 'keystone-elements-addons' ),
						'time' => esc_html__( '08:00 - 19:00', 'keystone-elements-addons' ),
                        'day_color' => '',
                        'time_color' => '',
                        'bg_color' => '',
					],
                    [
						'day' => esc_html__( 'Friday', 'keystone-elements-addons' ),
						'time' => esc_html__( '08:00 - 19:00', 'keystone-elements-addons' ),
                        'day_color' => '',
                        'time_color' => '',
                        'bg_color' => '',
					],
                    [
						'day' => esc_html__( 'Saturday', 'keystone-elements-addons' ),
						'time' => esc_html__( '08:00 - 19:00', 'keystone-elements-addons' ),
                        'day_color' => '',
                        'time_color' => '',
                        'bg_color' => '',
					],
                    [
						'day' => esc_html__( 'Sunday', 'keystone-elements-addons' ),
						'time' => esc_html__( 'Closed', 'keystone-elements-addons' ),
                        'day_color' => '',
                        'time_color' => '',
                        'bg_color' => '',
					],
				],
				'title_field' => '{{{ day }}}',
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

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-business-hours-title' => 'color: {{VALUE}};'
				]
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				'name' => 'title_typography',
				
				'selector' => '{{WRAPPER}} .cj-business-hours-title',
			]
		);

		$this->add_responsive_control(
			'title_align',
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
					'{{WRAPPER}} .cj-business-hours-title' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'title_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-business-hours-title',
			]
		);
        
        $this->add_control(
			'title_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'title_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-business-hours-title'
			]
		);
        
        $this->add_responsive_control(
			'title_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-business-hours-title' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'title_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-business-hours-title'
			]
		);
        
        $this->add_control(
			'title_hr_2',
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
                    '{{WRAPPER}} .cj-business-hours-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
                    '{{WRAPPER}} .cj-business-hours-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_list_item_style',
			[
				'label' => esc_html__( 'List Item', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'list_item_padding',
			[
				'label' => esc_html__( 'Item Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-business-hour' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'hr_list_item_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'list_item_divider_color',
			[
				'label' => esc_html__( 'Border Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-business-hour' => 'border-bottom-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_responsive_control(
			'list_item_divider_width',
			[
				'label' => esc_html__( 'Border Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 20,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 0,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-business-hour' => 'border-bottom-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'list_item_divider_style',
			[
				'label' => esc_html__( 'Border Style', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'solid' => esc_html__( 'Solid', 'keystone-elements-addons' ),
					'dashed' => esc_html__( 'Dashed', 'keystone-elements-addons' ),
                    'dotted' => esc_html__( 'Dotted', 'keystone-elements-addons' ),
                    'double' => esc_html__( 'Double', 'keystone-elements-addons' )
				],
				'default' => 'solid',
                'selectors' => [
                    '{{WRAPPER}} .cj-business-hour' => 'border-bottom-style: {{VALUE}};'
				],
			]
		);
        
        $this->end_controls_section();

		$this->start_controls_section(
			'section_day_time_style',
			[
				'label' => esc_html__( 'Day and Time', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'day_width',
			[
				'label' => esc_html__( 'Day Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%'],
				'range' => [
                    '%' => [
						'min' => 0,
						'max' => 90,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-business-day' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-business-time' => 'width: calc(100% - {{SIZE}}{{UNIT}});'
				],
			]
		);
        
        $this->add_control(
			'day_color',
			[
				'label' => esc_html__( 'Day Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-business-day' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Day Typography', 'keystone-elements-addons' ),
				'name' => 'day_typography',
				
				'selector' => '{{WRAPPER}} .cj-business-day',
			]
		);
        
        $this->add_responsive_control(
			'day_align',
			[
				'label' => esc_html__( 'Day Alignment', 'keystone-elements-addons' ),
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
                'default' => 'left',
				'selectors' => [
					'{{WRAPPER}} .cj-business-day' => 'text-align: {{VALUE}};'
				],
				'toggle' => false
			]
		);
        
        $this->add_control(
			'hr_day_color_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'time_color',
			[
				'label' => esc_html__( 'Time Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-business-time' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
                'label' => esc_html__( 'Time Typography', 'keystone-elements-addons' ),
				'name' => 'time_typography',
				
				'selector' => '{{WRAPPER}} .cj-business-time',
			]
		);
        
        $this->add_responsive_control(
			'time_align',
			[
				'label' => esc_html__( 'Time Alignment', 'keystone-elements-addons' ),
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
                'default' => 'right',
				'selectors' => [
					'{{WRAPPER}} .cj-business-time' => 'text-align: {{VALUE}};'
				],
				'toggle' => false
			]
		);
       
		$this->end_controls_section();
  
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display(); ?>
		<?php if ( $settings['title'] ) {
			echo '<' . $settings['html_tag'] . ' class="cj-business-hours-title">' . esc_html($settings['title']) . '</' . $settings['html_tag'] . '>';
		} ?>
		<?php if ( $settings['list'] ) { ?>
        <div class="cj-business-hours">
            <?php foreach ( $settings['list'] as $item ) { ?> 
            <div class="cj-business-hour elementor-repeater-item-<?php echo $item['_id']; ?>">
                <div class="cj-business-day">
                    <?php echo esc_html($item['day']); ?>
                </div>
                <div class="cj-business-time">
                     <?php echo esc_html($item['time']); ?>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php
		}
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Business_Hours() );