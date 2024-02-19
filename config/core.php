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

function stop() {
unset($this->data);
unset($this->result);
unset($this->fetch);
unset($this->err);
unset($this->query);
}
}
