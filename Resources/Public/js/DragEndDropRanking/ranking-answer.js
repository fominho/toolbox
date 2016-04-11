/**
 * Module: TYPO3/LtubeToolbox/Flashcard/RankingAnswer
 */
modules.define('ranking-answer', [], function(provide) {
    provide({
        init: function () {},

		/**
		 * Sets all answers inside certain container as FAILED
		 *
		 * @param answerContainerID int+
		 */
		markAllAsFailedInsideContainer: function (answerContainerID) {
			var answers = this.getAllAnswersInsideContainer(answerContainerID);

			$(answers).addClass('incorrect').removeClass('correct');
		},

		/**
		 * Sets certain answer inside certain container as RIGHT
		 *
		 * @param answerContainerID int+
		 * @param answerID int+
		 */
		markAsRightAnswerInsideContainer: function(answerContainerID, answerID ) {
			var answer = this.getAnswerInsideContainerById(answerContainerID, answerID);

			$(answer).addClass('correct').removeClass('incorrect');
		},

		/**
		 * Returns just answer that is located inside the certain container and has appropriate id
		 *
		 * @param containerID int+
		 * @param answerID int+
		 * @returns {*|jQuery}
		 */
		getAnswerInsideContainerById: function(containerID, answerID) {
			var containerToSearchInside = this.getAnswerContainerByID(containerID);
			return $(containerToSearchInside).find(".dnd_rank_sortable li[data-uid=" + answerID + "]");
		},

		/**
		 * Returns container object by it's id
		 *
		 * @param containerID int+
		 * @returns {*|jQuery}
		 */
		getAllAnswersInsideContainer: function(containerID) {
			return $(this.getAnswerContainerByID(containerID)).find(".dnd_rank_sortable li");
		},

		/**
		 * Returns all the answer containers
		 *
		 * @returns {*|jQuery|HTMLElement}
		 */
		findAllAnswerContainers: function() {
			return $( ".dnd_rank_sortable" );
		},

		/**
		 * Returns answer container that has passed id
		 *
		 * @param id int+
		 * @returns {*|jQuery|HTMLElement}
		 */
		getAnswerContainerByID: function(id) {
			return $("#dnd_rank_" + id);
		}

	});
});