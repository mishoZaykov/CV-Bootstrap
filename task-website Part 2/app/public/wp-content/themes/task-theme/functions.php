<?php
function development_scripts()
{
    wp_enqueue_style('style.css', get_stylesheet_uri());
    wp_enqueue_script('main.js', get_template_directory_uri() . '/main.js');
}
add_action('wp_enqueue_scripts', 'development_scripts');

function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

function enqueue_theme_scripts()
{
    wp_enqueue_script('jquery');

    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/custom-scripts.js', array('jquery'), '', true);
}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


function regsiter_theme_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => esc_html__('Primary Menu', 'custom'),
            'right-menu' => esc_html__('Right Menu', 'custom')
        )
    );
}
add_action('init', 'regsiter_theme_menus');

function theme_customize_register($wp_customize)
{
    // Primary menu
    $wp_customize->add_section('primary-menu', array(
        'title' => __('Primary Menu', 'theme'),
        'description' => sprintf(__('Options for primary menu', 'theme')),
        'priority' => 130
    ));

    $wp_customize->add_setting('primary-menu-title', array(
        'default' => _x('Primary Menu', 'theme'),
    ));

    $wp_customize->add_control('primary-menu-title', array(
        'label' => __('Primary Menu Title', 'theme'),
        'section' => 'primary-menu',
        'priority' => 1
    ));

    // Footer menu
    $wp_customize->add_section('footer', array(
        'title' => __('Footer', 'theme'),
        'description' => sprintf(__('Options for footer', 'theme')),
        'priority' => 130
    ));

    $wp_customize->add_setting('footer-title', array(
        'default' => _x('Footer title', 'theme'),
    ));

    $wp_customize->add_control('footer-title', array(
        'label' => __('Footer title', 'theme'),
        'section' => 'footer',
        'priority' => 1
    ));
}

add_action('customize_register', 'theme_customize_register');


function theme_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'theme'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>'
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Footer Widget', 'theme'),
            'id' => 'footer-widget-1',
            'description' => esc_html__('Add widgets here.', 'theme'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>'
        )
    );
}

add_action('widgets_init', 'theme_widgets_init');

add_theme_support('post-thumbnails');
