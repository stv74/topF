$(function () {
	$('.promo__slider').slick({
		prevArrow:
			'<button type="button" class="slick-prev"><img src="icons/sliderArrowL_white.png"></button>',
		nextArrow:
			'<button type="button" class="slick-next"><img src="icons/sliderArrowR_white.png"></button>',
	});

	$('.reviews__slider').slick({
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 2,
		prevArrow:
			'<button type="button" class="slick-prev"><img src="icons/sliderArrowL.png"></button>',
		nextArrow:
			'<button type="button" class="slick-next"><img src="icons/sliderArrowR.png"></button>',
	});

	$('.clients__slider').slick({
		infinite: true,
		slidesToShow: 6,
		slidesToScroll: 6,
		prevArrow:
			'<button type="button" class="slick-prev"><img src="icons/sliderArrowL.png"></button>',
		nextArrow:
			'<button type="button" class="slick-next"><img src="icons/sliderArrowR.png"></button>',
	});
});
