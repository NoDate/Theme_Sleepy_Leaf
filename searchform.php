<?php
/**
 * Display search form.
 * 
 * @since 1.0.0
 */
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
    
    <label for="s" class="assistive-text">
        <?php _e( 'Search', 'sleepy_leaf' ); ?>
    </label>
    <input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_quuery() ); ?>"
           id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'sleepy_leaf' ); ?>" />
    <input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Search', 'sleepy_leaf' ); ?>" />
</form>
