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
 * Test case for class \TYPO3\LtubeToolbox\Domain\Model\Dndzuordnung.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Pranab Ojha <pojha@learntube.in>
 */
class DndzuordnungTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \TYPO3\LtubeToolbox\Domain\Model\Dndzuordnung
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \TYPO3\LtubeToolbox\Domain\Model\Dndzuordnung();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getDndCardNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDndCardName()
		);
	}

	/**
	 * @test
	 */
	public function setDndCardNameForStringSetsDndCardName()
	{
		$this->subject->setDndCardName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'dndCardName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDndCardLeftContentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDndCardLeftContent()
		);
	}

	/**
	 * @test
	 */
	public function setDndCardLeftContentForStringSetsDndCardLeftContent()
	{
		$this->subject->setDndCardLeftContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'dndCardLeftContent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDndCardRightContentReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDndCardRightContent()
		);
	}

	/**
	 * @test
	 */
	public function setDndCardRightContentForStringSetsDndCardRightContent()
	{
		$this->subject->setDndCardRightContent('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'dndCardRightContent',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDndCardBgColorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDndCardBgColor()
		);
	}

	/**
	 * @test
	 */
	public function setDndCardBgColorForStringSetsDndCardBgColor()
	{
		$this->subject->setDndCardBgColor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'dndCardBgColor',
			$this->subject
		);
	}

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
