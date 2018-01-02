<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'nb_flower' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit"><i class="icon-search"></i></button>
        </span>
    </div>
</form>