<?php
    $params = array(
        "title" => "AAAAHHHHH",
        "url" => "https://example.com/webhooks/inactive-email",
        "timezone" => "America/Mexico_City",
        "method" => "POST",
        "contentType" => "application/json; charset=utf-8",
        "isRecurring" => false,
        "runAt" => "2020-03-02T12:48:26.9832Z"
    );
    $paramsEncode = json_encode($params);
    $headers = array(
        "Content-Type: application/json",
        "Authorization: Bearer key_76e359ca6a15404d803bc8fb4ba3e8a9"
    );
    curl_setopt_array($ch = curl_init(), array(
        CURLOPT_URL => "https://api.cronhooks.io/schedules",
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HEADER => 0,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $paramsEncode,
        CURLOPT_RETURNTRANSFER => 1
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    echo json_encode($response);
?>
