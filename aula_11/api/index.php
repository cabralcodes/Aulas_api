<?php

// dependeces 

require_once(dirname(__FILE__) . '/inc/config.php');
require_once(dirname(__FILE__) . '/inc/api_class.php');

// instanciate the api_class 

$api= new api_class();

// check it method is valid

 if (!$api -> check_metohd($_SERVER['REQUEST_METHOD']))
{
//send error response
$api -> api_request_error('Invalid request method');
}

//set request method
$api-> set_method($_SERVER['REQUEST_METHOD']);
if($api ->get_method() == 'GET'){
    $api->set_endpoint($_GET['endpoint']);
}elseif($api->get_method()=='POST'){
    $api->set_endpoint($_POST['endpoint']);
}

$api -> send_api_status();


// check the method
// if(!$api-> check_metohd($_SERVER['REQUEST_METHOD']))
// {
//     $api ->api_request_error( 'Aconteceu um error na API!!');
// }







// //resposta temporária
// header("content-type:application/json");

// $data['status']= 'Sucess';
// $data['method']= $_SERVER['REQUEST_METHOD'];

// //Apresentar as variáveis que vieram no pedido (get ou post)
// if ($data['method'] == 'GET'){
//     $data['data'] = $_GET;
    
// }else if ($data['method'] == 'POST'){
//     $data['data'] = $_POST;

// }
// echo json_encode($data);