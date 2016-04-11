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

class HangmanAlphabetViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

    /**
     * Renders raw content in given case
     *
     * @param string $word
     * @return string Raw content
     */
    public function render($word) {
        $ans_length	= strlen($word);

        $space		= "<tr class='hangman_ans_alphabet'>";
        $dash_image	= "<tr id='hangman_dash' class='hangman_dash_hidden'>";
        for($j=0; $j<$ans_length; $j++){
            $space			.= "<td align='center' valign='bottom' class='alphabet$j'></td>";
            $dash_image		.= '<td><img width="20" hspace="0" height="2" border="0" align="left" alt="" src="typo3conf/ext/ltube_toolbox/Resources/Public/images/dash.gif"></td>';
        }
        $space		.= "</tr>";
        $dash_image	.= "</tr>";
        return $space.$dash_image;
    }

}