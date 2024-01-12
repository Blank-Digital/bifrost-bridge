<?php
/**
 * The Global Styles module for Bifrost Bridge.
 *
 * This module registers a new REST API route in WordPress to serve the global stylesheet.
 * It allows fetching the global stylesheet dynamically via a REST API endpoint. This is
 * particularly useful for headless WordPress setups where the frontend requires dynamic
 * access to the global stylesheet.
 *
 * @package bifrost-bridge
 */

namespace BIFROST\GlobalStyles;

/**
 * Registers a new REST API route for the global stylesheet.
 *
 * This function adds a new route to the WordPress REST API. The route serves
 * the global stylesheet ('/global-stylesheet.css') via a GET request. This endpoint
 * is accessible to all users, allowing easy retrieval of the global stylesheet.
 */
add_action(
	'rest_api_init',
	function () {
		register_rest_route(
			'bifrost/v1',
			'/global-stylesheet.css',
			array(
				'methods'             => 'GET',
				'callback'            => __NAMESPACE__ . '\\get_global_stylesheet',
				'permission_callback' => '__return_true', // Allow access to all users.
			)
		);
	}
);

/**
 * Callback function for the '/global-stylesheet.css' route.
 *
 * This function handles the request to the '/global-stylesheet.css' endpoint.
 * It fetches the global stylesheet content, sets the appropriate content type for CSS,
 * and outputs the stylesheet. The function then exits to prevent WordPress from
 * sending further output, ensuring that only the stylesheet content is returned.
 *
 * @return void
 */
function get_global_stylesheet() {
	// Fetch the global stylesheet content.
	$stylesheet = wp_get_global_stylesheet();

	ob_start();

	// Set the Content-Type to CSS.
	header( 'Content-Type: text/css' );

	echo esc_attr( $stylesheet );

	// Exit to prevent WordPress from sending further output.
	exit();
}
