<?php

// Make the options we want to save available in wordpress.
include_once(__DIR__ . '/actions/set-available-icons.php');

// Add our tab + panel to the Divi theme options
include_once(__DIR__ . '/actions/update-theme-options.php');

// Add our icons to the view when Divi asks for the social icons.
include_once(__DIR__ . '/actions/add-icons-template.php');

// Add extra meta data to our plugin row.
include_once(__DIR__ . '/actions/add-links-to-plugin-meta.php');

// Set up i18n
load_plugin_textdomain('social-divi', false, plugin_basename(dirname(SOCIAL_DIVI_PLUGIN_FILE)) . '/i18n/languages');
