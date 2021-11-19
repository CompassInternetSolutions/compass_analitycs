<?php
/*
Plugin Name: Compass Google Analytics Plugin
Plugin URI: https://github.com/CompassInternetSolutions/compass_analitycs
Description: Adds a Google analytics trascking code to your theme, by hooking.
Author: Johhn coinso / Ido Coinso
Author URI: http://coinso.com
Version: 3.0
Text Domain: cga_domain
 */

//Exit if accessed directly
if (!defined('ABSPATH')){
    exit;
}


//Setup
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/CompassInternetSolutions/compass_analitycs',
    __FILE__,
    'coinso-cga'
);
$myUpdateChecker->setBranch('production');
//Global options var

$cga_options = get_option('cga_settings');
$rhl_options = get_option('rhl_settings');


//Load Content
require_once (plugin_dir_path(__FILE__) . '/inc/compass_analitycs_plugin_content.php');

//Load Settings only if on the admin side
if (is_admin()){
    require_once (plugin_dir_path(__FILE__) . '/inc/compass_analitycs_plugin_settings.php');
    require_once (plugin_dir_path(__FILE__) . '/inc/compass_analitycs_plugin_rhl_settings.php');

}

//register the settings

function cga_register_settings(){
    register_setting('cga_settings_gruop', 'cga_settings');
    register_setting('rhl_settings_gruop', 'rhl_settings');

}
if ( is_admin() ){

    add_action('admin_init', 'cga_register_settings');
}
