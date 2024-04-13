<?php
/**
 * Plugin Name: Keystone Elements Addons
 * Plugin URI: https://keystonethemes.com/plugins/keystone-elements-addons/
 * Description: Keystone Elements Addons Is A Premium Addon for Elementor Page Builder
 * Version: 1.0
 * Author: Keystone Themes
 * Author URI: https://keystonethemes.com
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/license-list.html#GPLCompatibleLicenses
 * Text Domain: keystone-elements-addons
 * Domain Path: /languages/
 *
 */

defined( 'ABSPATH' ) || exit;

if ( ! defined( 'KEA_PLUGIN_FILE' ) ) {
	define( 'KEA_PLUGIN_FILE', __FILE__ );
	define( 'KEA_PLUGIN_NAME', "Keystone Elements Addons" );
}

// Include the main KEA class.
if ( ! class_exists( 'KEA', false ) ) {
	include_once('class-kea.php');
}

/**
 * Returns the main instance of KEA.
 *
 * @since 1.0
 * @return KEA
 */
function KEA() {  
	return KEA::instance();
}

// Global for backwards compatibility.
$GLOBALS['KEA'] = KEA(); 