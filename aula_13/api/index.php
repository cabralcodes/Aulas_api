<?php

// dependeces 

require_once(dirname(__FILE__) . '/inc/config.php');
require_once(dirname(__FILE__) . '/inc/api_response.php');
require_once(dirname(__FILE__) . '/inc/api_logic.php');

// instanciate the api_class 

$api_response= new api_response();

// check it method is valid

 if (!$api_response -> check_metohd($_SERVER['REQUEST_METHOD']))
{
//send error response
$api_response -> api_request_error('Invalid request method');
}

//set request method
$api_response-> set_method($_SERVER['REQUEST_METHOD']);
$params = null;
if($api_response ->get_method() == 'GET'){
    $api_response->set_endpoint($_GET['endpoint']);
    $params = $_GET;
}elseif($api_response->get_method()=='POST'){
    $api_response->set_endpoint($_POST['endpoint']);
    $params = $_POST;
}

//routes
$api -> send_api_status();

//-----------------------------------------
//prepare the api logic
$api_logic = new api_logic($api-> get_endpoint(), $params);

//-----------------------------------------
//check if endpoint exists
if(!$api_logic->endpoint_exists())
{
    $api_response->api_request_error('Inexist Endpoint:'. $api_response-> get_endpoint());
}

//request to the api_logic
$results = $api_logic->{$api_response->get_endpoint()};
$results = $api_logic->status();
$api_response->add_do_data('data', $results);