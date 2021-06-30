<?php

/*
 * Load WordPress Functions
 */

$dir = 'vendor';

foreach (glob(__DIR__ . "/{$dir}/[^_]*.php") as $file) {
    require_once($file);
}