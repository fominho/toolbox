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
class QuestionhintanswerController extends \TYPO3\LtubeToolbox\Controller\AbstractToolboxController
{

    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\QuestionhintanswerRepository
     * @inject
     */
    protected $questionhintanswerRepository = null;
    
    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\HintRepository
     * @inject
     */
    protected $hintRepository = null;


    public function listAction()
    {
        $dataFromRepo = $this->questionhintanswerRepository->findQha($this->getContentUid());

        $resultArray = array();
        foreach ($dataFromRepo as $object) {
            $resultArray[$object->getUid()]['uid'] = $object->getUid();
            $resultArray[$object->getUid()]['question'] = $object->getQuestion();
            $resultArray[$object->getUid()]['answer'] = $object->getAnswer();
            $resultArray[$object->getUid()]['hint'] = $this->hintRepository->findHints($object->getUid());
        }

        $this->view->assign('questionhintanswers', $resultArray);
    }

}