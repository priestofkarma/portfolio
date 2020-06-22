<?php
/* 
Template Name: Сервисы
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
				<h1><?php echo get_field('entry_title') ?></h1>
               <?php if (get_field('entry_excerpt')) {
                  echo get_field('entry_excerpt');
               } ?>
			</div>
		</div>
		<div class="wrapper page_with_side page_services section">
			<!-- Контент
            ================================================== -->
			<div class="content_wrapper primary">

				<div class="lc_1 section">
					<div class="lc_paragraph">
                       <?php if (get_field('entry_paragraph')):
                          echo get_field('entry_paragraph');
                       endif; ?>
					</div>


                   <?php if (get_field('service_header_par')): ?>
					   <div class="point_paragraph">

                          <?php while (has_sub_field('service_header_par')): ?>
							  <h3 class="point"><?php the_sub_field('service_header'); ?></h3>
							  <p><?php the_sub_field('service_paragraph'); ?></p>
                          <?php endwhile; ?>

					   </div>
                   <?php endif; ?>

					<div class="lc_paragraph">
                       <?php if (get_field('service_list_header')): ?>
						   <h3><?php echo get_field('service_list_header') ?></h3>
                       <?php endif; ?>


                       <?php if (get_field('service_list')): ?>
						   <ul>

                              <?php while (has_sub_field('service_list')): ?>
								  <li><span class="point"><?php the_sub_field('service_list_item'); ?></span></li>
                              <?php endwhile; ?>
						   </ul>

                       <?php endif; ?>

					</div>
                   <?php if (get_field('breaf_header')): ?>
					   <div class="block_desc">
						   <div class="def_header">
							   <h4><?php echo get_field('breaf_header') ?></h4>
						   </div>
						   <p>Бриф на разработку сайта – это документ в виде опросного листа согласовательного
							   характера,
							   предварительное техническое
							   задание, в котором прописываются основные параметры будущего сайта.</p>
						   <a href="<?php echo get_field('breaf_link') ?>" class="def_btn">Скачать бриф</a>

					   </div>

                   <?php endif; ?>


				</div>

			</div>
			<!-- Сайдбар
            ================================================== -->
			<div class="side_wrapper secondary">

               <?php get_sidebar(); ?>


			</div> <!-- secondary End-->
		</div>

       <?php echo do_shortcode('[feedback_form title="Хотите сайт на <span>Wordpress</span> ?" btn_text="Хочу сайт на Wordpress"]') ?>


	</div>


<?php get_footer() ?>