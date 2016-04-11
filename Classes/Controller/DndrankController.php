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
class DndrankController extends \TYPO3\LtubeToolbox\Controller\AbstractToolboxController
{

    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\DndrankRepository
     * @inject
     */
    protected $dndrankRepository = null;

    /**
     * @var \Lms3\LtubeToolbox\Service\DndRank\AnswerAttachService
     * @inject
     */
    protected $answerAttachService = null;

    /**
     * @var \TYPO3\LtubeToolbox\Service\DndRank\CheckService
     * @inject
     */
    protected $checkService = null;


    public function listAction()
    {
        $rankList = $this->dndrankRepository->findDndrank($this->getContentUid());

        /** @var \TYPO3\LtubeToolbox\Domain\Model\DndRank $rank */
        foreach ($rankList as $rank) {
            $this->answerAttachService->proceedAnswerListField($rank);
        }
        $this->view->assign('dndranks', $rankList);
    }


    /**
     * Checks the user answer.
     *
     * If the answer is correct -> TRUE
     * Otherwise                -> FALSE
     *
     * @more AJAX ONLY. More detail inside Templates/Dndrank/List.html
     * @param int+ $uid The ID of the Rank entity
     * @param string $current The String that contains answer uid positions
     * @return string json
     */
    public function checkAction()
    {
        $arguments = $this->request->getArguments();
        $responce = array();

        $rankUid = $arguments['uid'];
        if (!empty($rankUid) && intval($rankUid)) {
            $responce = $this->checkService->check($rankUid, $arguments['current']);
        }

        return json_encode($responce);
    }

}