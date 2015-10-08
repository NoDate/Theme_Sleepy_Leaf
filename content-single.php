<?php
/**
 * Content for single post.
 * 
 * @since 1.0.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header>
        <h1 class="entry-title">
            <?php the_title(); ?>
        </h1>
        
        <div class="entry-meta">
            <?php sleepy_leaf_posted_on(); ?>
        </div>
    </header>
    
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'sleepy_leaf' ),
            'after' => '</div>' ) );
        ?>
    </div>
    
    <footer class="entry-meta">
        <?php
        
            // Display categorires and tags
            $category_list = get_the_category_list( __( ', ', 'sleepy_leaf' ) );
            $tag_list = get_the_tag_list( '', __( ', ', 'sleepy_leaf' ) ) ;
            
            if( ! shape_categorized_blog() ) {
                
                if( '' != $tag_list ) {
                    $meta_text = __( 'This entry was tagged %2$s.  Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'sleepy_leaf' );
                } else {
                    $meta_text = __( 'Bookmark the <a href="%3$s" title=Permalink to %4$s" rel="bookmark">permalink</a>.', 'sleepy_leaf' );
                }
            } else {
                
                if( '' != $tag_list ) {
                    $meta_text = __( 'This entry was posted on %1$s and tagged %2$s.  Bookmark the <a href="$3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'sleepy_leaf' );
                } else {
                    $meta_text = __( 'This entry was posted in %1$s.  Bookmark the <a href="%3%s" title="permalink to %4%s" rel="bookmark">permalink</a>.', 'sleepy_leaf' );
                }
            }
            
            printf(
                    $meta_text,
                    $category_list,
                    $tag_list,
                    get_permalink(),
                    the_title_attribute( 'echo=0' )
                );
        ?>
        
        <?php edit_post_link( __( 'Edit', 'sleepy_leaf' ), '<span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
