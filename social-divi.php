<?php

/**
 * Plugin Name: Social Divi
 * Plugin URI: https://github.com/jelleroorda/social-divi
 * Description: A simple extension on the social icons available in Divi. Requires the Font Awesome plugin to function.
 * Version: 1.0.0
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

// Let users know we need the font awesome plugin as a dependency
add_action('admin_init', 'check_for_font_awesome');
function check_for_font_awesome()
{
    if (is_admin() && current_user_can('activate_plugins') && !is_plugin_active('font-awesome/font-awesome.php')) {
        add_action('admin_notices', 'social_divi_needs_font_awesome');

        deactivate_plugins(plugin_basename(__FILE__));

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
}

// Displays a helpful message, to why the plugin wasn't successfully activated.
function social_divi_needs_font_awesome()
{
    ?><div class="error"><p><?php echo sprintf(esc_html(_x('Social Divi needs the Font Awesome plugin to work properly. Please install and activate %s first.', 'Error message when Font Awesome plugin is missing, %s is de link to Font Awesome plugin.', 'social-divi')), '<a href="' . admin_url('plugin-install.php?s=font+awesome&tab=search&type=term') . '">Font Awesome</a>'); ?></p></div><?php
}

// Bootstrap plugin
include_once dirname(__FILE__) . '/src/bootstrap.php';
