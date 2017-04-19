<form class="search_form clearfix" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="text" class="form-control" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e( 'Search for products', 'woocommerce' ); ?>">
        <span class="input-group-btn">
            <input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Go' ); ?>" />
        </span>
        <input type="hidden" name="post_type" value="product" />
    </div> 
</form>