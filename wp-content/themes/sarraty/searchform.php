<form class="search_form clearfix" method="get" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="input-group">
        <input type="text" class="form-control" name="s" placeholder="<?php _e( 'Search the blog', 'asalah' ); ?>">
        <span class="input-group-btn">
            <input type="submit" id="searchsubmit" value="<?php echo esc_attr__( 'Go' ); ?>" />
            <button class="btn" type="button"><i class="fa fa-search"></i></button>
        </span>
    </div> 
</form>
