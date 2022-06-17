$(function () {
	$('.promo__slider').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		prevArrow:
			'<button type="button" class="slick-prev"><img src="icons/sliderArrowL_white.png"></button>',
		nextArrow:
			'<button type="button" class="slick-next"><img src="icons/sliderArrowR_white.png"></button>',
		responsive: [
			{
				breakpoint: 768,
				settings: {
					arrows: false,
				},
			},
		],
	});

	$('.reviews__slider').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 2,
		prevArrow:
			'<button type="button" class="slick-prev"><img src="icons/sliderArrowL.png"></button>',
		nextArrow:
			'<button type="button" class="slick-next"><img src="icons/sliderArrowR.png"></button>',
		responsive: [
			{
				breakpoint: 1250,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				},
			},
		],
	});

	$('.clients__slider').slick({
		autoplay: true,
		autoplaySpeed: 5000,
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 6,
		prevArrow:
			'<button type="button" class="slick-prev"><img src="icons/sliderArrowL.png"></button>',
		nextArrow:
			'<button type="button" class="slick-next"><img src="icons/sliderArrowR.png"></button>',
		responsive: [
			{
				breakpoint: 1250,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 4,
				},
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 3,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 2,
					arrows: false,
				},
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: false,
				},
			},
		],
	});

	// Smooth scroll and pageup
	$(window).scroll(function () {
		if ($(this).scrollTop() > 600) {
			$('.pageup').fadeIn();
		} else {
			$('.pageup').fadeOut();
		}
	});

	$("a[href^='#']").click(function () {
		const _href = $(this).attr('href');
		$('html, body').animate({ scrollTop: $(_href).offset().top + 'px' });
		return false;
	});

	// Modal
	$('[data-modal=subscribe]').on('click', function () {
		$('.overlay, #subscribe').fadeIn('slow');
	});
	$('.modal__close').on('click', function () {
		$('.overlay, #subscribe').fadeOut('slow');
	});

	// Mobile menu
	const menu = $('.topmenu__list');
	const hamburger = $('.hamburger');
	const close = $('.topmenu__close');
	hamburger.on('click', function () {
		menu.addClass('active');
		hamburger.addClass('active');
	});
	close.on('click', function () {
		menu.removeClass('active');
		hamburger.removeClass('active');
	});
});
