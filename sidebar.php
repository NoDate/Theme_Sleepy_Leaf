<?php
/**
 * Display sidebar containing main widget areas.
 * 
 * @since 1.0.0
 */
?>

<div id="secondary" class="widget-area" role="complementary">
    
    <?php
        do_action( 'before_sidebar' );
        if( ! dynamic_sidebar( 'sidebar-1' ) ) {
            
    ?>
    
        <aside id="search" class="widget widget_search">
            <?php get_search_form(); ?>
        </aside>

        <aside id="archives" class="widget">
            <h1 class="widget-title">
                <?php _e( 'Archives', 'sleepy_leaf' ); ?>
            </h1>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        
        <aside id="meta" class="widget">
            <h1 class="widget-title">
                <?php _e( 'Meta', 'sleepy_leaf' ); ?>
            </h1>
            <ul>
                <?php wp_register(); ?>
                <li>
                    <?php wp_loginout(); ?>
                </li>
                <?php wp_metal(); ?>
            </ul>
        </aside>
    <?php } ?>
</div>

<?php if( is_active_sidebar( 'sidebar-2' ) ) { ?>

    <div id="tertiary" class="widget-area" role="supplementary">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </div>

<?php } ?>
