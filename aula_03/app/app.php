<?php 


define('API_BASE', 'http://localhost:8080/aulas-api/aula_03/API/index.php?option=');

echo '<p>APLICAÇÃO<p>';

for($i=1; $i<10;$i++)
{
    $resultado = api_request('random');
    //verify is response is ok (success)
if($resultado['status']== 'ERROR'){
    die('Aconteceu um erro na minha call');
}
    echo "O valor randômico".$resultado['data']."<br>";

}
echo 'TERMINADO';



function api_request($option) {
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);

    return json_decode($response, true);
}