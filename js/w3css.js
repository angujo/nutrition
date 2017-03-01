/**
 * Created by bangujo on 01/03/2017.
 */
;(function ($) {
	$.fn.wtab = function () {
		return this.each(function () {
			if (!$(this).children('.active').length) {
				$(this).children(':first-child').addClass('active');
			}
			$(this).children().each(function () {
				if ($(this).attr('href') && '#' != $(this).attr('href') && $($(this).attr('href')).length) {
					var c = $($(this).attr('href'));
					if ($(this).hasClass('active')) {
						$(this).addClass('w3-gray');
						c.addClass('active-tab-content').show();
					} else {
						c.hide().removeClass('active-tab-content');
					}
					$(this).off('click').on('click', function (e) {
						e.preventDefault();
						c.parent().find('.active-tab-content').removeClass('active-tab-content').hide(300);
						c.addClass('active-tab-content').show(300);
						$(this).parent().find('.active').removeClass('active w3-gray');
						$(this).addClass('active w3-gray');
					});
				}
			});
		});
	};
	$('.w3-tab').wtab();
})(jQuery);