<?php

// Curls to the zapier webhook url with webhook params of json
function curl_zapierurl($webhook_url, $webhook_params) {
    $curl = curl_init();
    curl_setopt_array($curl, array (CURLOPT_URL             => $webhook_url,
                                    CURLOPT_RETURNTRANSFER  => true,
                                    CURLOPT_CUSTOMREQUEST   => "POST",
                                    CURLOPT_POSTFIELDS      => json_encode($webhook_params),
                                    CURLOPT_HTTPHEADER      => array (  "Content-Type: application/json",
                                                                        "cache-control: no-cache",
                                                                        "User-Agent: TomsBot/1.0.0"
                                                                        ),
    ));
    
    // Exceute and then close cURL request.
    $curl_result = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo $curl_result;
    }
}

// Record Payload of event to the file
function record_payload($filename, $payload) {

    if ($payload == null)
        file_put_contents($filename, 'NULL Payload');  
    else
        file_put_contents($filename, print_r($payload, true));
}
?>