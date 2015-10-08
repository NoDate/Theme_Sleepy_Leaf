<?php
/**
 * Custom template tags for thsitheme.
 * 
 * @since 1.0.0
 */

if( ! function_exists( 'sleepy_leaf_posted_on' ) ) :
/**
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

/**
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

/**
 * Clear category transient.
 * 
 * @since 1.0.0
 */
function sleepy_leaf_category_transient_clear() {
    delete_transient( 'count_of_cats' );
}
add_action( 'edit_category', 'sleepy_leaf_category_transient_clear' );
add_action( 'save_post', 'sleepy_leaf_category_transient_clear' );

if( ! function_exists( 'sleepy_leaf_content_nav' ) ):
/**
 * Display navigation to next/previous pages.
 * 
 * @since 1.0.0
 */
    
    function sleepy_leaf_content_nav( $nav_id ) {
        global $wp_query, $post;
                
        // Check if nowhere to navigate.
        if( is_single() ) {
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next = get_adjacent_post( false, '', false );
            
            if( ! $next && ! $previous ) {
                return;
            }
        }
    
        // Check if less than one page in archives
        if( $wp_guery->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) ) {
            return;
        }
      
        if( is_single() ) {
            $nav_class = 'site-navigation post-navigation';
        } else {
            $nav_class = 'site_navigation paging-navigation';
        }
        ?>

        <nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
            <h1 class="assistive-text">
                <?php _e( 'Post navigation', 'sleepy_leaf' ); ?>
            </h1>
            
            <?php if( is_single() ) : ?>
            
                <?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'sleepy_leaf' ) . '</span> %title' ); ?>
                <?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'sleepy_leaf' ) . '</span>' ); ?>
            
            <?php elseif( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : ?>
            
                <?php if( get_next_post_link() ) : ?>
                    <div class="nav-previous">
                        <?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'sleepy_leaf' ) ); ?>
                    </div>
                <?php endif; ?>
            
                <?php if( get_previous_post_link() ) : ?>
                    <div class="nav-next">
                        <?php previous_post_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'sleepy_leaf' ) ); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
        </nav>
    <?php
    }
endif;
