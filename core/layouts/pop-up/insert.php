<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
$q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
$kit_id = $_POST['kit_id'];


$result = $db->insertRequest($name, $email, $phone, $kit_id, $q1, $q2, $q3, $q4);

if($result){
    $response = [
        "status" => true,
        "mes" => "cool"
    ];
}
else{

    die();
}

$response = [
    "status" => false,
    "mes" => "not cool"
];
echo json_encode($response);
