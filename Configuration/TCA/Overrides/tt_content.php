<?php
defined('TYPO3') || die();

$frontendLanguageFilePrefix = 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:';
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'GdprExtensionsComSfc',
    'Gdprsfc',
    'Social Feed Curator'
);

$fields = [
    'gdpr_sfc_script' => [
        'exclude' => true,
        'label' => 'LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_youtube_gdprsfc.gdpr_sfc_script',
        'description' => 'LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_youtube_gdprsfc.gdpr_sfc_script.description',
        'config' => [
            'type' => 'text',
            'cols' => 40,
            'rows' => 15,
            'eval' => 'required',
            'default' => ''
        ]
    ],

];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $fields);

$GLOBALS['TCA']['tt_content']['types']['gdprextensionscomsfc_gdprsfc'] = [
    'showitem' => '
                --palette--;' . $frontendLanguageFilePrefix . 'palette.general;general,
                gdpr_sfc_script,
                --div--;' . $frontendLanguageFilePrefix . 'tabs.appearance,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.frames;frames,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
                --div--;' . $frontendLanguageFilePrefix . 'tabs.access,
                hidden;' . $frontendLanguageFilePrefix . 'field.default.hidden,
                --palette--;' . $frontendLanguageFilePrefix . 'palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        ',
];
