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

class FlashViewHelper extends \TYPO3\LtubeToolbox\ViewHelpers\AbstractToolboxViewHelper {

    public function initializeArguments() {
        $this->registerArgument('obj', 'object', '', TRUE);
    }

    /**
     * Renders raw content in given case
     *
     * @return string Build the 'div' tag that represents the flashcard
     */
    public function render() {
        $arguments		= $this->arguments;

        $feContent		= $arguments['obj']->getFeContent();
        $feFontColor	= $this->settingsService->getSettings('flashcard')['entity']['fe']['fontColor'];
        $feBgColor		= $this->settingsService->getSettings('flashcard')['entity']['fe']['backgroundColor'];

        $flipDir		= $this->settingsService->getSettings('flashcard')['entity']['direction'];
        $cardWidth		= $this->settingsService->find('flashcard','width') . 'px';
        $cardHeight		= $this->settingsService->find('flashcard','height') . 'px';

        $beContent		= $arguments['obj']->getBeContent();
        $beBgColor		= $this->settingsService->getSettings('flashcard')['entity']['be']['backgroundColor'];
        $beFontColor	= $this->settingsService->getSettings('flashcard')['entity']['be']['fontColor'];

        $flashcard = "<div data-direction='$flipDir' class='flashcard' style='width:$cardWidth;height:$cardHeight;'><div class='front' style='background:$feBgColor;color:$feFontColor;'>$feContent</div><div class='back' style='background:$beBgColor;color:$beFontColor;'>$beContent</div></div>";
        return $flashcard;
    }

}