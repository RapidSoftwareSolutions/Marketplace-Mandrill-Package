<?php
$app->post('/api/Mandrill/addTemplate', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'name']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "templates/add.json";
    $body = array();
    $body['key'] = $post_data['args']['apiKey'];
    $body['name'] = $post_data['args']['name'];
    if (isset($post_data['args']['fromName']) && strlen($post_data['args']['fromName']) > 0) {
        $body['from_name'] = $post_data['args']['fromName'];
    }
    if (isset($post_data['args']['fromEmail']) && strlen($post_data['args']['fromEmail']) > 0) {
        $body['from_email'] = $post_data['args']['fromEmail'];
    }
    if (isset($post_data['args']['subject']) && strlen($post_data['args']['subject']) > 0) {
        $body['subject'] = $post_data['args']['subject'];
    }
    if (isset($post_data['args']['code']) && strlen($post_data['args']['code']) > 0) {
        $body['code'] = $post_data['args']['code'];
    }
    if (isset($post_data['args']['text']) && strlen($post_data['args']['text']) > 0) {
        $body['text'] = $post_data['args']['text'];
    }
    if (isset($post_data['args']['publish']) && strlen($post_data['args']['publish']) > 0) {
        $body['publish'] = $post_data['args']['publish'];
    }
    if (isset($post_data['args']['labels']) && count($post_data['args']['labels']) > 0) {
        $body['labels'] = $post_data['args']['labels'];
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