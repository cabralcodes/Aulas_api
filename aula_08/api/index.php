<?php
//resposta temporária
header("content-type:application/json");

$data['status']= 'Sucess';
$data['method']= $_SERVER['REQUEST_METHOD'];

//Apresentar as variáveis que vieram no pedido (get ou post)

    
echo json_encode($data);