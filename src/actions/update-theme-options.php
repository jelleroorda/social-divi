<?php

/**
 * Add our panel to the default available panels
 * in the Divi theme options page.
 */
add_filter('et_epanel_tab_names', 'social_divi_add_main_tab_to_theme_options', 10, 1);
function social_divi_add_main_tab_to_theme_options($tabs)
{
    $tabs['social-icons'] = _x('Social Icons', 'tab header in theme options', 'social-divi');

    return $tabs;
}

/**
 * Add the content to our panel in the options page.
 * Because we are hooking on Divi's layout filter,
 * we don't have to store the data ourselves.
 */
add_filter('et_epanel_layout_data', 'social_divi_add_extra_options_to_theme_options', 10, 1);
function social_divi_add_extra_options_to_theme_options($options)
{
    global $social_divi_available_icons;

    // Build the subtab + start subcontent
    $additional_tab_options = [
        [
            "name" => "wrap-social-icons",
            "type" => "contenttab-wrapstart",
        ],
            [
                "type" => "subnavtab-start",
            ],
                [
                    "name" => "social-icons-1",
                    "type" => "subnav-tab",
                    "desc" => "Enable social icons",
                ],
            [
                "type" => "subnavtab-end",
            ],
            [
                "name" => "social-icons-1",
                "type" => "subcontent-start",
            ],
    ];

    // Add all icon options
    foreach ($social_divi_available_icons as $icon) {
        // Add toggle for icon
        array_push($additional_tab_options, [
            "name" => sprintf(_x('Enable %s', 'form field title', 'social-divi'), $icon['translated_name']),
            "id" => "social_divi_{$icon['name']}_enabled",
            "type" => "checkbox2",
            "std" => "false",
            "desc" => sprintf(_x('Enabling this option will display an icon for %s where Divi adds them (default: secondary header + footer).', 'form field description', 'social-divi'), $icon['translated_name']),
        ]);

        // Add url for icon profile
        array_push($additional_tab_options, [
            "name" => sprintf(_x('%s profile URL', 'form field title', 'social-divi'), $icon['translated_name']),
            "id" => "social_divi_{$icon['name']}_url",
            "type" => "text",
            "std" => "",
            "desc" => sprintf(_x('The URL to your %s profile/account.', 'form field description', 'social-divi'), $icon['translated_name']),
            "[validation_type]" => "url",
        ]);
    }

    // close the subcontent + tab
    $additional_tab_options = array_merge($additional_tab_options, [
        [
            "name" => "social-icons-1",
            "type" => "subcontent-end",
        ],
        [
            "name" => "wrap-social-icons",
            "type" => "contenttab-wrapend",
        ],
    ]);

    return array_merge($options, $additional_tab_options);
}
