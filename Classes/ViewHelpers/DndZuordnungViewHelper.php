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

class DndZuordnungViewHelper extends \TYPO3\LtubeToolbox\ViewHelpers\AbstractToolboxViewHelper {

    public function initializeArguments() {
        $this->registerArgument('cardArr', 'array','', TRUE);
        $this->registerArgument('msg',     'array','', TRUE);
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
        $msg				= $arguments['msg'];
        $dropCardArr		= $cardArr;

        shuffle($cardArr);

        $cardStyle	= "<style type='text/css'> ";
        foreach($cardArr as $keyShuffledCardArr => $valueShuffledCardArr){
            $cardUid			= $valueShuffledCardArr['uid'];
            $dndCardBgColor		= $valueShuffledCardArr['BgColor'];

            $cardStyle	.= "div.correct$cardUid{ background:$dndCardBgColor !important;}";
        }
        $cardStyle	.=" </style>";

        $width				= $this->settingsService->find('dndZuordnung','cardWidth');
        $height				= $this->settingsService->find('dndZuordnung','cardHeight');
        $DragCardWidth		= $width-40;
        $DragCardHeight		= $height-40;
        $DragCardWidthPx	= $DragCardWidth.'px';
        $DragCardHeightPx	= $DragCardHeight.'px';

        $leftCol	= "<ul id='tx_zuordnung_left'>";
        foreach($cardArr as $keyShuffledCardArr => $valueShuffledCardArr){
            $cardUid			= $valueShuffledCardArr['uid'];
            $dndCardContent		= $valueShuffledCardArr['LeftContent'];

            $leftCol	.= "<li>
                        <div class='zuordnung_item_common' uid=$cardUid style='width:$DragCardWidthPx;height:$DragCardHeightPx;' >$dndCardContent</li>";
        }
        $leftCol		.= "</ul>";

        $rightCol	= "<ul id='tx_zuordnung_right'>";
        foreach($dropCardArr as $keyCardArr => $valueCardArr){
            $cardUid			= $valueCardArr['uid'];
            $dndCardContent		= $valueCardArr['RightContent'];

            $rightCol	.= "<li>
                        <div class='zuordnung_trash_common' uid=$cardUid style='width:$DragCardWidthPx;height:$DragCardHeightPx;' >$dndCardContent</li>";
        }
        $rightCol		.= "</ul>";

        $feedMsg		= "<div id='zuordnungFeedback'>".$msg['msg']."</div>";
    return $cardStyle.$feedMsg.$leftCol.$rightCol;
    }

}