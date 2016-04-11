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
class ChartController extends \TYPO3\LtubeToolbox\Controller\AbstractToolboxController
{

    /**
     * @var \TYPO3\LtubeToolbox\Domain\Repository\ChartRepository
     * @inject
     */
    protected $chartRepository = null;


    public function listAction()
    {
        $cObj = $this->configurationManager->getContentObject();
        $content_id = $cObj->data['uid'];
        $currentUid = $cObj->data['_LOCALIZED_UID'] ? $cObj->data['_LOCALIZED_UID'] : $cObj->data['uid'];
        $divIdOfCE = 'c' . $content_id;
        $cur_lang = $GLOBALS['TSFE']->config['config']['language'];
        $charts = $this->chartRepository->findChart($currentUid);

        $resultArray = array();
        $chart_json_data = '[';
        foreach ($charts as $object) {
            $resultArray[$object->getUid()]['name'] = $object->getName();
            $resultArray[$object->getUid()]['description'] = $object->getDescription();
            $resultArray[$object->getUid()]['value'] = $object->getValue();
            $resultArray[$object->getUid()]['color'] = $object->getColor();
            $chart_json_data .= json_encode($resultArray[$object->getUid()]) . ',';
        }

        $chart_json_data .= ']';
        $this->_process_chart_js($divIdOfCE, $chart_json_data, $resultArray);

        $this->view->assign('charts', $charts);
        $this->view->assign('width', $this->settingsService->find('chart','width'));
        $this->view->assign('height', $this->settingsService->find('chart','height'));
        $this->view->assign('type', $this->settingsService->find('chart','type'));
        $this->view->assign('cur_lang', $cur_lang);
    }
    
    /**
     * @param $divIdOfCE
     * @param $chart_json_data
     * @param $chartArray
     */
    function _process_chart_js($divIdOfCE, $chart_json_data, $chartArray)
    {
        $i = 0;
        $descArray = 'var slice_desc = new Array();';
        foreach ($chartArray as $chartKey => $chartVal) {
            $sliceColor = $chartVal['color'];
            $sliceColorCss .= "#{$divIdOfCE} .jchartfx .Attribute{$i}{fill:{$sliceColor} !important;}";
            $descArray .= "slice_desc[{$i}] = '" . $chartVal['description'] . '\';';
            $i++;
        }
        $chartJs = '<script type=\'text/javascript\'> /*<![CDATA[*/ ';
        $chartJs .= $descArray;
        $chartJs .= 'function _ltube_populate_chart(ltube_chart) {';
        $chartJs .= "var items = {$chart_json_data};";
        $chartJs .= 'ltube_chart.setDataSource(items);';
        $chartJs .= '} /*]]>*/ </script>';
        $GLOBALS['TSFE']->additionalHeaderData[$divIdOfCE . '_chart_header_js'] = $chartJs;
        $cardStyle = '<style type=\'text/css\'>   /*<![CDATA[*/ ';
        $cardStyle .= $sliceColorCss;
        $cardStyle .= ' /*]]>*/ </style>';
        $GLOBALS['TSFE']->additionalHeaderData[$divIdOfCE . '_chart_header_css'] = $cardStyle;
    }

}