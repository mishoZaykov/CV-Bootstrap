<?php
function development_scripts() {
    wp_enqueue_style('style.css', get_stylesheet_uri() );
    wp_enqueue_script('main.js', get_template_directory_uri() . '/main.js');
}
add_action('wp_enqueue_scripts', 'development_scripts');

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function enqueue_theme_scripts() {
    wp_enqueue_script('jquery');

    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');
