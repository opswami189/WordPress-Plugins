<?php

/**
 * Plugin Name: SiteViews
 * Plugin URI: https://github.com/opswami189/WordPress-Plugins/tree/master/SiteViews
 * Version:      1.0
 * Author:       Om Prakash
 * Author URI: https://www.linkedin.com/in/om-prakash-swami/
 * Description: An interactive plugin for counting the views of your site's homepage
 */

add_action('admin_menu', 'site_views_setup_menu');

function site_views_setup_menu()
{
    add_menu_page('Site Views page', 'Site Views', 'manage_options', 'site-views', 'test_init', 'dashicons-welcome-widgets-menus', 65);
}


function test_init()
{
    $postID = get_option('page_on_front');
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
?>
    <p style="font-size: 24px; margin-left: 2px;margin-top: 20px;"><?php echo "Site Views"; ?></p>
    <p style="font-size: 11px;margin-left: 2px;"><i><?php echo "Details of views count for the site"; ?></i></p>
    <h2 style="margin-left: 2px;"><?php echo  "Homepage Views - " . $count; ?></h2>
<?php
}

/**
 * Call this function in theme's header, footer or homepage template file to count each view.
 */
function count_views()
{
    $postID = get_option('page_on_front');
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

    return $count;
}
