<?php

/**
 * Adds extra information to the plugin meta on the plugins page (admin interface).
 * Right now we're just adding an easy option for people to rate the plugin.
 */
add_filter('plugin_row_meta', 'social_divi_extra_plugin_meta_data', 10, 2);
function social_divi_extra_plugin_meta_data($links, $file)
{
    if (plugin_basename(SOCIAL_DIVI_PLUGIN_FILE) !== $file) {
        return $links;
    }

    $links[] = __('Rate us:', 'social-divi')
        . "&nbsp;<span class='social-divi-star-rating'>"
            . "<a href='https://wordpress.org/support/plugin/social-divi/reviews/?rate=1#new-post' target='_blank' data-rating='1' title='" . __('Sucks!', 'social-divi') . "'>"
                . "<span class='dashicons dashicons-star-filled'></span>"
            . "</a>"
            . "<a href='https://wordpress.org/support/plugin/social-divi/reviews/?rate=2#new-post' target='_blank' data-rating='2' title='" . __('Okay', 'social-divi') . "'>"
                . "<span class='dashicons dashicons-star-filled'></span>"
            . "</a>"
            . "<a href='https://wordpress.org/support/plugin/social-divi/reviews/?rate=3#new-post' target='_blank' data-rating='3' title='" . __('Does the job', 'social-divi') . "'>"
                . "<span class='dashicons dashicons-star-filled'></span>"
            . "</a>"
            . "<a href='https://wordpress.org/support/plugin/social-divi/reviews/?rate=4#new-post' target='_blank' data-rating='4' title='" . __('Great', 'social-divi') . "'>"
                . "<span class='dashicons dashicons-star-filled'></span>"
            . "</a>"
            . "<a href='https://wordpress.org/support/plugin/social-divi/reviews/?rate=5#new-post' target='_blank' data-rating='5' title='" . __('Superb!', 'social-divi') . "'>"
                . "<span class='dashicons dashicons-star-filled'></span>"
            . "</a>"
        . "</span>";

    return $links;
}

/**
 * Simple stylesheet and script that will add the proper styling to the stars
 * These will only be applied in the plugins page (admin), also added
 * a simple script that changes the stars on hover.
 */
add_action('admin_enqueue_scripts', 'social_divi_admin_scripts', 1);
function social_divi_admin_scripts($page)
{
    if ('plugins.php' !== $page) {
        return;
    }

    wp_enqueue_style('social-divi-admin-style', plugins_url('/src/includes/social_divi_styles.css', SOCIAL_DIVI_PLUGIN_FILE));
    wp_enqueue_script('social-divi-admin-script', plugins_url('/src/includes/social_divi_scripts.js', SOCIAL_DIVI_PLUGIN_FILE));
}
