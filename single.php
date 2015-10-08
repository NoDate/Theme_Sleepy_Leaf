<?php
/**
 * Displays single post.
 */

    get_header(); 
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        
        <?php while( have_posts() ) : the_post(); ?>
        
            <?php sleepy_leaf_content_nav( 'nav-above' ); ?>
        
            <?php get_template_part( 'content', 'single' ); ?>
        
            <?php sleepy_leaf_content_nav( 'nav-below' ); ?>
        
            <?php
                if( comments_open() || '0' != get_comments_number() ) {
                    comments_template( '', true );
                }
            ?>
        
        <?php endwhile; ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
