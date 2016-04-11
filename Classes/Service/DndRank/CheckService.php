<?php
namespace TYPO3\LtubeToolbox\Service\DndRank;

use TYPO3\CMS\Core\SingletonInterface;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 LEARNTUBE! GbR ­ Contact: borulkosergey@icloud.com
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

class CheckService implements SingletonInterface
{

    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\DndrankanswerRepository
     * @inject
     */
    protected $dndrankanswerRepository = null;


    /**
     * Returns the uids that are on a correct positions
     *
     * @api
     * @param int+ $rankUid The uid of the rank entity
     * @param string $userAnswerOptionUids  Like '1,2,5,7'
     * @return array
     */
    public function check($rankUid, $userAnswerOptionUids){
        $rightAnswersList = $this->dndrankanswerRepository->findRightAnswer(intval($rankUid));
        $userAnswerOptionUids = explode(',', $userAnswerOptionUids);

        if (empty($rightAnswersList)) {
            return array();
        }

        $result = array();
        foreach ($this->buildEtalonByAnswers($rightAnswersList) as $index => $answerUid ) {
            if (intval($answerUid) === intval($userAnswerOptionUids[$index])) {
                $result[] = $answerUid;
            }
        }

        return $result;
    }

    /**
     * @param \TYPO3\LtubeToolbox\Domain\Model\Dndrankanswer[] $answersList
     */
    protected function buildEtalonByAnswers($answersList) {
        $list = array();

        /** @var  \TYPO3\LtubeToolbox\Domain\Model\Dndrankanswer $answer */
        foreach ($answersList as $answer) {
            $list[] = $answer->getUid();
        }
        return $list;
    }

}
