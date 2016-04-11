(function($) {
	$(window).load(function() {
		$("#tx_toolbox_drag_n_drop div.item_common").draggable({
			cursor: 'move',
			revert: true
		});
		$("div.trash_common").droppable({
			tolerance: 'touch',
			accept: ".item_common",
			hoverClass: 'hovered',
			drop:  function(event, ui) {
				var slotCol		= $(this).attr('col');
				var cardCol		= ui.draggable.attr('col');
				var cardUid		= ui.draggable.attr('uid');

				var einordnungLen = $("ul#tx_toolbox_drag_n_drop li").length;
				einordnungLen--;
				// If the card was dropped to the correct slot,
				// change the card colour, position it directly
				// on top of the slot, and prevent it being dragged
				// again

				if ( slotCol == cardCol ) {
					ui.draggable.addClass( 'correct'+cardUid );
					ui.draggable.draggable( 'disable' );
					$(this).droppable( 'disable' );
					ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
					ui.draggable.draggable( 'option', 'revert', false );
					einordnungCorrectCards++;
				}

				if ( einordnungCorrectCards == einordnungLen ) {
					$('#einordnungFeedback').show();
					$('#einordnungFeedback').animate({
						opacity: 1
					});
				}
			}
		});

		$("#tx_zuordnung_left div.zuordnung_item_common").draggable({
			cursor: 'move',
			revert: true
		});
		$("#tx_zuordnung_right div.zuordnung_trash_common").droppable({
			tolerance: 'touch',
			accept: ".zuordnung_item_common",
			hoverClass: 'hovered',
			drop: function(event, ui) {
				var slotNo		= $(this).attr('uid');
				var cardNo		= ui.draggable.attr('uid');
				var div_pc_tab_mobile	= $(this).parent().parent().parent().parent().attr('class');
				var zuordnungLen = $('div.'+div_pc_tab_mobile+" ul#tx_zuordnung_left li").length;

				// If the card was dropped to the correct slot,
				// change the card colour, position it directly
				// on top of the slot, and prevent it being dragged
				// again

				if ( slotNo == cardNo ) {
					ui.draggable.addClass( 'correct'+cardNo );
					ui.draggable.draggable( 'disable' );
					$(this).droppable( 'disable' );
					ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
					ui.draggable.draggable( 'option', 'revert', false );
					zuordnungCorrectCards +=1;
				}
				//alert(div_pc_tab_mobile);
				if ( zuordnungCorrectCards == zuordnungLen ) {
					$('div.'+div_pc_tab_mobile+' #zuordnungFeedback').show();
					$('div.'+div_pc_tab_mobile+' #zuordnungFeedback').animate({
						opacity: 1
					});
				}
			}
		});



	//_zuordnung_drag_n_drop_elements();

	var zuordnungWidth	= $('ul#tx_zuordnung_left').width();
	var zuordnungheight = $('ul#tx_zuordnung_left').height();

	var zuordnungleft	= zuordnungWidth/2;

	$('#zuordnungFeedback').css({left: zuordnungleft+'px'});


	var einordnungWidth	= $('ul#dropboxLeft').width();
	var einordnungheight = $('ul#dropboxLeft').height();

	var einordnungTop	= einordnungheight/2+90;
	var einordnungleft	= einordnungWidth+30;

	$('#einordnungFeedback').css({top: -einordnungTop+'px', left: einordnungleft+'px'});

	});
})(jQuery);

//function _einordnung_drag_n_drop_elements(){
//	$("#tx_toolbox_drag_n_drop div.item_common").draggable({
//		cursor: 'move',
//		revert: true
//	});
//	$("div.trash_common").droppable({
//		tolerance: 'touch',
//		accept: ".item_common",
//		hoverClass: 'hovered',
//		drop: einordnungCardDrop
//	});
//}//_tx_drag_n_drop_elements

var  einordnungCorrectCards = 0;
//function einordnungCardDrop(event, ui){
//	var slotCol		= $(this).attr('col');
//	var cardCol		= ui.draggable.attr('col');
//	var cardUid		= ui.draggable.attr('uid');
//
//	var einordnungLen = $("ul#tx_toolbox_drag_n_drop li").length;
//	einordnungLen--;
//	// If the card was dropped to the correct slot,
//	// change the card colour, position it directly
//	// on top of the slot, and prevent it being dragged
//	// again
//
//	if ( slotCol == cardCol ) {
//		ui.draggable.addClass( 'correct'+cardUid );
//		ui.draggable.draggable( 'disable' );
//		$(this).droppable( 'disable' );
//		ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
//		ui.draggable.draggable( 'option', 'revert', false );
//		einordnungCorrectCards++;
//	}
//
//	if ( einordnungCorrectCards == einordnungLen ) {
//		$('#einordnungFeedback').show();
//		$('#einordnungFeedback').animate({
//		  opacity: 1
//		});
//	}
//}//einordnungCardDrop



//function _zuordnung_drag_n_drop_elements(){
//	$("#tx_zuordnung_left div.zuordnung_item_common").draggable({
//		cursor: 'move',
//		revert: true
//	});
//	$("#tx_zuordnung_right div.zuordnung_trash_common").droppable({
//		tolerance: 'touch',
//		accept: ".zuordnung_item_common",
//		hoverClass: 'hovered',
//		drop: zuordnungCardDrop
//	});
//}

var zuordnungCorrectCards = 0;

//function zuordnungCardDrop(event, ui){
//	var slotNo		= $(this).attr('uid');
//	var cardNo		= ui.draggable.attr('uid');
//	var div_pc_tab_mobile	= $(this).parent().parent().parent().parent().attr('class');
//	var zuordnungLen = $('div.'+div_pc_tab_mobile+" ul#tx_zuordnung_left li").length;
//
//	// If the card was dropped to the correct slot,
//	// change the card colour, position it directly
//	// on top of the slot, and prevent it being dragged
//	// again
//
//	if ( slotNo == cardNo ) {
//		ui.draggable.addClass( 'correct'+cardNo );
//		ui.draggable.draggable( 'disable' );
//		$(this).droppable( 'disable' );
//		ui.draggable.position( { of: $(this), my: 'left top', at: 'left top' } );
//		ui.draggable.draggable( 'option', 'revert', false );
//		zuordnungCorrectCards +=1;
//	}
//	//alert(div_pc_tab_mobile);
//	if ( zuordnungCorrectCards == zuordnungLen ) {
//		$('div.'+div_pc_tab_mobile+' #zuordnungFeedback').show();
//		$('div.'+div_pc_tab_mobile+' #zuordnungFeedback').animate({
//		  opacity: 1
//		});
//	}
//}