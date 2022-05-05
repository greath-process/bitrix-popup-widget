$(document).ready(function () {

	// удаление товара
	$('body').on('click', '.btn-red', function () {
		let action = $('.action__item.active').text().replace(/\s/g, '');
		if (action == 'Удалить') {
			$('.catalog__body').find('input[type="checkbox"]').each(function (i, elem) {
				if ($(this).prop('checked') === true) {
					let id = parseInt($(this).attr('data-id').replace(/\s+/g, ''), 10),
						row = $(this).parents('.catalog__body__row');
					$.ajax({
						type: "POST",
						url: "/include/ajax/market-del.php",
						data: { 'marketid': id },
						success: function (html) {
							row.hide();
						}
					});
				}
			})
		}
	});




















});