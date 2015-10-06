<?php

/**
 * Set the content width based on the theme's design and stylesheet.
 * 
 * @since 1.0.0
 */
if( ! isset( $content_width ) ) {
    $content_width = 654;
}

if ( ! function_exists( 'sleepy_leaf_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * This function is hook into the after_setup_theme hook.
 *
 * @since 1.0.0
 */
function sleepy_leaf_setup() {

    /**
     * Custom template tags for this theme.
     */
    require( get_template_directory() . '/inc/template-tags.php' );
    
    /**
     * Custom functions that act independently of the theme templates
     */
    require ( get_template_directory() . '/inc/tweaks.php' );
    
    /**
     * Make theme available for translation
     */
    load_theme_textdomain( 'sleepy_leaf', get_template_directory() . '/languages' );
    
    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );
    
    /**
     * Enable support for the Aside Post Format
     */
    add_theme_support( 'post-formats', array( 'aside' ) );
    
    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array (
        'primary' => __( 'Primary Menu', 'sleepy_leaf'),
    ) );
}
endif;
add_action( 'after_setup_theme', 'sleepy_leaf_setup' );

/**
 * Enqueue scripts and styles
 */
function sleepy_leaf_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    
    if( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    
    wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true);

    if( is_singular() && wp_attachment_is_image() ) {
        wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
    }
}
add_action( 'wp_enqueue_scripts', 'sleepy_leaf_scripts');
