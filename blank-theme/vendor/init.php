<?php

if (!function_exists('theme_scripts')) {
    /**
     * ページで読み込むCSS・JavaScript
     */
    function theme_scripts()
    {
        if (!is_admin()) {
            $theme =  wp_get_theme();
            $version = $theme->Version;
            wp_enqueue_style('styles', style('styles.css'), [], $version);
        }
    }

    add_action('wp_enqueue_scripts', 'theme_scripts');
}

if (!function_exists('setup_theme')) {
    /**
     * 追加するテーマの機能
     */
    function setup_theme()
    {
        add_theme_support('post-thumbnails');
    }

    add_action('after_setup_theme', 'setup_theme');
}

/* 不要記述の削除 */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'rest_output_link_wp_head');
/* 絵文字関連 */
remove_action('wp_head','wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


if (!function_exists("init_admin_page_favicon"))
{
    function init_admin_page_favicon() {
        echo '<link rel="shortcut icon" type="image/x-icon" href="' . image('favicon.ico') . '" />';
    }

    add_action('admin_head', 'init_admin_page_favicon');
}
