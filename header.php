<!DOCTYPE html>
<html lang="ru">

<?php wp_head() ?>

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-169350646-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-169350646-1');
	</script>

	<meta name='freelancehunt' content='6ef94c07fba183c' />
	<!--- Basic Page Needs
        ================================================== -->
	<meta charset="utf-8">
	<title><?php get_option('blogname'); ?></title>
	<!-- Favicon
        ================================================== -->
	<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
	<!-- Mobile Specific Metas
        ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="title" content="Портфолио веб-разработчика Евгения Петренко | Разработка сайтов на Wordpress">
	<meta name="description"
	      content="Евгений Петренко. Портфолио, блог веб-разработчика. Адаптивная верстка сайтов, посадка верстки на CMS Wordpress. Разработка сайта с нуля до выгрузки на хостинг.">
	<noscript>
		<style>
			.anim {
				opacity: 1 !important;
				transform: none !important;
			}
		</style>
	</noscript>

	<meta name="google-site-verification" content="fytTJc_3ERPACqsw2vWE67VwbJU6WtnxdG1Gk4gRT3I"/>
</head>

<!-- <body class="anim"> -->

<body class="anim">
<!-- Header
    ================================================== -->
<header class="header
    <?php
if (is_front_page()) {
   echo 'homepage';
} else {
   echo 'page_w_intro';
}
?>">
	<div class="wrapper">
		<div class="header_wrapper">

			<!-- логотип -->
			<a href="<?php echo home_url() ?>" class="main_logo">
               <?php echo bloginfo('name') ?>
			</a>


			<!-- меню -->
			<nav class="header_menu">
               <?php wp_nav_menu(array(
                   'theme_location' => 'header_menu',
                   'container' => null,
                   'menu_class' => 'nav',
                   'menu_id' => 'nav',
               )); ?>
			</nav>

			<!-- кнопка поиска -->
           <?php get_template_part('template-parts/search-template'); ?>


			<!-- кнопка молбильного меню -->
			<button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
			</button>

		</div> <!-- end header_wrapper -->
	</div> <!-- end wrapper -->

</header>