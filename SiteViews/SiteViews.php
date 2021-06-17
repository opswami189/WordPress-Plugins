<?php

/**
 * Plugin Name: SiteViews
 * Plugin URI: #
 * Version:      1.0
 * Author:       Om Prakash
 * Author URI: https://www.linkedin.com/in/om-prakash-swami/
 * Description: Demo plugin for creating forms
 */

add_action('admin_menu', 'site_views_setup_menu');

function test_plugin_setup_menu()
{
    add_menu_page('Site Views page', 'Site Views', 'manage_options', 'site-views', 'test_init', 'dashicons-welcome-widgets-menus',);
}


function test_init($postID)
{
    $count_key = 'views';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }

    echo $count . " Views";
}
