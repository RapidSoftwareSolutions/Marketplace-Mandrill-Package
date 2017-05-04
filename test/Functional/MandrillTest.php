<?php

namespace Test\Functional;

require_once(__DIR__ . '/../../src/Models/checkRequest.php');
class MailboxlayerTest extends BaseTestCase {

    public function testListMetrics() {

        $routes = [
            'deleteCustomMetadataField',
            'updateCustomMetadataField',
            'addCustomMetadataField',
            'getCustomMetadataFields',
            'setCustomDNS',
            'checkCustomDNS',
            'deletePool',
            'getSingleDedicatedIpPool',
            'createPool',
            'getMyDedicatedIpPools',
            'deleteDedicatedIP',
            'movesDedicatedIP',
            'cancelWarmupForDedicatedIP',
            'startWarmupForDedicatedIP',
            'requestDedicatedIP',
            'getSingleDedicatedIP',
            'getMyDedicatedIPs',
            'startActivityHistoryExport',
            'startRejectionWhitelistExport',
            'getExportJob',
            'startRejectionBlacklistExport',
            'getAllExports',
            'sendInboundRaw',
            'deleteInboundMailboxRoute',
            'updateInboundMailboxRoute',
            'addInboundMailboxRoute',
            'getInboundMailboxRoutes',
            'deleteInboundDomain',
            'checkInboundDomain',
            'addInboundDomain',
            'getInboundDomains',
            'deleteSubaccount',
            'resumeSubaccountSending',
            'pauseSubaccountSending',
            'updateSubaccount',
            'getSingleSubaccount',
            'addSubaccount',
            'getSubaccounts',
            'deleteWebhook',
            'updateWebhook',
            'getSingleWebhook',
            'addWebhook',
            'getAllWebhooks',
            'renderTemplate',
            'getTemplateHistory',
            'deleteTemplate',
            'publishTemplate',
            'getTemplateInfo',
            'updateTemplate',
            'addTemplate',
            'checkTrackingDomain',
            'addTrackingDomain',
            'getTrackingDomains',
            'getURLHistory',
            'searchMostClickedURLs',
            'getMostClickedURLs',
            'getSenderHistory',
            'getSingleSender',
            'verifyDomain',
            'checkSenderDomain',
            'addSenderDomain',
            'getSenderDomains',
            'deleteEmailFromWhitelist',
            'getEmailRejectionWhitelist',
            'addEmailToRejectionWhitelist',
            'deleteEmailRejection',
            'getEmailRejectionBlacklist',
            'addEmailToRejectionBlacklist',
            'getAllTagsHistory',
            'getTagHistory',
            'getSingleTag',
            'deleteTag',
            'getUserDefinedTagInfo',
            'rescheduleScheduledEmail',
            'cancelScheduledEmail',
            'getScheduledEmails',
            'sendRawMessage',
            'parseEmailMessage',
            'getMessageContent',
            'getSingleMessage',
            'searchTimeSeriesMessages',
            'searchMessages',
            'sendTemplateTransactionalMessage',
            'sendTransactionalMessage',
            'getSenders',
            'validateApiKey',
            'getUserInfo'

        ];

        foreach($routes as $file) {
            $var = '{  
                    }';
            $post_data = json_decode($var, true);

            $response = $this->runApp('POST', '/api/Mandrill/'.$file, $post_data);

            $this->assertEquals(200, $response->getStatusCode(), 'Error in '.$file.' method');
        }
    }

}
