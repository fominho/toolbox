(function($) {

	toolbox_width	= $('div.tx-ltube-toolbox').width();
	quiz_width		= toolbox_width - 34;

	cardWidth	= $('ul#tx_toolbox_quiz').attr("qcw");
	totalQuizAnsWidth		= cardWidth * 2 + 8 + 20 + 34;

	if(toolbox_width < totalQuizAnsWidth){
		totalQuizCardWidth	= quiz_width - 28 -80;
		quizCardWidth		= totalQuizCardWidth / 2;

		quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
		quizPagerLiWidth	= quizPagerWidth / 3;
	}

	if(toolbox_width > totalQuizAnsWidth){
		quizCardWidth		= cardWidth - 40;
		quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
		quizPagerLiWidth	= quizPagerWidth / 3;
	}



	$( "#quiz_start_div" ).click(function() {
			var div_content_id = $(this).attr('data-id');

			$('#quiz_start').css({'display': 'none'});
			$('ul#tx_toolbox_quiz').css({'display':'block', 'float':'left'});

			//_toolbox_pagination(div_content_id);

			cur_lang	= $('ul#tx_toolbox_quiz').attr("cur_lang");

			if(cur_lang == 'de'){
				next_label	= "Weiter";
				prev_label	= "Zurück";
			}else{
				next_label	= "Next";
				prev_label	= "Prev";
			}

			$('ul#tx_toolbox_quiz').flexipage({
				perpage:1,
				next_txt : next_label,
				prev_txt : prev_label,
				showcounter : true
			});

			$('ul#tx_toolbox_quiz li div.hint').click(function(){
				var parentID		= $(this).parent().attr("id");
				var hint			= $('ul#tx_toolbox_quiz li#'+parentID+' div.hint').attr("hc");
				var msgHtml			= $('ul#tx_toolbox_quiz li#'+parentID+' div.message').html();
				if(!msgHtml && hint){
					$('ul#tx_toolbox_quiz li#'+parentID+' div.message').css({'visibility': 'visible'});
					$('ul#tx_toolbox_quiz li#'+parentID+' div.message').html(hint);
				}
			});

			//_toolbox_display_hint(div_content_id);
			//_toolbox_check_answer(div_content_id);

			$('ul#tx_toolbox_quiz li div.answer').click(function(){
				var parentID		= $(this).parent().attr("id");
				var currentID		= $(this).attr("id");

				var ans				= $('ul#tx_toolbox_quiz li#'+parentID+' div.question').attr("ans");

				clickNum = $('ul#tx_toolbox_quiz li#'+parentID+' div.answer').data('clickNum');
				if (!clickNum) clickNum = 1;

				if(clickNum == 1) {
					var correctAnsID		= 'answer'+ans;
					var total_question		= $('ul#tx_toolbox_quiz li#'+parentID+' div.question').attr("count");
					var last_question_id	= 'quiz'+total_question;

					correctAns = $('ul#tx_toolbox_quiz').data('correctAns');
					if (!correctAns) correctAns = 0;

					if(currentID === correctAnsID){
						$('ul#tx_toolbox_quiz li#'+parentID+' div#'+currentID).css({'border': '3px solid #00B050'});

						var message	= $('ul#tx_toolbox_quiz li#'+parentID+' div.message').attr("msg");
						$('ul#tx_toolbox_quiz li#'+parentID+' div.message').css({'visibility': 'visible'});
						$('ul#tx_toolbox_quiz li#'+parentID+' div.message').html(message);

						$('ul#tx_toolbox_quiz').data('correctAns', ++correctAns);
					}else{
						$('ul#tx_toolbox_quiz li#'+parentID+' div#'+currentID).css({'border': '3px solid red'});
						$('ul#tx_toolbox_quiz li#'+parentID+' div#answer'+ans).css({'border': '3px solid #00B050'});

						$('ul#tx_toolbox_quiz li#'+parentID+' div.message').css({'visibility': 'visible'});
						$('ul#tx_toolbox_quiz li#'+parentID+' div.message').html("Falsche Antwort");
					}
					$('ul#tx_toolbox_quiz li#'+parentID+' div.answer').css({'cursor': 'default'});

					if(parentID == last_question_id){
						$('ul#tx_toolbox_quiz').animate({
							opacity: 0.25,
						}, 1200, function() {
							$('ul#tx_toolbox_quiz').css({'display': 'none'});
							$('ul.pager').css({'display': 'none'});
							$('#quiz_result').css({'display': 'block'});
						});

						var resultMsg	= correctAns+' von '+total_question+' Fragen sind richtig';
						$('#quiz_result div#quiz_result_div').html(resultMsg);
					}
				}

				$('ul#tx_toolbox_quiz li#'+parentID+' div.answer').data('clickNum', ++clickNum);
			});

			//_set_pager_width(div_content_id)

			toolbox_width	= $('div.tx-ltube-toolbox').width();
			quiz_width		= toolbox_width - 34;

			cardWidth	= $('ul#tx_toolbox_quiz').attr("qcw");
			totalQuizAnsWidth		= cardWidth * 2 + 8 + 20 + 34;

			if(toolbox_width < totalQuizAnsWidth){
				totalQuizCardWidth	= quiz_width - 28 -80;
				quizCardWidth		= totalQuizCardWidth / 2;

				quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
				quizPagerLiWidth	= quizPagerWidth / 3;
			}

			if(toolbox_width > totalQuizAnsWidth){
				quizCardWidth		= cardWidth - 40;
				quizPagerWidth		= quizCardWidth * 2 + 28 + 80;
				quizPagerLiWidth	= quizPagerWidth / 3;
			}


		});
})(jQuery);