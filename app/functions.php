<?php

function response($arr = [], $code = 200, $sleep = 0, $type = 'json', $headers = []) {
    global $_REQ;
    
    $statusCode = [
        500 => "HTTP/1.1 500 Internal Server Error",

        429 => "HTTP/1.1 429 Too Many Requests",
        422 => "HTTP/1.1 422 Unprocessable Entity",
        405 => "HTTP/1.1 405 Method Not Allowed",
        404 => "HTTP/1.1 404 Not Found",
        403 => "HTTP/1.1 403 Forbidden",
        401 => "HTTP/1.1 401 Unauthorized",
        400 => "HTTP/1.1 400 Bad Request",

        200 => "HTTP/1.1 200 OK",
        201 => "HTTP/1.1 201 Created",
        204 => "HTTP/1.1 204 No Content",
    ];

    // HEADERS

    header(translate($code, $statusCode, 200));
    header('Content-Type: application/json');
    header('X-Powered-By: PRODESP');
    // header("Access-Control-Allow-Origin: $_REQ->ip");
    header('Access-Control-Allow-Credentials: true');

    foreach ($headers as $h => $header) {
        header($header);
    }

    sleep($sleep);

    // RESPONSE

    if (!empty($arr))
        die(json_encode($arr));

    exit;
}

function translate($data, $options = [], $default = '') {

    $data = strtolower($data);
    $options = array_change_key_case($options);

    if (array_key_exists($data, $options))
        return $options[$data];

    return $default;

}