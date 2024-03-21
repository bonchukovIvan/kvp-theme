<form role="search" class="kvp-search__search-form" action="<?php echo home_url( '/' ) . $args['search_url']; ?>">
    <label>
        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
        <img src="<?php echo get_template_directory_uri();?>/assets/images/kvp-search.svg" alt="" set="">
        <input 
            type="search" 
            class="kvp-search__search-field"
            placeholder="<?php echo esc_attr_x( 'Пошук', 'placeholder' ) ?>"
            value="<?php echo isset($_GET['search_query']) ? $_GET['search_query'] : '';?>" 
            name="search_query"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <input type="submit" class="kvp-search__search-submit" value="<?php echo esc_attr_x( 'Пошук', 'submit button' ) ?>" />
</form>