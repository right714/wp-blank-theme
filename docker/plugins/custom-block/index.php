<?php
/**
 * Plugin Name: Custom Block
 * Description:
 * Requires at least: 5.8
 * Requires PHP: 7.0
 * Version: 0.1.0
 * Author:
 * License:
 * License URI:
 * Text Domain: custom-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/block-editor/how-to-guides/block-tutorial/writing-your-first-block-type/
 */
if (!function_exists('create_custom_block')) {
    function create_custom_block() {
        $plugin_dir_path = plugin_dir_path(__FILE__);

        $asset_files = [
            [
                'name' => 'Example',
                'handle' => 'example',
                'asset' => include($plugin_dir_path . 'build/example.asset.php'),
                'category' => 'widgets',
                'icon' => 'wordpress',
            ],
            [
                'name' => 'Example child',
                'handle' => 'example-child',
                'asset' => include($plugin_dir_path . 'build/example.asset.php'),
                'category' => 'widgets',
                'icon' => 'wordpress',
            ],
        ];

        foreach ($asset_files as $file) {
            $register_handle = "cb-{$file['handle']}";
            wp_register_script(
                "{$register_handle}-script",
                plugins_url("build/{$file['handle']}.js", __FILE__),
                $file['asset']['dependencies'],
                $file['asset']['version']
            );
            wp_register_style(
                "{$register_handle}-style",
                plugins_url("build/style-{$file['handle']}.css", __FILE__),
                [],
                $file['asset']['version']
            );

            register_block_type("custom-block/{$file['handle']}", [
                'api_version' => 2,
                'title' => $file['name'],
                'icon' => $file['icon'],
                'category' => $file['category'],
                'editor_script' => "{$register_handle}-script",
                'editor_style' => "{$register_handle}-style",
                'style' => "{$register_handle}-style",
            ]);
        }
    }

    add_action('init', 'create_custom_block');
}
