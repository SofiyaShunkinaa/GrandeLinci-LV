<div class="app-head app-head-page">
    <div class="container">
        <div class="a-head">
            <div class="a-head__text">
                <div class="breadcrumbs">
                    <p><a href="/?option=home"><?php echo $Lang['breadcrumbs']['main']?></a></p>
                    <p><a class="breadcrumbs-page" href="<?php echo $_GET['option']?>"><?php echo $Lang['breadcrumbs'][$_GET['option']]['name']?></a></p>
                </div>
                <div><h1><?php echo $Lang['Pages'][$_GET['option']]['main']['title']?></h1></div>
                <div><p><?php echo $Lang['Pages'][$_GET['option']]['main']['subtitle']?></p></div>
            </div>
            <div class="a-head__img">
                <img src="<?php echo $Lang['Pages'][$_GET['option']]['main']['img_path']?>" alt="main_banner">
            </div>
        </div>
    </div>
</div>
<div class="app-main page-<?php echo $_GET['option']?>">
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
    default:
        include($_SERVER['DOCUMENT_ROOT']."/core/pages/available_kittens.php");
        break;
}
?>
</div>

