<?php
use Elementor\Plugin;

class KEA_Shortcode{

    private static $_instance = null;

    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct(){
        add_shortcode('ks-template', [$this, 'render_shortcode']);
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_styles' ] );
        if ( is_admin() ) {
			add_action( 'manage_elementor_library_posts_columns', [ $this, 'admin_columns_headers' ] );
			add_action( 'manage_elementor_library_posts_custom_column', [ $this, 'admin_columns_content' ], 10, 2 );
		}
        add_action( 'admin_enqueue_scripts', [ $this, 'admin_scripts' ]);
    }

    public function admin_scripts($hook) {
        global $post_type;
        if( 'elementor_library' == $post_type && 'edit.php' == $hook) {
            wp_enqueue_style('KEA-shortcode', KEA_PLUGINS_URL . 'admin/css/shortcode.css');
            wp_enqueue_script('KEA-shortcode' , KEA_PLUGINS_URL . 'admin/js/shortcode.js', array( 'jquery' ), KEA_VERSION, true );
        }
    }

    public function admin_columns_headers( $defaults ) {
		$defaults['kea_shortcode'] = esc_html__( 'KEA Shortcode', 'keystone-elements-addons' );
		return $defaults;
	}

	public function admin_columns_content( $column_name, $post_id ) {
		if ( 'kea_shortcode' === $column_name ) { ?>
            <div class="kea-shortcode-wrapper">
                <input id="kea-shortcode-input-<?php echo esc_attr($post_id); ?>" class="kea-shortcode-input" type="text" readonly onfocus="this.select()" value="[ks-template id=<?php echo esc_attr($post_id); ?>]" />
                <div class="kea-shortcode-tooltip">
                    <a class="kea-shortcode-btn button button-primary" data-clipboard-target="#kea-shortcode-input-<?php echo esc_attr($post_id); ?>">
                        <i class="eicons eicon-copy"></i>
                    </a>
                </div>
            </div>
		<?php }
	}

    public function render_shortcode($atts = []){

        if(!class_exists('Elementor\Plugin')){
            return '';
        }
        
        if(!isset($atts['id']) || empty($atts['id'])){
            return '';
        }

        return Plugin::instance()->frontend->get_builder_content_for_display($atts['id']);
    }

    public function enqueue_styles(){
        Plugin::instance()->frontend->enqueue_styles();
    }

}

/**
 * Returns the main instance of KEA_Shortcode.
 *
 * @since 1.0
 * @return KEA_Shortcode
 */
function KEA_Shortcode() {  
	return KEA_Shortcode::instance();
}

// Global for backwards compatibility.
$GLOBALS['KEA_Shortcode'] = KEA_Shortcode();