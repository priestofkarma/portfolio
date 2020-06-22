$(document).ready(function () {


	/*----------------------------------------------------*/
	/* Анимация Body
	/*----------------------------------------------------*/
	setTimeout(function () {
		$('body').removeClass('anim');
	}, 200);

	/*----------------------------------------------------*/
	/* Фокус инпута при клика на поиск
	/*----------------------------------------------------*/
	let $searchInput = $(".hover_block input");
	let $hoverBlock = $(".hover_block");
	let $lupa = $(".search_wrap .lupa");
	let $searchWrap = $(".search_wrap");
	$lupa.mouseup(function () {
		$(this).siblings(".hover_block").fadeIn(200);
		// $searchInput.focus();
		$searchInput.trigger('touchstart');
	});

	$searchInput.on('touchstart', function () {
		$searchInput.focus();
	});

	/*----------------------------------------------------*/
	/* Удаление блока, если происходит клик вне контейнера с формой
	/*----------------------------------------------------*/
	$(document).mouseup(function (e) { // событие клика по веб-документу

		if ($hoverBlock.is(":visible") // если форма видна
			&& !$searchWrap.is(e.target) // и если клик был не по нашему блоку
			&& $searchWrap.has(e.target).length === 0) { // и не по его дочерним элементам
			$hoverBlock.fadeOut(200);
		}
	});

	/*----------------------------------------------------*/
	/* Dropdown
	/*----------------------------------------------------*/

	let $dwLink = $(".dw_link > a");
	let $dwMenu = $(".sub-menu");
	$dwLink.click(function (event) {
		event.preventDefault();
		var $link = $(this).next();
		$(this).next().toggleClass("dm_active");
	});

	$(document).mouseup(function (e) { // событие клика по веб-документу
		if ($dwMenu.hasClass('dm_active') // если меню открыто
			&& !$dwMenu.is(e.target) // и таргет не это меню
			&& $dwMenu.has(e.target).length === 0 // и его внутренние элементы
		/* && !$dwLink.is(e.target) */) { // и не ссылка в основном меню
			$dwMenu.removeClass("dm_active");
		}
	});


	/*----------------------------------------------------*/
	/*	Мобильное меню гамбургер
	/*----------------------------------------------------*/
	$(".hamburger").click(function () {
		$(".hamburger").toggleClass('is-active');

		// $(".header_menu").slideToggle(250);
		$(".header_menu").toggleClass('m_active');
	});

	$(".main_menu ul li a").click(function () {
		$(".hamburger").removeClass('is-active');
		// $(".header_menu").slideToggle(250);
		$(".header_menu").removeClass('m_active');

	});


	/*----------------------------------------------------*/
	/*	background у шапки при скроле
	/*----------------------------------------------------*/
	$(window).scroll(function () {
		if ($(this).scrollTop() > 90) {
			$("header").addClass('menu_scroll')
		} else {
			$("header").removeClass('menu_scroll')
		}
	});

	let $windowScrollHeight = $(window).scrollTop();
	if ($windowScrollHeight > 90) {
		$("header").addClass('menu_scroll')
	}
	;


	/* fancy */
	$(".fancy").fancybox();

	var lazyLoadInstance = new LazyLoad({
		elements_selector: " .lazy "
		// ... больше пользовательских настроек?
	});
	/*----
	------------------------------------------------*/
	/*	прокрутка до блока добро пожаловать на главной странице
	/*----------------------------------------------------*/
	$("#mouse_scroll").on('click', function (event) {
		event.preventDefault();
		let id = $(this).attr('href'),
			top = $(id).offset().top;
		$('html, body').animate({scrollTop: top}, 1000);
	});

	/*----------------------------------------------------*/
	/*	слайдер с отзывами
	/*----------------------------------------------------*/
	$('.my_feedback').slick({
		arrows: true,                    // Стрелки
		slidesToShow: 1,                  // Количество слайдов, которые показываются сразу
		autoplay: false,                   // Автоматическое переключение
		autoplaySpeed: 3000,              // Время на показ слайда до переключения на следующий
		dots: true,                      // Точки
		fade: false,                      // Эффект затухания вместо перелистывания
		infinite: true,                   // Бесконечность слайдов
		draggable: true,
		adaptiveHeight: true
	});
	/*----------------------------------------------------*/
	/*	валидация формы jquery
	------------------------------------------------------*/

	$("#feedbackForm").validate({
		rules: {
			name: {
				required: true,
				minlength: 3,

			},
			email: {
				required: true,
				minlength: 5,
			},
		},
		messages: {
			name: {
				required: "Это поле обязательно для ввода",
				minlength: "Разве Вас зовут Ян?"

			},
			email: {
				required: "Это поле обязательно для ввода",
				minlength: "Нужно написать больше символов"
			},
		},
		submitHandler: function () {
			var form = $('#feedbackForm');
			var action = form.attr('action');

				$('#image-loader').fadeIn();
				$message = 'Контакты: ' + $('#feedbackContact').val() + ' ' + ' Страница: ' + $('#feedbackForm').attr('data-page');

				var formData = {
					feedbackName: $('#feedbackName').val(),
					feedbackContact: $message,
				};

				$.ajax({
					url: action,
					type: 'POST',
					data: formData,
					success: function () {
						$("#feedbackForm input[type=text]").val(""); // Чистим формы после того как клиент отправил данные нам на почту
						console.log(formData);
						$('#feedbackForm').fadeOut();
						$('#image-loader').fadeOut();
						$('#message-warning').hide();
						$('#message-success').delay(400).fadeIn();
					},
					error: function (request, txtstatus, errorThrown) {
						console.log(request);
						console.log(txtstatus);
						console.log(errorThrown);
					}

				});

				return false;


		}
	});


	$('#h-search-form').validate({
		rules: {
			s: {
				required: true,
				minlength: 3,
			}
		},
		messages: {
			s: {
				required: "Поле пустое, напишите что-нибудь",
				minlength: "Нужно написать минимум 3 символа"
			}
		}
	});
	$('.widget .search-form').validate({
		rules: {
			s: {
				required: true,
				minlength: 3,
			}
		},
		messages: {
			s: {
				required: "Поле пустое, напишите что-нибудь",
				minlength: "Нужно написать минимум 3 символа"
			}
		}
	})

	/*----------------------------------------------------*/
	/*	отправка формы ajax
	------------------------------------------------------*/


	/*
		Contact form 7 - успешная отправка
	
		  $(document).ready(function(){
			$('.wpcf7').on( 'wpcf7mailsent ', function( event ) {
			  var inst = $('[data-remodal-id=remodal_thanks]').remodal(); // Обращаемся к всплывашке, чтобы открыть ответ меняем remodal_id на свой
					  inst.open();
			});
		  });*/


});
