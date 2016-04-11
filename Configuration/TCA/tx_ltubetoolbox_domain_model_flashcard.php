<?php
return array(
    'ctrl' => array(
        'title'	=> 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_flashcard',
        'label' => 'fcard_name',
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
        'searchFields' => 'fcard_name,fe_content,be_content,parentid,parenttable,',
        'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('ltube_toolbox') . 'Resources/Public/Icons/tx_ltubetoolbox_domain_model_flashcard.gif'
    ),
    'interface' => array(
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, fcard_name, fe_content, be_content, parentid, parenttable',
    ),
    'types' => array(
        '1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, fcard_name, fe_content;;;richtext[], be_content;;;richtext[]'),
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
                'foreign_table' => 'tx_ltubetoolbox_domain_model_flashcard',
                'foreign_table_where' => 'AND tx_ltubetoolbox_domain_model_flashcard.pid=###CURRENT_PID### AND tx_ltubetoolbox_domain_model_flashcard.sys_language_uid IN (-1,0)',
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
        'fcard_name' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_flashcard.fcard_name',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ),
        ),
        'fe_content' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_flashcard.fe_content',
            'config' => array(
                "type" => "text",
                "cols" => "30",
                "rows" => "5",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "RTE" => array(
                        "notNewRecords" => 1,
                        "RTEonly" => 1,
                        "type" => "script",
                        "title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
                        "icon" => "wizard_rte2.gif",
                        'module' => array(
                            'name' => 'wizard_rte',
                        ),
                    ),
                ),
            ),
        ),
        'be_content' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_flashcard.be_content',
            'config' => array(
                "type" => "text",
                "cols" => "30",
                "rows" => "5",
                "wizards" => Array(
                    "_PADDING" => 2,
                    "RTE" => array(
                        "notNewRecords" => 1,
                        "RTEonly" => 1,
                        "type" => "script",
                        "title" => "Full screen Rich Text Editing|Formatteret redigering i hele vinduet",
                        "icon" => "wizard_rte2.gif",
                        'module' => array(
                            'name' => 'wizard_rte',
                        ),
                    ),
                ),
            ),
        ),
        'parentid' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_flashcard.parentid',
            'config' => array(
                'type' => 'input',
                'size' => 4,
                'eval' => 'int'
            ),
        ),
        'parenttable' => array(
            'exclude' => 0,
            'label' => 'LLL:EXT:ltube_toolbox/Resources/Private/Language/locallang_db.xlf:tx_ltubetoolbox_domain_model_flashcard.parenttable',
            'config' => array(
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ),
        ),
    ),
);