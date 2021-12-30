<?php
/**
 * Plugin Name: Getstream Chat
 * Plugin URI: https://github.com/heftysoft/hefty-getstream-chat
 * Description: A Wordpress plugin for Getstream Chat
 * Version: 1.0.0
 * Text Domain: hefty-getstream-chat
 * Author: Hefty Soft
 * Author URI: https://github.com/heftysoft
 */

// First register resources with init 
function hefty_getstream_chat_init() {
    $path = "/frontend/build/static";
    if(getenv('WP_ENV')=="development") {
        $path = "/frontend/static";
    }
    wp_register_script("hefty_getstream_chat_js", plugins_url($path."/js/main.js", __FILE__), array(), "1.0.0", false);
    wp_register_style("hefty_getstream_chat_css", plugins_url($path."/css/main.css", __FILE__), array(), "1.0.0", "all");
}

add_action( 'init', 'hefty_getstream_chat_init' );

// Function for add code that call React app
function hefty_getstream_chat() {
    wp_enqueue_script("hefty_getstream_chat_js", '1.0.0', true);
    wp_enqueue_style("hefty_getstream_chat_css");
    echo "<div id=\"hefty_getstream_chat\"></div>";
}

// Function for the short code that call React app
// function hefty_getstream_chat_shortcode() {
//   wp_enqueue_script("hefty_getstream_chat_js", '1.0.0', true);
//   wp_enqueue_style("hefty_getstream_chat_css");
//   return "<div id=\"hefty_getstream_chat\"></div>";
// }

// add_shortcode('hefty_getstream_chat', 'hefty_getstream_chat_shortcode');

add_action('wp_footer', 'hefty_getstream_chat');