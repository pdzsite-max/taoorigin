<?php

if (!defined('ABSPATH')) {
    exit;
}

function taoorigin_disable_gutenberg($use_block_editor, $post) {
    return false;
}
add_filter('use_block_editor_for_post', 'taoorigin_disable_gutenberg', 10, 2);
add_filter('use_block_editor_for_post_type', '__return_false', 10);

function taoorigin_disable_comments() {
    return false;
}
add_filter('comments_open', 'taoorigin_disable_comments', 20, 2);
add_filter('pings_open', 'taoorigin_disable_comments', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);

function taoorigin_remove_comment_admin_menu() {
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'taoorigin_remove_comment_admin_menu');

function taoorigin_remove_comment_support() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}
add_action('init', 'taoorigin_remove_comment_support');

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'rest_output_link_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links');
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');

function taoorigin_dequeue_block_assets() {
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'taoorigin_dequeue_block_assets', 100);
