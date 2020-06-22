<?php
show_admin_bar(false);
/* Подключаем стили
================================================== */
function register_style_theme()
{
   wp_enqueue_style('style', get_stylesheet_uri());
   wp_enqueue_style('dafault', get_template_directory_uri() . '/assets/css/reload.css');
   wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/library/fontawesome/css/all.min.css');
   wp_enqueue_style('fancybox', get_template_directory_uri() . '/assets/library/fancybox/jquery.fancybox.min.css');
   wp_enqueue_style('slick', get_template_directory_uri() . '/assets/library/slick/slick.css');
   wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css');
   wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media.css');
}

add_action('wp_enqueue_scripts', 'register_style_theme');


/* Подключаем скрипты
================================================== */
function register_theme_scripts()
{
   // wp_enqueue_script('jquery');
   wp_enqueue_script('jquerry', get_template_directory_uri() . '/assets/library/jQuerry/jquery-3.5.0.min.js');
   wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/library/fancybox/jquery.fancybox.min.js');
   wp_enqueue_script('lazyload', get_template_directory_uri() . '/assets/library/lazy/lazyload.min.js');
   wp_enqueue_script('slick', get_template_directory_uri() . '/assets/library/slick/slick.min.js');
   wp_enqueue_script('validate', get_template_directory_uri() . '/assets/library/validate/jquery.validate.min.js');
   wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/script.js');
}

add_action('wp_footer', 'register_theme_scripts');


/* Регистрация кастомных меню
================================================== */
function reg_custom_menu()
{
   /* Меню шапки сайта */
   register_nav_menu('header_menu', 'Меню в шапке сайта');

   /* Меню подвала сайта */
   register_nav_menu('footer_menu', 'Меню в подвале сайта');
}

add_action('after_setup_theme', 'reg_custom_menu');

/* Функция для автоматического вывода title у страниц
с тегами или рубриками
================================================== */
add_theme_support('title-tag');

/* Функция для возможности указания формата поста
================================================== */
add_theme_support('post-formats', array('aside', 'gallery', 'chat', 'link', 'image',
    'quote', 'status', 'video', 'audio'));

/* Функция для регистрации кастомной миниатюры картинок
у постов к примеру
================================================== */
add_image_size('post_thumbnail', 1300, 500, true);
add_image_size('Превью работы', 590, 380, true);

/* Отменим `-scaled` размер - ограничение максимального размера картинки */
add_filter( 'big_image_size_threshold', '__return_zero' );


/* Функция для вывода превью картинок у постов
================================================== */
add_theme_support('post-thumbnails', array('post', 'portfolio', 'my_review'));


/* Регистрация нового типа записи "портфолио"
================================================== */
add_action('init', 'register_portfolio_post_type');
function register_portfolio_post_type()
{
   register_post_type('portfolio', array(
       'label' => null,
       'labels' => array(
           'name' => 'Портфолио', // основное название для типа записи
           'singular_name' => 'Портфолио', // название для одной записи этого типа
           'add_new' => 'Добавить работу', // для добавления новой записи
           'add_new_item' => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
           'edit_item' => 'Редактирование работы из портфолио', // для редактирования типа записи
           'new_item' => 'Новая работа', // текст новой записи
           'view_item' => 'Смотреть работы', // для просмотра записи этого типа.
           'search_items' => 'Искать работу', // для поиска по этим типам записи
           'not_found' => 'Не найдено', // если в результате поиска ничего не было найдено
           'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
           'parent_item_colon' => '', // для родителей (у древовидных типов)
           'menu_name' => 'Портфолио', // название меню
       ),
       'description' => 'Это мои работы в портфолио',
       'public' => true,
       'publicly_queryable' => true, // зависит от public
      // 'exclude_from_search' => null, // зависит от public
      // 'show_ui'             => null, // зависит от public
      // 'show_in_nav_menus'   => null, // зависит от public
       'show_in_menu' => true, // показывать ли в меню адмнки
      // 'show_in_admin_bar'   => null, // зависит от show_in_menu
       'show_in_rest' => null, // добавить в REST API. C WP 4.7
       'rest_base' => null, // $post_type. C WP 4.7
       'menu_position' => null,
       'menu_icon' => 'dashicons-portfolio',
      //'capability_type'   => 'post',
      //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
      //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
       'hierarchical' => false,
       'supports' => ['title', 'page-attributes'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
       'taxonomies' => ['work_type'],
       'has_archive' => false,
       'rewrite' => true,
       'query_var' => true,
   ));
}


/* Регистрация нового типа записи "отзывы"
================================================== */
add_action('init', 'register_my_review_post_type');
function register_my_review_post_type()
{
   register_post_type('my_review', array(
       'label' => null,
       'labels' => array(
           'name' => 'Отзывы', // основное название для типа записи
           'singular_name' => 'Отзывы', // название для одной записи этого типа
           'add_new' => 'Добавить отзыв', // для добавления новой записи
           'add_new_item' => 'Добавление отзыва', // заголовка у вновь создаваемой записи в админ-панели.
           'edit_item' => 'Редактирование отзывов', // для редактирования типа записи
           'new_item' => 'Новый отзыв', // текст новой записи
           'view_item' => 'Смотреть отзывы', // для просмотра записи этого типа.
           'search_items' => 'Искать отзыв', // для поиска по этим типам записи
           'not_found' => 'Отзывов не найдено', // если в результате поиска ничего не было найдено
           'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
           'parent_item_colon' => '', // для родителей (у древовидных типов)
           'menu_name' => 'Отзывы', // название меню
       ),
       'description' => 'Это отзывы обо мне',
       'public' => true,
       'publicly_queryable' => true, // зависит от public
      // 'exclude_from_search' => null, // зависит от public
      // 'show_ui'             => null, // зависит от public
      // 'show_in_nav_menus'   => null, // зависит от public
       'show_in_menu' => true, // показывать ли в меню адмнки
      // 'show_in_admin_bar'   => null, // зависит от show_in_menu
       'show_in_rest' => null, // добавить в REST API. C WP 4.7
       'rest_base' => null, // $post_type. C WP 4.7
       'menu_position' => null,
       'menu_icon' => 'dashicons-format-status',
      //'capability_type'   => 'post',
      //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
      //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
       'hierarchical' => false,
       'supports' => ['page-attributes', 'title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
       'taxonomies' => [''],
       'has_archive' => false,
       'rewrite' => true,
       'query_var' => true,
   ));
}

/* Регистрация новой таксономии
================================================== */
add_action('init', 'work_type_taxonomy');
function work_type_taxonomy()
{

   // список параметров: wp-kama.ru/function/get_taxonomy_labels
   register_taxonomy('work_type', ['portfolio'], [
       'label' => '', // определяется параметром $labels->name
       'labels' => [
           'name' => 'Типы работ',
           'singular_name' => 'Тип работы',
           'search_items' => 'Найти тип работы',
           'all_items' => 'Все типы работ',
           'view_item ' => 'Смотреть типы работ',
           'parent_item' => 'Родительский тип работ',
           'parent_item_colon' => 'Родительский тип работ:',
           'edit_item' => 'Изменить тип работ',
           'update_item' => 'Обновить тип работ',
           'add_new_item' => 'Добавить тип работ',
           'new_item_name' => 'Новое имя типа работы',
           'menu_name' => 'Типы работ',
       ],
       'description' => 'Тип работы над проектом (вертска / посадка на wordpress / дизайн)', // описание таксономии
       'public' => true,
       'hierarchical' => false,
       'rewrite' => true,
      //'query_var'             => $taxonomy, // название параметра запроса
       'capabilities' => array(),
       'meta_box_cb' => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
       'show_admin_column' => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
       'show_in_rest' => null, // добавить в REST API
       'rest_base' => null, // $taxonomy
      // '_builtin'              => false,
      //'update_count_callback' => '_update_post_term_count',
   ]);
}


/* Регистрация сайбара
================================================== */
function reg_rigth_sidebar()
{
   register_sidebar(array(
       'name' => 'Правый сайдбар',
       'id' => 'right_sidebar',
       'description' => 'Описание сайдбара',
       'before_widget' => '<div class="widget %2$s">',
       'after_widget' => "</div>\n",
       'before_title' => '<h5 class="widget-title">',
       'after_title' => "</h5>\n",
   ));
}

add_action('widgets_init', 'reg_rigth_sidebar');


/* Фильтр который выводит кастомное окончание для
короткого описания поста the_excerpt()
================================================== */
add_filter('excerpt_more', 'new_excerpt_more');
function new_excerpt_more($more)
{
   global $post;
   return ' <a class="more-link" href="' . get_permalink($post) . '">Читать дальше <i class="fas fa-arrow-right"></i></a>';
}

/* Фильтр который выводит кастомное окончание для
короткого описания поста the_excerpt()
================================================== */
function wph_exclude_pages($query)
{
   if ($query->is_search) {
      $query->set('post_type', ['post', 'portfolio']);
   }
   return $query;
}

add_filter('pre_get_posts', 'wph_exclude_pages');

/* Дополнительная страница "опции" которая хранит настройки полей
acf для всего сайта (можно юзать в хедер и футер)
================================================== */
if (function_exists('acf_add_options_page')) {
   acf_add_options_page(array(
       'page_title' => 'Главные настройки сайта',
       'menu_title' => 'Настройки сайта',
       'menu_slug' => 'theme-general-settings',
       'capability' => 'edit_posts',
       'redirect' => false
   ));

}


/* Убирает скрипты емоджи
================================================== */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/* Форма консультации шорткод
================================================== */
add_shortcode('feedback_form', 'shortcode_feedback_form');
function shortcode_feedback_form($atuts)
{
   $atuts = shortcode_atts(
       array(
           'title' => 'необходима<span> консультация </span>по проекту ?',
           'btn_text' => 'получить консультацию',
       ), $atuts);
   $form = '<div class="def_advice section">
                      <div class="wrapper">
                        <div class="advice_form">
                          <div class="def_header">
                            <h3>';
   $form .= $atuts['title'];
   $form .= '</h3></div >';
   $form .= '<form id="feedbackForm" method = "post"
					      action="' . admin_url('admin-ajax.php?action=send_mail') . '"
					      data-page="' . get_the_title() . '">
                <div ><input id="feedbackName" name="name" type="text" placeholder="Ваше имя" value ="" ></div >
                <div ><input id="feedbackContact" name="email" type="text" placeholder="Telegram / Viber / Email" value="" >
                </div >
                <div >
                  <button id="feedbackSubmit" class="def_btn submit">' . $atuts['btn_text'] . '</button >
                  <span id="image-loader">
                  <img src="' .  get_stylesheet_directory_uri() . '/assets/img/loader.gif" alt="loading..." />
                 </span>
                </div >
              </form >';
   $form .= '
                    <div id="message-warning">
                        что-то пошло не так :( попробуйте еще раз
                    </div>
                    <div id="message-success">
                        <i class="icon-ok"></i>Ваше сообщение отправлено, спасибо!<br />
                    </div></div></div></div>';
   return $form;
}


/* Отправка формы
================================================== */
add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');


function send_mail()
{
   $feedbackName = $_POST['feedbackName'];
   $feedbackContact = $_POST['feedbackContact'];
   $to = get_option('admin_email');

   // удалим фильтры, которые могут изменять заголовок $headers
   remove_all_filters('wp_mail_from');
   remove_all_filters('wp_mail_from_name');

   $headers = array(
       'From: Darklurker <info@darklurkerr.com>',
       'content-type: text/plain',
       'Cc: My second mail petrenko.zhenya@ukr.net',
   );
   wp_mail($to, $feedbackName, $feedbackContact, $headers);
   wp_die();
}