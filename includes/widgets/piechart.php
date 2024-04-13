<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Piechart extends Widget_Base {

	public function get_name() {
		return 'cj-piechart';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Pie Chart', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-piechart' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-piechart' ];
	}

	public function get_icon() {
		return 'eicon-counter-circle';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'piechart_content',
  			[
  				'label' => esc_html__( 'Pie Chart', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
  			]
  		);
        
        $this->add_control(
			'percent',
			[
				'label' => esc_html__( 'Percent', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1,
				'step' => 0.01,
				'default' => 0.6,
			]
		);
        
        $this->add_control(
			'percent_switcher',
			[
				'label' => esc_html__( 'Display Percent Sign', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->add_control(
			'piechart_content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'dynamic' => [
					'active' => true,
				],
			]
		);
        
        $this->add_control(
			'title_v_align',
			[
				'label' => esc_html__( 'Title Position', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'column-reverse' => [
						'title' => esc_html__( 'Top', 'keystone-elements-addons' ),
						'icon' => 'eicon-v-align-top',
					],
					'column' => [
						'title' => esc_html__( 'Bottom', 'keystone-elements-addons' ),
						'icon' => 'eicon-v-align-bottom',
					],
				],
				'default' => 'column',
				'selectors' => [
					'{{WRAPPER}} .cj-piechart-text' => 'flex-direction: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'piechart_content_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'piechart_width',
			[
				'label' => esc_html__( 'Chart Size (px)', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
                    'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 300,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-piechart' => 'max-width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-piechart canvas' => 'max-height: {{SIZE}}{{UNIT}}; max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'anim_duration',
			[
				'label' => esc_html__( 'Animation Duration (ms)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 10000,
				'step' => 100,
				'default' => 1000
			]
		);
        
        $this->add_control(
			'scroll_anim_switcher',
			[
				'label' => esc_html__( 'Scroll Based Animation', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Activate animation when the pie chart scrolls into view.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_piechart_style',
			[
				'label' => esc_html__( 'Pie Chart', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'piechart_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .cj-piechart' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'piechart_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'piechart_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-piechart'
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'piechart_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-piechart'
			]
		);
        
        $this->add_control(
			'piechart_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_responsive_control(
			'piechart_h_align',
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
					'{{WRAPPER}} .cj-piechart-wrapper' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'piechart_pad',
			[
				'label' => esc_html__( 'Padding (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 500,
				'step' => 1,
                'default' => 0,
                'selectors' => [
					'{{WRAPPER}} .cj-piechart' => 'padding: {{VALUE}}px;',
				],
			]
		);
    
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_bar_style',
			[
				'label' => esc_html__( 'Bar', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'thickness',
			[
				'label' => esc_html__( 'Thickness Ratio', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ '%'],
                'range' => [
					'%' => [
						'min' => 2,
						'max' => 100,
					],
				],
                'default' => [
					'unit' => '%',
					'size' => 15,
				]
			]
		);
        
        $this->add_control(
			'bar_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => '#2ecc71'
			]
		);
        
        $this->add_control(
			'empty_bar_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0,0,0,0.1)'
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_text_style',
			[
				'label' => esc_html__( 'Text', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'text_heading',
			[
				'label' => esc_html__( 'Percent', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'none',
			]
		);
        
        $this->add_control(
			'percent_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .cj-piechart-percent' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'percent_typography',
				
				'selector' => '{{WRAPPER}} .cj-piechart-percent'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'percent_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-piechart-percent',
			]
		);
        
        $this->add_control(
			'text_heading_2',
			[
				'label' => esc_html__( 'Percent Sign', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'percent_sign_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .cj-piechart-percent span' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'percent_sign_typography',
				
				'selector' => '{{WRAPPER}} .cj-piechart-percent span'
			]
		);
        
        $this->add_control(
			'percent_sign_valign',
			[
				'label' => esc_html__( 'Vertical Align', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'super',
				'options' => [
					'top' => esc_html__( 'Top', 'keystone-elements-addons' ),
                    'text-top' => esc_html__( 'Text Top', 'keystone-elements-addons' ),
                    'middle'  => esc_html__( 'Middle', 'keystone-elements-addons' ),
					'bottom' => esc_html__( 'Bottom', 'keystone-elements-addons' ),
                    'text-bottom' => esc_html__( 'Text Bottom', 'keystone-elements-addons' ),
                    'super'  => esc_html__( 'Super', 'keystone-elements-addons' ),
                    'sub'  => esc_html__( 'Sub', 'keystone-elements-addons' ),
                    'baseline'  => esc_html__( 'Baseline', 'keystone-elements-addons' ),
				],
                'selectors' => [
					'{{WRAPPER}} .cj-piechart-percent span' => 'vertical-align: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'text_heading_3',
			[
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .cj-piechart-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				
				'selector' => '{{WRAPPER}} .cj-piechart-title'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-piechart-title',
			]
		);
    
        $this->end_controls_section();
  
	}

	/**
	 * Render 
	 */
	protected function render( ) {
		$settings = $this->get_settings_for_display();
        ?>
        <div id="cj-piechart-<?php echo esc_attr($this->get_id()); ?>" class="cj-piechart-wrapper">
            <div class="cj-piechart" data-value="<?php echo esc_attr($settings['percent']); ?>" data-size="<?php echo esc_attr($settings['piechart_width']['size']); ?>" data-pad="<?php echo esc_attr($settings['piechart_pad']); ?>" data-thickness="<?php echo esc_attr($settings['thickness']['size']); ?>" data-fillcolor="<?php echo esc_attr($settings['bar_color']); ?>" data-emptyfill="<?php echo esc_attr($settings['empty_bar_color']); ?>" data-animduration="<?php echo $settings['anim_duration']; ?>" <?php if ($settings['percent_switcher']) { ?>data-dpercent<?php } ?> <?php if ($settings['scroll_anim_switcher']) { ?>data-scrollanim<?php } ?>>
                <div class="cj-piechart-text">
                    <div class="cj-piechart-percent">0<span>%</span></div>
                    <div class="cj-piechart-title"><?php echo esc_html($settings['title']); ?></div>
                </div>
				<canvas class="cj-placeholder-piechart" width="<?php echo esc_attr($settings['piechart_width']['size']) * 2; ?>" height="<?php echo esc_attr($settings['piechart_width']['size']) * 2; ?>" style="height:<?php echo esc_attr($settings['piechart_width']['size']); ?>px;width:<?php echo esc_attr($settings['piechart_width']['size']); ?>px;"></canvas>
            </div>
		</div>
	<?php
    } 

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Piechart() );