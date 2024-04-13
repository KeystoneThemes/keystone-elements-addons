<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

if (!defined( 'WP_USE_THEMES' )) {
    define ('WP_USE_THEMES', true);
}

class Widget_KEA_bbpress_content extends Widget_Base {

	public function get_name() {
		return 'cj-bbpress_content';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'bbPress Content', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-bbpress_content' ];
	}
    
    public function get_icon() {
		return 'eicon-comments';
	}
    
	protected function register_controls() {
        // section start
		$this->start_controls_section(
			'form_content',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $this->add_control(
			'form',
			[
				'label' => esc_html__( 'Select Form', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'bbp-forum-index',
				'options' => [
					'bbp-forum-index' => esc_html__( 'Forum Index', 'keystone-elements-addons' ),
                    'bbp-single-forum' => esc_html__( 'Single Forum', 'keystone-elements-addons' ),
                    'bbp-topic-index' => esc_html__( 'Topic Index', 'keystone-elements-addons' ),
                    'bbp-single-topic' => esc_html__( 'Single Topic', 'keystone-elements-addons' ),
                    'bbp-single-reply' => esc_html__( 'Single Reply', 'keystone-elements-addons' )
				]
			]
        );

        $this->add_control(
			'forum_id',
			[
				'label' => esc_html__( 'Forum (Optional)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => KEA_get_forums(),
				'condition' => ['form' => 'bbp-single-forum'],
			]
        );
        
        $this->add_control(
			'topic_id',
			[
				'label' => esc_html__( 'Topic (Optional)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => KEA_get_topics(),
				'condition' => ['form' => 'bbp-single-topic'],
			]
        );
        
        $this->add_control(
			'reply_id',
			[
				'label' => esc_html__( 'Reply ID', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 999999,
                'step' => 1,
                'condition' => ['form' => 'bbp-single-reply'],
			]
		);
       
		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_form_container_style',
			[
				'label' => esc_html__( 'Container', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'form_width',
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
                'default' => [
					'unit' => '%',
					'size' => 100,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper > .cj-form-wrapper-inner' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'form_align',
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
					'{{WRAPPER}} .cj-form-wrapper' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_control(
			'form_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
         $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'form_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-form-wrapper > .cj-form-wrapper-inner',
			]
		);
        
        $this->add_control(
			'form_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_control(
			'label_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} .cj-form-wrapper-inner' => 'color: {{VALUE}};',
					'{{WRAPPER}} .cj-form-wrapper-inner p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner label' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner,{{WRAPPER}} .cj-form-wrapper-inner p,{{WRAPPER}} .cj-form-wrapper-inner label',
			]
		);
        
        $this->add_control(
			'form_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'form_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper > .cj-form-wrapper-inner'
			]
		);
        
        $this->add_responsive_control(
			'form_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper > .cj-form-wrapper-inner' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'form_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper > .cj-form-wrapper-inner'
			]
		);
        
        $this->add_control(
			'form_hr_4',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'form_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-form-wrapper > .cj-form-wrapper-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'form_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-form-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_table_style',
			[
				'label' => esc_html__( 'Table', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'table_typography',
				
				'selector' => '{{WRAPPER}} #bbpress-forums ul.bbp-forums,{{WRAPPER}} #bbpress-forums ul.bbp-lead-topic,{{WRAPPER}} #bbpress-forums ul.bbp-replies,{{WRAPPER}} #bbpress-forums ul.bbp-topics'
			]
        );

        $this->add_control(
			'table_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums ul.bbp-forums' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums ul.bbp-lead-topic' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #bbpress-forums ul.bbp-replies' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #bbpress-forums ul.bbp-topics' => 'color: {{VALUE}};',
				]
			]
        );
        
        $this->add_control(
			'table_link_color',
			[
				'label' => esc_html__( 'Link Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums ul.bbp-forums a' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums ul.bbp-lead-topic a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #bbpress-forums ul.bbp-replies a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #bbpress-forums ul.bbp-topics a' => 'color: {{VALUE}};',
				]
			]
        );
        
        $this->add_control(
			'table_link_hover_color',
			[
				'label' => esc_html__( 'Link Hover Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums ul.bbp-forums a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums ul.bbp-lead-topic a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #bbpress-forums ul.bbp-replies a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} #bbpress-forums ul.bbp-topics a:hover' => 'color: {{VALUE}};',
				]
			]
        );
        
        $this->add_control(
			'table_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'table_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} #bbpress-forums ul.bbp-forums,{{WRAPPER}} #bbpress-forums ul.bbp-lead-topic,{{WRAPPER}} #bbpress-forums ul.bbp-replies,{{WRAPPER}} #bbpress-forums ul.bbp-topics'
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'table_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} #bbpress-forums ul.bbp-forums,{{WRAPPER}} #bbpress-forums ul.bbp-lead-topic,{{WRAPPER}} #bbpress-forums ul.bbp-replies,{{WRAPPER}} #bbpress-forums ul.bbp-topics'
			]
        );
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_table_header_style',
			[
				'label' => esc_html__( 'Table Header & Footer', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'table_header_typography',
				
				'selector' => '{{WRAPPER}} #bbpress-forums li.bbp-footer,{{WRAPPER}} #bbpress-forums li.bbp-header'
			]
        );

        $this->add_control(
			'table_header_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums li.bbp-footer' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums li.bbp-header' => 'color: {{VALUE}};',
				]
			]
        );

        $this->add_control(
			'table_header_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums li.bbp-footer' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums li.bbp-header' => 'background-color: {{VALUE}};',
				]
			]
        );

        $this->add_control(
			'table_header_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'table_header_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} #bbpress-forums li.bbp-footer,{{WRAPPER}} #bbpress-forums li.bbp-header'
			]
        );
        
        $this->add_responsive_control(
			'table_header_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums li.bbp-footer' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #bbpress-forums li.bbp-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
		$this->end_controls_section();
		
		 // section start
		 $this->start_controls_section(
			'section_table_sub_header_style',
			[
				'label' => esc_html__( 'Table Subheader', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
				'conditions'   => [
                    'relation' => 'or',
                    'terms' => [
                        [
                            'name'  => 'form',
                            'value' => 'bbp-single-topic',
                        ],
                        [
                            'name'  => 'form',
                            'value' => 'bbp-single-reply',
                        ]
                    ]
                ],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'table_sub_header_typography',
				
				'selector' => '{{WRAPPER}} #bbpress-forums div.bbp-forum-header,{{WRAPPER}} #bbpress-forums div.bbp-reply-header,{{WRAPPER}} #bbpress-forums div.bbp-topic-header'
			]
        );

        $this->add_control(
			'table_sub_header_color',
			[
				'label' => esc_html__( 'Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums div.bbp-forum-header' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-reply-header' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-topic-header' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-forum-header a' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-reply-header a' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-topic-header a' => 'color: {{VALUE}};',
				]
			]
        );

        $this->add_control(
			'table_sub_header_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums div.bbp-forum-header' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-reply-header' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-topic-header' => 'background-color: {{VALUE}};',
				]
			]
        );

        $this->add_control(
			'table_sub_header_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'table_sub_header_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} #bbpress-forums div.bbp-forum-header,{{WRAPPER}} #bbpress-forums div.bbp-reply-header,{{WRAPPER}} #bbpress-forums div.bbp-topic-header'
			]
        );
        
        $this->add_responsive_control(
			'table_sub_header_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums div.bbp-forum-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-reply-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} #bbpress-forums div.bbp-topic-header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_table_row_style',
			[
				'label' => esc_html__( 'Table Row', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'table_row_typography',
				
				'selector' => '{{WRAPPER}} #bbpress-forums .bbp-forum-info .bbp-forum-content,{{WRAPPER}} #bbpress-forums p.bbp-topic-meta'
			]
        );

        $this->add_control(
			'table_row_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} #bbpress-forums li.bbp-body ul' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums li.bbp-body div.hentry' => 'background-color: {{VALUE}};'
				]
			]
        );

        $this->add_control(
			'table_row_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'table_row_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} #bbpress-forums li.bbp-body ul,{{WRAPPER}} #bbpress-forums li.bbp-body div.hentry'
			]
        );
        
        $this->add_responsive_control(
			'table_row_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} #bbpress-forums li.bbp-body ul' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} #bbpress-forums li.bbp-body div.hentry' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_pagination_style',
			[
				'label' => esc_html__( 'Pagination', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'pagination_typography',
				
				'selector' => '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a,{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current'
			]
        );

        $this->add_control(
			'pagination_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        ); 

        $this->start_controls_tabs( 'tabs_pagination_style' );
        
        $this->start_controls_tab(
			'tab_pagination_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons'),
			]
        );
        
        $this->add_control(
			'pagination_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current' => 'color: {{VALUE}};',
				]
			]
        );

        $this->add_control(
			'pagination_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current' => 'background-color: {{VALUE}};',
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pagination_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a,{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current'
			]
        );
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_pagination_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons'),
			]
        );
        
        $this->add_control(
			'pagination_color_hover',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current:hover' => 'color: {{VALUE}};',
				]
			]
        );

        $this->add_control(
			'pagination_bg_color_hover',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a:hover' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current:hover' => 'background-color: {{VALUE}};',
				]
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'pagination_border_hover',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a:hover,{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current:hover'
			]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'pagination_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        ); 
        
        $this->add_responsive_control(
			'pagination_padding',
			[
				'label' => esc_html__( 'Item Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums .bbp-pagination-links a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} #bbpress-forums .bbp-pagination-links span.current' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );

        $this->add_responsive_control(
			'pagination_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} #bbpress-forums .bbp-pagination-links' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_input_style',
			[
				'label' => esc_html__( 'Input & Textarea', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'input_typography',
				
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner input:not(.button),{{WRAPPER}} .cj-form-wrapper-inner textarea'
			]
		);
        
        $this->add_control(
			'input_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->start_controls_tabs( 'form_input_style' );
        
        $this->start_controls_tab(
			'form_input_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner input:not(.button)' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'placeholder_color',
			[
				'label' => esc_html__( 'Placeholder Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner input:not(.button)::placeholder' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea::placeholder' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner input:not(.button)' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea' => 'background-color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner input:not(.button),{{WRAPPER}} .cj-form-wrapper-inner textarea'
			]
		);
        
        $this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner input:not(.button)' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner input:not(.button),{{WRAPPER}} .cj-form-wrapper-inner textarea'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'form_input_hover',
			[
				'label' => esc_html__( 'Focus', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner input:not(.button):focus' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea:focus' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner input:not(.button):focus' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea:focus' => 'background-color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner input:not(.button):focus,{{WRAPPER}} .cj-form-wrapper-inner textarea:focus'
			]
		);
        
        $this->add_responsive_control(
			'border_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner input:not(.button):focus' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea:focus' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'border_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner input:not(.button):focus,{{WRAPPER}} .cj-form-wrapper-inner textarea:focus'
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'input_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_responsive_control(
			'input_width',
			[
				'label' => esc_html__( 'Input & Textarea Width', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .cj-form-wrapper-inner input[type="text"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-form-wrapper-inner input[type="number"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-form-wrapper-inner input[type="email"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-form-wrapper-inner input[type="tel"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-form-wrapper-inner input[type="url"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-form-wrapper-inner input[type="password"]' => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .cj-form-wrapper-inner input[type="search"]' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea' => 'width: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner select' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
        
        $this->add_responsive_control(
			'textarea_height',
			[
				'label' => esc_html__( 'Textarea Max. Height (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 1,
                'default' => 200,
                'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner textarea' => 'max-height: {{VALUE}}px;',
				],
			]
		);
        
        $this->add_responsive_control(
			'input_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-form-wrapper-inner input:not(.button)' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
        );
        
        $this->add_responsive_control(
			'input_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-form-wrapper-inner input:not(.button)' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .cj-form-wrapper-inner textarea' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_btn_style',
			[
				'label' => esc_html__( 'Submit Button', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner .button',
			]
		);
        
        $this->add_control(
			'btn_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);  
        
        $this->start_controls_tabs( 'tabs_button_style' );
        
        $this->start_controls_tab(
			'tab_button_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'btn_text_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner .button' => 'color: {{VALUE}};',
				]
			]
		);
        
        $this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner .button' => 'background-color: {{VALUE}};',
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner .button'
			]
		);
        
        $this->add_responsive_control(
			'btn_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner .button' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner .button'
			]
		);
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'btn_text_hover_color',
			[
				'label' => esc_html__( 'Text Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner .button:hover' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'btn_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner .button:hover' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner .button:hover'
			]
		);
        
        $this->add_responsive_control(
			'btn_border_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-form-wrapper-inner .button:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_border_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-form-wrapper-inner .button:hover'
			]
		);
        
        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'btn_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-form-wrapper-inner .button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-form-wrapper-inner .button' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_width',
			[
				'label' => esc_html__( 'Button Width', 'keystone-elements-addons' ),
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
					'{{WRAPPER}} .cj-form-wrapper-inner .button' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_msg_style',
			[
				'label' => esc_html__( 'Messages', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'msg_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
                    '{{WRAPPER}} div.bbp-template-notice' => 'color: {{VALUE}};',
                    '{{WRAPPER}} div.bbp-template-notice a' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'msg_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} div.bbp-template-notice' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'msg_typography',
				
				'selector' => '{{WRAPPER}} div.bbp-template-notice',
			]
		);
        
        $this->add_control(
			'msg_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'msg_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} div.bbp-template-notice'
			]
		);
        
        $this->add_responsive_control(
			'msg_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} div.bbp-template-notice' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'msg_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} div.bbp-template-notice'
			]
		);
        
        $this->add_control(
			'error_heading',
			[
				'label' => esc_html__( 'Error Messages', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_control(
			'error_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} div.bbp-template-notice.error' => 'color: {{VALUE}};',
                    '{{WRAPPER}} div.bbp-template-notice.warning' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'error_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} div.bbp-template-notice.error' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} div.bbp-template-notice.warning' => 'background-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'error_border_color',
			[
				'label' => esc_html__( 'Border Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
				'selectors' => [
					'{{WRAPPER}} div.bbp-template-notice.error' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} div.bbp-template-notice.warning' => 'border-color: {{VALUE}};'
				]
			]
		);
        
        $this->add_control(
			'msg_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'msg_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} div.bbp-template-notice' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'msg_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} div.bbp-template-notice' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
    }
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        $form = $settings['form'];
        $forum_id = $settings['forum_id'];
        $topic_id = $settings['topic_id'];
        $reply_id = $settings['reply_id'];
        echo '<div class="cj-form-wrapper"><div class="cj-form-wrapper-inner">';
        if ($form == 'bbp-single-forum' && !empty($forum_id)) {
			echo do_shortcode(shortcode_unautop('[bbp-single-forum id=' . $forum_id . ']'));
		} elseif ($form == 'bbp-single-topic' && !empty($topic_id)) {
			echo do_shortcode(shortcode_unautop('[bbp-single-topic id=' . $topic_id . ']'));
		} elseif ($form == 'bbp-single-reply' && !empty($reply_id)) {
			echo do_shortcode(shortcode_unautop('[bbp-single-reply id=' . $reply_id . ']'));
		} else {
			echo do_shortcode(shortcode_unautop('[' . $form . ']'));
		}	
        echo '</div></div>';
        ?>

<?php
    }
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_bbpress_content() );