<?php
/**
 * Elementor Config File
 */

/**
* Module List
*/	
function KEA_get_module_list() {
    $KEA_module_list = apply_filters('KEA_modules',array( 
        "heading",
        "button", 
        "dropdown_button", 
        "smart_menu", 
        "accordion",
        "tabs",
        "table",
        "slider",
        "post_slider",
        "post_masonry",
        "post_carousel",
        "post_list",
        "post_timeline",
        "news_ticker",
        "share",
        "search_form",
        "photo_gallery",
        "gallery_slider",
        "banner",
        "portfolio_grid",
        "team_member",
        "team_carousel",
        "team_masonry",
        "price_table",
        "price_menu",
        "flip_box",
        "logo_grid",
        "site_logo",
        "testimonial",
        "testimonial_carousel",
        "business_hours",
        "login_form",
        "image_compare",
        "countdown",
        "counter",
        "piechart",
        "progress_bar",
        "text_rotator",
        "timeline",
        "qrcode",
        "shape",
        "tooltip",
        "statistics",
        "youtube_tv",
        "sticky_video",
        "scroll_nav",
        "weather",
        "bar_chart",
        "line_chart",
        "doughnut_chart",
        "radar_chart",
        "polar_area_chart",
        "pdf_viewer"
    ));
        
    // Check Contact Form 7 Plugin
    if ( class_exists( "WPCF7" ) ){
        array_push($KEA_module_list, 'contact_form_7');
    }

    // Check bbpress Plugin
    if (class_exists( 'bbPress' )) {
        array_push($KEA_module_list, 'bbpress_form');
        array_push($KEA_module_list, 'bbpress_content');
        array_push($KEA_module_list, 'bbpress_search');
    }

    // Check WooCommerce Plugin
    if (class_exists( 'woocommerce' )) {
        array_push($KEA_module_list, 'woo_slider');
        array_push($KEA_module_list, 'woo_masonry');
        array_push($KEA_module_list, 'woo_carousel');
        array_push($KEA_module_list, 'woo_table');
        array_push($KEA_module_list, 'woo_gallery');
        array_push($KEA_module_list, 'woo_button');
    }

    foreach ( $KEA_module_list as $module_name) {
        if (function_exists('KEA_get_option') && KEA_get_option($module_name)) {
            $KEA_module_list = array_diff($KEA_module_list, array($module_name));
        }
    }

    return $KEA_module_list;
 
}
add_action( "elementor/widgets/register", "KEA_get_module_list", 10, 1 );

/**
* Include Controls
*/	
function KEA_controls() {
    require_once( KEA_ABSPATH . '/includes/controls/fileselect-control.php' );
    \Elementor\Plugin::$instance->controls_manager->register_control( 'kea-file-select', new \KEA_FileSelect_Control() );
}

add_action( 'elementor/controls/controls_registered', 'KEA_controls' );

/**
* Include Widgets
*/	
function KEA_widgets() {
    foreach ( KEA_get_module_list() as $module_name) {
        include( KEA_ABSPATH . "/includes/widgets/".$module_name.".php" );
    }
}
add_action( "elementor/widgets/register", "KEA_widgets", 10, 1 );

/**
* Register CSS Files
*/	
function KEA_css(){

    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';
    
    // lib files
    wp_register_style('cj-lib-masonry' , KEA_PLUGINS_URL . 'assets/css/library/masonry'.$suffix.'.css', false, KEA_VERSION );
    wp_register_style('cj-lib-lightbox' , KEA_PLUGINS_URL . 'assets/css/library/featherlight'.$suffix.'.css', false, KEA_VERSION );
    wp_register_style('cj-lib-animate' , KEA_PLUGINS_URL . 'assets/css/library/animate'.$suffix.'.css', false, KEA_VERSION );
    wp_register_style('cj-lib-slick' , KEA_PLUGINS_URL . 'assets/css/library/slick'.$suffix.'.css', false, KEA_VERSION );
    wp_register_style('cj-lib-table' , KEA_PLUGINS_URL . 'assets/css/library/table'.$suffix.'.css', false, KEA_VERSION );

    if (function_exists('KEA_get_option') && !KEA_get_option('ext_parallax_bg')) {
        wp_enqueue_style('kea-parallax-bg' , KEA_PLUGINS_URL . 'assets/css/library/parallax-bg'.$suffix.'.css', false, KEA_VERSION );
    }

    if (function_exists('KEA_get_option') && !KEA_get_option('ext_gradient_bg_anim')) {
        wp_enqueue_style('kea-gradient-bg-anim' , KEA_PLUGINS_URL . 'assets/css/library/gradient-bg'.$suffix.'.css', false, KEA_VERSION );
    }

    // frontend
    wp_enqueue_style('cj-lib-frontend' , KEA_PLUGINS_URL . 'assets/css/frontend'.$suffix.'.css', false, KEA_VERSION );
        
    // widget files
    foreach (  KEA_get_module_list() as $module_name) {
        $file = KEA_PLUGIN_DIR_PATH . 'assets/css/'.$module_name.''.$suffix.'.css';
        if( file_exists($file) ){
            wp_register_style('cj-'. $module_name , KEA_PLUGINS_URL . 'assets/css/'.$module_name.''.$suffix.'.css', false, KEA_VERSION );
        }
    }		
}
add_action( "elementor/frontend/after_enqueue_styles", "KEA_css", 10, 1 );

/**
* Register JS files
*/	
function KEA_js(){
    
    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';

    // lib files
    wp_register_script('cj-afe-imagesloaded' , KEA_PLUGINS_URL . 'assets/js/library/imagesloaded'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    wp_register_script('cj-lib-masonry' , KEA_PLUGINS_URL . 'assets/js/library/masonry'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    wp_register_script('cj-lib-tabs' , KEA_PLUGINS_URL . 'assets/js/library/tabs'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    wp_register_script('cj-lib-lightbox' , KEA_PLUGINS_URL . 'assets/js/library/featherlight'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    wp_register_script('cj-lib-slick' , KEA_PLUGINS_URL . 'assets/js/library/slick'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    wp_register_script('cj-lib-chart' , KEA_PLUGINS_URL . 'assets/js/library/chart'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    wp_register_script('cj-lib-table' , KEA_PLUGINS_URL . 'assets/js/library/table'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
        
    // widget files
    foreach (  KEA_get_module_list() as $module_name) {
        $file = KEA_PLUGIN_DIR_PATH . 'assets/js/'.$module_name.''. $suffix .'.js';
        if( file_exists($file) ){
            wp_register_script('cj-'.$module_name , KEA_PLUGINS_URL . 'assets/js/'.$module_name.''. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
        }
    }

    if (function_exists('KEA_get_option') && !KEA_get_option('ext_animations')) {
        wp_enqueue_script('kea-animations' , KEA_PLUGINS_URL . 'assets/js/kea_animations'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    }

    if (function_exists('KEA_get_option') && !KEA_get_option('ext_bg_effects')) {
        wp_enqueue_script('kea-bg-effects' , KEA_PLUGINS_URL . 'assets/js/library/bg-effects'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
        wp_enqueue_script('kea-bg-effect-temp' , KEA_PLUGINS_URL . 'assets/js/library/bg-effect-temp'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
        wp_localize_script(
            'kea-bg-effect-temp',
            'CJBgEffectParams',
            [
                'cjURL' => KEA_PLUGINS_URL
            ]
        );
    }

    if (function_exists('KEA_get_option') && !KEA_get_option('ext_parallax_bg')) {
        wp_enqueue_script('kea-parallax-bg' , KEA_PLUGINS_URL . 'assets/js/library/parallax-bg'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    }

    if (function_exists('KEA_get_option') && !KEA_get_option('ext_gradient_bg_anim')) {
        wp_enqueue_script('kea-gradient-bg-anim' , KEA_PLUGINS_URL . 'assets/js/library/gradient-bg'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    }

    if (function_exists('KEA_get_option') && !KEA_get_option('ext_shape_divider')) {
        wp_enqueue_script('kea-shape-divider' , KEA_PLUGINS_URL . 'assets/js/library/shape-divider'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
        wp_localize_script(
            'kea-shape-divider',
            'CJDividerParams',
            [
                'cjURL' => KEA_PLUGINS_URL
            ]
        );
    }

    // localization
    $cj_table_param = array(
        "lengthMenu" => esc_html__( 'Display _MENU_ records per page', 'keystone-elements-addons' ),
        "zeroRecords" => esc_html__( 'Nothing found - sorry', 'keystone-elements-addons' ),
        "info" => esc_html__( 'Showing page _PAGE_ of _PAGES_', 'keystone-elements-addons' ),
        "infoEmpty" => esc_html__( 'No records available', 'keystone-elements-addons' ),
        "infoFiltered" => esc_html__( '(filtered from _MAX_ total records)', 'keystone-elements-addons' ),
        "searchPlaceholder" => esc_html__( 'Search...', 'keystone-elements-addons' ),
        "processing" => esc_html__( 'Processing...', 'keystone-elements-addons' ),
        "csvHtml5" => esc_html__( 'CSV', 'keystone-elements-addons' ),
        "excelHtml5" => esc_html__( 'Excel', 'keystone-elements-addons' ),
        "pdfHtml5" => esc_html__( 'PDF', 'keystone-elements-addons' ),
        "print" => esc_html__( 'Print', 'keystone-elements-addons' )
    );
    wp_localize_script('cj-lib-table', 'cj_table_vars', $cj_table_param);

}
add_action( 'elementor/frontend/after_register_scripts', 'KEA_js');


/**
* Register Editor JS
*/	
function KEA_editor_js(){

    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';
    
    // lib files
    wp_enqueue_style('cj-lib-lightbox' , KEA_PLUGINS_URL . 'assets/css/library/featherlight'. $suffix .'.css', false, KEA_VERSION );
    wp_enqueue_script('cj-lib-lightbox' , KEA_PLUGINS_URL . 'assets/js/library/featherlight'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );
    wp_enqueue_script('cj-afe-imagesloaded' , KEA_PLUGINS_URL . 'assets/js/library/imagesloaded'. $suffix .'.js', array( 'jquery' ), KEA_VERSION, true );

    wp_enqueue_script('cj-afe-editor' , KEA_PLUGINS_URL . 'assets/js/editor'. $suffix .'.js', array( 'jquery', 'underscore', 'backbone-marionette' ), KEA_VERSION, true );

    wp_localize_script(
        'cj-afe-editor',
        'CJEditorParams',
        [
            'cjURL' => KEA_PLUGINS_URL,
            'home'   => esc_url( home_url( '/' ) ),
            'root'   => esc_url_raw( rest_url() ),
            'nonce'  => wp_create_nonce( 'wp_rest' )
        ]
    );

    $theme_data = wp_get_theme(); 
    $main_theme_data = $theme_data->parent(); 

    if( ! empty( $main_theme_data ) ){		
        $theme_version = $main_theme_data->get("Version");
        $theme_name  = $main_theme_data->get("Name");
    }else{		
        $theme_version = $theme_data->get("Version");
        $theme_name  = $theme_data->get("Name");
    }
    
    wp_localize_script(
        'cj-afe-editor',
        'CJThemeLibrary',
            [            
                'themeName' =>  $theme_name,
                'themeVersion' =>  $theme_version,
                'themeURL'  => get_template_directory_uri(),
                'templates' => apply_filters( "KEA_THEME_LIB", "" )
            ]
    );
}

if (function_exists('KEA_get_option') && !KEA_get_option('ext_template_library')) {
    add_action( 'elementor/editor/before_enqueue_scripts', 'KEA_editor_js', 10 );
}

/**
* Lightbox Inline Styles
*/	
function KEA_lightbox_styles() {
    if (function_exists('KEA_get_option')) {
    $overlay_color = KEA_get_option('lightbox_overlay_color');
    $ui_color = KEA_get_option('lightbox_ui_color');
    $ui_hover_color = KEA_get_option('lightbox_ui_hover_color');
    $icon_size = KEA_get_option('lightbox_icon_size');
    $icon_padding = KEA_get_option('lightbox_icon_padding'); 
    $loader_color = KEA_get_option('lightbox_loader_color');
    $loader_bg_color = KEA_get_option('lightbox_loader_bg_color');  
    $caption_size = KEA_get_option('lightbox_caption_size');
    $caption_color = KEA_get_option('lightbox_caption_color');
    $caption_bg = KEA_get_option('lightbox_caption_bg');
    $caption_padding = KEA_get_option('lightbox_caption_padding');
    
    $inline_style = '';
    
    if ((!empty($caption_size)) && ($caption_size != '16')) {
        $inline_style .= '.featherlight .cj-gallery-caption {font-size: ' . $caption_size . 'px;}';
    }
    
    if ((!empty($caption_color)) && ($caption_color != '#ffffff')) {
        $inline_style .= '.featherlight .cj-gallery-caption {color: ' . $caption_color . ';}';
    }
    
    if ((!empty($caption_bg)) && ($caption_bg != 'rgba(0,0,0,0.7)')) {
        $inline_style .= '.featherlight .cj-gallery-caption {background-color: ' . $caption_bg . ';}';
    }
    
    if ((!empty($caption_padding)) && ($caption_padding != '20')) {
        $inline_style .= '.featherlight .cj-gallery-caption {padding-top: ' . $caption_padding . 'px;padding-bottom: ' . $caption_padding . 'px;}';
    }
    
    if ((!empty($overlay_color)) && ($overlay_color != 'rgba(0,0,0,0.7)')) {
        $inline_style .= '.featherlight:last-of-type {background: ' . $overlay_color . ';}';
    }
    
    if ((!empty($ui_color)) && ($ui_color != 'rgba(255,255,255,0.5)')) {
        $inline_style .= '.featherlight-next,.featherlight-previous,.featherlight .featherlight-close-icon {color: ' . $ui_color . ';}';
    }
    
    if ((!empty($ui_hover_color)) && ($ui_hover_color != '#ffffff')) {
        $inline_style .= '.featherlight-next:hover,.featherlight-previous:hover,.featherlight .featherlight-close-icon:hover {color: ' . $ui_hover_color . ';}';
    }
    
    if ((!empty($icon_size)) && ($icon_size != '30')) {
        $inline_style .= '.featherlight-next,.featherlight-previous,.featherlight .featherlight-close-icon {font-size: ' . $icon_size . 'px;line-height: ' . $icon_size . 'px;}';
    }
    
    if ((!empty($icon_padding)) && ($icon_padding != '25')) {
        $inline_style .= '.featherlight-previous {left: ' . $icon_padding . 'px;}';
        $inline_style .= '.featherlight-next {right: ' . $icon_padding . 'px;}';
        $inline_style .= '.featherlight .featherlight-close-icon {top: ' . $icon_padding . 'px;right: ' . $icon_padding . 'px;}';
    }
    
    if ((!empty($loader_color)) && ($loader_color != '#000000')) {
        $inline_style .= '.featherlight-loading .featherlight-content {border-top-color: ' . $loader_color . ';}';
    }
    
    if ((!empty($loader_bg_color)) && ($loader_bg_color != '#000000')) {
        $inline_style .= '.featherlight-loading .featherlight-content {border-bottom-color: ' . $loader_bg_color . ';border-left-color: ' . $loader_bg_color . ';border-right-color: ' . $loader_bg_color . ';}';
    }
    
    wp_add_inline_style( 'cj-lib-lightbox', $inline_style );
}
}

add_action('elementor/frontend/after_enqueue_styles','KEA_lightbox_styles', 9, 1 );

/**
* Add Elementor Category
*/	
function KEA_category($elements_manager){
    $elements_manager->add_category(
		'keystone-elements-addons',
		[
			'title' => esc_html__( 'Keystone Themes', 'keystone-elements-addons' ),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'KEA_category' );

/**
 * 
 * Enqueue admin styles
 * 
 */
function KEA_admin_style() {
    
    $suffix = ( defined( 'WPBT_SCRIPT_DEBUG' ) && WPBT_SCRIPT_DEBUG ) ? '' : '.min';

    wp_enqueue_style('cj-lib-modal' , KEA_PLUGINS_URL . 'assets/css/modal'.$suffix.'.css', false, KEA_VERSION );

} 

add_action( "elementor/editor/after_enqueue_styles", "KEA_admin_style", 10, 1 );
