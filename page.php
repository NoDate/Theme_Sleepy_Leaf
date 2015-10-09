<?php
/**
 * Display all pages.
 */

    get_header();
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        
        <?php
            while( have_posts() ) {
                
                the_post();
                get_template_part( 'content', 'page' );
                comment_template( '', true );
            }
        ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
