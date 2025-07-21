<?php
// 🔹 Enqueue Google Fonts and theme CSS files with cache busting
function norweh_enqueue_assets() {
    // Google Font: Poppins
    wp_enqueue_style(
        'norweh-google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap',
        array(),
        null
    );

    // Main compiled CSS (from SCSS)
    wp_enqueue_style(
        'norweh-style',
        get_template_directory_uri() . '/css/style.css',
        array(),
        filemtime(get_template_directory() . '/css/style.css') // Cache busting
    );

    // Conditionally load contact page CSS
    if (is_page_template('contact.php')) {
        wp_enqueue_style(
            'contact-style',
            get_template_directory_uri() . '/css/contact.css',
            array(),
            filemtime(get_template_directory() . '/css/contact.css')
        );
    }
}
add_action('wp_enqueue_scripts', 'norweh_enqueue_assets');


// 🔹 Enable Menu Support
add_theme_support('menus');


// 🔹 Register Theme Menus
function norweh_register_menus() {
    register_nav_menus(array(
        'primary'             => 'Primary Menu',
        'footer_quick_links' => 'Footer Quick Links',
        'footer_bottom'      => 'Footer Bottom Menu',
    ));
}
add_action('init', 'norweh_register_menus');


 //🔹 Add ACF Theme Options Page
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);
}


    // Sub Page: Footer Settings
    acf_add_options_sub_page(array(
        'page_title'  => 'Footer Settings',
        'menu_title'  => 'Footer',
        'parent_slug' => 'norweh-theme-options',
    ));



/* 🔹 Register Custom Post Type: Norweh Product
function register_norweh_product_cpt() {
    register_post_type('norweh_product', array(
        'labels' => array(
            'name' => 'Norweh Products',
            'singular_name' => 'Norweh Product',
        ),
        'public' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'products'),
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-store',
    ));
}
add_action('init', 'register_norweh_product_cpt');*/


/*
function norweh_widgets_init() {
  register_sidebar([
    'name' => 'Footer Logo',
    'id' => 'footer-logo',
    'before_widget' => '',
    'after_widget' => ''
  ]);
  register_sidebar([
    'name' => 'Footer Contact Info',
    'id' => 'footer-contact',  
    'before_widget' => '',
    'after_widget' => ''
  ]);
  register_sidebar([
    'name' => 'Footer Giveaway Form',
    'id' => 'footer-form',
    'before_widget' => '',
    'after_widget' => ''
  ]);
}
add_action('widgets_init', 'norweh_widgets_init');*/

