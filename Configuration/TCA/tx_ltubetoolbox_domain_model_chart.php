<?php
return array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_chart',
        'label' => 'name',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => TRUE,
        'sortby' => 'sorting',
        'versioningWS' => 2,
        'versioning_followPages' => TRUE,
        'origUid' => 't3_origuid',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => array(
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ),
        'searchFields' => 'name, description, value, color,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ltube_toolbox') . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_chart.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, description, value, color, parentid, parenttabl',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, description, value, color'),
    ),
    'palettes' => array(
        '1' => array('showitem' => ''),
    ),
    'columns' => array(
        'sys_language_uid' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => array(
                'type' => 'select',
                'renderType' => 'selectSingle',
                'foreign_table' => 'sys_language',
                'foreign_table_where' => 'ORDER BY sys_language.title',
                'items' => array(
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
                    array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
                ),
            ),
        ),
        'l10n_parent' => array(
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => array(
                'type' => 'select',
                'items' => array(
                    array('', 0),
                ),
                'foreign_table' => 'tx_ltubetoolbox_domain_model_chart',
                'foreign_table_where' => 'AND tx_ltubetoolbox_domain_model_chart.pid=###CURRENT_PID### AND tx_ltubetoolbox_domain_model_chart.sys_language_uid IN (-1,0)',
            ),
        ),
        'l10n_diffsource' => array(
            'config' => array(
                'type' => 'passthrough',
            ),
        ),
        't3ver_label' => array(
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            )
        ),
        'hidden' => array(
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => array(
                'type' => 'check',
            ),
        ),
        'starttime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'endtime' => array(
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => array(
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => array(
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ),
            ),
        ),
        'name' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_chart.name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'description' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_chart.description',
            'config' => array(
                'type' => 'text',
                'cols' => 40,
                'rows' => 15,
                'eval' => 'trim',
                'wizards' => array(
                    'RTE' => array(
                        'icon' => 'wizard_rte2.gif',
                        'notNewRecords'=> 1,
                        'RTEonly' => 1,
                        'module' => array(
                            'name' => 'wizard_rte'
                        ),
                        'title' => 'LLL:EXT:cms/locallang_ttc.xlf:bodytext.W.RTE',
                        'type' => 'script'
                    )
                )
            ),
            'defaultExtras' => 'richtext:rte_transform[flag=rte_enabled|mode=ts]',
        ),
        'value' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_chart.value',
            'config' => array(
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
            ),
        ),
        'color' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_chart.color',
            'config' => array(
                'type' => 'input',
                'size' => '30',
                'wizards' => array(
                    'colorpick' => array(
                        'type' => 'colorbox',
                        'title' => 'Color picker',
                        'module' => array(
                            'name' => 'wizard_colorpicker'
                        ),
                        'dim' => '20x20',
                        'tableStyle' => 'border: solid 1px black; margin-left: 20px;',
                        'JSopenParams' => 'height=550,width=365,status=0,menubar=0,scrollbars=1',
                        'exampleImg' => 'gfx/wizard_colorpickerex.jpg',
                    ),
                ),
            ),
        ),
    ),
);