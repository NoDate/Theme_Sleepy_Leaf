<?php
/**
 * Display comments.
 * 
 * @since 1.0.0
 */

    // Check if password protected
    if( posted_password_required() ) {
        return;
    }
?>

<div id="comments" class="comments-area">
    <?php if( have_comments() ) { ?>
        <h2 class="comments-title">
            <?php
                printf( _n( 'One though on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'sleepy_leaf' ),
                        number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h2>
    
        <!-- Show navigation if enough comments -->
        <?php if( 1 < get_comments_pages_count() && get_options( 'page_comments' ) ) { ?>
            <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
                
                <h1 class="assistive-text">
                    <?php _e( 'Comment navigation', 'sleepy_leaf' ); ?>
                </h1>
                <div class="nav-previous">
                    <?php _e( 'Comment navigation', 'sleepy_leaf' ); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link( __( 'Newer Comments &rarr;', 'sleepy_leaf' ) ); ?>
                </div>
            </nav>
        <?php } ?>
        
        <ol class="commentlist">
            <?php wp_list_comments( array( 'callback' => 'sleepy_leaf_comment' ) ); ?>
        </ol>
        
        <!-- Show navigation if enough comments -->
        <?php if( 1 < get_comments_pages_count() && get_options( 'page_comments' ) ) { ?>
            <nav role="navigation" id="comment-nav-above" class="site-navigation comment-navigation">
                
                <h1 class="assistive-text">
                    <?php _e( 'Comment navigation', 'sleepy_leaf' ); ?>
                </h1>
                <div class="nav-previous">
                    <?php _e( 'Comment navigation', 'sleepy_leaf' ); ?>
                </div>
                <div class="nav-next">
                    <?php next_comments_link( __( 'Newer Comments &rarr;', 'sleepy_leaf' ) ); ?>
                </div>
            </nav>
            <?php }

                if( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) {
            ?>
            
            <p class="nocomments">
                <?php _e( 'Comments are closed.', 'sleepy_leaf' ); ?>
            </p>
            
        <?php }

            comment_form(); 
        }
        ?>
</div>
 