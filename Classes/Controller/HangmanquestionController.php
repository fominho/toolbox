<?php
namespace TYPO3\LtubeToolbox\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Pranab Ojha <pojha@learntube.in>, Learntube
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

/**
 * @package ltube_toolbox
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class HangmanquestionController extends \TYPO3\LtubeToolbox\Controller\AbstractToolboxController
{

    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\HangmanquestionRepository
     * @inject
     */
    protected $hangmanquestionRepository = null;
    
    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\HangmananswerRepository
     * @inject
     */
    protected $hangmananswerRepository = null;
    

    public function listAction()
    {
        $resultArray = array();
        foreach ($this->hangmanquestionRepository->findHangman($this->getContentUid()) as $object) {
            $resultArray[$object->getUid()]['uid'] = $object->getUid();
            $resultArray[$object->getUid()]['question'] = $object->getQuestion();
            $resultArray[$object->getUid()]['amountOfTry'] = $object->getAmountOfTry();
            $resultArray[$object->getUid()]['answer'] = $this->hangmananswerRepository->findAnswer($object->getUid());
            $ans_data = $this->hangmananswerRepository->findAnswer($object->getUid());
            foreach ($ans_data as $ans_data_obj) {
                $answer = $ans_data_obj->getAnswer();
            }
            $resultArray[$object->getUid()]['word'] = strtolower($answer);
        }

        $this->view->assign('hangmanquestions', $resultArray);
        $this->view->assign('questionBackground', $this->settingsService->find('hangman','questionBg'));
        $this->view->assign('answerBackground', $this->settingsService->find('hangman','answerBg'));
    }

}