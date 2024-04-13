<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Slider extends Widget_Base {

	public function get_name() {
		return 'cj-slider';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Slider', 'keystone-elements-addons' );
    }
    
    public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-lib-slick', 'cj-slider' ];
    }

    public function get_style_depends(){
		return [ 'cj-lib-slick', 'cj-slider', 'elementor-icons-fa-solid', 'elementor-icons-fa-regular','cj-lib-animate'];
	}
    
    public function get_icon() {
		return 'eicon-slides';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Slides', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        
        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Background Image', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
        
        $repeater->add_control(
			'image_position',
			[
				'label' => esc_html__( 'Background Image Position', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'center center',
				'options' => [
					'top left'  => esc_html__( 'Top Left', 'keystone-elements-addons' ),
					'top center'  => esc_html__( 'Top Center', 'keystone-elements-addons' ),
                    'top right'  => esc_html__( 'Top Right', 'keystone-elements-addons' ),
                    'center left'  => esc_html__( 'Center Left', 'keystone-elements-addons' ),
                    'center center'  => esc_html__( 'Center Center', 'keystone-elements-addons' ),
                    'center right'  => esc_html__( 'Center Right', 'keystone-elements-addons' ),
                    'bottom left'  => esc_html__( 'Bottom Left', 'keystone-elements-addons' ),
                    'bottom center'  => esc_html__( 'Bottom Center', 'keystone-elements-addons' ),
                    'bottom right'  => esc_html__( 'Bottom Right', 'keystone-elements-addons' )
				],
			]
		);
        
        $repeater->add_control(
			'image_repeat',
			[
				'label' => esc_html__( 'Background Image Repeat', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'no-repeat',
				'options' => [
					'no-repeat'  => esc_html__( 'No Repeat', 'keystone-elements-addons' ),
					'repeat'  => esc_html__( 'Repeat', 'keystone-elements-addons' ),
                    'repeat-x'  => esc_html__( 'Repeat-x', 'keystone-elements-addons' ),
                    'repeat-y'  => esc_html__( 'Repeat-y', 'keystone-elements-addons' )
				],
			]
		);
        
        $repeater->add_control(
			'image_bg_size',
			[
				'label' => esc_html__( 'Background Image Size', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'cover',
				'options' => [
					'cover'  => esc_html__( 'Cover', 'keystone-elements-addons' ),
					'contain'  => esc_html__( 'Contain', 'keystone-elements-addons' ),
                    'auto'  => esc_html__( 'Auto (Not recommended)', 'keystone-elements-addons' )
				],
			]
		);
        
        $repeater->add_control(
			'title', [
				'label' => esc_html__( 'Title', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
			]
		);
        
        $repeater->add_control(
			'desc', [
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => '',
				'label_block' => true,
				'description' => 'Button Shortcode: [cjbtn url="https://www.keystonethemes.com" style="primary" target="_self"]CLICK HERE[/cjbtn]'
			]
		);
        
        $repeater->add_control(
			'website_link',
			[
				'label' => esc_html__( 'Link to', 'keystone-elements-addons' ),
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
				]
			]
		);
        
        $repeater->add_responsive_control(
			'text_box_align',
			[
				'label' => esc_html__( 'Horizontal Alignment', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'justify-content: {{VALUE}};',
				],
				'toggle' => false,
			]
		);
        
        $repeater->add_responsive_control(
			'text_box_valign',
			[
				'label' => esc_html__( 'Vertical Alignment', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
                'default' => 'center',
                'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}}' => 'align-items: {{VALUE}};',
				],
				'toggle' => false,
			]
		);
        
        $repeater->add_responsive_control(
			'text_align',
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
					],
				],
                'default' => 'left',
                'selectors' => [
					'{{WRAPPER}} {{CURRENT_ITEM}} .cj-slider-text-box' => 'text-align: {{VALUE}};',
				],
				'toggle' => false
			]
		);
        
        $repeater->add_control(
			'bg_entrance_animation',
			[
				'label' => esc_html__( 'Bg Image Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'none',
                'label_block' => 'true',
				'options' => [
					'none'  => esc_html__( 'None', 'keystone-elements-addons' ),
					'zoom'  => esc_html__( 'Zoom', 'keystone-elements-addons' ),
                    'zoom-top'  => esc_html__( 'Zoom Top-Center', 'keystone-elements-addons' ),
                    'zoom-top-right'  => esc_html__( 'Zoom Top-Right', 'keystone-elements-addons' ),
                    'zoom-top-left'  => esc_html__( 'Zoom Top-Left', 'keystone-elements-addons' ),
                    'zoom-bottom'  => esc_html__( 'Zoom Bottom-Center', 'keystone-elements-addons' ),
                    'zoom-bottom-right'  => esc_html__( 'Zoom Bottom-Right', 'keystone-elements-addons' ),
                    'zoom-bottom-left'  => esc_html__( 'Zoom Bottom-Left', 'keystone-elements-addons' ),
                    'zoom-left'  => esc_html__( 'Zoom Left', 'keystone-elements-addons' ),
                    'zoom-right'  => esc_html__( 'Zoom Right', 'keystone-elements-addons' ),
				],
			]
		);
        
        $repeater->add_control(
			'bg_entrance_animation_duration',
			[
				'label' => esc_html__( 'Bg Image Animation Duration', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0.1,
				'max' => 10,
				'step' => 0.1,
				'default' => 1,
			]
		);
        
        $repeater->add_control(
			'entrance_animation',
			[
				'label' => esc_html__( 'Text Animation', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::ANIMATION,
				'frontend_available' => true
			]
		);
        
        $repeater->add_control(
			'entrance_animation_duration',
			[
				'label' => esc_html__( 'Text Animation Duration', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
                'label_block' => 'true',
				'options' => [
					''  => esc_html__( 'Default', 'keystone-elements-addons' ),
					'fast'  => esc_html__( 'Fast', 'keystone-elements-addons' ),
                    'faster'  => esc_html__( 'Faster', 'keystone-elements-addons' ),
                    'slow'  => esc_html__( 'Slow', 'keystone-elements-addons' ),
                    'slower'  => esc_html__( 'Slower', 'keystone-elements-addons' ),
				],
			]
		);
        
        $this->add_control(
			'list', [
				'label' => esc_html__( 'Slides', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
                    [
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'image_position' => 'center center',
                        'image_repeat' => 'no-repeat',
                        'image_img_size' => 'cover',
                        'title' => esc_html__( 'Title #1', 'keystone-elements-addons' ),
                        'desc' => esc_html__( 'Content here...', 'keystone-elements-addons' ),
                        'text_box_align' => 'center',
                        'text_box_valign' => 'center',
                        'text_align' => 'left',
				    ],
				    [
                        'image' => \Elementor\Utils::get_placeholder_image_src(),
                        'image_position' => 'center center',
                        'image_repeat' => 'no-repeat',
                        'image_img_size' => 'cover',
                        'title' => esc_html__( 'Title #2', 'keystone-elements-addons' ),
                        'desc' => esc_html__( 'Content here...', 'keystone-elements-addons' ),
                        'text_box_align' => 'center',
                        'text_box_valign' => 'center',
                        'text_align' => 'left',
				    ]
			     ],
                 'title_field' => '{{{ title }}}',
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
        
        $this->add_responsive_control(
			'slider_height',
			[
				'label' => esc_html__( 'Slider Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 1400,
						'step' => 5,
					],
					'vh' => [
						'min' => 10,
						'max' => 100,
                        'step' => 1
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 700,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-slider-inner' => 'height: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .slick-slide' => 'min-height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-slider-text-wrapper' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-slider-loader' => 'height: {{SIZE}}{{UNIT}};',
				],
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
			'section_slides',
			[
				'label' => esc_html__( 'Slide', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'slide_bg_color',
			[
				'label' => esc_html__( 'Slide Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#0073aa',
				'selectors' => [
					'{{WRAPPER}} .cj-slider-inner' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .cj-slider-wrapper' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'slide_overlay',
			[
				'label' => esc_html__( 'Overlay Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-slider-overlay' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_box',
			[
				'label' => esc_html__( 'Text Box', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_responsive_control(
			'text_max_width',
			[
				'label' => esc_html__( 'Text Box Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 200,
						'max' => 1400,
						'step' => 5,
					],
					'%' => [
						'min' => 10,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 600,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-slider-text-box' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
        );
        
        $this->add_responsive_control(
			'text_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0)',
				'selectors' => [
					'{{WRAPPER}} .cj-slider-text-box' => 'background-color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'slider_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'text_padding',
			[
				'label' => esc_html__( 'Text Box Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-slider-text-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'text_margin',
			[
				'label' => esc_html__( 'Text Box Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-slider-text-box' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'slider_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'text_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-slider-text-box',
			]
		);
        
        $this->add_responsive_control(
			'text_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-slider-text-box' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'text_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-slider-text-box',
			]
        );
        
        $this->add_control(
			'slider_hr_3',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 

		$this->add_control(
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
				'default' => 'h1',
			]
		);
        
        $this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Title Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#111111',
				'selectors' => [
					'{{WRAPPER}} .cj-slider-title' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-slider-title',
			]
		);
        
        $this->add_control(
			'desc_color',
			[
				'label' => esc_html__( 'Content Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#333333',
				'selectors' => [
					'{{WRAPPER}} .cj-slider-text-box .cj-slider-desc p' => 'color: {{VALUE}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => esc_html__( 'Content Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cj-slider-text-box .cj-slider-desc p',
			]
		);
        
        $this->add_responsive_control(
			'text_align_general',
			[
				'label' => esc_html__( 'Default Text Alignment', 'keystone-elements-addons' ),
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
					],
				],
				'default' => '',
				'toggle' => true,
                'selectors' => [
					'{{WRAPPER}} .cj-slider-text-box' => 'text-align: {{VALUE}} !important;'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_button',
			[
				'label' => esc_html__( 'Button (Primary)', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cjbtn-primary',
			]
		);
        
        $this->start_controls_tabs( 'tabs_btn_primary_style' );
        
        $this->start_controls_tab(
			'tab_btn_primary_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'btn_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary' => 'color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'btn_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222222',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary' => 'background-color: {{VALUE}};'
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-primary',
			]
		);
        
        $this->add_responsive_control(
			'btn_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-primary',
			]
        );
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_btn_primary_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);

        $this->add_control(
			'btn_hover_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary:hover' => 'color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'btn_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary:hover' => 'background-color: {{VALUE}};'
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-primary:hover',
			]
		);
        
        $this->add_responsive_control(
			'btn_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-primary:hover',
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
			'btn_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
                'default' => [
                    'top' => '15',
                    'right' => '20',
                    'bottom' => '15',
                    'left' => '20',
                    'isLinked' => false,
                ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
			'section_s_button',
			[
				'label' => esc_html__( 'Button (Secondary)', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'btn_s_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .cjbtn-secondary',
			]
		);
        
        $this->start_controls_tabs( 'tabs_btn_s_primary_style' );
        
        $this->start_controls_tab(
			'tab_btn_s_primary_normal',
			[
				'label' => esc_html__( 'Normal', 'keystone-elements-addons' ),
			]
		);
        
        $this->add_control(
			'btn_s_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary' => 'color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'btn_s_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#222222',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary' => 'background-color: {{VALUE}};'
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_s_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-secondary',
			]
		);
        
        $this->add_responsive_control(
			'btn_s_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_s_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-secondary',
			]
        );
        
        $this->end_controls_tab();

		$this->start_controls_tab(
			'tab_btn_s_primary_hover',
			[
				'label' => esc_html__( 'Hover', 'keystone-elements-addons' ),
			]
		);

        $this->add_control(
			'btn_s_hover_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary:hover' => 'color: {{VALUE}};'
				],
			]
        );
        
        $this->add_control(
			'btn_s_bg_hover_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary:hover' => 'background-color: {{VALUE}};'
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'btn_s_hover_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-secondary:hover',
			]
		);
        
        $this->add_responsive_control(
			'btn_s_hover_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary:hover' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'btn_s_hover_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cjbtn-secondary:hover',
			]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();
        
        $this->add_control(
			'btn_s_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		);
        
        $this->add_responsive_control(
			'btn_s_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
                'default' => [
                    'top' => '0',
                    'right' => '0',
                    'bottom' => '0',
                    'left' => '0',
                    'isLinked' => false,
                ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'btn_s_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
                'default' => [
                    'top' => '15',
                    'right' => '20',
                    'bottom' => '15',
                    'left' => '20',
                    'isLinked' => false,
                ],
				'selectors' => [
					'{{WRAPPER}} .cjbtn-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();
        
        $this->start_controls_section(
			'section_divider',
			[
				'label' => esc_html__( 'Divider', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        
        $this->add_control(
			'divider_hide', [
				'label' => esc_html__( 'Hide', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => '',
				'show_label' => true,
			]
		);
        
        $this->add_control(
			'divider_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#0073aa',
				'selectors' => [
					'{{WRAPPER}} .cj-slider-divider' => 'background-color: {{VALUE}};'
				],
			]
		);
        
        $this->add_control(
			'divider_width',
			[
				'label' => esc_html__( 'Width', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
					'px' => [
						'min' => 5,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 5,
						'max' => 100,
                        'step' => 1
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-slider-divider' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);
        
        $this->add_control(
			'divider_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 0,
				'max' => 40,
				'step' => 1,
				'default' => 5,
                'selectors' => [
					'{{WRAPPER}} .cj-slider-divider' => 'height: {{VALUE}}px;',
				],
			]
		);

		$this->add_responsive_control(
			'divider_h_align',
			[
				'label' => esc_html__( 'Horizontal Alignment', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
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
					'{{WRAPPER}} .cj-slider-divider-wrapper' => 'justify-content: {{VALUE}};',
				],
				'toggle' => false,
			]
		);
        
        $this->add_responsive_control(
			'divider_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'rem' ],
                'default' => [
                    'top' => '20',
                    'right' => '0',
                    'bottom' => '20',
                    'left' => '0',
                    'isLinked' => false,
                ],
				'selectors' => [
					'{{WRAPPER}} .cj-slider-divider-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
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
				'default' => 'cj-dots-inside',
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
			'nav_thumbnail_align',
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
					'{{WRAPPER}} .cj-thumbnail-dots' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
        
        $this->add_responsive_control(
			'nav_thumbnail_width',
			[
				'label' => esc_html__( 'Thumbnail Max. Height', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'rem' ],
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
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-dots-inside .cj-thumbnail-dots' => 'height: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .cj-thumbnail-dots li img' => 'height: {{SIZE}}{{UNIT}};'
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
				'min' => -100,
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
				'label' => esc_html__( 'Image Size', 'keystone-elements-addons' ),
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
        if ( $settings['list'] ) { ?>
        <div class="cj-slider-wrapper <?php if ($settings['hide_nav']) { echo 'hide-nav'; } ?>">
            <div class="cj-slider-loader <?php if (empty($settings['loader_image']['url'])) { ?>cj-css3-loader<?php } ?>" style="<?php if (!empty($settings['loader_image']['url'])) { echo 'background-image:url(' . $settings['loader_image']['url'] . ');'; } ?>"></div>
            <div id="cj-slider-<?php echo esc_attr($cjslider_slider_id); ?>" class="cj-slider" data-prv="<?php echo $settings['arrow_prev_icon']['value']; ?>" data-nxt="<?php echo $settings['arrow_next_icon']['value']; ?>" data-autoplay="<?php if ($settings['autoplay']) { echo 'true'; } else { echo 'false'; } ?>" data-duration="<?php echo esc_attr($settings['autoplay_duration']); ?>000" data-nav="<?php if ($settings['nav_arrows']) { echo 'true'; } else { echo 'false'; } ?>" data-dots="<?php if ($settings['nav_dots']) { echo 'true'; } else { echo 'false'; } ?>" data-navthumbnails="<?php echo esc_attr($settings['nav_thumbnails']); ?>" data-rtl="<?php if (is_rtl()) { echo 'true'; } else { echo 'false'; } ?>" data-slideanim="<?php echo esc_attr($settings['slide_anim']); ?>" data-speed="<?php echo esc_attr($settings['slide_anim_duration']); ?>">
                <?php foreach ( $settings['list'] as $item ) { ?>
                <?php $slide_thumbnail = wp_get_attachment_image_url( $item['image']['id'], $settings['nav_thumbnail_size'] ); ?>
                <div class="cj-slick-thumb" data-thumbnail="<?php echo esc_url($slide_thumbnail); ?>" data-alt="<?php echo esc_attr($item['title']); ?>">
                    <div class="cj-slider-inner animated none <?php echo $item['bg_entrance_animation']; ?>" style="background-image:url(<?php echo $item['image']['url']; ?>);background-position:<?php echo $item['image_position']; ?>;background-repeat:<?php echo $item['image_repeat']; ?>;background-size:<?php echo $item['image_bg_size']; ?>;transition-duration:<?php echo $item['bg_entrance_animation_duration']; ?>s;"></div>
                    <?php if ($item['website_link']['url']) { ?>
                    <a class="cj-slider-url" href="<?php echo esc_url($item['website_link']['url']); ?>" <?php if ($item['website_link']['is_external']) { ?>target="_blank"<?php } ?> <?php if ($item['website_link']['nofollow']) { ?>rel="nofollow"<?php } ?>></a>
                    <?php } ?>
                    <div class="cj-slider-overlay"></div>
                        <div class="cj-slider-text-wrapper elementor-repeater-item-<?php echo $item['_id']; ?>">
                            <div class="cj-slider-text-box noanim animated <?php echo $item['entrance_animation_duration']; ?> <?php echo $item['entrance_animation']; ?>">
                                <?php 
                                if ($item['title']) { 
                                    echo '<' . $settings['title_html_tag'] . ' class="cj-slider-title">' . $item['title'] . '</' . $settings['title_html_tag'] . '>';
                                }
                                ?>
                                <?php if ($settings['divider_hide'] != 'yes') { ?>
                                <div class="cj-slider-divider-wrapper">
                                    <div class="cj-slider-divider"></div>
                                </div>
                                <?php } ?>
                                <?php 
                                if ($item['desc']) { 
                                    echo '<div class="cj-slider-desc">' . do_shortcode($item['desc']) . '</div>';
                                }
                                ?>
                            </div>
                        </div>
                </div>    
                <?php } ?>
            </div>
            <?php if (($settings['nav_dots']) && ($settings['nav_thumbnails'])) { ?>
            <div id="cj-slider-thumbnails-<?php echo esc_attr($cjslider_slider_id) ?>" class="cj-slider-thumbnails <?php echo $settings['nav_thumbnails_position']; ?>"></div>
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
<?php }
}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Slider() );
?>