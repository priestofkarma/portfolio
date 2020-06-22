<div class="search_wrap">
    <div class="lupa"><i class="fas fa-search"></i></div>
    <div class="hover_block">
        <form id="h-search-form" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
            <input type="search" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" >
            <button type="submit" class="icon_lupa"  value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" ><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>