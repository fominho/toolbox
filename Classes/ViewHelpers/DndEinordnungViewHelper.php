<?php

namespace TYPO3\LtubeToolbox\ViewHelpers;

	/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Pranab Ojha <pranab.edims@gmail.com>, Learntube
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

class DndEinordnungViewHelper extends \TYPO3\LtubeToolbox\ViewHelpers\AbstractToolboxViewHelper {

    public function initializeArguments() {
        $this->registerArgument('cardArr', 'array','', TRUE);
        $this->registerArgument('leftCol', 'int','', TRUE);
        $this->registerArgument('rightCol', 'int','', TRUE);
        $this->registerArgument('msg', 'array','', TRUE);
    }

    /**
     * Renders raw content in given case
     *
     * @param string $case Upper or lower
     * @param string $content Content
     * @return string Raw content
     */
    public function render() {
        $arguments			= $this->arguments;
        $cardArr			= $arguments['cardArr'];
        $leftColItem		= $arguments['leftCol'];
        $rightColItem		= $arguments['rightCol'];
        $msg				= $arguments['msg'];

        shuffle($cardArr);

        $width				= $this->settingsService->find('dndEinordnung','cardWidth');
        $height				= $this->settingsService->find('dndEinordnung','cardHeight');

        $DragCardWidth		= $width - 40;
        $DragCardHeight		= $height - 40;
        $DragCardWidthPx	= $DragCardWidth.'px';
        $DragCardHeightPx	= $DragCardHeight.'px';
        $leftColHeader		= $this->settingsService->getSettings('dndEinordnungLeftColumnLabel');
        $rightColHeader		= $this->settingsService->getSettings('dndEinordnungRightColumnLabel');

        $cardStyle	= "<style type='text/css'> ";
        foreach($cardArr as $keyShuffledCardArr => $valueShuffledCardArr){
            $cardUid			= $valueShuffledCardArr['uid'];
            $dndCardBgColor		= $valueShuffledCardArr['BgColor'];

            $cardStyle	.= "div.correct$cardUid{ background:$dndCardBgColor !important; color:$dndCardFontColor !important}";
        }
        $cardStyle	.=" </style>";

        $leftColumn	= "<ul id='dropboxLeft'><li style='height:30px;margin:0px  !important;'><b>$leftColHeader</b></li>";
        for($i=0; $i<$leftColItem; $i++){
            $leftColumn	.="<li><div class='trash_common' style='width:$DragCardWidthPx;height:$DragCardHeightPx;border:1px dashed #000000;text-align:center;' col='1'></div></li>";
        }
        $leftColumn	.= "</ul>";

        $rightColumn	= "<ul id='dropboxRight'><li style='height:30px;margin:0px !important;'><b>$rightColHeader</b></li>";
        for($i=0; $i<$rightColItem; $i++){
            $rightColumn	.="<li><div class='trash_common' style='width:$DragCardWidthPx;height:$DragCardHeightPx;border:1px dashed #000000;text-align:center;' col='2'></div></li>";
        }
        $rightColumn	.= "</ul>";

        $cardTable	= "<ul id='tx_toolbox_drag_n_drop'><li style='height:30px;margin:0px !important;float:none !important;'></li>";
        foreach($cardArr as $keyShuffledCardArr => $valueShuffledCardArr){
            $i					= $keyShuffledCardArr;
            $i++;
            $cardUid			= $valueShuffledCardArr['uid'];
            $dndCardContent		= $valueShuffledCardArr['Content'];
            $cardMatchCol		= $valueShuffledCardArr['MatchCol'];

            $cardTable	.= "<li>
                        <div id='item_$cardUid' class='item_common' uid=$cardUid style='background:#bebebe;width:$DragCardWidthPx;height:$DragCardHeightPx;margin:0px;color:#FFFFFF' col=$cardMatchCol>$dndCardContent</div></li>";
            if(!($i%2)){
                $cardTable		.= "<BR style='clear:both;'>";
            }
        }
        $cardTable		.= "</ul>";

        $feedMsg		= "<div id='einordnungFeedback'>".$msg['msg']."</div>";

        return $cardStyle.$leftColumn.$cardTable.$rightColumn.$feedMsg;
    }

}

?>