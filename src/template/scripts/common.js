$(document).ready(function($) {

	$('.input_phone .input__wrap').mask('+7 (000) 000-00-00');

	function valueElementForm(nameElement, nameBlock) {
		var newNameElement = '.' + nameElement;
			element = $(newNameElement);
		element.each(function(index, el) {
			var elementInput = $(this).find(nameBlock),
				elementLabel = $(this).find($('label')),
				elementValue = index + 1;
			elementInput.attr('id', nameElement + '-' + elementValue);
			elementLabel.attr('for', nameElement + '-' + elementValue);
		});
		
	}
	valueElementForm('radio', 'input');



	$('.slider__btn').click(function(event) {
		var sliderItem = $(this).parents('.slider__item'),
				nextStep = false;

		console.log(1);

		

		if ($(this).hasClass('btn-next')) {
			var sliderItemNext = sliderItem.next('.slider__item');
			sliderItemNext.addClass('slider__item_show');
			nextStep = true;
		} else if ($(this).hasClass('btn-prev')){
			var sliderItemNext = sliderItem.prev('.slider__item');
			sliderItemNext.addClass('slider__item_show');
			nextStep = true;
		}

		if (nextStep) {
			sliderItem.removeClass('slider__item_show');
		}

	});


	$('.reviews__list').slick({
		dots: true
	})



	$('.btn-submit').click(function(event) {
		event.preventDefault();
		var form = $(this).parents('form');
				inputsRequired = form.find('.input_required'),
				inputsRequiredLength = inputsRequired.length,
				counter = 0;

		inputsRequired.each(function(index, el) {
			if ($(this).find('input').val() == '') {
				$(this).addClass('input_error');
			} else {
				$(this).removeClass('input_error');
				counter++;
			}
		});

		if (counter == inputsRequiredLength) {
			$.ajax({
		    type: "POST",
		    url: "order.php",
		    data: form.serialize()
				}).done(function() {
			    $.fancybox.close();
					$.fancybox.open({src  : '#popup-thanks',type : 'inline'});
			});
			
		}
	});
});
