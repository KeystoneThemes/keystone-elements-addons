<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Widget_KEA_Share extends Widget_Base {

	public function get_name() {
		return 'cj-share';
	}

	public function get_title() {
		return "[KS] " . esc_html__( 'Share Buttons', 'keystone-elements-addons' );
	}

	public function get_categories() {
		return [ 'keystone-elements-addons' ];
	}
    
    public function get_style_depends(){
		return [ 'cj-share', 'elementor-icons-fa-brands', 'elementor-icons-fa-solid' ];
	}
    
    public function get_script_depends() {
		return [ 'cj-share' ];
	}
    
    public function get_icon() {
		return 'eicon-share';
    }
    
    public function get_network_name($network) {
		$network_names = array(
            'facebook' => esc_html__( 'Facebook', 'keystone-elements-addons' ),
            'twitter' => esc_html__( 'Twitter', 'keystone-elements-addons' ),
            'linkedin' => esc_html__( 'Linkedin', 'keystone-elements-addons' ),
            'vkontakte' => esc_html__( 'VK', 'keystone-elements-addons' ),
            'tumblr' => esc_html__( 'Tumblr', 'keystone-elements-addons' ),
            'blogger' => esc_html__( 'Blogger', 'keystone-elements-addons' ),
            'pinterest' => esc_html__( 'Pinterest', 'keystone-elements-addons' ),
            'digg' => esc_html__( 'Digg', 'keystone-elements-addons' ),
            'evernote' => esc_html__( 'Evernote', 'keystone-elements-addons' ),
            'reddit' => esc_html__( 'Reddit', 'keystone-elements-addons' ),
            'delicious' => esc_html__( 'Delicious', 'keystone-elements-addons' ),
            'flipboard' => esc_html__( 'Flipboard', 'keystone-elements-addons' ),
            'mix' => esc_html__( 'Mix', 'keystone-elements-addons' ),
            'pocket' => esc_html__( 'Pocket', 'keystone-elements-addons' ),
            'buffer' => esc_html__( 'Buffer', 'keystone-elements-addons' ),
            'xing' => esc_html__( 'Xing', 'keystone-elements-addons' ),
            'wordpress' => esc_html__( 'WordPress', 'keystone-elements-addons' ),
            'renren' => esc_html__( 'RenRen', 'keystone-elements-addons' ),
            'weibo' => esc_html__( 'Weibo', 'keystone-elements-addons' ),
            'sms' => esc_html__( 'SMS', 'keystone-elements-addons' ),
            'skype' => esc_html__( 'Skype', 'keystone-elements-addons' ),
            'telegram' => esc_html__( 'Telegram', 'keystone-elements-addons' ),
            'viber' => esc_html__( 'Viber', 'keystone-elements-addons' ),
            'whatsapp' => esc_html__( 'Whatsapp', 'keystone-elements-addons' ),
            'line' => esc_html__( 'Line', 'keystone-elements-addons' ),
            'email' => esc_html__( 'Email', 'keystone-elements-addons' ),
            'print' => esc_html__( 'Print', 'keystone-elements-addons' )
        );
        return $network_names[$network];
    }
    
    public function get_network_icon($icon) {
		$network_icons = array(
            'facebook' => 'fab fa-facebook-f',
            'twitter' => 'fab fa-twitter',
            'linkedin' => 'fab fa-linkedin-in',
            'vkontakte' => 'fab fa-vk',
            'tumblr' => 'fab fa-tumblr',
            'blogger' => 'fab fa-blogger-b',
            'pinterest' => 'fab fa-pinterest-p',
            'digg' => 'fab fa-digg',
            'evernote' => 'fab fa-evernote',
            'reddit' => 'fab fa-reddit-alien',
            'delicious' => 'fab fa-delicious',
            'flipboard' => 'fab fa-flipboard',
            'mix' => 'fab fa-mix',
            'pocket' => 'fab fa-get-pocket',
            'buffer' => 'fab fa-buffer',
            'xing' => 'fab fa-xing',
            'wordpress' => 'fab fa-wordpress-simple',
            'renren' => 'fab fa-renren',
            'weibo' => 'fab fa-weibo',
            'sms' => 'fas fa-sms',
            'skype' => 'fab fa-skype',
            'telegram' => 'fab fa-telegram-plane',
            'viber' => 'fab fa-viber',
            'whatsapp' => 'fab fa-whatsapp',
            'line' => 'fab fa-line',
            'email' => 'fas fa-envelope',
            'print' => 'fas fa-print'
        );
        return $network_icons[$icon];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Share Buttons', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
        );

        $repeater = new \Elementor\Repeater();
        
        $repeater->add_control(
			'network',
			[
                'label' => esc_html__( 'Network', 'keystone-elements-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'facebook',
				'options' => [
                    'facebook' => esc_html__( 'Facebook', 'keystone-elements-addons' ),
                    'twitter' => esc_html__( 'Twitter', 'keystone-elements-addons' ),
                    'linkedin' => esc_html__( 'Linkedin', 'keystone-elements-addons' ),
                    'vkontakte' => esc_html__( 'VK', 'keystone-elements-addons' ),
                    'tumblr' => esc_html__( 'Tumblr', 'keystone-elements-addons' ),
                    'blogger' => esc_html__( 'Blogger', 'keystone-elements-addons' ),
                    'pinterest' => esc_html__( 'Pinterest', 'keystone-elements-addons' ),
                    'digg' => esc_html__( 'Digg', 'keystone-elements-addons' ),
                    'evernote' => esc_html__( 'Evernote', 'keystone-elements-addons' ),
                    'reddit' => esc_html__( 'Reddit', 'keystone-elements-addons' ),
                    'delicious' => esc_html__( 'Delicious', 'keystone-elements-addons' ),
                    'flipboard' => esc_html__( 'Flipboard', 'keystone-elements-addons' ),
                    'mix' => esc_html__( 'Mix', 'keystone-elements-addons' ),
                    'pocket' => esc_html__( 'Pocket', 'keystone-elements-addons' ),
                    'buffer' => esc_html__( 'Buffer', 'keystone-elements-addons' ),
                    'xing' => esc_html__( 'Xing', 'keystone-elements-addons' ),
                    'wordpress' => esc_html__( 'WordPress', 'keystone-elements-addons' ),
                    'renren' => esc_html__( 'RenRen', 'keystone-elements-addons' ),
                    'weibo' => esc_html__( 'Weibo', 'keystone-elements-addons' ),
                    'sms' => esc_html__( 'SMS', 'keystone-elements-addons' ),
                    'skype' => esc_html__( 'Skype', 'keystone-elements-addons' ),
                    'telegram' => esc_html__( 'Telegram', 'keystone-elements-addons' ),
                    'viber' => esc_html__( 'Viber', 'keystone-elements-addons' ),
                    'whatsapp' => esc_html__( 'Whatsapp', 'keystone-elements-addons' ),
                    'line' => esc_html__( 'Line', 'keystone-elements-addons' ),
                    'email' => esc_html__( 'Email', 'keystone-elements-addons' ),
                    'print' => esc_html__( 'Print', 'keystone-elements-addons' )
				]
			]
        );
        
        $repeater->add_control(
			'custom_label',
			[
				'label' => esc_html__( 'Custom Label', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT
			]
        );
        
        $this->add_control(
			'list',
			[
				'label' => esc_html__( 'Share Buttons', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
                'show_label' => false,
				'default' => [
					[
						'network' => 'facebook'
					],
					[
						'network' => 'twitter'
                    ],
                    [
						'network' => 'pinterest'
                    ],
                    [
						'network' => 'linkedin'
                    ],
                    [
						'network' => 'tumblr'
                    ],
                    [
						'network' => 'whatsapp'
					],
				],
				'title_field' => '{{{ network }}}',
			]
        );

        $this->add_control(
			'share_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        ); 
        
        $this->add_control(
			'view',
			[
                'label' => esc_html__( 'View', 'keystone-elements-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'icon-text',
				'options' => [
                    'icon-text' => esc_html__( 'Icon & Text', 'keystone-elements-addons' ),
                    'icon' => esc_html__( 'Icon', 'keystone-elements-addons' ),
                    'text' => esc_html__( 'Text', 'keystone-elements-addons' )
				]
			]
        );
        
        $this->add_control(
			'display_counter', [
                'label' => esc_html__( 'Display Counter', 'keystone-elements-addons' ),
                'description' => esc_html__( 'Social networks, that have share counters: Facebook, Linkedin, Tumblr, Pinterest, Buffer.', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'No', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'show_label' => true,
			]
        );

        $this->add_control(
			'target_url',
			[
                'label' => esc_html__( 'Target URL', 'keystone-elements-addons' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'current-page',
				'options' => [
                    'current-page' => esc_html__( 'Current Page', 'keystone-elements-addons' ),
                    'custom' => esc_html__( 'Custom URL', 'keystone-elements-addons' )
				]
			]
        );

        $this->add_control(
			'target_custom_url',
			[
				'label' => esc_html__( 'Custom Url', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'condition' => [
                    'target_url' => 'custom'
                ]
			]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
			'style_content',
			[
				'label' => esc_html__( 'Share Buttons', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );
        
        $this->add_responsive_control(
			'share_buttons_align',
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
					'{{WRAPPER}} .kea-share-buttons' => 'justify-content: {{VALUE}};',
				],
                'toggle' => false
			]
		);
		
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'share_button_bg',
				'label' => esc_html__( 'Custom Background', 'keystone-elements-addons' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .kea-share-buttons li a',
			]
		);

        $this->add_control(
			'share_button_color',
			[
				'label' => esc_html__( 'Custom Font Color', 'keystone-elements-addons' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a' => 'color: {{VALUE}};'
				],
			]
        );

        $this->add_control(
			'overflow_hidden',
			[
				'label' => esc_html__( 'Overflow', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Hidden', 'keystone-elements-addons' ),
				'label_off' => esc_html__( 'Auto', 'keystone-elements-addons' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
			'style_button',
			[
				'label' => esc_html__( 'Button', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'share_button_overlay',
			[
				'label' => esc_html__( 'Overlay Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.1)',
				'selectors' => [
					'{{WRAPPER}} .kea-share-button-overlay' => 'background: {{VALUE}};'
				],
			]
        );

        $this->add_responsive_control(
			'share_button_size',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 20,
				'max' => 200,
				'step' => 1,
				'default' => 45,
                'selectors' => [
                    '{{WRAPPER}} .kea-share-buttons li a .kea-share-icon' => 'width: {{VALUE}}px;height: {{VALUE}}px;',
                    '{{WRAPPER}} .kea-share-buttons li a' => 'line-height: {{VALUE}}px;height: {{VALUE}}px;'
				],
			]
        );

        $this->add_responsive_control(
			'share_button_width',
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
					'{{WRAPPER}} .kea-share-buttons li' => 'width: {{SIZE}}{{UNIT}};'
				],
			]
		);

        $this->add_responsive_control(
			'share_button_padding',
			[
				'label' => esc_html__( 'Spacing', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
                    '{{WRAPPER}} .kea-share-buttons li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
        );

        $this->add_control(
			'share_button_hr_1',
			[
				'type' => \Elementor\Controls_Manager::DIVIDER,
			]
        );
        
        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'share_button_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-share-buttons li a',
			]
        );
        
        $this->add_responsive_control(
			'share_button_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .kea-share-button-overlay' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);
        
        $this->end_controls_section();

        $this->start_controls_section(
			'style_icon',
			[
				'label' => esc_html__( 'Icon', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_responsive_control(
			'share_button_icon_size',
			[
				'label' => esc_html__( 'Size (px)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'max' => 100,
				'step' => 1,
				'default' => 15,
                'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a .kea-share-icon' => 'font-size: {{VALUE}}px;'
				],
			]
		);
		
		$this->add_control(
			'share_button_icon_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a .kea-share-icon' => 'color: {{VALUE}};'
				],
			]
        );

        $this->add_control(
			'share_button_icon_bg',
			[
				'label' => esc_html__( 'Background Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.1)',
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a .kea-share-icon' => 'background: {{VALUE}};'
				],
			]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'share_button_icon_shadow',
				'label' => esc_html__( 'Box Shadow', 'keystone-elements-addons' ),
				'selector' => '{{WRAPPER}} .kea-share-buttons li a .kea-share-icon',
			]
        );

        $this->add_responsive_control(
			'share_button_icon_radius',
			[
				'label' => esc_html__( 'Border Radius', 'keystone-elements-addons' ),
				'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'rem' ],
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a .kea-share-icon' => 'border-top-left-radius: {{TOP}}{{UNIT}};border-top-right-radius: {{RIGHT}}{{UNIT}};border-bottom-right-radius: {{BOTTOM}}{{UNIT}};border-bottom-left-radius: {{LEFT}}{{UNIT}};'
				],
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'style_label',
			[
				'label' => esc_html__( 'Label', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'share_button_typography',
				'label' => esc_html__( 'Typography', 'keystone-elements-addons' ),
				
				'selector' => '{{WRAPPER}} .kea-share-buttons li a .kea-share-name',
			]
		);
		
		$this->add_control(
			'share_button_label_color',
			[
				'label' => esc_html__( 'Color', 'keystone-elements-addons' ),
                'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a .kea-share-name' => 'color: {{VALUE}};'
				],
			]
        );
        
        $this->add_responsive_control(
			'share_button_label_width',
			[
				'label' => esc_html__( 'Minimum Width', 'keystone-elements-addons' ),
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
					'size' => 120,
				],
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a .kea-share-name' => 'min-width: {{SIZE}}{{UNIT}};'
				],
			]
		);
		
		$this->add_responsive_control(
			'share_button_label_spacing',
			[
				'label' => esc_html__( 'Spacing', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'rem' ],
				'range' => [
					'%' => [
						'min' => 0,
						'max' => 100,
					],
                    'px' => [
						'min' => 0,
						'max' => 100,
					],
                    'rem' => [
						'min' => 0,
						'max' => 100,
					],
                ],
				'selectors' => [
					'{{WRAPPER}} .kea-share-buttons li a .kea-share-name' => 'padding-left: {{SIZE}}{{UNIT}};padding-right: {{SIZE}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();
        
      
	}
    
    protected function render() {
		$settings = $this->get_settings_for_display();
        if ( $settings['list'] ) { ?>
            <ul class="kea-share-buttons <?php if ($settings['overflow_hidden'] == 'yes') { echo 'kea-share-buttons-overflow-hidden'; } ?>" style="display:flex;">
            <?php foreach ( $settings['list'] as $item ) {
                $network_name = self::get_network_name($item['network']);
                if (!empty($item['custom_label'])) {
                    $network_name = esc_html($item['custom_label']);
                }
                $counter = '';
                if ($settings['display_counter']) {
                    if($item['network'] == 'facebook' || $item['network'] == 'odnoklassniki' || $item['network'] == 'linkedin' || $item['network'] == 'tumblr' || $item['network'] == 'pinterest' || $item['network'] == 'buffer') {
                        $counter = ' <span data-counter="' . $item['network'] . '"></span>';
                    }
                }
                $target_url = '';
                if($settings['target_url'] == 'custom') {
                    $target_url = 'data-url="' . esc_url($settings['target_custom_url']) . '"';
                }
                $email_url = get_the_permalink();
                if($settings['target_url'] == 'custom') {
                    $email_url = esc_url($settings['target_custom_url']);
                }
            ?> 
                <li class="kea-share-button-<?php echo esc_attr($item['network']); ?>">
                <?php if ($item['network'] == 'email') { ?>
                    <a href="mailto:?Subject=<?php echo rawurlencode(get_the_title()); ?>&amp;body=<?php echo esc_attr($email_url); ?>">
                        <div class="kea-share-button-overlay"></div>
                        <?php if ($settings['view'] == 'icon-text' || $settings['view'] == 'icon') { ?>
                        <div class="kea-share-icon"><i class="<?php echo esc_attr(self::get_network_icon($item['network'])); ?>"></i></div>
                        <?php } ?>
                        <?php if ($settings['view'] == 'icon-text' || $settings['view'] == 'text') { ?>
                        <div class="kea-share-name"><?php echo $network_name; ?></div>
                        <?php } ?>
                    </a>
                <?php } elseif ($item['network'] == 'print') { ?>   
                    <a href="#" onclick="window.print();return false;">
                        <div class="kea-share-button-overlay"></div>
                        <?php if ($settings['view'] == 'icon-text' || $settings['view'] == 'icon') { ?>
                        <div class="kea-share-icon"><i class="<?php echo esc_attr(self::get_network_icon($item['network'])); ?>"></i></div>
                        <?php } ?>
                        <?php if ($settings['view'] == 'icon-text' || $settings['view'] == 'text') { ?>
                        <div class="kea-share-name"><?php echo $network_name; ?></div>
                        <?php } ?>
                    </a>
                <?php } else { ?>
                    <a href="#" data-social="<?php echo esc_attr($item['network']); ?>" <?php echo $target_url; ?>>
                        <div class="kea-share-button-overlay"></div>
                        <?php if ($settings['view'] == 'icon-text' || $settings['view'] == 'icon') { ?>
                        <div class="kea-share-icon"><i class="<?php echo esc_attr(self::get_network_icon($item['network'])); ?>"></i></div>
                        <?php } ?>
                        <?php if ($settings['view'] == 'icon-text' || $settings['view'] == 'text') { ?>
                        <div class="kea-share-name"><?php echo $network_name . $counter; ?></div>
                        <?php } ?>
                    </a>
                <?php } ?>
                </li>
            <?php } ?>
            </ul>
		<?php }
	}
}
Plugin::instance()->widgets_manager->register( new Widget_KEA_Share() );