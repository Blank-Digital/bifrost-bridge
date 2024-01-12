<?php
/**
 * The URLs module.
 * Strongly inspired by the vip-decoupled bundle from Automattic.
 *
 * @see https://github.com/Automattic/vip-decoupled-bundle/blob/trunk/urls/urls.php
 *
 * @package bifrost-bridge
 */

namespace BIFROST\URLs;

/**
 * Update the feed, rest API and media library resource urls to use siteurl.
 *
 * @return void
 */
function add_filters() {
	// Return if Home URL is not different to Site URL.
	if ( ! \Bifrost\Admin\is_decoupled() ) {
		return;
	}

	$filters = array(
		// Feed links, WP REST API, Media library.
		'author_feed_link',
		'category_feed_link',
		'feed_link',
		'post_comments_feed_link',
		'tag_feed_link',
		'taxonomy_feed_link',
		'rest_url',
		'wp_get_attachment_url',
	);

	foreach ( $filters as $filter ) {
		add_filter( $filter, __NAMESPACE__ . '\\update_resource_url', 10, 1 );
	}
}
add_filters();

/**
 * Setting `home` and `siteurl` options to different values helps us set
 * permalinks correctly, but it causes some problems for resources.
 * Filter those resources to use siteurl.
 *
 * @param  string $resource_url URL of a WordPress resource.
 * @return string
 */
function update_resource_url( $resource_url ) {

	$home_path = wp_make_link_relative( home_url() );
	if ( empty( $home_path ) ) {
		return $resource_url;
	}

	$resource_path = wp_make_link_relative( $resource_url );
	$resource_path = preg_replace( sprintf( '#^%s/*#', $home_path ), '/', $resource_path );

	return site_url( $resource_path );
}
