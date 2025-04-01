<?php


//=================================================
//FUNCTIONS for endpoints
//=================================================
function api_status(&$data)
{
    define_response($data, 'API OK');
}
//=================================================
function api_random(&$data)
{
    $min = 0;
    $max = 1000;
    /*
    verifica se vem min e / ou max no GET
    */

    if (isset($_GET['min'])) {
        $min = intval($_GET['min']);

    }
    if (isset($_GET['max'])) {
        $max = intval($_GET['max']);


    }
    if ($min >= $max) {
        response($data);
        return;

    }

    define_response($data, rand($min, $max));

}
// emitir a resposta da API

//=========================================
function define_response(&$data, $value)
{
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}
//=====================================
// Construção da response

function response($data_response)
{

    header("Content-Type:application/json");

    echo json_encode($data_response);

}

?>