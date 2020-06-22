<!-- <div class="search_wrap">
    <div class="lupa"><i class="fas fa-search"></i></div>
    <div class="hover_block">
        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
            <input type="search" value="<?php echo get_search_query() ?>" name="s"
                title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>">
            <button type="submit" class="icon_lupa" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>"><i
                    class="fas fa-search"></i></button>
        </form>
    </div>
</div>
 -->
    <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="search-field" placeholder="Что будем искать?" value="" name="s" />
        <button type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">
            <i class="fas fa-search"></i></button>
    </form>