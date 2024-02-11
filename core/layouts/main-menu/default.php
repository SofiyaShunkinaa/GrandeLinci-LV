<?php
session_start();

$db = new MyDB();
$db->connect();

$query = "SELECT * FROM main_menu";
$db->run($query);

$table = array();
while ($row = $db->fetch()) {
    $table[] = $row;
}

// $table = array(
//     array('id' => 1, 'name' => 'Глава 1', 'parent_id' => 0),
//     array('id' => 2, 'name' => 'Глава 2', 'parent_id' => 0),
//     array('id' => 3, 'name' => 'Глава 3', 'parent_id' => 0),
//     array('id' => 4, 'name' => 'Глава 4', 'parent_id' => 0),
//     array('id' => 5, 'name' => '5	Основы языка PHP. Сценарии	1', 'parent_id' => 1),
//     array('id' => 6, 'name' => 'Глава 1', 'parent_id' => 1),
//     array('id' => 7, 'name' => 'Глава 2', 'parent_id' => 2),
//     array('id' => 8, 'name' => 'Глава 3', 'parent_id' => 2),
//     array('id' => 9, 'name' => 'Глава 4', 'parent_id' => 3),
//     array('id' => 10, 'name' => '5	Основы языка PHP. Сценарии	1', 'parent_id' => 3),
//     array('id' => 11, 'name' => '5	Основы языка PHP. Сценарии	1', 'parent_id' => 10)
    
// );

$associativeArray = array();
foreach ($table as $row) {
    $associativeArray[$row['id']] = $row;
}

function buildList($items, $parentId = 0) {
    $html = "<ul>";
    foreach ($items as $item) {
        if ($item['parent_id'] == $parentId) {
            $html .= "<li>{$item['name']}";
            $html .= buildList($items, $item['id']);
            $html .= "</li>";
        }
    }
    $html .= "</ul>";
    return $html;
}

echo buildList($associativeArray);
?>