<?php
/**
 * KEA setup
 *
 * @package Keystone Elements Addons
 * @since 1.0
 */
 
/**
 * Main KEA Class.
 *
 * @class KEA
 */
final class KEA {

	/**
	 * KEA version.
	 *
	 * @var string
	 */
	public $version = '3.6';

	/**
	 * The single instance of the class.
	 *
	 * @var KEA
	 * @since 1.0
	 */
	protected static $_instance = null;

	/**
	 * Main KEA Instance.
	 *
	 * Ensures only one instance of KEA is loaded or can be loaded.
	 *
	 * @since 1.0
	 * @static
	 * @return KEA - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * KEA Constructor.
	 */
	public function __construct() {
		$this->define_constants(); 
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * When WP has loaded all plugins, trigger the `KEA_loaded` hook.
	 *
	 * This ensures `KEA_loaded` is called only after all other plugins
	 * are loaded, to avoid issues caused by plugin directory naming changing
	 * the load order. See #21524 for details.
	 *
	 * @since 1.0
	 */
	public function on_plugins_loaded() {
		do_action( 'KEA_loaded' );
	}

	/**
	 * Hook into actions and filters.
	 *
	 * @since 1.0
	 */
	private function init_hooks() {
		add_action( 'plugins_loaded', array( $this, 'on_plugins_loaded' ), -1 );		 
		add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ));
	}

	/**
	 * Admin Scripts
	 */
	function admin_scripts($hook){
		if ( 'toplevel_page_KEA_settings' != $hook ) {
			return;
		}
		global $wp_version;
		wp_enqueue_style('KEA-admin', KEA_PLUGINS_URL . 'assets/admin/admin.css', false, KEA_VERSION);
		wp_enqueue_script('KEA-admin-tabs' , KEA_PLUGINS_URL . 'assets/admin/tabs.js', array( 'jquery' ), KEA_VERSION, true );
		
		/**
		 * CMB2 WP 5.4.2+ compatibility
		 */
		if( version_compare( $wp_version, '5.4.2' , '>=' ) ) {
			wp_localize_script(
			'wp-color-picker',
			'wpColorPickerL10n',
			array(
				'clear'            => esc_html__( 'Clear', 'keystone-elements-addons' ),
				'clearAriaLabel'   => esc_html__( 'Clear color', 'keystone-elements-addons' ),
				'defaultString'    => esc_html__( 'Default', 'keystone-elements-addons' ),
				'defaultAriaLabel' => esc_html__( 'Select default color', 'keystone-elements-addons' ),
				'pick'             => esc_html__( 'Select Color', 'keystone-elements-addons' ),
				'defaultLabel'     => esc_html__( 'Color value', 'keystone-elements-addons' )
			)
			);
		}
	}

	/**
	 * Define Constants.
	 */
	private function define_constants() {
		$this->define( 'KEA_ABSPATH', dirname( KEA_PLUGIN_FILE ) . '/' );
		$this->define( 'KEA_PLUGIN_BASENAME', plugin_basename( KEA_PLUGIN_FILE ) );
		$this->define( 'KEA_VERSION', $this->version );	
		$this->define( 'KEA_PLUGINS_URL', plugins_url( '/', KEA_PLUGIN_FILE ) );	
		$this->define( 'KEA_PLUGIN_DIR_PATH', plugin_dir_path( KEA_PLUGIN_FILE ) );	
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string $name Constant name.
	 * @param string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {
		if ( file_exists( dirname( KEA_PLUGIN_FILE ) . '/includes/cmb2/init.php' ) ) {
			require_once dirname( KEA_PLUGIN_FILE ) . '/includes/cmb2/init.php';
		} elseif ( file_exists(  dirname( KEA_PLUGIN_FILE ) . '/includes/CMB2/init.php' ) ) {
			require_once dirname( KEA_PLUGIN_FILE ) . '/includes/CMB2/init.php';
		}
		include_once KEA_ABSPATH . 'admin/admin-dashboard.php';
		include_once KEA_ABSPATH . 'includes/admin-fields.php';
		include_once KEA_ABSPATH . 'includes/settings.php';		
		include_once KEA_ABSPATH . 'includes/helpers.php';
		include_once KEA_ABSPATH . 'includes/shortcodes.php';
		if (function_exists('KEA_get_option') && !KEA_get_option('ext_animations')) {
			include_once KEA_ABSPATH . 'includes/extentions/animations.php';
		}
		if (function_exists('KEA_get_option') && !KEA_get_option('ext_protected_content')) {
			include_once KEA_ABSPATH . 'includes/extentions/protected_content.php';
		}
		if (function_exists('KEA_get_option') && !KEA_get_option('ext_parallax_bg')) {
			include_once KEA_ABSPATH . 'includes/extentions/parallax_bg.php';
		}
		if (function_exists('KEA_get_option') && !KEA_get_option('ext_bg_effects')) {
			include_once KEA_ABSPATH . 'includes/extentions/bg_effects.php';
		}
		if (function_exists('KEA_get_option') && !KEA_get_option('ext_gradient_bg_anim')) {
			include_once KEA_ABSPATH . 'includes/extentions/gradient_bg.php';
		}
		if (function_exists('KEA_get_option') && !KEA_get_option('ext_shape_divider')) {
			include_once KEA_ABSPATH . 'includes/extentions/shape_dividers.php';
		}
		if (function_exists('KEA_get_option') && !KEA_get_option('ext_template_shortcode')) {
			include_once KEA_ABSPATH . 'includes/extentions/template_shortcode.php';
		}
		include_once KEA_ABSPATH . 'includes/elementor-config.php';
	}

	/**
	 * Include required frontend files.
	 */
	public function frontend_includes() {
	}
 
	/**
	 * Init KEA when WordPress Initialises.
	 */
	public function init() {
		// Before init action.
		do_action( 'before_KEA_init' );

		// Set up localisation.
		$this->load_plugin_textdomain();

		// Init action.
		do_action( 'KEA_init' );
	}

	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
	 *
	 * Locales found in:
	 *      - WP_LANG_DIR/keystone-elements-addons/keystone-elements-addons-LOCALE.mo
	 *      - WP_LANG_DIR/plugins/keystone-elements-addons-LOCALE.mo
	 */
	public function load_plugin_textdomain() {
		$locale = determine_locale();
		$locale = apply_filters( 'plugin_locale', $locale, 'keystone-elements-addons' );
		unload_textdomain( 'keystone-elements-addons' );
		load_textdomain( 'keystone-elements-addons', WP_LANG_DIR . '/keystone-elements-addons/keystone-elements-addons-' . $locale . '.mo' );
		load_plugin_textdomain( 'keystone-elements-addons', false, plugin_basename( dirname( KEA_PLUGIN_FILE ) ) . '/languages' );
	} 
}
include_once(plugin_dir_path( __FILE__ ) . 'includes/adb.php');
