<?php 

session_start();
define("INDEX", ""); // УСТАНОВКА КОНСТАНТЫ ГЛАВНОГО КОНТРОЛЛЕРА

require_once($_SERVER['DOCUMENT_ROOT']."/config/core.php"); // ПОДКЛЮЧЕНИЕ ЯДРА

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

// ПОДКЛЮЧЕНИЕ К БД
$db = new MyDB();
$db->connect();

// ГЛАВНЫЙ КОНТРОЛЛЕР
switch ($_GET['option']) {
case "page":
include($_SERVER['DOCUMENT_ROOT']."/core/pages/page.php");
break;
default:
include($_SERVER['DOCUMENT_ROOT']."/core/pages/home.php");
break;
}

include ($_SERVER['DOCUMENT_ROOT']."/template.php");
$db->close();?>