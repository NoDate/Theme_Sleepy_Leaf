<?php
/**
 * The main template file.
 * 
 * @since 1.0.0
 */

    get_header();
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <?php while ( have_posts() ) : the_post() ?>
        
            <?php get_template_part( 'content', get_post_format() ); ?>
        <?php endwhile; ?>
    </div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

