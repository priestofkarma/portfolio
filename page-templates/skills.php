<?php
/* 
Template Name: Навыки
Template Post Type: page
*/
?>

<?php get_header() ?>


   <div class="page_container no_home_page">
      <!-- Вступительная секция
      ================================================== -->
      <div class="intro_section section">
         <div class="wrapper">
	         <div class="def_header">
		         <h1><?php echo get_field('entry_title')?></h1>
                <?php if(get_field('entry_excerpt')) {
                   echo get_field('entry_excerpt');
                }?>
	         </div>


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
            <div class="sw_1_wrapper">
            <?php if(get_field('skill_content')): ?>
               <div class="site_info_wrapper">
                  <div class="site_entry_info full_text">
                      <?php echo get_field('skill_content')?>
                  </div>
               </div>
				<?php endif; ?>
	            <!-- навыки
                  ================================================== -->
                <?php get_template_part( 'template-parts/skills-template' ); ?>

            </div>

         </div>
      </div>
   </div>
<?php get_footer() ?>