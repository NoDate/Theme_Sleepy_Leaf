<?php
/**
 * Display page content.
 * 
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-head">
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
    </header>
    
    <div class="entry-content">
        <?php
        
            the_content();
            
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'sleepy_leaf' ),
                'after' => '</div>'
            ) );
            
            edit_post_link( __( 'Edit', 'sleepy_leaf' ), '<span class="edit-link">', '</span>' );
        ?>
    </div>
</article>
