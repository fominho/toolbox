/**
 * Module: TYPO3/LtubeToolbox/Flashcard/DndRank
 */
modules.define('dnd-rank', ['ranking-button'], function(provide, CheckButton) {
    provide({

        init: function () {
			CheckButton.init();
        }

    });
});