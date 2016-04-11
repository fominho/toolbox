<?php
namespace TYPO3\LtubeToolbox\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Pranab Ojha <pojha@learntube.in>, Learntube
 *  			
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class TYPO3\LtubeToolbox\Controller\HangmananswerController.
 *
 * @author Pranab Ojha <pojha@learntube.in>
 */
class HangmananswerControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \TYPO3\LtubeToolbox\Controller\HangmananswerController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('TYPO3\\LtubeToolbox\\Controller\\HangmananswerController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllHangmananswersFromRepositoryAndAssignsThemToView()
	{

		$allHangmananswers = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$hangmananswerRepository = $this->getMock('TYPO3\\LtubeToolbox\\Domain\\Repository\\HangmananswerRepository', array('findAll'), array(), '', FALSE);
		$hangmananswerRepository->expects($this->once())->method('findAll')->will($this->returnValue($allHangmananswers));
		$this->inject($this->subject, 'hangmananswerRepository', $hangmananswerRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('hangmananswers', $allHangmananswers);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}
}
