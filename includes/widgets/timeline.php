<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Timeline extends Widget_Base {

	public function get_name() {
		return 'cj-timeline';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Timeline', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-timeline' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-timeline' ];
	}
    
    public function get_icon() {
		return 'eicon-time-line';
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
        
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA
			]
		);

		$repeater->add_responsive_control(
			'content_text_align',
			[
				'label' => esc_html__( 'Text Align', 'keystone-elements-addons' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Start', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'End', 'keystone-elements-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cj-timeline__content' => 'text-align: {{VALUE}};',
				],
			]
        );

		$repeater->add_control(
			'date',
			[
				'label' => esc_html__( 'Date', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Jan 14', 'keystone-elements-addons' ),
			]
        );
        
        $repeater->add_control(
			'title_html_tag',
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
					'p' => 'p',
				],
				'default' => 'h3',
			]
		);
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'label_block' => true,
			]
		);
        
        $repeater->add_control(
			'text', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Enim ad commodo do est proident excepteur nulla enim pariatur. Proident et laborum reprehenderit voluptate velit Lorem culpa ullamco.', 'keystone-elements-addons' ),
				'show_label' => false,
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
                        'date' => esc_html__( 'Jan 14', 'keystone-elements-addons' ),
                        'title' => esc_html__( 'Title #1', 'keystone-elements-addons' ),
                        'title_html_tag' => 'h3',
						'text' => esc_html__( 'Enim ad commodo do est proident excepteur nulla enim pariatur. Proident et laborum reprehenderit voluptate velit Lorem culpa ullamco.', 'keystone-elements-addons' ),
					],
					[
                        'date' => esc_html__( 'Jan 14', 'keystone-elements-addons' ),
                        'title' => esc_html__( 'Title #2', 'keystone-elements-addons' ),
                        'title_html_tag' => 'h3',
						'text' => esc_html__( 'Enim ad commodo do est proident excepteur nulla enim pariatur. Proident et laborum reprehenderit voluptate velit Lorem culpa ullamco.', 'keystone-elements-addons' ),
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_timeline_style',
			[
				'label' => esc_html__( 'Timeline', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'layout',
			[
				'label' => esc_html__( 'Layout', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cj-timeline-2-col',
				'options' => [
					'cj-timeline-2-col'  => esc_html__( 'Two Column', 'keystone-elements-addons' ),
					'cj-timeline-1-col' => esc_html__( 'One Column', 'keystone-elements-addons' )
				],
			]
        );

        $this->add_responsive_control(
			'bar_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline__container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->add_control(
			'timeline_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

        $this->add_control(
			'bar_thickness',
			[
				'label' => esc_html__( 'Bar Thickness', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 100,
				'step' => 1,
				'default' => 4,
                'selectors' => [
					'{{WRAPPER}} .cj-timeline__container:before' => 'width: {{VALUE}}px;'
				],
			]
        );
        
        $this->add_control(
			'bar_color',
			[
				'label' => esc_html__( 'Bar Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eeeeee',
				'selectors' => [
					'{{WRAPPER}} .cj-timeline__container:before' => 'background-color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'timeline_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        ); 
        
        $this->add_responsive_control(
			'icon_container_size',
			[
				'label' => esc_html__( 'Icon Container Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 500,
				'step' => 1,
				'default' => 60,
                'selectors' => [
                    '{{WRAPPER}} .cj-timeline__img' => 'width: {{VALUE}}px;height: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-timeline.cj-timeline-2-col .cj-timeline__block .cj-timeline__img' => 'margin-left: calc(5% - ({{VALUE}}px / 2));',
                    '{{WRAPPER}} .cj-timeline.cj-timeline-2-col .cj-timeline__block:nth-child(even) .cj-timeline__img' => 'margin-right: calc(5% - ({{VALUE}}px / 2));',
                    '{{WRAPPER}} .cj-timeline__container:before' => 'left: calc(({{VALUE}}px - {{bar_thickness.VALUE}}px) / 2);',
                    '{{WRAPPER}} .cj-timeline__content:before' => 'top: calc(({{VALUE}}px / 2) - 8px);'
				],
			]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_container_bg',
				'label' => esc_html__( 'Icon Container Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-timeline__img',
			]
        );

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_container_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-timeline__img'
			]
		);
        
        $this->add_control(
			'icon_container_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-timeline__img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_container_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-timeline__img'
			]
		);
        
        $this->add_control(
			'timeline_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        ); 

        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'max' => 500,
				'step' => 1,
				'default' => 22,
                'selectors' => [
                    '{{WRAPPER}} .cj-timeline__img i' => 'font-size: {{VALUE}}px;line-height: {{VALUE}}px;',
                    '{{WRAPPER}} .cj-timeline__img svg' => 'width: {{VALUE}}px;'
				],
			]
        );

        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline__img i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-timeline__img svg' => 'fill: {{VALUE}};'
				],
			]
        );

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_content_style',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->add_control(
			'display_arrow', [
				'label' => esc_html__( 'Display arrow', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'show-arrow',
				'default' => 'show-arrow',
				'show_label' => true,
			]
		);

        $this->add_control(
			'content_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#eeeeee',
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline__content' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-timeline__content:before' => 'border-right-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-timeline.cj-timeline-2-col .cj-timeline__block:nth-child(odd) .cj-timeline__content:before' => 'border-left-color: {{VALUE}};'
				],
			]
		);
		
		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'content_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-timeline__content'
			]
		);

        $this->add_control(
			'content_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-timeline__content' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'content_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-timeline__content'
			]
		);
		
		$this->add_control(
			'content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        ); 
        
        $this->add_responsive_control(
			'content_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'content_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline__content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'content_heading_1',
			[
				'label' => esc_html__( 'Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

        $this->add_responsive_control(
			'content_img_width',
			[
				'label' => esc_html__( 'Image Width', 'keystone-elements-addons' ),
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
                    '{{WRAPPER}} .cj-timeline-img' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'content_img_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-timeline__content img' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_responsive_control(
			'content_img_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline-img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'content_heading_2',
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
					'{{WRAPPER}} .cj-timeline-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				
				'selector' => '{{WRAPPER}} .cj-timeline-title'
			]
        );
        
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'content_heading_3',
			[
				'label' => esc_html__( 'Paragraph', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .cj-timeline__content p' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				
				'selector' => '{{WRAPPER}} .cj-timeline__content p'
			]
        );
        
        $this->add_responsive_control(
			'text_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline__content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'content_heading_4',
			[
				'label' => esc_html__( 'Date', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
        );
        
        $this->add_control(
			'date_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
                'selectors' => [
					'{{WRAPPER}} .cj-timeline__date' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'date_typography',
				
				'selector' => '{{WRAPPER}} .cj-timeline__date'
			]
		);
		
		$this->add_responsive_control(
			'date_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-timeline-date' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();
     
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        if ( $settings['list'] ) { ?>
        <div class="cj-timeline <?php echo $settings['layout']; ?>">
            <div class="cj-timeline__container">
            <?php foreach ( $settings['list'] as $item ) { ?>
                <div class="cj-timeline__block elementor-repeater-item-<?php echo $item['_id']; ?>">
                    <div class="cj-timeline__img">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </div>
                    <div class="cj-timeline__content <?php echo $settings['display_arrow']; ?>">
                    <?php 
                    if ($item['image']['url']) { 
                        echo '<div class="cj-timeline-img">' . wp_get_attachment_image( $item['image']['id'], 'full' ) . '</div>'; 
                    } 
					?>   
					<?php if ($item['date']) { ?>
                    <div class="cj-timeline-date">
                        <span class="cj-timeline__date"><?php echo $item['date']; ?></span>
                    </div>
                    <?php } ?> 
                    <?php 
                    if ($item['title']) { 
                        echo '<' . $item['title_html_tag'] . ' class="cj-timeline-title">' . $item['title'] . '</' . $item['title_html_tag'] . '>';
                    }
                    ?>
                    <?php echo wpautop($item['text']); ?>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
        <?php
		}
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Timeline() );