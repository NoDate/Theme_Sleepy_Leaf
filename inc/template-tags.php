<?php
/**
 * Custom template tags for thsitheme.
 * 
 * @since 1.0.0
 */

if( ! function_exists( 'sleepy_leaf_posted_on' ) ) :
/*
 * Prints HTML with meta information for the post
 * 
 * @since 1.0.0
 */
    function sleepy_leaf_posted_on() {
        printf( __( 'Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date datetime="%3%s" pubdate>%4$s</time></a>'
                . '<span class="byline"> by <span class="author vcard"><a class="url fn n" href=%5$s" title="%5$s" '
                . 'rel="author">%7$s</a></span></span>', 'sleepy_leaf' ), 
                esc_url( get_permalink() ),
                esc_attr( get_the_time() ),
                esc_attr( get_the_date( 'c' ) ),
                esc_html( get_the_date() ),
                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
                esc_attr( sprintf( __( 'View all posts by %s', 'sleepy_leaf' ), get_the_author() ) ),
                esc_html( get_the_author() )
            );
    }
endif;

/*
 * Updates the list of categories.
 * 
 * @since 1.0.0
 * @return booleon true if blog has more than one category.
 */
function sleepy_leaf_categorized_blog() {
    
    $count_of_cats = get_transient( 'count_of_cats' );
        
    // If count not defined in transient, count from category list
    if( false === $count_of_cats ) {
        $list_of_cats = get_categories( array(
            'hide_empty' => 1,
        ) );
         
        $count_of_cats = count( $list_of_cats );
         
        set_transient( 'count_of_cats', $count_of_cats );
    }
    
    // Return if count is more than one
    if( '1' == $count_of_cats ) {
        return false;
    } else {
        return true;
    }
}

/*
 * Clear category transient.
 * 
 * @since 1.0.0
 */
function sleepy_leaf_category_transient_clear() {
    delete_transient( 'count_of_cats' );
}
add_action( 'edit_category', 'sleepy_leaf_category_transient_clear' );
add_action( 'save_post', 'sleepy_leaf_category_transient_clear' );
