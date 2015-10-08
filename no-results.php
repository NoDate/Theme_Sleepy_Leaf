<?php
/**
 * Display post not found.
 * 
 * @since 1.0.0
 */
?>

<article id="post-0" class="post no-results not-found">
    <header class="entry-header">
        <h1 class="entry-title">
            <?php _e( 'Nothing Found', 'sleepy_leaf' ); ?>
        </h1>
    </header>
    
    <!-- Display message based on page. -->
    <div class="entry-content">
        <?php if( is_home() && current_user_can( 'publish_posts' ) ) : ?>
            <p>
                <?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get start here</a>.', 'sleepy_leaf' ), 
                        admin_url( 'post-new.php' ) );
                ?>
            </p>
        <?php elseif( is_search() ) : ?>
            <p>
                <?php _e( 'No results found.  Please try again with different keywords.', 'sleepy_leaf' ); ?>
            </p>
            <?php get_search_form(); ?>
        <?php else : ?>
            <p>
                <?php _e( 'Not found.', 'sleepy_leaf' ); ?>
            </p>
            <?php get_search_form(); ?>
        <?php endif; ?>
    </div>
</article>
 
