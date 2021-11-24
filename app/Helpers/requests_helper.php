<?php

namespace App\Helpers;

define('URL_LOCAL', 'http://localhost:3030');

function toPost($to_send, $url, $token = ''){

    $ch = curl_init(URL_LOCAL.$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $to_send);

    // Set HTTP Header for POST request
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($to_send),
            'Authorization:'.'Bearer '.$token
        )
    );

    $res = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);

    if (gereciarResposta($info['http_code']) && $res != null){
        return json_decode($res);
    }
    logout();
}

function toGet($url, $token, $data = null){
    $ch = curl_init(URL_LOCAL.$url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'GET' );

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization:'.'Bearer '.$token
    ));


    $res = curl_exec($ch);
    $info = curl_getinfo($ch);
    curl_close($ch);
    if (gereciarResposta($info['http_code']) && $res != null){
        return json_decode($res);
    }
    logout();
}

function gereciarResposta($resposta){
    switch ($resposta){
        case 200: // OK
        case 201: // Created
        case 400: // Bad request
        case 404: // Not Found
            return true;

        case 401: // Unauthorized
        case 403: // Forbidden
        case 405: // Method Not Allowed
        case 500: // Internal Server Error
            return false;

        default:
            return false;
    }
}

function logout(){
    redirect()->to(base_url().'/logout');
}
