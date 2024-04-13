<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Weather extends Widget_Base {

	public function get_name() {
		return 'cj-weather';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Weather', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-weather', 'elementor-icons-fa-solid', 'elementor-icons-fa-regular' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-weather' ];
	}
    
    public function get_icon() {
		return 'eicon-flash';
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
    
        $this->add_control(
			'apikey',
			[
				'label' => esc_html__( 'API Key', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'description' => '<a href="https://openweathermap.org/" target="_blank">' . esc_html__('You must get an API Key from openweathermap.org', 'keystone-elements-addons') . '</a>'
			]
        );
        
        $this->add_control(
			'place',
			[
				'label' => esc_html__( 'Place', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'New York', 'keystone-elements-addons' ),
                'label_block' => true
			]
        );
        
        $this->add_control(
			'language',
			[
				'label' => esc_html__( 'Language', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'en' => esc_html__( 'English', 'keystone-elements-addons' ),
                    'af' => esc_html__( 'Africaans', 'keystone-elements-addons' ),
                    'al' => esc_html__( 'Albanian', 'keystone-elements-addons' ),
                    'ar' => esc_html__( 'Arabic', 'keystone-elements-addons' ),
                    'az' => esc_html__( 'Azerbaijani', 'keystone-elements-addons' ),
                    'bg' => esc_html__( 'Bulgarian', 'keystone-elements-addons' ),
                    'ca' => esc_html__( 'Catalan', 'keystone-elements-addons' ),
                    'cz' => esc_html__( 'Czech', 'keystone-elements-addons' ),
                    'da' => esc_html__( 'Danish', 'keystone-elements-addons' ),
                    'de' => esc_html__( 'German', 'keystone-elements-addons' ),
                    'el' => esc_html__( 'Greek', 'keystone-elements-addons' ),
                    'eu' => esc_html__( 'Basque', 'keystone-elements-addons' ),
                    'fa' => esc_html__( 'Persian (Farsi)', 'keystone-elements-addons' ),
                    'fi' => esc_html__( 'Finnish', 'keystone-elements-addons' ),
                    'fr' => esc_html__( 'French', 'keystone-elements-addons' ),
                    'gl' => esc_html__( 'Galician', 'keystone-elements-addons' ),
                    'he' => esc_html__( 'Hebrew', 'keystone-elements-addons' ),
                    'hi' => esc_html__( 'Hindi', 'keystone-elements-addons' ),
                    'hr' => esc_html__( 'Croatian', 'keystone-elements-addons' ),
                    'hu' => esc_html__( 'Hungarian', 'keystone-elements-addons' ),
                    'id' => esc_html__( 'Indonesian', 'keystone-elements-addons' ),
                    'it' => esc_html__( 'Italian', 'keystone-elements-addons' ),
                    'ja' => esc_html__( 'Japanese', 'keystone-elements-addons' ),
                    'kr' => esc_html__( 'Korean', 'keystone-elements-addons' ),
                    'la' => esc_html__( 'Latvian', 'keystone-elements-addons' ),
                    'lt' => esc_html__( 'Lithuanian', 'keystone-elements-addons' ),
                    'mk' => esc_html__( 'Macedonian', 'keystone-elements-addons' ),
                    'no' => esc_html__( 'Norwegian', 'keystone-elements-addons' ),
                    'nl' => esc_html__( 'Dutch', 'keystone-elements-addons' ),
                    'pl' => esc_html__( 'Polish', 'keystone-elements-addons' ),
                    'pt' => esc_html__( 'Portuguese', 'keystone-elements-addons' ),
                    'pt_br' => esc_html__( 'Portugues Brasil', 'keystone-elements-addons' ),
                    'ro' => esc_html__( 'Romanian', 'keystone-elements-addons' ),
                    'ru' => esc_html__( 'Russian', 'keystone-elements-addons' ),
                    'sv, se' => esc_html__( 'Swedish', 'keystone-elements-addons' ),
                    'sk' => esc_html__( 'Slovak', 'keystone-elements-addons' ),
                    'sl' => esc_html__( 'Slovenian', 'keystone-elements-addons' ),
                    'sp, es' => esc_html__( 'Spanish', 'keystone-elements-addons' ),
                    'sr' => esc_html__( 'Serbian', 'keystone-elements-addons' ),
                    'th' => esc_html__( 'Thai', 'keystone-elements-addons' ),
                    'tr' => esc_html__( 'Turkish', 'keystone-elements-addons' ),
                    'ua, uk' => esc_html__( 'Ukrainian', 'keystone-elements-addons' ),
                    'vi' => esc_html__( 'Vietnamese', 'keystone-elements-addons' ),
                    'zh_cn' => esc_html__( 'Chinese Simplified', 'keystone-elements-addons' ),
                    'zh_tw' => esc_html__( 'Chinese Traditional', 'keystone-elements-addons' ),
                    'zu' => esc_html__( 'Zulu', 'keystone-elements-addons' ),
				],
				'default' => 'en',
			]
        );

        $this->add_control(
			'content_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );

        $this->add_control(
			'display_icon', [
				'label' => esc_html__( 'Display Weather Icon', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
        );

        $this->add_control(
			'display_place', [
				'label' => esc_html__( 'Display Place', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
        );
        
        $this->add_control(
			'display_description', [
				'label' => esc_html__( 'Display Description', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
        );
        
        $this->add_control(
			'display_wind_speed', [
				'label' => esc_html__( 'Display Wind Speed', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'show_label' => true,
			]
        );
        
        $this->add_control(
			'display_humidity', [
				'label' => esc_html__( 'Display Humidity', 'keystone-elements-addons' ),
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
			'section_container_style',
			[
				'label' => esc_html__( 'Container', 'keystone-elements-addons' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'container_layout',
			[
				'label' => esc_html__( 'Layout', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '1',
				'options' => [
                    '1'  => esc_html__( 'Layout 1', 'keystone-elements-addons' ),
                    '2'  => esc_html__( 'Layout 2', 'keystone-elements-addons' ),
                    '3'  => esc_html__( 'Layout 3', 'keystone-elements-addons' ),
                    '4'  => esc_html__( 'Layout 4', 'keystone-elements-addons' )
                ]
			]
        );
        
        $this->add_responsive_control(
			'container_align',
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
					'{{WRAPPER}} .cj-weather-container' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
        );

        $this->add_responsive_control(
			'container_valign',
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
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .cj-weather' => 'align-items: {{VALUE}};',
				],
                'toggle' => false
			]
        );
        
        $this->add_responsive_control(
			'container_width',
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
					'unit' => 'px',
					'size' => 480,
				],
				'selectors' => [
					'{{WRAPPER}} .cj-weather' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'container_bg',
				'label' => esc_html__( 'Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-weather',
			]
        );

        $this->add_control(
			'overlay_heading',
			[
				'label' => esc_html__( 'Overlay', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
        
        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'overlay_bg',
				'label' => esc_html__( 'Overlay Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cj-weather-overlay',
			]
        );

        $this->add_control(
			'container_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'container_border',
				'label' => esc_html__( 'Border', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather'
			]
		);
        
        $this->add_responsive_control(
			'container_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .cj-weather' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .cj-weather-overlay' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				]
			]
		);
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'container_border_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather'
			]
		);
        
        $this->add_control(
			'container_hr_2',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
		); 
        
        $this->add_responsive_control(
			'container_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->add_responsive_control(
			'container_margin',
			[
				'label' => esc_html__( 'Margin', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'section_temperature_style',
			[
				'label' => esc_html__( 'Temperature', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'temperature_typography',
				
				'selector' => '{{WRAPPER}} .cj-weather-temperature',
			]
		);
        
        $this->add_control(
			'temperature_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-temperature' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'temperature_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather-temperature',
			]
		);
        
        $this->add_responsive_control(
			'temperature_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-temperature' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();

        // section start
		$this->start_controls_section(
			'section_icon_style',
			[
				'label' => esc_html__( 'Weather Icon', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['display_icon' => 'yes'],
			]
        );

        $this->add_control(
			'icon_style',
			[
				'label' => esc_html__( 'Icon Style', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'filled' => esc_html__( 'Filled', 'keystone-elements-addons' ),
					'outline' => esc_html__( 'Outline', 'keystone-elements-addons' ),
				],
				'default' => 'filled',
			]
		);

        $this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 500,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 100,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-icon' => 'font-size: {{SIZE}}{{UNIT}};'
				],
			]
        );
        
        $this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-icon' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'icon_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather-icon',
			]
		);

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_place_style',
			[
				'label' => esc_html__( 'Place', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['display_place' => 'yes'],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'place_typography',
				
				'selector' => '{{WRAPPER}} .cj-weather-place',
			]
		);
        
        $this->add_control(
			'place_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-place' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'place_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather-place',
			]
		);
        
        $this->add_responsive_control(
			'place_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-place' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_description_style',
			[
				'label' => esc_html__( 'Description', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['display_description' => 'yes'],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				
				'selector' => '{{WRAPPER}} .cj-weather-description',
			]
		);
        
        $this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-description' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'description_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather-description',
			]
		);
        
        $this->add_responsive_control(
			'description_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );
        
        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_divider_style',
			[
				'label' => esc_html__( 'Divider', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE
			]
        );

        $this->add_responsive_control(
			'divider_height',
			[
				'label' => esc_html__( 'Height', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 50,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 5,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-divider' => 'height: {{SIZE}}{{UNIT}};'
				],
			]
        );

        $this->add_responsive_control(
			'divider_width',
			[
				'label' => esc_html__( 'Width (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%' ],
				'range' => [
                    '%' => [
						'min' => 0,
						'max' => 100,
					],
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 60,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-divider' => 'max-width: {{SIZE}}{{UNIT}};'
				],
			]
        );

        $this->add_responsive_control(
			'divider_spacing',
			[
				'label' => esc_html__( 'Spacing (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 15,
				],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-divider' => 'margin: {{SIZE}}{{UNIT}} 0;'
				],
			]
        );

        $this->add_control(
			'divider_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-divider' => 'background-color: {{VALUE}};'
				]
			]
        );

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_wind_speed_style',
			[
				'label' => esc_html__( 'Wind Speed', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['display_wind_speed' => 'yes'],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wind_speed_typography',
				
				'selector' => '{{WRAPPER}} .cj-weather-wind-speed',
			]
		);
        
        $this->add_control(
			'wind_speed_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-wind-speed' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_control(
			'wind_speed_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-wind-speed i' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'wind_speed_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather-wind-speed',
			]
		);
        
        $this->add_responsive_control(
			'wind_speed_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-wind-speed' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();
        
        // section start
		$this->start_controls_section(
			'section_humidity_style',
			[
				'label' => esc_html__( 'Humidity', 'keystone-elements-addons' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => ['display_humidity' => 'yes'],
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'humidity_typography',
				
				'selector' => '{{WRAPPER}} .cj-weather-humidity',
			]
		);
        
        $this->add_control(
			'humidity_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-humidity' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_control(
			'humidity_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .cj-weather-humidity i' => 'color: {{VALUE}};'
				]
			]
        );

        $this->add_group_control(
			Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'humidity_shadow',
				'label' => esc_html__( 'Text Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .cj-weather-humidity',
			]
		);
        
        $this->add_responsive_control(
			'humidity_padding',
			[
				'label' => esc_html__( 'Padding', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .cj-weather-humidity' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();
     
	}
    
    protected function render() {
        $settings = $this->get_settings_for_display();
        if ($settings['apikey']) {
        ?>
        <div class="cj-weather-container">
            <div class="cj-weather cj-weather-layout-<?php echo esc_attr($settings['container_layout']); ?>" data-apikey="<?php echo esc_attr($settings['apikey']); ?>" data-place="<?php echo esc_attr($settings['place']); ?>" data-lang="<?php echo esc_attr($settings['language']); ?>" data-iconstyle="<?php echo esc_attr($settings['icon_style']); ?>">
                <div class="cj-weather-overlay"></div>
                <div class="cj-weather-left">
                    <?php if ($settings['display_place']) { ?>
                    <div class="cj-weather-place"></div>
                    <?php } ?>
                    <?php if ($settings['display_description']) { ?>
                    <div class="cj-weather-description"></div>
                    <?php } ?>
                    <div class="cj-weather-divider-wrapper"><div class="cj-weather-divider"></div></div>
                    <?php if ($settings['display_wind_speed']) { ?>
                    <div class="cj-weather-wind-speed"></div>
                    <?php } ?>
                    <?php if ($settings['display_humidity']) { ?>
                    <div class="cj-weather-humidity"></div>
                    <?php } ?>
                </div>
                <div class="cj-weather-right">
                    <?php if ($settings['display_icon']) { ?>
                    <i class="cj-weather-icon" data-wicon=""></i>
                    <?php } ?>
                    <div class="cj-weather-temperature"></div>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <div class="cj-danger"><?php esc_html_e( 'You must enter an API Key.', 'keystone-elements-addons' ); ?></div>  
        <?php }
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Weather() );