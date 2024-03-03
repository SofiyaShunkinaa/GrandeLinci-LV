<?php 

session_start();
// SETTING THE MAIN CONTROLLER CONSTANT
define("INDEX", "");

// CONNECTING THE CORE
require_once($_SERVER['DOCUMENT_ROOT']."/config/core.php");

// CONNECTING TO CUSTOMINCLUDES
require_once($_SERVER['DOCUMENT_ROOT']."/includes/functions.php");
require_once($_SERVER['DOCUMENT_ROOT']."/includes/variables.php");

// LANGUAGE MANAGING
$LangArray = array("ru", "en", "lv");
$DefaultLang = "ru";

if(@$_SESSION['NowLang']) {
    if(!in_array($_SESSION['NowLang'], $LangArray)) {
        $_SESSION['NowLang'] = $DefaultLang;
    }
}
else {
    $_SESSION['NowLang'] = $DefaultLang;
}

if(!isset($_GET['lang'])){
    $language = $_SESSION['NowLang'];
}
else{
    $language = addslashes($_GET['lang']);
}

if($language) {
    if(!in_array($language, $LangArray)) {
        $_SESSION['NowLang'] = $DefaultLang;
    }
    else {
        $_SESSION['NowLang'] = $language;
    }
}
$CurentLang = addslashes($_SESSION['NowLang']);
include_once ("lang/lang_".$CurentLang.".php");

// CONNECTING TO THE DATABASE
$db = new MyDB();
$db->connect();


// ADD ITEMS
include($_SERVER['DOCUMENT_ROOT']."/includes/add_items.php");


// TEMPLATES INCLUDES
require_once($_SERVER['DOCUMENT_ROOT']."/core/layouts/main-menu/default.php");

include($_SERVER['DOCUMENT_ROOT']."/template.php");

require_once($_SERVER['DOCUMENT_ROOT']."/core/layouts/footer/default.php");

try {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = isset($_POST['q3']) ? $_POST['q3'] : '';
    $q4 = isset($_POST['q4']) ? $_POST['q4'] : '';
    $kit_id = isset($_POST['kit_id']) ? $_POST['kit_id'] : 1;


    $query = "INSERT INTO `booking_request` (`user_name`, `email`, `phone_number`, `id_kitten`, `question1`, `question2`, `question3`, `question4`) VALUES ('$name', '$email', '$phone', $kit_id, '$q1', '$q2', '$q3', '$q4')";
    $result = $db->run($query);

    if ($result) {
        $response = [
            "status" => true,
            "mes" => "cool"
        ];
        echo "nice";
    } else {
        $response = [
            "status" => false,
            "mes" => "not cool"
        ];
        echo "not nice";
    }

    echo json_encode($response);

} catch (Exception $e) {
    $response = [
        "status" => false,
        "mes" => "Exception: " . $e->getMessage()
    ];

    echo json_encode($response);
}

$db->close();

