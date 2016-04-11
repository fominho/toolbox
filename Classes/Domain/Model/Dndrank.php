<?php
namespace TYPO3\LtubeToolbox\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
 * Dndrank
 *
 * @package ltube_toolbox
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class Dndrank extends AbstractEntity
{

    /**
     * question
     *
     * @var string
     */
    protected $question = '';
    
    /**
     * answer
     *
     * @var int
     */
    protected $answer = 0;
    
    /**
     * parentid
     *
     * @var int
     */
    protected $parentid = 0;
    
    /**
     * parenttable
     *
     * @var string
     */
    protected $parenttable = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\LtubeToolbox\Domain\Model\Dndrankanswer>
     */
    protected $answerList = null;


    public function __construct()
    {
        $this->initStorageObjects();
    }

    protected function initStorageObjects()
    {
        $this->answerList = new ObjectStorage();
    }

    /**
    * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\LtubeToolbox\Domain\Model\Dndrankanswer>
    */
    public function getAnswerList()
    {
        return $this->answerList;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\LtubeToolbox\Domain\Model\Dndrankanswer> $answerList
     * @return void
     */
    public function setAnswerList(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $answerList)
    {
        $this->answerList = $answerList;
    }

    /**
     * Adds new Answer
     *
     * @param \TYPO3\LtubeToolbox\Domain\Model\Dndrankanswer $answer
     * @return void
     */
    public function addAnswer(\TYPO3\LtubeToolbox\Domain\Model\Dndrankanswer $answer)
    {
        $this->answerList->attach($answer);
    }

    /**
     * Returns the question
     *
     * @return \string $question
     */
    public function getQuestion()
    {
        return $this->question;
    }
    
    /**
     * Sets the question
     *
     * @param \string $question
     * @return void
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }
    
    /**
     * Returns the answer
     *
     * @return \integer $answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }
    
    /**
     * Sets the answer
     *
     * @param \integer $answer
     * @return void
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }
    
    /**
     * Returns the parentid
     *
     * @return \integer $parentid
     */
    public function getParentid()
    {
        return $this->parentid;
    }
    
    /**
     * Sets the parentid
     *
     * @param \integer $parentid
     * @return void
     */
    public function setParentid($parentid)
    {
        $this->parentid = $parentid;
    }
    
    /**
     * Returns the parenttable
     *
     * @return \string $parenttable
     */
    public function getParenttable()
    {
        return $this->parenttable;
    }
    
    /**
     * Sets the parenttable
     *
     * @param \string $parenttable
     * @return void
     */
    public function setParenttable($parenttable)
    {
        $this->parenttable = $parenttable;
    }

}