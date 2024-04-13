<?php
/*---------------------------------------------------
Add widget scripts
----------------------------------------------------*/

function KEA_dashboard_scripts($hook) {
    if( 'index.php' != $hook ) {
		return;
    }
    wp_enqueue_style('KEA-dashboard', KEA_PLUGINS_URL . 'admin/css/style.css');
}
add_action( 'admin_enqueue_scripts', 'KEA_dashboard_scripts' );

/**
 * Add a widget to the dashboard.
*/
function KEA_add_dashboard_widget() {
    wp_add_dashboard_widget(
        'kea_dashboard_widget',
        esc_html__( 'Keystone Elements Addons', 'keystone-elements-addons' ),
        'KEA_add_dashboard_function'
    );	
}
add_action( 'wp_dashboard_setup', 'KEA_add_dashboard_widget' );

/**
 * Create the function to output the contents of our Dashboard Widget.
 */

function KEA_add_dashboard_function() {
    $current_version = KEA_VERSION;
?>
<div id="kea-dashboard-widget">

<h3><span class="dashicons dashicons-megaphone"></span> <?php esc_html_e( 'News & Updates', 'keystone-elements-addons' ); ?></h3>
 
<?php
include_once( ABSPATH . WPINC . '/feed.php' );
 
$rss = fetch_feed( 'https://www.keystonethemes.com/feed/' );
 
if ( ! is_wp_error( $rss ) ) :
 
    $maxitems = $rss->get_item_quantity( 5 );
    $rss_items = $rss->get_items( 0, $maxitems );
 
endif;
?>
 
<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php esc_html_e( 'No items', 'keystone-elements-addons' ); ?></li>
    <?php else : ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>">
                    <?php echo esc_html( $item->get_title() ); ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
</div>   
<?php
}
/**
 * 
 * Version Check
 * 
 */