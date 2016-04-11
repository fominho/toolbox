(function($) {
	modules.require( ['dnd-rank'],
		function(Ranking) {
			Ranking.init();
		}
	);

	window.onload = function() {
		var answerContainers = $(".dnd_rank_sortable");

		$(answerContainers).sortable();
		$(answerContainers).disableSelection();
	};

})(jQuery);