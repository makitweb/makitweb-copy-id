<?php
/**
 * Plugin Name:       Makitweb Copy ID
 * Plugin URI:        https://makitweb.com
 * Description:       A plugin to copy IDs with ease.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      7.4
 * Author:            Makitweb
 * Author URI:        https://makitweb.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       makitweb-copy-id
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MAKITWEB_COPY_ID_VERSION', '1.0.0' );
define( 'MAKITWEB_COPY_ID_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'MAKITWEB_COPY_ID_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

/**
 * Enqueue the copy-ID script on admin list table screens (posts and pages).
 */
function makitweb_copy_id_enqueue_scripts( $hook ) {
	if ( 'edit.php' !== $hook ) {
		return;
	}

	wp_enqueue_script(
		'makitweb-copy-id',
		MAKITWEB_COPY_ID_PLUGIN_URL . 'assets/js/copy-id.js',
		array(),
		MAKITWEB_COPY_ID_VERSION,
		true
	);
}
add_action( 'admin_enqueue_scripts', 'makitweb_copy_id_enqueue_scripts' );

/**
 * Add a "Copy ID" row action to posts and pages.
 *
 * @param array   $actions Existing row actions.
 * @param WP_Post $post    Current post object.
 * @return array Modified row actions.
 */
function makitweb_copy_id_row_action( $actions, $post ) {
	$actions['makitweb_copy_id'] = sprintf(
		'<a href="#" class="makitweb-copy-id" data-id="%d" aria-label="%s">%s</a>',
		absint( $post->ID ),
		esc_attr(
			sprintf(
				/* translators: %s: post or page title */
				__( 'Copy ID of "%s"', 'makitweb-copy-id' ),
				get_the_title( $post )
			)
		),
		esc_html__( 'Copy ID', 'makitweb-copy-id' )
	);

	return $actions;
}
add_filter( 'post_row_actions', 'makitweb_copy_id_row_action', 10, 2 );
add_filter( 'page_row_actions', 'makitweb_copy_id_row_action', 10, 2 );
