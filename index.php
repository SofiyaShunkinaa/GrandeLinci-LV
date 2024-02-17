<?php 

session_start();
// SETTING THE MAIN CONTROLLER CONSTANT
define("INDEX", "");

// CONNECTING THE CORE
require_once($_SERVER['DOCUMENT_ROOT']."/config/core.php");

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

$language = addslashes($_GET['lang']);
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

include ($_SERVER['DOCUMENT_ROOT']."/template.php");
$db->close();

