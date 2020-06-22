<?php 
/* 
Template Name: Портфолио
Template Post Type: page
*/
?>

<?php get_header() ?>

   <div class="page_container no_home_page">
      <!-- Вступительная секция
      ================================================== -->
      <div class="intro_section pf_intro section">
         <div class="wrapper">
            <h1><?php echo get_field('entry_title')?></h1>
	         <?php echo get_field('entry_excerpt')?>

         </div>
      </div>

      <div class="pf_1 section">
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

         <div class="wrapper">
            <div class="pf_1_wrapper">

               <div class="project_wrap pf_grid">

                <?php global $wp_query;
                    $wp_query = new WP_Query(array(
                        'post_type' => 'portfolio',
                        'posts_per_page' => 4,
                    ));
                    while( have_posts() ){
                        the_post(); ?>
                    <!-- одна работа -->
                    <div class="pf_item">
                     <a href="<?php the_permalink() ?>">
                        <img class="lazy" data-src="<?php echo get_field('work_preview')?>" alt="work">
                        <div class="overlay"></div>
                        <i class="fas fa-link"></i>
                     </a>
                     <div class="pf_excerpt">
                        <h5><?php echo get_field('work_title') ?></h5>
	                     <p><?php echo get_field('work_excerpt_fancy') ?></p>
                        <span><?php the_terms( get_the_ID(), 'work_type', 'Тип работы: ') ?></span>
                     </div>
                  </div>
                    <!-- одна работа -->
                    <?php  } ?>
                    <?php wp_reset_query(); // сброс $wp_query ?>
               </div>
            </div>

         </div>
      </div>
      <!--  Форма консультации
        ================================================== -->
       <?php echo do_shortcode('[feedback_form title="необходима <span>консультация</span> по проекту ?" btn_text="получить консультацию"]') ?>

   </div>

<?php get_footer() ?>