<?php

$app->post('/api/Instapaper/getAccessToken', function ($request, $response) {

    $settings = $this->settings;
    $checkRequest = $this->validation;
    $validateRes = $checkRequest->validate($request, ['customerKey','customerSecret','username','password']);

    if(!empty($validateRes) && isset($validateRes['callback']) && $validateRes['callback']=='error') {
        return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($validateRes);
    } else {
        $post_data = $validateRes;
    }

    $requiredParams = ['customerKey'=>'customerKey','customerSecret'=>'customerSecret','username'=>'username','password'=>'password'];
    $optionalParams = [];
    $bodyParams = [
    ];

    $data = \Models\Params::createParams($requiredParams, $optionalParams, $post_data['args']);

    $client = $this->httpClient;
    $query_str = "https://www.instapaper.com/api/1/oauth/access_token";


    $requestParams = \Models\Params::createRequestBody($data, $bodyParams);
    $requestParams['headers'] = [];

    $host = "https://www.instapaper.com/api/1/oauth/access_token";

    $consumer = new OAuthConsumer($data['customerKey'],$data['customerSecret']);
    $params = array('x_auth_username'=>$data['username'], 'x_auth_password'=>$data['password'], 'x_auth_mode'=>'client_auth');
    $requestOAuth = OAuthRequest::from_consumer_and_token($consumer, NULL, 'POST', $host, $params);
    $requestOAuth->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);

    try {
        $resp = $client->post($host,
            [
                "form_params" => array_merge($params, $requestOAuth->get_parameters())
            ]
        );
        $responseBody = $resp->getBody()->getContents();
        $responseObject[] = explode("&",$responseBody)[0];
        $responseObject[] = explode("&",$responseBody)[1];
        $responseBody = $responseObject;

        if(in_array($resp->getStatusCode(), ['200', '201', '202', '203', '204'])) {
            $result['callback'] = 'success';
            $result['contextWrites']['to'] = is_array($responseBody) ? $responseBody : json_decode($responseBody);
            if(empty($result['contextWrites']['to'])) {
                $result['contextWrites']['to']['status_msg'] = "Api return no results";
            }
        } else {
            $result['callback'] = 'error';
            $result['contextWrites']['to']['status_code'] = 'API_ERROR';
            $result['contextWrites']['to']['status_msg'] = json_decode($responseBody);
        }

    } catch (\GuzzleHttp\Exception\ClientException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ServerException $exception) {

        $responseBody = $exception->getResponse()->getBody()->getContents();
        if(empty(json_decode($responseBody))) {
            $out = $responseBody;
        } else {
            $out = json_decode($responseBody);
        }
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'API_ERROR';
        $result['contextWrites']['to']['status_msg'] = $out;

    } catch (GuzzleHttp\Exception\ConnectException $exception) {

        $responseBody = $exception->getResponse()->getBody(true);
        $result['callback'] = 'error';
        $result['contextWrites']['to']['status_code'] = 'INTERNAL_PACKAGE_ERROR';
        $result['contextWrites']['to']['status_msg'] = 'Something went wrong inside the package.';

    }

    return $response->withHeader('Content-type', 'application/json')->withStatus(200)->withJson($result);

});