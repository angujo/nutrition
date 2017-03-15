/**
 * Created by Angujo Barrack on 15-Feb-17.
 */
"use strict";
var to = null;
(function ($) {
	$(document).ready(function () {
		$(window).resize(function () {
			resizer();
		});
		$('body').on('change', 'input[data-checker]', function (e) {
			e.preventDefault();
			var not = $(this).closest('ul').find('.notify');
			$.getJSON($(this).data('checker') + '/' + ($(this).is(':checked') ? 1 : 0), function (res) {
				if (not.length) {
					not.find('.alert').remove();
					not.append('<div class="alert ' + (res.code > 0 ? 'alert-success' : 'alert-warning') + '">' + res.msg + '</div>');
					if (null !== to) clearTimeout(to);
					to = setTimeout(function () {
						not.find('.alert').slideUp(300);
					}, 3000);
				}
			});
		}).on('click', '[data-template]', function (e) {
			var $templ = $($(this).data('template'));
			if (!$templ.length) return;
			var $cl = $templ.clone(true);
			$templ.find('input,textarea').val('');
			$cl.find('.hidden').removeClass('hidden');
			$cl.removeAttr('id');
			$cl.insertBefore($templ);
		});
		$('textarea.summernote').summernote({height: 250});
		resizer();
		$('[type=date]').datepicker({'format': 'yyyy-mm-dd', endDate: (new Date()).yyyymmdd()});
		$('form').each(function () {
			$(this).validate({errorClass: 'input-validation-error', errorElement: 'em', ignore: '.ignore'});
		});
	});
})(jQuery);

function resizer() {
	var nH = $('nav').height(), wH = $(window).height();
	$('#page-wrapper,.window-attached').css({'min-height': (wH - nH) + 'px'});
}

Date.prototype.yyyymmdd = function (separator) {
	separator = separator || '-';
	var mm = this.getMonth() + 1; // getMonth() is zero-based
	var dd = this.getDate();

	return [this.getFullYear(), separator,
	        (mm > 9 ? '' : '0') + mm, separator,
	        (dd > 9 ? '' : '0') + dd
	].join('');
};