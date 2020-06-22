<?php
/*
Template Name: Блог
Template Post Type: page
*/
?>
<?php get_header() ?>


<div class="page_container no_home_page">
    <div class="main_y_wrap">
        <div class="wrapper">
            <div class="y_line y_line_1"></div>
            <div class="y_line y_line_2"></div>
            <div class="y_line y_line_3"></div>
            <div class="y_line y_line_4"></div>
            <div class="y_line y_line_5"></div>
            <div class="y_line y_line_6"></div>
            <div class="y_line y_line_7"></div>
            <div class="y_line y_line_8"></div>
        </div>
    </div>

    <div class="intro_section section">
        <div class="wrapper">
	        <h1><?php echo get_field('entry_title')?></h1>
            <?php if(get_field('entry_excerpt')) {
                echo get_field('entry_excerpt');
            }?>
        </div>
    </div>

    <div class="wrapper page_with_side page_services section">
        <!-- Контент
         ================================================== -->
        <div class="content_wrapper primary">

            <div class="lc_1 section">

                <?php global $wp_query;
                    $wp_query = new WP_Query(array(
                        // 'post_type' => 'post',
                        'posts_per_page' => 3,
                        'paged' => get_query_var('paged') ?: 1 // страница пагинации
                    ));
                    while( have_posts() ){
                        the_post(); ?>
                <article class="post">

                    <div class="entry_header cf">

                        <h1><a href="<?php the_permalink( ) ?>" ><?php the_title( ) ?></a></h1>

                        <p class="post-meta">

                            <time class="date" ><?php echo get_the_date() ?></time>
                            Категории: <?php the_category( ' / ' ) ?>

                        </p>

                    </div>

                    <div class="post-thumb">
                        <a href="<?php the_permalink( ) ?>" title="">
                            <?php the_post_thumbnail( ) ?>
                        </a>
                    </div>

                    <div class="post-content">

                       <?php the_excerpt() ?>

                    </div>

                </article> <!-- post end -->
                <?php  } the_posts_pagination( );?>
                <?php wp_reset_query(); // сброс $wp_query ?>

             
           
        </div>
                    </div>
        <!-- Сайдбар
         ================================================== -->
        <div class="side_wrapper secondary">

          <?php get_sidebar(  ) ?>

        </div> <!-- secondary End-->
    </div>

</div>


<?php get_footer() ?>