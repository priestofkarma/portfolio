<?php
/* 
Template Name: Контакты
Template Post Type: page
*/
?>

<?php get_header() ?>


	<div class="page_container no_home_page">
		<!-- Вступительная секция
        ================================================== -->
		<div class="intro_section pf_intro section">
			<div class="wrapper">
				<h1>Мои <span>Контакты</span></h1>
               <?php echo get_field('entry_excerpt') ?>

			</div>
		</div>

		<div class="с_1 section">
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
				<div class="с_1_wrapper">
					<!-- соц-сети -->
					<div class="c_1_social">


                       <?php if (get_field('mail_item')): ?>

						   <div>
							   <h4>Почта</h4>
							   <p>

                                  <?php while (has_sub_field('mail_item')): ?>
									  <a href="mailto:<?php the_sub_field('mail_link'); ?>"><?php the_sub_field('mail_title'); ?></a>
									  </br>
                                  <?php endwhile; ?>

							   </p>
						   </div>

                       <?php endif; ?>


                       <?php if (get_field('tel_item')): ?>

						   <div>
							   <h4>Телефон, Viber</h4>
							   <p>
                                  <?php while (has_sub_field('tel_item')): ?>
									  <a href="tel:<?php the_sub_field('tel_number'); ?>"><?php the_sub_field('tel_text'); ?></a>
									  </br>
                                  <?php endwhile; ?>

							   </p>
						   </div>

                       <?php endif; ?>

						<div>
							<h4>Социальные сети</h4>
                           <?php get_template_part('template-parts/social-links-template'); ?>
						</div>

					</div>


					<!-- форма -->
					<div id="contact-form">
						<!-- form -->
						<form name="contactForm" id="contactForm" method="post" action="">

							 <?php echo do_shortcode('[contact-form-7 id="258" title="Контактная форма"]') ?>

						</form> <!-- Form End -->

						<!-- contact-warning -->
						<div id="message-warning"></div>
						<!-- contact-success -->
						<div id="message-success">
							<i class="icon-ok"></i>Your message was sent, thank you!<br/>
						</div>

					</div>

				</div>

			</div>
		</div>
	</div>
<?php get_footer() ?>