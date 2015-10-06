<?php
/*
 * @since 1.0.0
 */
?>
        
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title">
            <a href="<?php the_permalink(); ?>"
               title="<?php echo esc_attr( sprintf( __( 'Permallink to %s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>"
               rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h1>

        <!-- Display post date and author if Post. -->
        <?php if( 'post' == get_post_type() ) : ?>
            <div class="entry-meta">
                <?php sleepy_leaf_posted_on(); ?>
            </div>
        <?php endif; ?>
    </header>

    <!-- Display excerpts for search results -->
    <?php if( is_search() ) : ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
        </div>
    <?php else : ?>
        <div class="entry-content">
            <?php the_content( __( 'Continue reading <span class="meta-nav">→</span>', 'sleepy_leaf' ) ); ?>
            <?php wp_link_pages( array( 'before' => '<div class="page-links' . __ ( 'Pages:', 'sleepy_leaf'), 'after' => '</div>' ) ); ?>
        </div>
    <?php endif ?>
    
    <!-- Show tags, categories, and comment link. -->
    <footer class="entry-meta">

        <?php if( 'post' == get_post_type() ) : ?>
            <?php
                $categories_list = get_the_category_list( __( ', ', 'sleepy_leaf' ) );
                if( $categories_list && sleepy_leaf_categorized_blog() ) :
            ?>
            <span class="cat-links">
                <?php printf( __( 'Posted in %1$s', 'sleepy_leaf' ), $categories_list ); ?>
            </span>
        <?php endif; ?>

        <?php
            $tags_list = get_the_tag_list( '', __( ', ', 'sleepy_leaf' ) );
            if( $tags_list ) :
        ?>
            <span class="sep"> | </span>
            <span class="tag-links">
                <?php printf( __( 'Tagged %1$s', 'sleepy_leaf' ), $tags_list ); ?>
            </span>
        <?php endif; ?>
    <?php endif; ?>

    <?php if( ! post_password_required() && ( comments_open() || '0' != get_comments() ) ) : ?>
        <span class="sep"> | </span>
        <span class="comments-link">
            <?php comments_popup_link( __( 'Leave a comment', 'sleepy_leaf' ), __( '1 Comment', 'sleepy_leaf'), __( '% Comments ', 'sleepy_leaf' ) ); ?>
        </span>
    <?php endif; ?>

    <?php edit_post_link( __( 'Edit', 'sleepy_leaf' ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
    </footer>
</article>
