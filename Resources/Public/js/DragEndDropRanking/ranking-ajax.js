/**
 * Module: TYPO3/LtubeToolbox/Flashcard/RankingAjax
 */
modules.define('ranking-ajax', ['ranking-answer'], function(provide, Answer) {
	provide({

		/**
		 * Makes an ajax request and passes the actual answer positions in 'current' and ranking container id in 'uid'
		 *
		 * @param uid int
		 * @param current string Like '1,6,7,2,1...'
		 */
		checkAjaxRequest: function(uid, current) {
			$.ajax({
				url: checkRankingAction,
				type: 'GET',
				dataType: 'json',
				data: {
					'tx_ltubetoolbox_pi1[current]' : current,
					'tx_ltubetoolbox_pi1[uid]'     : uid
				},
				success: function(response) {
					var result = $.parseJSON( JSON.stringify(response));

					Answer.markAllAsFailedInsideContainer(uid);

					$.each(result, function(key, successUid) {
						Answer.markAsRightAnswerInsideContainer(uid, successUid);
					});
				}
			});
		}

	});
});