<?php

namespace TYPO3\LtubeToolbox\Controller;

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

/**
 * @package ltube_toolbox
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class FlashcardController extends \TYPO3\LtubeToolbox\Controller\AbstractToolboxController
{

    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\FlashcardRepository
     * @inject
     */
    protected $flashcardRepository = null;


    public function listAction()
    {
        $this->view->assign('isQuiz',       $this->settingsService->find('flashcard', 'paging'));
        $this->view->assign('countPerLine', $this->settingsService->find('flashcard', '_in_one_line'));
        $this->view->assign('cur_lang',     $GLOBALS['TSFE']->config['config']['language']);
        $this->view->assign('flashcards',   $this->flashcardRepository->findByParentid($this->getContentUid()));
    }

}
