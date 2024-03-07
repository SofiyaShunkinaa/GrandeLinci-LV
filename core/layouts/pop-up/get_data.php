<?php
//include("lang/lang_ru.php");
//echo $Lang['Form']['errors']['q2'];

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
$q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
$kit_id = $_POST['kit_id'];

$error_fields = [];
$successed_fields =[];
$message = '';

if($q2 === ''){
    $error_fields[] = 'q2';
}
else{
    $successed_fields[] = 'q2';
}

if($q1 === ''){
    $error_fields[] = 'q1';
    //$message = $Lang['Form']['errors']['q1'];
}
else{
    $successed_fields[] = 'q1';
}

if($phone === '' || !preg_match("/^(\+?\d{1,3}\s?)?\(?\d{1,4}\)?[\s.-]?\d{1,4}[\s.-]?\d{1,9}$/", $phone)){
    $error_fields[] = 'phone';
    //$message = $Lang['Form']['errors']['phone'];
}
else{
    $successed_fields[] = 'phone';
}

if($email === '' || !preg_match("/^[A-Z0-9._%+-]+@[A-Z0-9-]+.+.[A-Z]{2,4}$/i", $email)){
    $error_fields[] = 'email';
    //$message = $Lang['Form']['errors']['email'];
}
else{
    $successed_fields[] = 'email';
}

if($name === '' || !preg_match("/^[A-Za-zА-Яа-яĀāČčĒēĢģĪīĶķĻļŅņŌōŠšŪūŽž\s]+$/u", $name)){
    $error_fields[] = 'name';
    //$message = $Lang['Form']['errors']['phone'];
}
else{
    $successed_fields[] = 'name';
}


if(empty($error_fields)){
    $response = [
        "status" => true,
        "successed" => $successed_fields
    ];

    echo json_encode($response);
}
else{
    $response = [
        "status" => false,
        "type" => 1,
        "field" => $message,
        "fields" => $error_fields,
        "successed" => $successed_fields,
        "lang" => $_SESSION['NowLang']
    ];

    echo json_encode($response);

    die();
}

//if($response['status'] == true){
//    //$db->insertRequest($name, $email, $phone, intval($kit_id), $q1, $q2, $q3, $q4);
//$db->insertRequest("name1", "email@ema.il", "+37585226", 1, "kioipm", "jiojmp", "jiojm", "uon");
//
//}

