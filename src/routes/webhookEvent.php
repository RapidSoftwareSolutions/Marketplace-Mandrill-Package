<?php
$app->post('/api/Mandrill/webhookEvent', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, []);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $result = [
        "http_resp" => "",
        "client_msg" => $post_data,
        "params" => []
    ];
    $client = new GuzzleHttp\Client();
    try {
        $resp = $client->request('POST', 'http://d7c2294c.ngrok.io', [
            'json' => $result
        ]);
    } catch (Exception $e){

    }

    $result['callback'] = 'success';
    $result['contextWrites']['to'] = $result;

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});