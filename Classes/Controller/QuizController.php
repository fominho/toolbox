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
class QuizController extends \TYPO3\LtubeToolbox\Controller\AbstractToolboxController
{

    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\QuizRepository
     * @inject
     */
    protected $quizRepository = null;


    public function listAction()
    {
        $currentUid = $this->getContentUid();
        $divIdOfCE = 'c' . $currentUid;

        $this->_process_quiz_style($divIdOfCE);

        $resultArray = array();
        foreach ($this->quizRepository->findQuizCard($currentUid) as $object) {
            $resultArray[$object->getUid()]['uid'] = $object->getUid();
            $resultArray[$object->getUid()]['question'] = $object->getQuestion();
            $resultArray[$object->getUid()]['answer1'] = $object->getAnswer1();
            $resultArray[$object->getUid()]['answer2'] = $object->getAnswer2();
            $resultArray[$object->getUid()]['answer3'] = $object->getAnswer3();
            $resultArray[$object->getUid()]['answer4'] = $object->getAnswer4();
            $resultArray[$object->getUid()]['hint'] = $object->getHint();
            $resultArray[$object->getUid()]['feedback'] = $object->getRightAnsFeedback();
            $resultArray[$object->getUid()]['right_answer'] = $object->getRightAnswer();
        }

        shuffle($resultArray);

        $this->view->assign('quizzes', $resultArray);
        $this->view->assign('quiz_no', $this->quizRepository->countByParentid($currentUid));
        $this->view->assign('divIdOfCE', $divIdOfCE);
        $this->view->assign('cur_lang', $GLOBALS['TSFE']->config['config']['language']);
        $this->view->assign('pageUID',  $GLOBALS['TSFE']->id);
    }

    /**
     * @param $divIdOfCE
     */
    function _process_quiz_style($divIdOfCE)
    {
        $quizCardHeightPx = $this->settingsService->find('quiz', 'cardHeight') . 'px';
        $quizCardWidthPx  = $this->settingsService->find('quiz', 'cardWidth')  . 'px';
        $answerBgColor    = $this->settingsService->find('quiz', 'cardBgColor');
        $quizBgColor      = $this->settingsService->find('quiz', 'BgColor');

        $cardStyle = '<style type=\'text/css\'>   /*<![CDATA[*/ ';
        $cardStyle .= "#quiz_start, #tx_toolbox_quiz, #quiz_result{background-color:{$quizBgColor};} ul.pager{padding-left:17px !important;} #tx_toolbox_quiz .answer{width:{$quizCardWidthPx}; height:{$quizCardHeightPx};background:{$answerBgColor};} ul.pager li.counter{text-align:center;} ul.pager li.next{text-align:right;}  ul.pager li.disabled button{}  ul.pager .prev button, ul.pager .next button{ font-size:16px; -moz-box-shadow:none !important; -webkit-box-shadow:none !important;-moz-border-radius:5px; -webkit-border-radius:5px; border-radius:5px;}";
        $cardStyle .= ' /*]]>*/ </style>';
        $GLOBALS['TSFE']->additionalHeaderData[$divIdOfCE . '_quiz_header_css'] = $cardStyle;
    }

}