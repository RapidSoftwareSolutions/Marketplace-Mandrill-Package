<?php
$app->post('/api/Mandrill/startActivityHistoryExport', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "exports/activity.json";
    $body = array();
    $body['key'] = $post_data['args']['apiKey'];
    if (isset($post_data['args']['notifyEmail']) && strlen($post_data['args']['notifyEmail']) > 0) {
        $body['notify_email'] = $post_data['args']['notifyEmail'];
    }
    if (isset($post_data['args']['dateFrom']) && strlen($post_data['args']['dateFrom']) > 0) {
        $body['date_from'] = $post_data['args']['dateFrom'];
    }
    if (isset($post_data['args']['dateTo']) && strlen($post_data['args']['dateTo']) > 0) {
        $body['date_to'] = $post_data['args']['dateTo'];
    }
    if (isset($post_data['args']['tags']) && strlen($post_data['args']['tags']) > 0) {
        $body['tags'] = $post_data['args']['tags'];
    }
    if (isset($post_data['args']['senders']) && strlen($post_data['args']['senders']) > 0) {
        $body['senders'] = $post_data['args']['senders'];
    }
    if (isset($post_data['args']['states']) && strlen($post_data['args']['states']) > 0) {
        $body['states'] = $post_data['args']['states'];
    }
    if (isset($post_data['args']['apiKeys']) && strlen($post_data['args']['apiKeys']) > 0) {
        $body['api_keys'] = $post_data['args']['apiKeys'];
    }
    //requesting remote API
    $client = new GuzzleHttp\Client();

    try {

        $resp = $client->request('POST', $query_str, [
            'json' => $body
        ]);

        $responseBody = $resp->getBody()->getContents();
        $rawBody = json_decode($resp->getBody());

        $all_data[] = $rawBody;
        if ($response->getStatusCode() == '200') {
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