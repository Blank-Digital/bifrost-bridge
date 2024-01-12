<?php
/**
 * The Admin module.
 * Strongly inspired by the vip-decoupled bundle from Automattic.
 *
 * @package bifrost-bridge
 */

namespace BIFROST\Admin;

/**
 * Determine whether the site has been decoupled. Currently, this is only a
 * function of whether a distinct home URL has been set.
 *
 * @return bool
 */
function is_decoupled() {
	$frontend_url  = wp_parse_url( home_url(), PHP_URL_HOST );
	$frontend_port = wp_parse_url( home_url(), PHP_URL_PORT );
	$frontend      = $frontend_url . ( $frontend_port ? ':' . $frontend_port : '' );

	$backend_url  = wp_parse_url( site_url(), PHP_URL_HOST );
	$backend_port = wp_parse_url( site_url(), PHP_URL_PORT );
	$backend      = $backend_url . ( $backend_port ? ':' . $backend_port : '' );

	return $frontend !== $backend;
}
