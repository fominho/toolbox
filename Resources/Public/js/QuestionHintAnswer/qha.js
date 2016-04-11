
(function($) {

	$('ul#tx_toolbox_qha li div.hint').click(function(){

		var hint		= $(this).attr("hint");
		var question_id	= $(this).parent().parent().parent().attr("id");
		var prev_hint	= $('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html();
		var hintLabel	= $(this).attr("hl");

		if(hint == prev_hint){
			$('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'none'});
			$('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html('');
		}else{
			$('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'block'});
			$('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans_txt p').html(hintLabel);
			$('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html(hint);
		}
	});

	$('ul#tx_toolbox_qha li div.answer').click(function(){
		var question_id	= $(this).parent().parent().attr("id");
		var prev_ans	= $('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html();
		var answer		= $('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer').html();
		var answerLabel	= $(this).attr("al");

		if(answer == prev_ans){
			$('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'none'});
			$('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html('');
		}else{
			$('ul#tx_toolbox_qha li#'+question_id+' div.hide_answer_hint_div').css({'display': 'block'});
			$('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans_txt p').html(answerLabel);
			$('ul#tx_toolbox_qha li#'+question_id+' div.hint_ans span').html(answer);
		}
	});

})(jQuery);