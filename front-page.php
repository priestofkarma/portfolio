<?php get_header(); ?>


	<!-- Контейнер для контента
        ================================================== -->
	<div class="page_container">

		<!-- c. Вступительная секция - Main Page.
            ================================================== -->
		<div class="m_1 section lazy" data-bg="url(<?php echo get_field('entry_bg') ?>)">

			<!-- x_lines -->
			<div class="main_x_wrap">
				<div class="x_wrapper">
					<div class="x_line x_line_1"></div>
					<div class="x_line x_line_2"></div>
					<div class="x_line x_line_3"></div>
					<div class="x_line x_line_4"></div>
				</div>
			</div>

			<!-- y_lines -->
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

			<!-- Контент вступительной секции
                ================================================== -->
			<div class="wrapper">
				<div class="m_1_wrapper">
					<!-- имя -->
					<div class="main_h1">
						<h1>
                           <?php echo get_field('home_header') ?>
						</h1>
						<p><?php echo get_field('home_subtitle') ?>
						</p>
					</div>

					<!-- первая квадратная ссылка -->
					<a href="<?php echo get_field('first_square_link_link') ?>" class="square_link skills_link">
                       <?php echo get_field('first_square_link_icon') ?>
						<span><?php echo get_field('first_square_link_text') ?></span>
					</a>

					<!-- вторая квадратная ссылка -->
					<a href="http://darklurkerr.com/portfolio" class="square_link port_link">
						<!-- <?php $published_posts = wp_count_posts('portfolio')->publish; ?> -->
						<div class="port_number"><?php echo $published_posts ?></div>
						<span>
                        <?php if ($published_posts == 1) {
                           echo 'Работа';
                        } else if ($published_posts > 1 && $published_posts < 5) {
                           echo 'Работы';
                        } else if ($published_posts < 1) {
                           echo 'Работ';
                        }
                        else if ($published_posts > 4) {
                           echo 'Работ';
                        }
                        ?>
                        в портфолио</span>
					</a>
					<a id="mouse_scroll" href="#welcome" class="m_1_mouse"><i class="fas fa-angle-down"></i></a>
				</div>
			</div>
		</div>
		<!-- d. Добро пожаловать - Main Page.
            ================================================== -->
		<div class="m_2 section">

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

				<div class="m_2_wrapper">
					<div class="anhor" id="welcome"></div>

					<div class="def_header">
						<h2><?php echo get_field('m_2_title') ?></h2>
					</div>

					<div class="m_2_img_wrap">

						<div class="m_2_par">
                           <?php echo get_field('m_2_paragraph') ?>
						</div>

						<img class="m_2_img lazy"
						     data-src="<?php echo get_field('m_2_img') ?>">
						</img>

					</div>




				</div>
			</div>
		</div>


		<!-- d. Портфолио
            ================================================== -->
		<div class="m_3 section">
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
				<div class="m_3_wrapper">

					<div class="def_header">
						<h3>Мое <span>портфолио</span></h3>
					</div>
					<div class="project_wrap">
                       <?php global $wp_query;
                       $wp_query = new WP_Query(array(
                           'post_type' => 'portfolio',
                           'posts_per_page' => 4,
                       ));
                       while (have_posts()) {
                          the_post(); ?>
						   <!-- одна работа -->
						   <div class="project_item">
							   <img class="lazy pr_img" data-src="<?php echo get_field('work_preview') ?>" alt="work">
							   <div class="pr_target">
								   <div class="overlay">
									   <div class="item_title">
										   <span>Типы работ: <?php the_terms(get_the_ID(), 'work_type') ?></span>
										   <h3><?php echo get_field('work_title') ?></h3>
									   </div>
									   <a href="<?php echo get_field('work_img_fancy') ?>" data-fancybox="proj_fancy"
									      class="fancy"
									      data-caption="<?php echo get_field('work_excerpt_fancy') ?>">
										   <i class="fas fa-search-plus"></i>
									   </a>
								   </div>
								   <a href="<?php the_permalink() ?>" class="project_link">Смотреть работу</a>

							   </div>
						   </div>
						   <!-- одна работа -->
                       <?php } ?>

                       <?php wp_reset_query(); // сброс $wp_query ?>
					</div>
					<a href="http://darklurkerr.com/portfolio" class="def_btn">Смотреть все работы</a>

				</div>
			</div>
		</div>
		<!-- конец портфолио -->

		<div>
			<div class="wrapper">
				<!-- навыки
    ================================================== -->
               <?php get_template_part('template-parts/skills-template'); ?>


               <?php if (get_field('skill_btn_text')) :
                  echo '<a href="' . get_field('skill_btn_link') . '" class="def_btn">' . get_field('skill_btn_text') . '</a></p></div>';
               endif; ?>
			</div>
		</div>

       <?php echo do_shortcode('[feedback_form title="необходима <span>консультация</span> по проекту ?" btn_text="получить консультацию"]') ?>



       <?php global $wp_query;

       $wp_query = new WP_Query(array(
           'post_type' => 'my_review',
          // 'posts_per_page' => 2,
       ));
       if (have_posts()) {
          echo '<!-- d. Мои отзывы
            ================================================== -->
				<div class="m_4 section">
		
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
		
						<div class="m_4_wrapper">
		
							<div class="def_header">
								<h3><span>Отзывы</span> обо мне</h3>
							</div>
							<!-- слайдер с отзывами -->
							<div class="my_feedback">';

          while (have_posts()) {
             the_post(); ?>
			  <!-- один отзыв -->
			  <div class="feedback_item">
                 <?php echo get_field('feedback_content') ?>
				  <div class="client_profile">
					  <div class="client_img lazy" data-bg="url(<?php echo get_field('client_img') ?>)">
					  </div>
					  <div class="client_name">
						  <p><?php echo get_field('client_name') ?></p>
                         <?php if (get_field('work_type_review')) :
                            echo '<span >' . get_field('work_type_review') . '</span>';
                         endif; ?>
					  </div>
				  </div>
			  </div>
			  <!-- один отзыв -->

          <?php }
          echo '</div></div></div></div>';
       }
       wp_reset_query(); // сброс $wp_query ?>


		<!-- g. Последние посты - Main Page.
            ================================================== -->
		<div class="m_6 section">
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
				<div class="m_6_wrapper">
					<div class="def_header">
						<h3><span>Последние</span> статьи</h3>
					</div>

					<div class="posts_wrap">

                       <?php global $wp_query;

                       $wp_query = new WP_Query(array(
                           'post_type' => 'post',
                           'posts_per_page' => 2,
                       ));

                       while (have_posts()) {
                          the_post(); ?>
						   <!-- один пост -->
						   <article class="post">

							   <div class="entry_header cf">

								   <h1><a href="<?php the_permalink() ?>" title=""><?php the_title() ?></a></h1>

								   <p class="post-meta">

									   <time class="date"><?php echo get_the_date() ?></time>
									   Категории: <?php the_category(' / ') ?>
								   </p>
							   </div>

							   <div class="post-content">

                                  <?php the_excerpt() ?>

							   </div>

						   </article>
						   <!-- один пост -->
                       <?php } ?>
                       <?php wp_reset_query(); // сброс $wp_query ?>
					</div>

				</div>
			</div>
		</div>


	</div>

<?php get_footer(); ?>