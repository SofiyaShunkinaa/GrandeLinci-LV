<?php session_start();
define("INDEX", ""); // УСТАНОВКА КОНСТАНТЫ ГЛАВНОГО КОНТРОЛЛЕРА

require_once($_SERVER['DOCUMENT_ROOT']."/config/core.php"); // ПОДКЛЮЧЕНИЕ ЯДРА

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
$db->close();