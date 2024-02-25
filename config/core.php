<link rel="stylesheet" href="/assets/css/vars.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="/includes/splide-4.1.3/dist/css/splide.min.css">
<link rel="stylesheet" href="/assets/css/style.css">

<?php

defined('INDEX') OR die('Прямой доступ к странице запрещён!');

// MYSQL
class MyDB
{
var $dblogin = "root";
var $dbpass = "root";
var $db = "grandelinci";
var $dbhost="localhost";

var $link;
var $query;
var $err;
var $result;
var $data;
var $fetch;

function connect() {
    $this->link = mysqli_connect($this->dbhost, $this->dblogin, $this->dbpass);
    mysqli_select_db($this->link, $this->db);
    mysqli_query($this->link, 'SET NAMES utf8');
}


function close() {
mysqli_close($this->link);
}

function run($query) {
    $this->query = $query;
    $this->result = mysqli_query($this->link, $this->query); // fixed argument order
    $this->err = mysqli_error($this->link);
}

function row() {
$this->data = mysqli_fetch_assoc($this->result);
}
function fetch() {
    while ($this->data = mysqli_fetch_assoc($this->result)) {
    $this->fetch = $this->data;
    return $this->fetch;
    }
}

function getNumberOfPages($Query, $itemsPerPage) {
    $this->run('SELECT COUNT(*) AS total_count FROM '.$Query);
    $this->row();
    $totalCount = intval($this->data['total_count']);
    $numberOfPages = ceil($totalCount / $itemsPerPage);
    return $numberOfPages;
}

function insertRequest($name, $email, $phone, $kit_id, $q1, $q2, $q3, $q4) {
    $query = "INSERT INTO booking_request (`user_name`, `email`, `phone_number`, `id_kitten`, `question1`, `question2`, `question3`, `question4`) VALUES ('$name', '$email', '$phone', '$kit_id', '$q1', '$q2', '$q3', '$q4')";
    $this->run($query);
}

function getLastInsertedId() {
    return mysqli_insert_id($this->link);
}


function add_mainmenu_item($name, $itemLink, $parentId, $customClass, $langRu, $langEn, $langLv, $curLang){
    $query = "INSERT INTO main_menu (`name`, `link`, `parent_id`, `custom_class`) VALUES ('$name', '$itemLink', '$parentId', '$customClass')";
    $this->run($query);
    $index = $this->getLastInsertedId();

    include("lang/lang_ru.php");
    $Lang['Header']['main_menu'][$index] = $langRu;
    $serializedArray = serialize($Lang);
    file_put_contents('lang/lang_ru.txt', $serializedArray);

    include("lang/lang_en.php");
    $Lang['Header']['main_menu'][$index] = $langEn;
    $serializedArray = serialize($Lang);
    file_put_contents('lang/lang_en.txt', $serializedArray);

    include("lang/lang_lv.php");
    $Lang['Header']['main_menu'][$index] = $langLv;
    $serializedArray = serialize($Lang);
    file_put_contents('lang/lang_lv.txt', $serializedArray);

    include("lang/lang_".$curLang.".php");
}

function add_cat($name, $dateOfBirth, $idColor, $idPattern, $idSex, $imgPath, $nameRu, $descRu, $titlesRu, $testsRu, $nameEn, $descEn, $titlesEn, $testsEn, $nameLv, $descLv, $titlesLv, $testsLv, $curLang){
    $query = "INSERT INTO cats (`name`, `date_of_birth`, `id_color`, `id_pattern`, `id_sex`, `img_path`) VALUES ('$name', '$dateOfBirth', '$idColor', '$idPattern', '$idSex', '$imgPath')";
    $this->run($query);
    $index = $this->getLastInsertedId();

    include("lang/lang_ru.php");
    $Lang['Cats'][$index]['name'] = $nameRu;
    $Lang['Cats'][$index]['desc'] = $descRu;
    $Lang['Cats'][$index]['titles'] = $titlesRu;
    $Lang['Cats'][$index]['tests'] = $testsRu;
    $serializedArray = serialize($Lang);
    file_put_contents('lang/lang_ru.txt', $serializedArray);

    include("lang/lang_en.php");
    $Lang['Cats'][$index]['name'] = $nameEn;
    $Lang['Cats'][$index]['desc'] = $descEn;
    $Lang['Cats'][$index]['titles'] = $titlesEn;
    $Lang['Cats'][$index]['tests'] = $testsEn;
    $serializedArray = serialize($Lang);
    file_put_contents('lang/lang_en.txt', $serializedArray);

    include("lang/lang_lv.php");
    $Lang['Cats'][$index]['name'] = $nameLv;
    $Lang['Cats'][$index]['desc'] = $descLv;
    $Lang['Cats'][$index]['titles'] = $titlesLv;
    $Lang['Cats'][$index]['tests'] = $testsLv;
    $serializedArray = serialize($Lang);
    file_put_contents('lang/lang_lv.txt', $serializedArray);

    include("lang/lang_".$curLang.".php");
}

function stop() {
unset($this->data);
unset($this->result);
unset($this->fetch);
unset($this->err);
unset($this->query);
}
}
