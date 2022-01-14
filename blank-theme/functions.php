<?php

/*
 * Load WordPress Functions
 */

$dir = 'inc';

foreach (glob(__DIR__ . "/{$dir}/[^_]*.php") as $file) {
    require_once($file);
}