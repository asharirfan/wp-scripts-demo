<?php
/**
 * Plugin Name: WP Scripts Demo
 * Plugin URI: https://github.com/asharirfan/wp-scripts-demo
 * Description: A WordPress plugin to demo the use of @wordpress/scripts.
 * Author: mrasharirfan
 * Author URI: https://AsharIrfan.com
 * Version: 1.0.0
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package wp-scripts-demo
 * @since 1.0.0
 */

namespace AsharIrfan\WPScriptsDemo;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Add the demo page.
 *
 * @author Ashar Irfan
 * @since 1.0.0
 */
function wp_scripts_admin_page() {
	add_submenu_page(
		'tools.php',
		esc_html__( 'WP Scripts Demo', 'wp-scripts-demo' ),
		esc_html__( 'WP Scripts Demo', 'wp-scripts-demo' ),
		'manage_options',
		'wp-scripts-demo',
		__NAMESPACE__ . '\wp_scripts_demo_render'
	);
}
add_action( 'admin_menu', __NAMESPACE__ . '\wp_scripts_admin_page' );

/**
 * Render demo page.
 *
 * @author Ashar Irfan
 * @since 1.0.0
 */
function wp_scripts_demo_render() {

	$dependencies = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

	if ( file_exists( $dependencies ) ) {
		$asset_file = require $dependencies;

		wp_enqueue_script(
			'wp-scripts-demo-js',
			plugins_url( 'build/index.js', __FILE__ ),
			$asset_file['dependencies'],
			$asset_file['version'],
			true
		);
	}

	?>
	<div class="wrap">
		<h1 class="wp-heading-inline"><?php esc_html_e( 'WP Scripts Demo', 'wp-scripts-demo' ); ?></h1>
		<div id="wp-scripts-demo"></div>
	</div>
	<?php
}
