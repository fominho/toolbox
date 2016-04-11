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
 * Test case for class \TYPO3\LtubeToolbox\Domain\Model\Flashcard.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Pranab Ojha <pojha@learntube.in>
 */
class FlashcardTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \TYPO3\LtubeToolbox\Domain\Model\Flashcard
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \TYPO3\LtubeToolbox\Domain\Model\Flashcard();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFcardNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFcardName()
		);
	}

	/**
	 * @test
	 */
	public function setFcardNameForStringSetsFcardName()
	{
		$this->subject->setFcardName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fcardName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFeContentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFeContent()
		);
	}

	/**
	 * @test
	 */
	public function setFeContentForStringSetsFeContent()
	{
		$this->subject->setFeContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'feContent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBeContentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBeContent()
		);
	}

	/**
	 * @test
	 */
	public function setBeContentForStringSetsBeContent()
	{
		$this->subject->setBeContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'beContent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFeFontColorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFeFontColor()
		);
	}

	/**
	 * @test
	 */
	public function setFeFontColorForStringSetsFeFontColor()
	{
		$this->subject->setFeFontColor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'feFontColor',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBeFontColorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBeFontColor()
		);
	}

	/**
	 * @test
	 */
	public function setBeFontColorForStringSetsBeFontColor()
	{
		$this->subject->setBeFontColor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'beFontColor',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFeBgColorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFeBgColor()
		);
	}

	/**
	 * @test
	 */
	public function setFeBgColorForStringSetsFeBgColor()
	{
		$this->subject->setFeBgColor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'feBgColor',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getBeBgColorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getBeBgColor()
		);
	}

	/**
	 * @test
	 */
	public function setBeBgColorForStringSetsBeBgColor()
	{
		$this->subject->setBeBgColor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'beBgColor',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFlipDirReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setFlipDirForIntSetsFlipDir()
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
