<?php
//resposta temporária
header("content-type:application/json");

$data['status']= 'Sucess';
$data['method']= $_SERVER['REQUEST_METHOD'];

//Apresentar as variáveis que vieram no pedido (get ou post)
if ($data['method'] == 'GET'){
    $data['data'] = $_GET;
    
}else if ($data['method'] == 'POST'){
    $data['data'] = $_POST;

}
echo json_encode($data);