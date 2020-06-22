<!-- h. Футер
================================================== -->
<footer class="footer">
	<div class="wrapper">
		<div class="footer_container">
			<div class="footer_wrap">

				<div class="f_col">

                   <?php if (get_field('tel_item', 'option')): ?>

					   <h4>Номер телефона</h4>
					   <ul>

                          <?php while (has_sub_field('tel_item', 'option')): ?>
							  <li>
								  <a href="tel:<?php the_sub_field('tel_number'); ?>"><?php the_sub_field('tel_text'); ?></a>
							  </li>
                          <?php endwhile; ?>

					   </ul>

                   <?php endif; ?>


				</div>

				<div class="f_col">
                   <?php if (get_field('mail_item', 'option')): ?>
					   <h4>Почта</h4>
					   <ul>
                          <?php while (has_sub_field('mail_item', 'option')): ?>
							  <li></li><a
									  href="mailto:<?php the_sub_field('mail_link'); ?>"><?php the_sub_field('mail_title'); ?></a></li>
                          <?php endwhile; ?>
					   </ul>
                   <?php endif; ?>
				</div>

				<div class="f_col">

					<h4>Рубрики</h4>
					<ul>
                       <?php wp_list_categories(array(
                           'title_li' => '',
                       )); ?>
					</ul>

				</div>

				<div class="f_col">
					<h4>Проекты</h4>
					<ul>
                       <?php
                       $args = array(
                           'posts_per_page' => 4,
                           'post_type' => 'portfolio',
                           'post_status' => 'publish',
                       );

                       $result = wp_get_recent_posts($args);

                       foreach ($result as $p) {
                          ?>
						   <li><a href="<?php echo get_permalink($p['ID']) ?>"><?php echo $p['post_title'] ?></a></li>
                          <?php
                       }
                       ?>
					</ul>
				</div>

			</div>

			<!-- меню -->
			<div class="footer_menu">
				<!-- меню -->
               <?php wp_nav_menu(array(
                   'theme_location' => 'footer_menu',
                   'container' => null,
               )); ?>

			</div>

			<!-- социальный ссылки
			 ================================================== -->
           <?php get_template_part('template-parts/social-links-template'); ?>


			<div class="f_copyright"><?php echo get_field('copyright', 'option')?></div>

		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>

</html>