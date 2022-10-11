<?php
/**
 * AMP plugin to remove noscript tag with images as child
 *
 * @package   Google\AMP_Remove_Noscript
 * @author    Milind, rtCamp, Google
 * @license   GPL-2.0-or-later
 * @copyright 2022 rtCamp Inc.
 *
 * @wordpress-plugin
 * Plugin Name: AMP Remove Noscript
 * Plugin URI: https://rtcamp.com/
 * Description: Plugin to remove duplicate images with noscript tag in AMP.
 * Version: 0.1
 * Author: Milind, rtCamp, Google
 * Author URI: https://rtcamp.com/
 * License: GNU General Public License v2 (or later)
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

namespace Google\AMP_Remove_Noscript;

/**
 * Whether the page is AMP.
 *
 * @return bool Is AMP.
 */
function is_amp() {
	return function_exists( 'amp_is_request' ) && amp_is_request();
}

/**
 * Run Hooks.
 */
function add_hooks() {
	/**
	 * Add sanitizers to convert non-AMP functions to AMP components.
	 *
	 * @see https://amp-wp.org/reference/hook/amp_content_sanitizers/
	 */
	add_filter( 'amp_content_sanitizers', __NAMESPACE__ . '\filter_sanitizers' );
}

add_action( 'wp', __NAMESPACE__ . '\add_hooks' );

/**
 * Add sanitizer to fix up the markup.
 *
 * @param array $sanitizers Sanitizers.
 * @return array Sanitizers.
 */
function filter_sanitizers( $sanitizers ) {
	require_once __DIR__ . '/sanitizers/class-sanitizer.php';
	$sanitizers[ __NAMESPACE__ . '\Sanitizer' ] = array();
	return $sanitizers;
}
