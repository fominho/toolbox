/**
 * Module: TYPO3/LtubeToolbox/Flashcard/RankingButton
 */
modules.define('ranking-button', ['ranking-ajax'], function(provide, Ajax) {
	provide({

		init: function () {
			this.bindTrigger();
		},

		/**
		 * Binds 'Check' button.
		 * IF any button has been clicked, make un ajax request to validate the result
		 */
		bindTrigger: function() {
			$(this.findAll()).click(function() {
				var uid = $(this).siblings('.dnd_rank_question').attr('data-uid'),
					current = [];

				$.each($(this).siblings('.dnd_rank_wrapper').find('li.ui-state-default'), function() {
					current.push($(this).attr('data-uid'));
				});

				Ajax.checkAjaxRequest(uid, current.join());
			});
		},

		/**
		 * Returns all 'Check' buttons that exists in a web page
		 *
		 * @returns {*|jQuery|HTMLElement}
		 */
		findAll: function() {
			return $( ".dnd_check_rank_button" );
		}

	});
});