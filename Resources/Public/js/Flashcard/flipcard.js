(function($) {
	$(window).load(function() {

		cur_lang	= $('ul#tx_toolbox_pagination').attr("cur_lang");

		if(cur_lang == 'de'){
			next_label	= "Weiter";
			prev_label	= "Zurück";
		}else{
			next_label	= "Next";
			prev_label	= "Prev";
		}

		$('ul#tx_toolbox_pagination').flexipage({
			perpage: 1,
			next_txt : next_label,
			prev_txt : prev_label,
			showcounter: false
		});

		$("ul.pager li").click(function(){
			$("ul#tx_toolbox_pagination li").each(function(index,value) {
				if($(this).is(":visible")){
					if($(this).children(".flipPad").children(".tx_toolbox_frontend").is(":visible")){
						$(this).children(".flipPad").children(".tx_toolbox_frontend").click();
					}
				}
			});
		});

		$('.tx_toolbox_backend, .tx_toolbox_frontend').click(function() {
			$(this).parent().siblings('.flashcard').flip('toggle');
		});


		$(".flashcard").flip({
			axis:    $('.flashcard').attr('data-direction'),
			trigger: 'click'
		});

		$('.pager').css('width', '290px');
		$('.pager button').css('background', $('#tx_toolbox_pagination').attr('data-pagination-button-color'));

	});
})(jQuery);

