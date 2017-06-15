<?php
$app->post('/api/Mandrill/webhookEvent', function ($request, $response, $args) {

    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, []);
    if (!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback'] == 'error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $client = new GuzzleHttp\Client();

        $resp = $client->request('POST', 'http://d7c2294c.ngrok.io', [
            'json' => $post_data['args']
        ]);

    $reply = [
        "http_resp" => "",
        "client_msg" => $post_data['args'],
        "params" => $post_data['args']['params']
    ];

    $result['callback'] = 'success';
    $result['contextWrites']['to'] = json_encode($reply);

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});