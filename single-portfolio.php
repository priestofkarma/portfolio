<?php get_header() ?>

	<div class="page_container no_home_page">
		<!-- Вступительная секция
          ================================================== -->
		<div class="intro_section section">
			<div class="wrapper">
				<div class="def_header">
					<h1>Верстка сайта <span><?php the_title() ?></span></h1>
				</div>
			</div>
		</div>

		<div class="sw_1 section">
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

				<div class="sw_1_wrapper">
					<!-- информационный блок -->
					<div class="site_info_wrapper">
						<div class="site_entry_info">
                           <?php if (get_field('work_link')) : ?>
							   <div class="site_info">
								   <p class="info_h"><i class="fas fa-globe"></i>Сайт:</p>
								   <p><a target="_blank"
								         href="<?php echo get_field('work_link') ?>"><?php echo get_field('work_domain') ?></a>
								   </p>
							   </div>
                           <?php endif; ?>
                           <?php if (get_field('work_date_end')) : ?>
							   <div class="site_info">
								   <p class="info_h"><i class="far fa-calendar-alt"></i>Дата:</p>
								   <p><?php echo get_field('work_date_end') ?></p>
							   </div>
                           <?php endif; ?>
                           <?php if (get_the_terms(get_the_ID(), 'work_type')) : ?>
							   <div class="site_info">
								   <p class="info_h"><i class="fas fa-tools"></i>Тип работ:</p>
								   <p><?php the_terms(get_the_ID(), 'work_type') ?></p>
							   </div>
                           <?php endif; ?>
						</div>
					</div>
					<!-- заголовок -->
                   <?php if (get_field('about_client')) : ?>
					   <div class="client_block">
						   <h3>Заказчик</h3>
						   <p><?php echo get_field('about_client'); ?></p>
					   </div>
                   <?php endif; ?>

					<div class="work_short_desc_r">
                       <?php if (get_field('work_preview')) : ?>
						   <div class="task_img">

							   <a href="<?php echo get_field('work_img_fancy'); ?>" class="fancy task_img"
							      data-fancybox="proj_fancy">
								   <img class="lazy"
								        data-src="<?php echo get_field('work_preview'); ?>"
								        alt="Изображение работы"></a>
						   </div>
                       <?php endif; ?>


                       <?php if (get_field('work_task')): ?>
						   <div class="work_desc">
							   <h3>Задача</h3>
                              <?php while (has_sub_field('work_task')): ?>
								  <ul>
									  <li class="point"><?php the_sub_field('task_point'); ?></li>
								  </ul>
                              <?php endwhile; ?>


                              <?php if (get_field('work_deadline')): ?>
								  <h3>Дедлайн</h3>
								  <p><?php echo get_field('work_deadline'); ?></p>
                              <?php endif; ?>

						   </div>
                       <?php endif; ?>

					</div>

					<div class="work_short_desc_l">

                       <?php if (get_field('work_status')): ?>
						   <div class="work_desc">
							   <h3>В ходе работы</h3>
                              <?php while (has_sub_field('work_status')): ?>
								  <ul>
									  <li class="point"><?php the_sub_field('work_status_point'); ?></li>
								  </ul>
                              <?php endwhile; ?>
						   </div>
                       <?php endif; ?>

                       <?php if (get_field('work_img_optimize')): ?>
						   <div class="task_img">

                              <?php while (has_sub_field('work_img_optimize')): ?>
								  <a href="<?php echo the_sub_field('optimize_item'); ?>" class="fancy"
								     data-fancybox="proj_fancy">
									  <img class="lazy" data-src="<?php echo the_sub_field('optimize_item'); ?>"
									       alt="Изображение оптимизации"></a>
                              <?php endwhile; ?>
						   </div>

                       <?php endif; ?>

					</div>

					<!-- навигация по постам -->
					<ul class="post-nav cf">

						<li class="prev">
                           <?php previous_post_link($format = '%link', $link = '<strong>Предыдущая работа</strong> %title') ?>
						</li>
						<li class="next">
                           <?php next_post_link($format = '%link', $link = '<strong>Следующая работа</strong> %title') ?>
						</li>

					</ul>
				</div>
			</div>

		</div>
	</div>

<?php echo do_shortcode('[feedback_form title="Хотите <span>такую работу</span> ?" btn_text="Хочу такую работу !"]') ?>

	</div>


<?php get_footer() ?>