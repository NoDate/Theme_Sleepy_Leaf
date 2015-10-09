<?php
/**
 * Display archive page.
 * 
 * @since 1.0.0
 */

    get_header();
?>

<section id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        
        <?php if( have_posts() ) { ?>
        
            <header class="page-header">
                <h1 class="page-title">
                    <?php
                    
                        if( is_category() ) {
                            
                            printf( __( 'Category Archives: %s', 'sleepy_leaf' ), '<span>' .single_cat_title( '', false ) . '</span>' );
                            
                        } elseif( is_tag() ) {
                            
                            printf( __( 'Tag Archives: %s', 'sleepy_leaf' ), '<span>' . single_tag_title( '', false ). '</span>' );
                            
                        } elseif( is_author() ) {
                            
                            the_post();
                            printf( __( 'Author Archives: %s', 'sleepy_leaf' ), '<span class="vcard">'
                                    . '<a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) )
                                    . ' title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
                            rewind_posts();
                            
                        } elseif( is_day() ) {
                            
                            printf( __( 'Daily Archives: %s', 'sleepy_leaf' ), '<span>' . get_the_date() . '</span>' );
                            
                        } elseif( is_month() ) {
                            
                            printf( __( 'Monthly Archives: %s', 'sleepy_leaf' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );
                            
                        } elseif( is_year() ) {
                            
                            printf( __( 'Yearly Archives: %s', 'sleepy_leaf' ), '<span>' . get_the_date( 'Y' ) . '</span>' );
                        } else {
                            _e( 'Archives', 'sleepy_leaf' );
                        }
                    ?>
                </h1>
                
                <?php
                
                    if( is_category() ) {
                        
                        $category_description = category_description();
                        
                        if( ! empty( $category_description ) ) {
                            
                        }
                    } elseif( is_tag() ) {
                        
                        $tag_description = tag_description();
                        if( ! empty( $tag_description ) ) {
                            echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
                        }
                    }
                ?>
            </header>
        
            <?php
            
                sleepy_leaf_content_nav( 'nav-above' ) ;
            
                while( have_posts() ) {

                    the_post();
                    get_template_part( 'content', get_post_format() );
                }
                
                sleepy_leaf_content_nav( 'nav-below' );
                
            } else {
                
                get_template_part( 'no_results', 'archive' );
                
            }
                
            ?>
    </div>
</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
