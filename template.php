<h1>Main template</h1>
<?php

switch ($_GET['option']) {
    case "about_us":
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/about_us.php");
        break;
    case "available_kittens":
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/available_kittens.php");
        break;
    case "our_cats":
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/our_cats.php");
        break;
    case "photogallery":
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/photogallery.php");
        break;
    case "about_breed":
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/about_breed.php");
        break;
    case "contacts":
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/contacts.php");
        break;
}



