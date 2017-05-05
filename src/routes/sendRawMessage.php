<?php
$app->post('/api/Mandrill/sendRawMessage', function ($request, $response, $args) {
    $settings = $this->settings;

    //checking properly formed json
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['apiKey', 'rawMessage']);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }
    //forming request to vendor API
    $query_str = $settings['api_url'] . "messages/send-raw.json";
    $body = array();
    $body['key'] = $post_data['args']['apiKey'];
    $body['raw_message'] = $post_data['args']['rawMessage'];

    if (isset($post_data['args']['fromEmail']) && strlen($post_data['args']['fromEmail']) > 0) {
        $body['from_email'] = $post_data['args']['fromEmail'];
    }
    if (isset($post_data['args']['fromName']) && strlen($post_data['args']['fromName']) > 0) {
        $body['from_name'] = $post_data['args']['fromName'];
    }
    if (isset($post_data['args']['to']) && strlen($post_data['args']['to']) > 0) {
        $body['to'] = $post_data['args']['to'];
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
    if (isset($post_data['args']['returnPathDomain']) && strlen($post_data['args']['returnPathDomain']) > 0) {
        $body['return_path_domain'] = $post_data['args']['returnPathDomain'];
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
        if ($response->getStatusCode() == '200' && $status != 'rejected' ) {
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