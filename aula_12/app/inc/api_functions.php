<?php 

function api_request ($endpoint, $method = 'GET', $variables = []) {

    // initiate the curl client
    $client = curl_init();
    
    //return the resul as a string
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

    // defines the url
    $url = API_BASE_URL;

    //if request is GET
    if ($method == 'GET'){
        $url .= "?endpoint=$endpoint";
        if(!empty($variables)){
            $url .= "&" . http_build_query($variables);
        }
    }
    //if request it POST
    if($method == 'POST'){
     $variables = array_merge(['enpoint' => $endpoint], $variables);
    curl_setopt($client, CURLOPT_POSTFIELDS, $variables);
    };
    curl_setopt($client, CURLOPT_URL, $url);
    
    $response = curl_exec($client);
    return json_decode($response, true);

}