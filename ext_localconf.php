<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'TYPO3.' . $_EXTKEY,
    'Pi1',
    array(
        'Flashcard' => 'list',
        'Dndeinordnung' => 'list',
        'Dndzuordnung' => 'list',
        'Quiz' => 'list',
        'Questionhintanswer' => 'list',
        'Dndrank' => 'list',
        'Hangmanquestion' => 'list',
        'Chart' => 'list'
    ),
    array(
        'Flashcard' => '',
        'Dndeinordnung' => '',
        'Dndzuordnung' => '',
        'Quiz' => '',
        'Questionhintanswer' => '',
        'Dndrank' => 'check',
        'Hangmanquestion' => '',
		'Chart' => ''
    )
);
