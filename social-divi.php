<?php

/**
 * Plugin Name: SocialDivi
 * Description: A simple extension on the social icons available in Divi
 * Version: 0.0.1
 * Author: Jelle Roorda
 * Author URI: https://roordaict.nl
 * Text Domain: social-divi
 * Domain Path: /i18n/languages/
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}

// Define SOCIAL_DIVI_PLUGIN_FILE.
if (!defined('SOCIAL_DIVI_PLUGIN_FILE')) {
    define('SOCIAL_DIVI_PLUGIN_FILE', __FILE__);
}

// Bootstrap plugin
include_once dirname(__FILE__) . '/src/bootstrap.php';
