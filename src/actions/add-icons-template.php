<?php

/**
 * Since we can not override the 'includes/social_icons.php' file in Divi from plugins,
 * we append our 'includes/social_icons.php' by listening for the action fired by
 * the get_template_part('includes/social_icons') function in Divi's footer.php
 */
add_action("get_template_part_includes/social_icons", 'social_divi_add_icons');
function social_divi_add_icons()
{
    include __DIR__ . '/../includes/social_icons.php';
}

/**
 * Simple script that removes the default elegant themes icon list.
 */
add_action('wp_enqueue_scripts', 'social_divi_remove_et_icons');
function social_divi_remove_et_icons()
{
    wp_enqueue_script('social-divi-admin-script', plugins_url('/src/includes/social_divi_remove_et_icons.js', SOCIAL_DIVI_PLUGIN_FILE));
}
