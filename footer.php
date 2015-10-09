<?php
/**
 * Display footer.
 * 
 * @since 1.0.0
 */
?>

</div>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="site-info">
        
        <?php do_action( 'shape_credits' ); ?>
        <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'sleepy_leaf' ); ?>" rel="generator">
            <?php printf( __( 'Proudly powered by %s', 'sleepy_leaf' ), 'WordPress' ); ?>
        </a>
        <span class="sep"> | </span>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
     
</body>
</html>
