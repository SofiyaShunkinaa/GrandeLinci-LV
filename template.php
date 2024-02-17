<?php
require_once($_SERVER['DOCUMENT_ROOT']."/core/layouts/main-menu/default.php");

// MAIN CONTROLLER
switch ($_GET['option']) {
    case "page":
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/page.php");
        break;
    default:
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/home.php");
        break;
}

require_once($_SERVER['DOCUMENT_ROOT']."/core/layouts/footer/default.php");



