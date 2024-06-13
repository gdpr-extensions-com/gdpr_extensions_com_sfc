<?php

if ((int)\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version() >= 12) {

        return[
            // need to change main logo
            'gdpr' => [
                'labels' => 'LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_mod_web.xlf',
                'iconIdentifier' => 'gdpr_extensions_com_tab',
                'navigationComponent' => '@typo3/backend/page-tree/page-tree-element',
            ],
            'sfc' => [
                'parent' => 'gdpr',
                'position' => [],
                'access' => 'user,group',
                'iconIdentifier' => 'gdpr_extensions_com_sfc-plugin-gdprsfc',
                'path' => '/module/sfc',
                'labels' => 'LLL:EXT:gdpr_extensions_com_sfc/Resources/Private/Language/locallang_gdprmanager.xlf',
                'extensionName' => 'GdprExtensionsComSfc',
                'controllerActions' => [
                    \GdprExtensionsCom\GdprExtensionsComSfc\Controller\GdprManagerController::class => [
                        'list',
                        'index',
                        'show',
                        'new',
                        'create',
                        'edit',
                        'update',
                        'delete',
                        'uploadImage'
                    ],
                ],
            ]
        ];

}


