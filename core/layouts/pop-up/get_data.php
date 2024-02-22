<?php

if($_POST['name']!=""){

    $response = [
        "status" => true
    ];

    echo json_encode($response);
}else{

    $response = [
        "status" => false,
        "field" => 'не заполнено поле'
    ];

    echo json_encode($response);
}
