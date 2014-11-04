$(document).ready(function(){
	// $('input.star').rating();
	// $('.auto-submit-star').rating();

	if (!!$.prototype.fancybox)
		$('.open-comment-form').fancybox({
			'autoSize' : false,
			'width' : 600,
			'height' : 'auto',
			'hideOnContentClick': false
		});

	$(document).on('click', '#id_new_comment_form .closefb', function(e){
		e.preventDefault();
		$.fancybox.close();
	});

	$(document).on('click', 'a[href=#idTab5]', function(e){
		$('*[id^="idTab"]').addClass('block_hidden_only_for_screen');
		$('div#idTab5').removeClass('block_hidden_only_for_screen');

		$('ul#more_info_tabs a[href^="#idTab"]').removeClass('selected');
		$('a[href="#idTab5"]').addClass('selected');
	});


});

function productcommentRefreshPage()
{
    window.location.reload();
}