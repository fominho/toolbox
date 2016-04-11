<?php

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Learntube Toolbox');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    $_EXTKEY,
    'Pi1',
    'Ltube Toolbox'
);


$extensionName   = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));
$pluginID        = strtolower('pi1');
$pluginSignature = $extensionName . '_' . $pluginID;

$TCA["tt_content"]["types"]["list"]["subtypes_addlist"][$pluginSignature]="pi_flexform";

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' .$_EXTKEY . '/Configuration/FlexForms/flexform_ltubetoolbox_pi1.xml');


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_flashcard', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_flashcard.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_flashcard');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndeinordnung', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndeinordnung.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndeinordnung');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndeinordngfeedback', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndeinordngfeedback.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndeinordngfeedback');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndzuordnung', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndzuordnung.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndzuordnung');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndzuordnungfeedback', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndzuordnungfeedback.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndzuordnungfeedback');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_quiz', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_quiz.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_quiz');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_chart', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_chart.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_chart');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_hangmanquestion', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_hangmanquestion.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_hangmanquestion');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_hangmananswer', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_hangmananswer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_hangmananswer');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_questionhintanswer', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_questionhintanswer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_questionhintanswer');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_hint', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_hint.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_hint');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndrank', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndrank.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndrank');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_ltubetoolbox_domain_model_dndrankanswer', 'EXT:ltube_toolbox/Resources/Private/Language/locallang_csh_tx_ltubetoolbox_domain_model_dndrankanswer.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_ltubetoolbox_domain_model_dndrankanswer');

?>