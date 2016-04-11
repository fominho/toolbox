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
 * Test case for class \TYPO3\LtubeToolbox\Domain\Model\Chart.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Pranab Ojha <pojha@learntube.in>
 */
class ChartTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \TYPO3\LtubeToolbox\Domain\Model\Chart
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \TYPO3\LtubeToolbox\Domain\Model\Chart();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName()
	{
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getValueReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setValueForIntSetsValue()
	{	}

	/**
	 * @test
	 */
	public function getColorReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getColor()
		);
	}

	/**
	 * @test
	 */
	public function setColorForStringSetsColor()
	{
		$this->subject->setColor('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'color',
			$this->subject
		);
	}
}
