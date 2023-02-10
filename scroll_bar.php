<?php
/**
* Plugin Name: NT scrollbar plugin
* Plugin URI: https://www.facebook.com/ntamas.manolis/
* Description: Create beautiful scroll bar for your site.
* Version: 0.0.1
* Author: Ntamas
* Author URI: https://www.facebook.com/ntamas.manolis/
**/

require_once plugin_dir_path( __FILE__ ) . 'admin/create_scroll_bar_settings.php';
require_once plugin_dir_path( __FILE__ ) . 'public/export_scroll_bar_settings.php';


add_action( 'admin_enqueue_scripts', 'load_admin_styles' );
function load_admin_styles() {
    wp_enqueue_style( 'admin_scroll_bar_css', plugins_url( '/admin/css/scroll_bar_settings_page.css', __FILE__ ), false, '1.0', 'all' ); // Inside a plugin
}

$scrollbarCreation = new scrollbarCreation();

add_action('wp_enqueue_scripts', 'add_my_style_to_front_end');