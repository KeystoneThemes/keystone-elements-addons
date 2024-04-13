<?php
add_action( 'cmb2_admin_init', 'KEA_register_theme_options_metabox' );

function KEA_register_theme_options_metabox() {
	$cmb_options = new_cmb2_box( array(
		'id'           => 'KEA_settings_metabox',
		'title'        =>  esc_html__( 'Keystone Elements Addons', 'keystone-elements-addons' ) . '<span class="cj-version">version ' . KEA_VERSION . '</span>',
		'object_types' => array( 'options-page' ),
        'option_key'      => 'KEA_settings',
        'capability'      => 'manage_options',
        'save_button'     => esc_html__( 'Save Settings', 'keystone-elements-addons' ),
		'menu_title'      => esc_html__( 'Elements Addons', 'keystone-elements-addons' ),
		'position'        => 3,
		'vertical_tabs' => false,
        'tabs' => array(
            array(
                'id'    => 'tab-1',
                'icon' => 'dashicons-admin-generic',
                'title' => esc_html__( 'Elements', 'keystone-elements-addons' ),
                'fields' => array(
                    'heading',
                    'button',
                    'dropdown_button',
                    'smart_menu',
                    'accordion',
                    'tabs',
                    'table',
                    'slider',
                    'post_slider',
                    'post_masonry',
                    'post_carousel',
                    'post_list',
                    'news_ticker',
                    'search_form',
                    'photo_gallery',
                    'gallery_slider',
                    'banner',
                    'portfolio_grid',
                    'team_member',
                    'team_carousel',
                    'team_masonry',
                    'price_table',
                    'price_menu',
                    'flip_box',
                    'logo_grid',
                    'site_logo',
                    'testimonial',
                    'testimonial_carousel',
                    'business_hours',
                    'login_form',
                    'image_compare',
                    'countdown',
                    'counter',
                    'piechart',
                    'progress_bar',
                    'text_rotator',
                    'timeline',
                    'post_timeline',
                    'qrcode',
                    'shape',
                    'tooltip',
                    'contact_form_7',
                    'youtube_tv',
                    'sticky_video',
                    'scroll_nav',
                    'statistics',
                    'weather',
                    'bar_chart',
                    'line_chart',
                    'doughnut_chart',
                    'radar_chart',
                    'polar_area_chart',
                    'share',
                    'pdf_viewer',
                    'bbpress_form',
                    'bbpress_content',
                    'bbpress_search',
                    'woo_slider',
                    'woo_masonry',
                    'woo_carousel',
                    'woo_table',
                    'woo_gallery',
                    'woo_button'
                ),
            ),
            array(
                'id'    => 'tab-3',
                'icon' => 'dashicons-admin-plugins',
                'title' => esc_html__( 'Extentions', 'keystone-elements-addons' ),
                'fields' => array(
                    'ext_template_library',
                    'ext_protected_content',
                    'ext_animations',
                    'ext_bg_effects',
                    'ext_parallax_bg',
                    'ext_gradient_bg_anim',
                    'ext_shape_divider',
                    'ext_template_shortcode'
                ),
            ),
            array(
                'id'    => 'tab-4',
                'icon' => 'dashicons-flag',
                'title' => esc_html__( 'Icon Library', 'keystone-elements-addons' ),
                'fields' => array(
                    'ks-material-icons',
                    'ks-fontisto',
                    'ks-iconic-font',
                    'ks-linear-icons'
                ),
            ),
            array(
                'id'    => 'tab-2',
                'icon' => 'dashicons-format-image',
                'title' => esc_html__( 'Lightbox', 'keystone-elements-addons' ),
                'fields' => array(
                    'lightbox_overlay_color',
                    'lightbox_ui_color',
                    'lightbox_ui_hover_color',
                    'lightbox_icon_size',
                    'lightbox_icon_padding',
                    'lightbox_loader_color',
                    'lightbox_loader_bg_color',
                    'lightbox_caption_size',
                    'lightbox_caption_color',
                    'lightbox_caption_bg',
                    'lightbox_caption_padding'
                ),
            ),
        )
    ) );
    
    /**
     * ELEMENTS
     */

	$cmb_options->add_field( array(
        'name'          => esc_html__( 'Heading', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/heading/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
		'id'            => 'heading',
        'type'	           => 'switch',
        'default'          => ''
	) );

	$cmb_options->add_field( array(
        'name'          => esc_html__( 'Button', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/button/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'button',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Dropdown Button', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/dropdown-button/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
		'id'            => 'dropdown_button',
		'type'	           => 'switch',
        'default'          => ''
    ) );
    
    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Smart Menu', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/smart-menu/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
		'id'            => 'smart_menu',
		'type'	           => 'switch',
        'default'          => ''
	) );

	$cmb_options->add_field( array(
        'name'          => esc_html__( 'Accordion', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/accordion/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'accordion',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Tabs', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/tabs/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'tabs',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Table', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/table/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'table',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Slider', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/slider/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'slider',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Post Slider', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/post-slider/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'post_slider',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Post Masonry', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/post-masonry/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'post_masonry',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Post Carousel', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/post-carousel/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'post_carousel',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Post List', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/post-list/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'post_list',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'News Ticker', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/news-ticker/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'news_ticker',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Search Form', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/search-form/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'search_form',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Photo Gallery', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/photo-gallery/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'photo_gallery',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Gallery Slider', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/gallery-slider/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'gallery_slider',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Banner Designer', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/banner-designer/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'banner',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Portfolio Grid', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/filterable-portfolio-grid/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'portfolio_grid',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Team Member', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/team-member/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'team_member',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Team Carousel', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/team-carousel/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'team_carousel',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Team Masonry', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/team-masonry/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'team_masonry',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Price Table', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/price-table/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'price_table',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Price Menu', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/price-menu/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'price_menu',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Flip Box', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/flip-box/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'flip_box',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Logo Grid', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/logo-grid/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'logo_grid',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Site Logo', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/site-logo/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'site_logo',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Testimonial', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/testimonial/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'testimonial',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Testimonial Carousel', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/testimonial-carousel/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'testimonial_carousel',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Business Hours', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/business-hours/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'business_hours',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Login Form', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/login-form/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'login_form',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Image Compare', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/image-compare/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'image_compare',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Countdown', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/countdown/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'countdown',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Counter', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/counter/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'counter',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Pie Chart', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/pie-chart/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'piechart',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Progress Bar', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/progress-bar/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'progress_bar',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Text Rotator', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/text-rotator/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'text_rotator',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Timeline', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/timeline/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'timeline',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Post Timeline', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/post-timeline/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'post_timeline',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'QR Code', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/qr-code/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'qrcode',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Shape', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/shape/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'shape',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Tooltip', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/tooltip/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'tooltip',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Contact Form 7', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/contact-form-7/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'contact_form_7',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'YouTube TV', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/youtube-tv/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'youtube_tv',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'YouTube Sticky Video', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/youtube-sticky-video/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'sticky_video',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Scroll Navigation', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/scroll-navigation/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'scroll_nav',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Statistics', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/statistics/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'statistics',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Weather', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/weather/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'weather',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Bar Chart', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/bar-chart/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'bar_chart',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Line Chart', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/line-chart/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'line_chart',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Doughnut Chart', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/doughnut-chart/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'doughnut_chart',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Radar Chart', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/radar-chart/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'radar_chart',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Polar Area Chart', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/polar-area-chart/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'polar_area_chart',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Share Buttons', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/share/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'share',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'PDF Viewer', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/pdf-viewer/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'pdf_viewer',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'bbPress Form', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/bbpress-form/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'bbpress_form',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'bbPress Content', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/bbpress-content/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'bbpress_content',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'bbPress Search', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/bbpress-search/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'bbpress_search',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'WooCommerce Slider', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/woocommerce-slider/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'woo_slider',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'WooCommerce Masonry', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/woocommerce-masonry/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'woo_masonry',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'WooCommerce Carousel', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/woocommerce-carousel/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'woo_carousel',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'WooCommerce Table', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/woocommerce-table/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'woo_table',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'WooCommerce Gallery', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/woocommerce-gallery/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'woo_gallery',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'WooCommerce Button', 'keystone-elements-addons' ),
        'before_field'  => '<a href="https://elements.keystonethemes.com/woocommerce-button/" target="_blank" class="demo-link"><span class="dashicons dashicons-laptop"></span></a>',
        'id'            => 'woo_button',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    /**
     * LIGHTBOX
     */

    $cmb_options->add_field(
        array(
            'name' => esc_html__( 'Overlay Color', 'keystone-elements-addons'),  
            'id' => 'lightbox_overlay_color',
            'type' => 'colorpicker',
            'default' => 'rgba(0,0,0,0.7)',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb_options->add_field(
        array(
            'name' => esc_html__( 'UI Color', 'keystone-elements-addons'),  
            'id' => 'lightbox_ui_color',
            'type' => 'colorpicker',
            'default' => 'rgba(255,255,255,0.5)',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb_options->add_field(
        array(
            'name' => esc_html__( 'UI Hover Color', 'keystone-elements-addons'),  
            'id' => 'lightbox_ui_hover_color',
            'type' => 'colorpicker',
            'default' => '#ffffff',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb_options->add_field( array(
        'name' => esc_html__( 'Icon Size (px)', 'keystone-elements-addons' ),
        'id'   => 'lightbox_icon_size',
        'type' => 'text',
        'default' => 30,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );
    
    $cmb_options->add_field( array(
        'name' => esc_html__( 'Icon Padding (px)', 'keystone-elements-addons' ),
        'id'   => 'lightbox_icon_padding',
        'type' => 'text',
        'default' => 25,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );

    $cmb_options->add_field( array(
        'name' => esc_html__( 'Caption Padding (px)', 'keystone-elements-addons' ),
        'id'   => 'lightbox_caption_padding',
        'type' => 'text',
        'default' => 10,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );
    
    $cmb_options->add_field( array(
        'name' => esc_html__( 'Caption Font Size (px)', 'keystone-elements-addons' ),
        'id'   => 'lightbox_caption_size',
        'type' => 'text',
        'default' => 16,
        'attributes' => array(
            'type' => 'number',
            'pattern' => '\d*',
        )
    ) );
    
    $cmb_options->add_field(
        array(
            'name' => esc_html__( 'Caption Color', 'keystone-elements-addons'),  
            'id' => 'lightbox_caption_color',
            'type' => 'colorpicker',
            'default' => '#ffffff',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb_options->add_field(
        array(
            'name' => esc_html__( 'Caption Background Color', 'keystone-elements-addons'),  
            'id' => 'lightbox_caption_bg',
            'type' => 'colorpicker',
            'default' => 'rgba(0,0,0,0.7)',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb_options->add_field(
        array(
            'name' => esc_html__( 'Loader Color', 'keystone-elements-addons'),  
            'id' => 'lightbox_loader_color',
            'type' => 'colorpicker',
            'default' => '#000000',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );
    
    $cmb_options->add_field(
        array(
            'name' => esc_html__( 'Loader Background Color', 'keystone-elements-addons'),  
            'id' => 'lightbox_loader_bg_color',
            'type' => 'colorpicker',
            'default' => '#ffffff',
            'options' => array(
                'alpha' => true, 
            ),
        )
    );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Template Library', 'keystone-elements-addons' ),
		'id'            => 'ext_template_library',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Protected Content', 'keystone-elements-addons' ),
		'id'            => 'ext_protected_content',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Widget Animations', 'keystone-elements-addons' ),
		'id'            => 'ext_animations',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Background Effects', 'keystone-elements-addons' ),
		'id'            => 'ext_bg_effects',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Parallax Background', 'keystone-elements-addons' ),
		'id'            => 'ext_parallax_bg',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Gradient Background Animation', 'keystone-elements-addons' ),
		'id'            => 'ext_gradient_bg_anim',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Shape Divider', 'keystone-elements-addons' ),
		'id'            => 'ext_shape_divider',
        'type'	           => 'switch',
        'default'          => ''
    ) );

    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Template Shortcode', 'keystone-elements-addons' ),
		'id'            => 'ext_template_shortcode',
        'type'	           => 'switch',
        'default'          => ''
    ) );
    
    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Material Icons', 'keystone-elements-addons' ) . ' (1140+)',
		'id'            => 'ks-material-icons',
        'type'	           => 'switch',
        'default'          => ''
    ) );
    
    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Fontisto', 'keystone-elements-addons' ) . ' (616+)',
		'id'            => 'ks-fontisto',
        'type'	           => 'switch',
        'default'          => ''
    ) );
    
    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Iconic Font', 'keystone-elements-addons' ) . ' (300+)',
		'id'            => 'ks-iconic-font',
        'type'	           => 'switch',
        'default'          => ''
    ) );
    
    $cmb_options->add_field( array(
        'name'          => esc_html__( 'Linear Icons', 'keystone-elements-addons' ) . ' (170+)',
		'id'            => 'ks-linear-icons',
        'type'	           => 'switch',
        'default'          => ''
	) );

}



/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string $key     Options array key
 * @param  mixed  $default Optional default value
 * @return mixed           Option value
 */
function KEA_get_option( $key = '', $default = false ) {
	if ( function_exists( 'cmb2_get_option' ) ) {
		// Use cmb2_get_option as it passes through some key filters.
		return cmb2_get_option( 'KEA_settings', $key, $default );
	}

	// Fallback to get_option if CMB2 is not loaded yet.
	$opts = get_option( 'KEA_settings', $default );

	$val = $default;

	if ( 'all' == $key ) {
		$val = $opts;
	} elseif ( is_array( $opts ) && array_key_exists( $key, $opts ) && false !== $opts[ $key ] ) {
		$val = $opts[ $key ];
	}

	return $val;
}
