<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$alias = $_GET['alias'];
$query = "SELECT * FROM pages WHERE page_alias='home' LIMIT 1";
$db->run($query);
$db->row();

// COMPONENT VARIABLES
$id = $db->data['page_id'];
$alias = $db->data['page_alias'];

// IF PAGE NOT EXISTS
if (!$id) {
header("HTTP/1.1 404 Not Found");
$component = "ОШИБКА 404! Данной страницы не существует";
}
$db->stop();
?>

<h1>Home</h1>
