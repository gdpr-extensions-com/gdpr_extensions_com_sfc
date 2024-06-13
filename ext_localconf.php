<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComSfc',
        'Gdprsfc',
        [
            \GdprExtensionsCom\GdprExtensionsComSfc\Controller\GdprSfcController::class => 'index'
        ],
        // non-cacheable actions
        [
            \GdprExtensionsCom\GdprExtensionsComSfc\Controller\GdprSfcController::class => '',
            \GdprExtensionsCom\GdprExtensionsComSfc\Controller\GdprManagerController::class => 'create, update, delete'
        ],
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
    );

    // register plugin for cookie widget
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'GdprExtensionsComSfc',
        'Gdprcookiewidget',
        [
            \GdprExtensionsCom\GdprExtensionsComSfc\Controller\GdprCookieWidgetController::class => 'index'
        ],
        // non-cacheable actions
        [],
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    gdprcookiewidget {
                        iconIdentifier = gdpr_extensions_com_sfc-plugin-gdprsfc
                        title = cookie
                        description = LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_youtube_gdprsfc.description
                        tt_content_defValues {
                            CType = list
                            list_type = gdprextensionscomsfc_gdprcookiewidget
                        }
                    }
                }
                show = *
            }
       }'
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod.wizards.newContentElement.wizardItems {
               gdpr.header = LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_youtube_gdprsfc.name.tab
        }'
    );
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.gdpr {
                elements {
                    gdprsfc {
                        iconIdentifier = gdpr_extensions_com_sfc-plugin-gdprsfc
                        title = LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_youtube_gdprsfc.name
                        description = LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_db.xlf:tx_gdpr_extensions_com_youtube_gdprsfc.description
                        tt_content_defValues {
                            CType = gdprextensionscomsfc_gdprsfc
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
