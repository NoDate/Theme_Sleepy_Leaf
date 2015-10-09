<?php
/**
 * Display 404 page.
 * 
 * @since 1.0.0
 */

    get_header();
?>

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        
        <article id="post-0" class="post error404 not-found">
            <header class="entry-header">
                <h1 class="entry-title">
                    <?php _e( 'Oops! That page can&rsquo;t be found.', 'sleepy_leaf' ); ?>
                </h1>
            </header>
            
            <div class="entry-content">
                <p>
                    <?php _e( 'Sorry but this page could not be found.', 'sleepy_leaf' ); ?>
                </p>
                
                <?php
                    get_search_form();
                    the_widget( 'WP_Widget_Recent_Posts' );
                ?>
                
                <div class="widget">
                    <h2 class="widgettitle">
                        <?php _e( 'Most Used Categories', 'sleepy_leaf' ); ?>
                    </h2>
                    <ul>
                        <?php wp_list_categories( array(
                            'orderby' => 'count',
                            'order' => 'DESC',
                            'show_count' => 1,
                            'title_li' => '',
                            'number' => 10 ) );
                        ?>
                    </ul>
                </div>
                
                <?php
                    the_widget( 'WP_Widget_Archives', 'dropdown=1', 'after_title=</h2>Try looking in the monthly archives.' );
                    the_widget( 'WP_Widget_Tag_Cloud' );
                ?>
            </div>
        </article>
    </div>
</div>

<?php get_footer(); ?>
