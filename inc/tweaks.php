<?php
/**
 * Custom functions that act independently of the theme templates
 * 
 * @since 1.0.0
 */

/**
 * Shows home link with wp_nav_menu fallback and wp_page_menu
 * 
 * @since 1.0.0
 */
function sleepy_leaf_page_menu_args( $args ) {
    $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'sleepy_leaf_page_menu_args');

/**
 * Add custom classes to the array of body classes.
 * 
 * @since 1.0.0
 */
function sleepy_leaf_body_classes( $classes ) {
    if( is_multi_author ) {
        $classes[] = 'group-blog';
    }
}
add_filter( 'body_class', 'sleepy_leaf_body_classes' );
 
/**
 * Filter in a link to a content ID attribute for the next/previous image link on image attachment pages.
 * 
 * @since 1.0.0
 */
function sleepy_leaf_enhanced_image_navigation( $url, $id ) {
    if( ! is_attachment() && ! wp_attachment_is_image( $id ) ) {
        return $url;
    }
    
    $image = get_post( $id );
    if( ! empty( $image->post_parent ) && $image->post_parent != $id ) {
        $url .= '#main';
    }
    
    return $url;
}
add_filter( 'attachment_link', 'sleepy_leaf_enhanced_image_navigation', 10, 2 );
