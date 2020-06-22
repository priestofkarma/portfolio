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

		<div class="wrapper page_with_side section">
			<!-- Контент
						 ================================================== -->
			<div class="content_wrapper primary">

				<div class="lc_1 section">

                   <?php if (!get_search_query() == '' && have_posts()) : ?>

					   <h1 class="page-title">
                          <?php _e('Результаты поиска по запросу: '); ?>
						   <span class="page-description"><?php echo get_search_query(); ?></span>
					   </h1>

                      <?php
                      // Start the Loop.
                      while (have_posts()) :
                         the_post(); ?>

						  <article class="post">

							  <div class="entry_header cf">

								  <h1><a href="<?php the_permalink() ?>" title=""><?php the_title() ?></a></h1>

								  <p class="post-meta">

									  <time class="date"
									        datetime="2014-01-14T11:24"><?php echo get_the_date() ?></time>

									  Категории: <?php if (get_post_type() == 'post') {
                                        the_category(', ');
                                     } elseif (get_post_type() == 'portfolio') {
                                        the_terms(get_the_ID(), 'work-type');
                                     } ?>
								  </p>

							  </div>

							  <div class="post-thumb">
								  <a href="<?php the_permalink() ?>">
                                     <?php if (get_post_type() == 'post') {
                                        the_post_thumbnail();
                                     } elseif (get_post_type() == 'portfolio') {
                                        echo '<img src="' . get_field('work_preview') . '" alt="project-preview">';
                                     } ?>
								  </a>
							  </div>

							  <div class="post-content">

								  <p>

                                     <?php echo get_field('work_excerpt_fancy') ?>

                                     <?php the_excerpt() ?>

								  </p>

							  </div>

						  </article> <!-- post end -->

                      <?php // End the loop.

                      endwhile;


                      // If no content, include the "No posts found" template.
                      the_posts_pagination();
                   else :
                      echo '<h2>По вашему запросу: ' . get_search_query() . ', ничего не найдено</h2>';
                   endif;
                   ?>


				</div>
				<!-- <nav class="pagination">
										<span class="page-numbers prev inactive">Prev</span>
										<span class="page-numbers current">1</span>
										<a href="#" class="page-numbers">2</a>
										<a href="#" class="page-numbers">3</a>
										<a href="#" class="page-numbers">4</a>
										<a href="#" class="page-numbers">5</a>
										<a href="#" class="page-numbers">6</a>
										<a href="#" class="page-numbers">7</a>
										<a href="#" class="page-numbers">8</a>
										<a href="#" class="page-numbers">9</a>
										<a href="#" class="page-numbers next">Next</a>
								</nav> -->
			</div>
			<!-- Сайдбар
						 ================================================== -->
			<div class="side_wrapper secondary">

               <?php get_sidebar() ?>

			</div> <!-- secondary End-->
		</div>

	</div>

<?php get_footer() ?>