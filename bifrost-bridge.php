<?php
/**
 * Plugin Name: Bifrost Bridge
 * Plugin URI: https://bifrostjs.org/bifrost-bridge
 * Description: "Bifrost Bridge" is a WordPress plugin designed to complement the bifrost.js headless WordPress framework built on Next.js. It facilitates the use of WordPress as a headless CMS, providing essential tools and features for content management and integration. Additionally, the plugin includes key REST API routes needed for the headless system, ensuring a smooth and efficient workflow for developers implementing headless WordPress solutions with Next.js.
 * Version: 1.0
 * Author: Blank Digital
 * Author URI: https://blank-digital.com
 * License: GPL-3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 *
 * @package bifrost-bridge
 */

namespace BIFROST;

require_once __DIR__ . '/admin/admin.php';
require_once __DIR__ . '/urls/urls.php';
require_once __DIR__ . '/global-styles/global-styles.php';
