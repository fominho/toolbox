<?php

namespace TYPO3\LtubeToolbox\Tests\Unit\Domain\Model;

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
 * Test case for class \TYPO3\LtubeToolbox\Domain\Model\Quiz.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Pranab Ojha <pojha@learntube.in>
 */
class QuizTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \TYPO3\LtubeToolbox\Domain\Model\Quiz
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \TYPO3\LtubeToolbox\Domain\Model\Quiz();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getQuestionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getQuestion()
		);
	}

	/**
	 * @test
	 */
	public function setQuestionForStringSetsQuestion()
	{
		$this->subject->setQuestion('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'question',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnswer1ReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAnswer1()
		);
	}

	/**
	 * @test
	 */
	public function setAnswer1ForStringSetsAnswer1()
	{
		$this->subject->setAnswer1('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'answer1',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnswer2ReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAnswer2()
		);
	}

	/**
	 * @test
	 */
	public function setAnswer2ForStringSetsAnswer2()
	{
		$this->subject->setAnswer2('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'answer2',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnswer3ReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAnswer3()
		);
	}

	/**
	 * @test
	 */
	public function setAnswer3ForStringSetsAnswer3()
	{
		$this->subject->setAnswer3('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'answer3',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnswer4ReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getAnswer4()
		);
	}

	/**
	 * @test
	 */
	public function setAnswer4ForStringSetsAnswer4()
	{
		$this->subject->setAnswer4('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'answer4',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHintReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getHint()
		);
	}

	/**
	 * @test
	 */
	public function setHintForStringSetsHint()
	{
		$this->subject->setHint('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'hint',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRightAnsFeedbackReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRightAnsFeedback()
		);
	}

	/**
	 * @test
	 */
	public function setRightAnsFeedbackForStringSetsRightAnsFeedback()
	{
		$this->subject->setRightAnsFeedback('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'rightAnsFeedback',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRightAnswerReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setRightAnswerForIntSetsRightAnswer()
	{	}

	/**
	 * @test
	 */
	public function getParentidReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setParentidForIntSetsParentid()
	{	}

	/**
	 * @test
	 */
	public function getParenttableReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getParenttable()
		);
	}

	/**
	 * @test
	 */
	public function setParenttableForStringSetsParenttable()
	{
		$this->subject->setParenttable('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'parenttable',
			$this->subject
		);
	}
}
