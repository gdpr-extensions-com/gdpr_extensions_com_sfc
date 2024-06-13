<?php

declare(strict_types=1);

namespace GdprExtensionsCom\GdprExtensionsComSfc\Controller;


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This file is part of the "gdpr-extensions-com-sfc" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2023
 */

/**
 * GdprSfcController
 */
class GdprSfcController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * ContentObject
     *
     * @var ContentObject
     */
    protected $contentObject = null;

    /**
     * Action initialize
     */
    protected function initializeAction()
    {
        $this->contentObject = $this->configurationManager->getContentObject();

        // intialize the content object
    }

    /**
     * action index
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function indexAction(): \Psr\Http\Message\ResponseInterface
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_gdprextensionscomyoutube_domain_model_gdprmanager');
        $gdprSettingYoutube = $queryBuilder
            ->select('*')
            ->from('tx_gdprextensionscomyoutube_domain_model_gdprmanager')->where(
                $queryBuilder->expr()->like('extension_title', $queryBuilder->createNamedParameter('%' . (string)'youtube' . '%'))
            );
        $settings =  $gdprSettingYoutube->execute()->fetchAssociative();

        $this->contentObject->data['gdpr_sfc_script'] = base64_encode($this->contentObject->data['gdpr_sfc_script']);

        $this->view->assign('YoutubeData', $this->contentObject->data);
        $this->view->assign('YoutubeSettings', $settings);
        $this->view->assign('rootPid', $GLOBALS['TSFE']->site->getRootPageId());
        return $this->htmlResponse();
    }
}
