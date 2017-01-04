<?php
/*
Plugin Name: Compass Google Analytics Plugin
Plugin URI: http://coinso.com
Description: Adds a Google analytics trascking code to the <head> of your theme, by hooking to wp_head.
Author: Johhn coinso
Version: 1.0
 */

//Exit if accessed directly
if (!defined('ABSPATH')){
    exit;
}

//Global options var

$cga_options = get_option('cga_settings');

//Load scripts
require_once (plugin_dir_path(__FILE__) . '/inc/compass_analitycs_plugin_scripts.php');

//Load Content
require_once (plugin_dir_path(__FILE__) . '/inc/compass_analitycs_plugin_content.php');

//Load Settings only if on the admin side
if (is_admin()){
    require_once (plugin_dir_path(__FILE__) . '/inc/compass_analitycs_plugin_settings.php');
}

