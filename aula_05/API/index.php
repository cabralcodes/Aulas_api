<?php

//importar output

require_once('output.php');

// prepare response

$data['status']= 'ERROR';
$data['data'] = [];

//API routes

if(isset($_GET['option'])){

    switch ($_GET['option']) {
    case 'status':
      api_status($data);
      
        
        break;
    case 'random':
     api_random($data);
        break;
}

}
//API response
response($data);
?>