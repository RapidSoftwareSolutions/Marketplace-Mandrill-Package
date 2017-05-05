<?php
$app->post('/api/Mandrill/sendTemplateTransactionalMessage', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'templateName', 'messageFromEmail', 'templateContent', 'messageTo']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "messages/send-template.json";
    $body = array();
    $body['key'] = $post_data['args']['apiKey'];
    $body['template_name'] = $post_data['args']['templateName'];
    $body['template_content'] = $post_data['args']['templateContent'];
    if (isset($post_data['args']['messageHtml']) && strlen($post_data['args']['messageHtml']) > 0) {
        $body['message']['html'] = $post_data['args']['messageHtml'];
    }
    if (isset($post_data['args']['messageText']) && strlen($post_data['args']['messageText']) > 0) {
        $body['message']['text'] = $post_data['args']['messageText'];
    }
    if (isset($post_data['args']['messageSubject']) && strlen($post_data['args']['messageSubject']) > 0) {
        $body['message']['subject'] = $post_data['args']['messageSubject'];
    }

    $body['message']['from_email'] = $post_data['args']['messageFromEmail'];

    if (isset($post_data['args']['messageFromName']) && strlen($post_data['args']['messageFromName']) > 0) {
        $body['message']['from_name'] = $post_data['args']['messageFromName'];
    }
    $body['message']['to'] = $post_data['args']['messageTo'];
    if (isset($post_data['args']['messageHeaders']) && strlen($post_data['args']['messageHeaders']) > 0) {
        $body['message']['headers'] = $post_data['args']['messageHeaders'];
    }
    if (isset($post_data['args']['messageImportant']) && strlen($post_data['args']['messageImportant']) > 0) {
        $body['message']['important'] = $post_data['args']['messageImportant'];
    }
    if (isset($post_data['args']['messageTrackOpens']) && strlen($post_data['args']['messageTrackOpens']) > 0) {
        $body['message']['track_opens'] = $post_data['args']['messageTrackOpens'];
    }
    if (isset($post_data['args']['messageTrackClicks']) && strlen($post_data['args']['messageTrackClicks']) > 0) {
        $body['message']['track_clicks'] = $post_data['args']['messageTrackClicks'];
    }
    if (isset($post_data['args']['messageAutoText']) && strlen($post_data['args']['messageAutoText']) > 0) {
        $body['message']['auto_text'] = $post_data['args']['messageAutoText'];
    }
    if (isset($post_data['args']['messageAutoHtml']) && strlen($post_data['args']['messageAutoHtml']) > 0) {
        $body['message']['auto_html'] = $post_data['args']['messageAutoHtml'];
    }
    if (isset($post_data['args']['messageInlineCss']) && strlen($post_data['args']['messageInlineCss']) > 0) {
        $body['message']['inline_css'] = $post_data['args']['messageInlineCss'];
    }
    if (isset($post_data['args']['messageUseStripQs']) && strlen($post_data['args']['messageUseStripQs']) > 0) {
        $body['message']['url_strip_qs'] = $post_data['args']['messageUseStripQs'];
    }
    if (isset($post_data['args']['messagePreserveRecipients']) && strlen($post_data['args']['messagePreserveRecipients']) > 0) {
        $body['message']['preserve_recipients'] = $post_data['args']['messagePreserveRecipients'];
    }
    if (isset($post_data['args']['messageViewContentLink']) && strlen($post_data['args']['messageViewContentLink']) > 0) {
        $body['message']['view_content_link'] = $post_data['args']['messageViewContentLink'];
    }
    if (isset($post_data['args']['messageBccAddress']) && strlen($post_data['args']['messageBccAddress']) > 0) {
        $body['message']['bcc_address'] = $post_data['args']['messageBccAddress'];
    }
    if (isset($post_data['args']['messageTrackingDomain']) && strlen($post_data['args']['messageTrackingDomain']) > 0) {
        $body['message']['tracking_domain'] = $post_data['args']['messageTrackingDomain'];
    }
    if (isset($post_data['args']['messageSigningDomain']) && strlen($post_data['args']['messageSigningDomain']) > 0) {
        $body['message']['signing_domain'] = $post_data['args']['messageSigningDomain'];
    }
    if (isset($post_data['args']['messageReturnPathDomain']) && strlen($post_data['args']['messageReturnPathDomain']) > 0) {
        $body['message']['return_path_domain'] = $post_data['args']['messageReturnPathDomain'];
    }
    if (isset($post_data['args']['messageMerge']) && strlen($post_data['args']['messageMerge']) > 0) {
        $body['message']['merge'] = $post_data['args']['messageMerge'];
    }
    if (isset($post_data['args']['messageMergeLanguage']) && strlen($post_data['args']['messageMergeLanguage']) > 0) {
        $body['message']['merge_language'] = $post_data['args']['messageMergeLanguage'];
    }
    if (isset($post_data['args']['messageGlobalMergeVars']) && strlen($post_data['args']['messageGlobalMergeVars']) > 0) {
        $body['message']['global_merge_vars'] = $post_data['args']['messageGlobalMergeVars'];
    }
    if (isset($post_data['args']['messageMergeVars']) && strlen($post_data['args']['messageMergeVars']) > 0) {
        $body['message']['merge_vars'] = $post_data['args']['messageMergeVars'];
    }
    if (isset($post_data['args']['messageTags']) && strlen($post_data['args']['messageTags']) > 0) {
        $body['message']['tags'] = $post_data['args']['messageTags'];
    }
    if (isset($post_data['args']['messageSubaccount']) && strlen($post_data['args']['messageSubaccount']) > 0) {
        $body['message']['subaccount'] = $post_data['args']['messageSubaccount'];
    }
    if (isset($post_data['args']['messageGoogleAnalyticsDomains']) && strlen($post_data['args']['messageGoogleAnalyticsDomains']) > 0) {
        $body['message']['google_analytics_domains'] = $post_data['args']['messageGoogleAnalyticsDomains'];
    }
    if (isset($post_data['args']['messageGoogleAnalyticsCampaign']) && strlen($post_data['args']['messageGoogleAnalyticsCampaign']) > 0) {
        $body['message']['google_analytics_campaign'] = $post_data['args']['messageGoogleAnalyticsCampaign'];
    }
    if (isset($post_data['args']['messageMetadata']) && strlen($post_data['args']['messageMetadata']) > 0) {
        $body['message']['metadata'] = $post_data['args']['messageMetadata'];
    }
    if (isset($post_data['args']['messageRecipientMetadata']) && strlen($post_data['args']['messageRecipientMetadata']) > 0) {
        $body['message']['recipient_metadata'] = $post_data['args']['messageRecipientMetadata'];
    }
    if (isset($post_data['args']['messageAttachments']) && strlen($post_data['args']['messageAttachments']) > 0) {
        $body['message']['attachments'] = $post_data['args']['messageAttachments'];
    }
    if (isset($post_data['args']['messageImages']) && strlen($post_data['args']['messageImages']) > 0) {
        $body['message']['images'] = $post_data['args']['messageImages'];
    }
    if (isset($post_data['args']['async']) && strlen($post_data['args']['async']) > 0) {
        $body['async'] = $post_data['args']['async'];
    }
    if (isset($post_data['args']['ipPool']) && strlen($post_data['args']['ipPool']) > 0) {
        $body['ip_pool'] = $post_data['args']['ipPool'];
    }
    if (isset($post_data['args']['sendAt']) && strlen($post_data['args']['sendAt']) > 0) {
        $body['send_at'] = $post_data['args']['sendAt'];
    }

    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('POST', $query_str, [
            'json' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());
        $status = $rawBody[0]->status;

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200' && $status != 'rejected') {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($all_data) ? $all_data : json_decode($all_data);
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {
        $responseBody = $exception->getResponse()->getReasonPhrase();
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $responseBody;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    } catch (GuzzleHttp\Exception\BadResponseException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to'] = json_decode($responseBody);

    }


    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});