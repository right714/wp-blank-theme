<?php

if (!function_exists('asset')) {
    /**
     * Assetディレクトリへのパス
     *
     * @param {string} $path
     */
    function asset($path = '') {
        return get_stylesheet_directory_uri() . '/assets/' . $path;
    }
}

if (!function_exists('style')) {
    /**
     * CSSディレクトリへのパス
     *
     * @param {string} $path CSSファイル名（拡張子含む）
     */
    function style($path = '') {
        return asset('css/' . $path);
    }
}

if (!function_exists('script')) {
    /**
     * Scriptディレクトリへのパス
     *
     * @param {string} $path JSファイル名（拡張子含む）
     */
    function script($path = '') {
        return asset('scripts/' . $path);
    }
}

if (!function_exists('image')) {
    /**
     * Imageディレクトリへのパス
     *
     * @param {string} $path 画像ファイル名（拡張子含む）
     */
    function image($path = '') {
        return asset('images/' . $path);
    }
}

if (!function_exists('get_current_page')) {
    function get_current_page() {
        if (is_page()) {
            global $post;
            return $post->post_name;
        }

        return get_post_type();
    }
}

if (!function_exists('get_page_title')) {
    function get_page_title() {
        $title = '';

        $post_type = get_query_var('post_type');
        if (!empty($post_type)) {
            if (is_singular()) $title .= get_the_title() . ' | ';

            $post_type_obj = get_post_type_object($post_type);
            $title .= $post_type_obj->labels->singular_name;
        }

        if (is_page() || is_home() || is_single()) {
            $title .= get_the_title();
            if (is_single()) {
                $title .= ' | ' . get_post_type_object('post')->labels->singular_name;
            }
        }

        if (is_front_page()) {
            $title = get_bloginfo('name');
        } else {
            $title .= ' | ' . get_bloginfo('name');
        }

        return trim(strip_tags($title));
    }
}