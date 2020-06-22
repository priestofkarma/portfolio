<?php get_header( ) ?>
<div class="page_container no_home_page">
    <!-- Вступительная секция
            ================================================== -->
    <div class="intro_section section">
        <div class="wrapper">
            <div class="def_header">
                <h1><?php the_title() ?></h1>
	            <?php echo get_field('entry_excerpt')?>
            </div>
        </div>
    </div>
    <div class="wrapper page_with_side page_services section">
        <!-- Контент
         ================================================== -->
        <div class="content_wrapper primary">

            <div class="lc_1 section post_content">
                <?php if (have_posts()) : while (have_posts() ) : the_post(); ?>
                    <?php the_post_thumbnail( ) ?>
                <?php the_content( ) ?>
               <?php endwhile; ?>
                <?php endif; ?>
                <!-- навигация по постам -->
                <ul class="post-nav cf">

                    <li class="prev">
                        <?php previous_post_link( $format = '%link', $link = '<strong>Предыдущая статья</strong> %title') ?>
                    </li>
                    <li class="next">
                        <?php next_post_link( $format = '%link', $link = '<strong>Следующая статья</strong> %title') ?>
                    </li>

                </ul>
            </div>

        </div>
        <!-- Сайдбар
         ================================================== -->
        <div class="side_wrapper secondary">

            <?php get_sidebar( ) ?>
        </div> <!-- secondary End-->
    </div>

</div>

<?php get_footer( ) ?>