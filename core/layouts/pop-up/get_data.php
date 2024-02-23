<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
$q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
$kit_id = $_POST['kit_id'];
$submit1 = isset($_POST['submit1']) ? $_POST['submit1'] : '';
$submit2 = isset($_POST['submit2']) ? $_POST['submit2'] : '';


$error_fields = [];
$successed_fields =[];

if($name === '' || !preg_match("/^[a-zA-Z\s\-]+$/", $name)){
    $error_fields[] = 'name';
}
else{
    $successed_fields[] = 'name';
}

if($email === '' || !preg_match("/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i", $email)){
    $error_fields[] = 'email';
}
else{
    $successed_fields[] = 'email';
}

if($phone === '' || !preg_match("/^(\+?\d{1,3}\s?)?\(?\d{1,4}\)?[\s.-]?\d{1,4}[\s.-]?\d{1,9}$/", $phone)){
    $error_fields[] = 'phone';
}
else{
    $successed_fields[] = 'phone';
}

if($q1 === ''){
    $error_fields[] = 'q1';
}
else{
    $successed_fields[] = 'q1';
}

if($q2 === ''){
    $error_fields[] = 'q2';
}
else{
    $successed_fields[] = 'q2';
}

if(empty($error_fields)){
    $response = [
    "status" => true,
    "type" => 0,
    "successed" => $successed_fields
];
    echo json_encode($response);

}
else{
    $response = [
        "status" => false,
        "type" => 1,
        "field" => "Check fields",
        "fields" => $error_fields,
        "successed" => $successed_fields
    ];

    echo json_encode($response);

    die();
}


