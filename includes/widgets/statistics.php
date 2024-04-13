<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; 

class Widget_KEA_Statistics extends Widget_Base {

	public function get_name() {
		return 'cj-statistics';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Statistics', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}

	public function get_style_depends(){
		return [ 'cj-statistics','elementor-icons-fa-solid' ];
	}

	public function get_icon() {
		return 'eicon-number-field';
	}
    
	protected function register_controls() {

		// section start
  		$this->start_controls_section(
  			'statistics_content',
  			[
  				'label' => esc_html__( 'Statistics', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT
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
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true
			]
		);

		$repeater->add_control(
			'selected_value',
			[
				'label' => esc_html__( 'Statistic', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'posts',
				'options' => [
                    'posts' => esc_html__( 'Posts', 'keystone-elements-addons' ),
                    'comments' => esc_html__( 'Comments', 'keystone-elements-addons' ),
                    'users' => esc_html__( 'Registered Users (BbPress)', 'keystone-elements-addons' ),
                    'forums' => esc_html__( 'Forums (BbPress)', 'keystone-elements-addons' ),
                    'topics' => esc_html__( 'Topics (BbPress)', 'keystone-elements-addons' ),
                    'replies' => esc_html__( 'Replies (BbPress)', 'keystone-elements-addons' ),
					'topic_tags' => esc_html__( 'Topic Tags (BbPress)', 'keystone-elements-addons' ),
					'members' => esc_html__( 'Members (BuddyPress)', 'keystone-elements-addons' ),
					'groups' => esc_html__( 'Groups (BuddyPress)', 'keystone-elements-addons' ),
					'activity' => esc_html__( 'Activity (BuddyPress)', 'keystone-elements-addons' ),
                ],
                'label_block' => true
			]
        );
        
        $repeater->add_control(
			'external_link',
			[
				'label' => esc_html__( 'Destination Url (Optional)', 'keystone-elements-addons' ),
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
						'title' => esc_html__( 'Title #1', 'keystone-elements-addons' ),
                        'selected_value' => 'posts'
					],
					[
						'title' => esc_html__( 'Title #2', 'keystone-elements-addons' ),
						'selected_value' => 'posts'
					],
				],
				'title_field' => '{{{ title }}}',
			]
        );
        
        $this->end_controls_section();
     
        // section start
		$this->start_controls_section(
			'section_layout_style',
			[
				'label' => esc_html__( 'List Item', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'content_layout',
			[
				'label' => esc_html__( 'Layout', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cj-statistics-layout-1',
				'options' => [
					'cj-statistics-layout-1'  => esc_html__( 'Layout 1', 'keystone-elements-addons' ),
                    'cj-statistics-layout-2'  => esc_html__( 'Layout 2', 'keystone-elements-addons' ),
                    'cj-statistics-layout-3'  => esc_html__( 'Layout 3', 'keystone-elements-addons' ),
				],
			]
        );
        
        $this->add_control(
			'item_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list' => 'background-color: {{VALUE}}'
				],
			]
        );
        
        $this->add_control(
			'item_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'item_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-statistics-list'
			]
		);
        
        $this->add_responsive_control(
			'item_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'item_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-statistics-list'
			]
		);
        
        $this->add_control(
			'item_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        ); 
        
        $this->add_responsive_control(
			'item_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-statistics-list' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'item_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-statistics-list' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
     
        // section start
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_responsive_control(
			'icon_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-icon' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
                    '{{WRAPPER}} .cj-statistics-list-icon' => 'height: {{VALUE}}px;',
				],
			]
        );

        $this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-icon' => 'background-color: {{VALUE}};'
				]
			]
        );
        
        $this->add_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'icon_box_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-statistics-list-icon'
			]
		);
        
        $this->add_control(
			'hr_icon_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);

        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR, 
                'default' => '',
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-icon i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cj-statistics-list-icon svg' => 'fill: {{VALUE}};',
				]
			]
		);
        
        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem' ],
				'range' => [
					'rem' => [
						'min' => 0,
						'max' => 50,
					],
                    'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
                'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-icon i' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->add_responsive_control(
			'icon_svg_width',
			[
				'label' => esc_html__( 'SVG Width', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-icon svg' => 'width: {{VALUE}}px;'
				],
			]
		);
        
        $this->add_responsive_control(
			'icon_svg_height',
			[
				'label' => esc_html__( 'SVG Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 1000,
				'step' => 5,
                'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-icon svg' => 'height: {{VALUE}}px;'
				],
			]
        );
        
        $this->end_controls_section();
     
        // section start
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
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-title' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				
				'selector' => '{{WRAPPER}} .cj-statistics-list-title'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'title_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-statistics-list-title',
			]
        );
        
        $this->add_responsive_control(
			'title_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-statistics-list-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'section_number_style',
			[
				'label' => esc_html__( 'Number', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'number_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-statistics-list-value' => 'color: {{VALUE}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'number_typography',
				
				'selector' => '{{WRAPPER}} .cj-statistics-list-value'
			]
		);
        
        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'number_text_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-statistics-list-value',
			]
        );
        
        $this->add_responsive_control(
			'number_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-statistics-list-value' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
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
        if ( $settings['list'] ) {
            foreach ( $settings['list'] as $item ) {
            $target = $item['external_link']['is_external'] ? ' target="_blank"' : '';
            $nofollow = $item['external_link']['nofollow'] ? ' rel="nofollow"' : '';
            $statistic = 0;
            if ($item['selected_value'] == 'posts') {
                $statistic = KEA_post_count();
            } elseif ($item['selected_value'] == 'comments') {
                $statistic = KEA_comment_count();
            } elseif ($item['selected_value'] == 'users') {
                $statistic = KEA_bbpress_user_count();
            } elseif ($item['selected_value'] == 'forums') {
                $statistic = KEA_bbpress_forum_count();
            } elseif ($item['selected_value'] == 'topics') {
                $statistic = KEA_bbpress_topic_count();
            } elseif ($item['selected_value'] == 'replies') {
                $statistic = KEA_bbpress_reply_count();
            } elseif ($item['selected_value'] == 'topic_tags') {
                $statistic = KEA_bbpress_topic_tag_count();
            } elseif ($item['selected_value'] == 'members') {
                $statistic = KEA_bp_member_count();
            } elseif ($item['selected_value'] == 'groups') {
                $statistic = KEA_bp_group_count();
            } elseif ($item['selected_value'] == 'activity') {
                $statistic = KEA_bp_activity_count();
            }
        ?>
        <div class="cj-statistics-list <?php echo esc_attr($settings['content_layout']); ?>">
            <?php if ($item['external_link']['url']) { ?>
            <a class="cj-statistics-list-url" href="<?php echo esc_url($item['external_link']['url']); ?>" <?php echo $target; ?> <?php echo $nofollow; ?>></a>
            <?php } ?>
            <div class="cj-statistics-list-left">
                <div class="cj-statistics-list-icon">
                <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
            </div>
            <div class="cj-statistics-list-right">
                <div class="cj-statistics-list-title">
                    <?php echo $item['title']; ?>
                </div>
                <div class="cj-statistics-list-value">
                    <?php echo $statistic; ?>
                </div>
            </div>
        </div>
    <?php
        }
    } 
}

}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Statistics() );