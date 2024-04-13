<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Section_KEA_Protected_Content {

    protected static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
    }
    
    public function __construct() {
		$this->init_hooks();
	}

    public static function init_hooks() {
        add_action( 'elementor/element/section/section_advanced/after_section_end', [__CLASS__, 'add_section'] );
        add_action( 'elementor/element/container/section_layout_container/after_section_end', [__CLASS__, 'add_section'] );
        add_action( 'elementor/element/common/_section_style/after_section_end', [ __CLASS__, 'add_section' ], 1 );
        add_filter( 'elementor/frontend/widget/should_render', [ __CLASS__, 'add_filter' ], 10, 3);
        add_filter( 'elementor/frontend/section/should_render', [ __CLASS__, 'add_filter' ], 10, 3);
        add_filter( 'elementor/frontend/container/should_render', [ __CLASS__, 'add_filter' ], 10, 3);
        add_action( 'elementor/frontend/widget/before_render', [__CLASS__, 'before_render'] );
        add_action( 'elementor/frontend/section/before_render', [__CLASS__, 'before_render'] );
        add_action( 'elementor/frontend/container/before_render', [__CLASS__, 'before_render'] );
    }

    public static function add_filter( $bool, $element ) {
        $settings = $element->get_settings();
        if ($settings['kea_protected_content_enable']) {
            if (($settings['kea_protected_content_type'] == 'user_role') && (!empty($settings['kea_protected_content_roles']))) {
                if( is_user_logged_in() ) {
                    $user = wp_get_current_user();
                    $user_role = ( array ) $user->roles;
                    if (array_intersect($user_role, $settings['kea_protected_content_roles'])) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } elseif ($settings['kea_protected_content_type'] == 'capability') {
                if( is_user_logged_in() ) {
                    if ( current_user_can( $settings['kea_protected_content_capability'] ) ) {
                        return true;
                    } else {
                        return false;
                    }
                } else {
                    return false;
                }
            } elseif ($settings['kea_protected_content_type'] == 'login_status') {
                if( (is_user_logged_in()) && ($settings['kea_protected_content_login_status'] == 'logged_in') ) {
                    return true;
                } elseif ( (!is_user_logged_in()) && ($settings['kea_protected_content_login_status'] == 'logged_out') ) {
                    return true;
                } else {
                    return false;
                }
            } elseif ($settings['kea_protected_content_type'] == 'password') {
                if (!isset($_GET['password'])) {
                    return false;
                } elseif ($_GET['password'] != $settings['kea_protected_content_password']) {
                    return false;
                } else {
                    return true;
                }
            } else {
                return true;
            }
        } else {
            return true;
        }
    }

    public static function before_render( Element_Base $element ) {
        $settings = $element->get_settings();
        if ($settings['kea_protected_content_enable']) {
        if (!isset($_GET['password']) || $_GET['password'] != $settings['kea_protected_content_password']) {
        if ($settings['kea_protected_content_type'] == 'password') { ?>
        <form class="kea-password-protection" action="<?php the_permalink(); ?>" style="display:flex;flex-direction:column;width:100%;max-width:<?php echo $settings['kea_protected_content_password_width']['size'] . $settings['kea_protected_content_password_width']['unit']; ?>;margin:<?php echo $settings['kea_protected_content_password_spacing']['size'] . $settings['kea_protected_content_password_spacing']['unit']; ?> auto;">
            <?php 
            if ($settings['kea_protected_content_password_desc']) {
                echo '<label class="' . $settings['kea_protected_content_password_label_class'] . '">' . $settings['kea_protected_content_password_desc'] . '</label>';
            } ?>
            <div class="kea-password-protection-inner" style="display:flex;align-items:stretch;">
                <input id="password" name="password" type="text" class="<?php echo esc_attr($settings['kea_protected_content_password_input_class']); ?>" placeholder="<?php esc_attr_e( 'Enter Password', 'keystone-elements-addons' ); ?>" maxlength="80" />
                <button id="submit" type="submit" class="<?php echo esc_attr($settings['kea_protected_content_password_btn_class']); ?>"><?php esc_html_e( 'Submit', 'keystone-elements-addons' ); ?></button>
            </div>
        </form>
        <?php }
        }
    }
    }
    
    public static function add_section( Element_Base $element ) {

        $element->start_controls_section(
            '_section_protected_content',
            [
                'label' => esc_html__( 'KEA Protected Content', 'keystone-elements-addons' ),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'kea_protected_content_enable',
            [
                'label' => esc_html__( 'Protect Content', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'frontend_available' => true
            ]
        );

        $element->add_control(
			'kea_protected_content_type',
			[
                'label' => esc_html__( 'Protection Type', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'login_status' => esc_html__( 'Login Status', 'keystone-elements-addons' ),
                    'user_role' => esc_html__( 'User Role', 'keystone-elements-addons' ),
                    'capability' => esc_html__( 'User Capability', 'keystone-elements-addons' ),
                    'password' => esc_html__( 'Password', 'keystone-elements-addons' )
				],
                'default' => 'login_status',
                'condition' => [
                    'kea_protected_content_enable' => 'yes'
                ]
			]
        );

        $element->add_control(
			'kea_protected_content_login_status',
			[
                'label' => esc_html__( 'Login Status', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
                    'logged_in' => esc_html__( 'Logged In', 'keystone-elements-addons' ),
                    'logged_out' => esc_html__( 'Logged Out', 'keystone-elements-addons' )
				],
                'default' => 'logged_in',
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'login_status',
                        ]
                    ]
                ],
			]
        );

        $element->add_control(
			'kea_protected_content_roles',
			[
				'label' => esc_html__( 'Roles (Required)', 'keystone-elements-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
                'label_block' => 'true',
                'description' => '<a href="https://wordpress.org/support/article/roles-and-capabilities/" target="_blank">' . esc_html__('Learn more about roles and capabilities', 'keystone-elements-addons') . '</a>',
                'multiple' => true,
				'default' => '',
				'options' => KEA_get_user_roles(),
				'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'user_role',
                        ]
                    ]
                ],
			]
        );
        
        $element->add_control(
			'kea_protected_content_capability', [
				'label' => esc_html__( 'Capability (Required)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'manage_options',
                'description' => '<a href="https://wordpress.org/support/article/roles-and-capabilities/" target="_blank">' . esc_html__('Learn more about roles and capabilities', 'keystone-elements-addons') . '</a>',
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'capability',
                        ]
                    ]
                ],
			]
        );
        
        $element->add_control(
			'kea_protected_content_password', [
				'label' => esc_html__( 'Password (Required)', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '123456',
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );

        $element->add_control(
			'kea_protected_content_password_desc', [
				'label' => esc_html__( 'Description', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );
        
        $element->add_control(
			'kea_protected_content_hr_1',
			[
                'type' => \Elementor\Controls_Manager::DIVIDER,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );
        
        $element->add_responsive_control(
			'kea_protected_content_password_width',
			[
				'label' => esc_html__( 'Maximum Form Width', 'keystone-elements-addons' ),
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
					'size' => 600,
				],
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );
        
        $element->add_responsive_control(
			'kea_protected_content_password_spacing',
			[
				'label' => esc_html__( 'Spacing', 'keystone-elements-addons' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
                    'px' => [
						'min' => 1,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 80,
				],
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );

        $element->add_control(
			'kea_protected_content_password_input_class', [
				'label' => esc_html__( 'Input Class', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'form-control',
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );
        
        $element->add_control(
			'kea_protected_content_password_btn_class', [
				'label' => esc_html__( 'Button Class', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'btn btn-primary',
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );

        $element->add_control(
			'kea_protected_content_password_label_class', [
				'label' => esc_html__( 'Label Class', 'keystone-elements-addons' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'conditions'   => [
                    'relation' => 'and',
                    'terms' => [
                        [
                            'name'  => 'kea_protected_content_enable',
                            'value' => 'yes',
                        ],
                        [
                            'name'  => 'kea_protected_content_type',
                            'value' => 'password',
                        ]
                    ]
                ],
			]
        );

        $element->end_controls_section();
        
    }

}

Section_KEA_Protected_Content::instance();