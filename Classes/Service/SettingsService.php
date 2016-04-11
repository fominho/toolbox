<?php
namespace Lms3\LtubeToolbox\Service;

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

class SettingsService implements SingletonInterface
{
    /**
     * CONFIGURATION_TYPE_SETTINGS
     * @var array
     */
    protected $settings;


    /**
     * @param \TYPO3\CMS\Extbase\Configuration\ConfigurationManager $configurationManager
     * @return void
     */
    public function injectConfigurationManager(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager $configurationManager) {
        $this->settings = $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::CONFIGURATION_TYPE_SETTINGS);
        if (empty($this->settings)) {
            throw new Exception('No configuration found inside Settings Service');
        }
    }

    /**
     *  1. Determines which value should be retrieved ( local or from TypoScript )
     *  2. Finds the value inside plugin settings by 'property' value and returns it.
     *  3. If no matches, - returns an empty string
     *
     * @api
     * @more This function is used inside controllers and viewhelpers.
     * @param $section string  [ flashcard, hint, ... ]
     * @param $property string [ width, height, countPerLine, and so on... ]
     * @return string The actual settings value
     */
    public function find($section, $property)
    {
        $mode = $section . $property;
        $result = '';

        $modeValue = $this->settings[$mode];
        if (empty($modeValue)) {
            return $result;
        }

        if ($modeValue === 'local') {
            $result = $this->settings[$mode . '_local'];
        } else {
            $result = $this->settings[$section][$property];
        }

        return $result;
    }

    /**
     * If 'settingsIdentifier' exists inside plugin settings, - return it
     *
     * @api
     * @param $settingsIdentifier string
     * @return array | NULL
     */
    public function getSettings($settingsIdentifier)
    {
        return $this->settings[$settingsIdentifier];
    }

}
