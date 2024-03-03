<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='available_kittens' LIMIT 1";
$db->run($query);
$db->row();

$id = $db->data['page_id'];
$alias = $db->data['page_alias'];

$query_all = 'kittens';
$query_boys = 'kittens WHERE id_sex = 1';
$query_girls = 'kittens WHERE id_sex = 2';

// GETTING FILTER
$filter = null;
if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
}

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;

switch($filter){
    case "boys":
        $filteredQuery = $query_boys;
        break;
    case "girls":
        $filteredQuery = $query_girls;
        break;
    default:
        $filteredQuery = $query_all;
        break;
}


$pagesCount = $db->getNumberOfPages($filteredQuery, 6);
$offset = ($currentPage - 1)*6;
$db->run("SELECT * FROM ".$filteredQuery." LIMIT 6 OFFSET ".$offset.";");
$catsArray = array();
$db->row();
$catsArray[] = $db->data;

while ($row = $db->fetch()) {
    $catsArray[] = $row;
}
//var_dump($catsArray);

// IF PAGE NOT EXISTS
if (!$id) {
    header("HTTP/1.1 404 Not Found");
    $component = "ОШИБКА 404! Данной страницы не существует";
}
$db->stop();
?>

<div class="container">
    <div class="section section-kittens">
        <?php echo title($Lang['Pages'][$alias]['content']['title']); ?>
        <p class="section-content"><?php echo $Lang['Pages'][$alias]['content']['subtitle'] ?></p>

        <div class="sex-filter-switcher ">
            <form id="filter-form" method="get">
                <select name="filter" class="select" id="selector" onchange="this.form.submit()">
                    <option value="<?php echo $Lang['sex_filter'][0][1]; ?>" <?php if($filter == $Lang['sex_filter'][0][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][0][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][1][1]; ?>" <?php if($filter == $Lang['sex_filter'][1][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][1][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][2][1]; ?>" <?php if($filter == $Lang['sex_filter'][2][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][2][0]; ?></option>
                </select>
            </form>
            <div id="result"></div>
        </div>

        <div class="kittens-section">
            <div class="kittens-container">
                <?php
                $card = "";
                foreach ($catsArray as $cat){
                    $card .= "<div class='cat-card kitten-card'><div class='col-6'><img src='{$cat['img_path']}' alt='cat'></div>
                        <div class='col-6 cats-content'><h4 class='cat-name'>{$Lang['Kittens'][$cat['id']]['name']}</h4><div class='undername-rect'></div><h4 class='cat-price'>{$cat['price']}€</h4>
                        <div class='cat-description'><div class='doubled-field'><p>{$Lang['Cards']['kittens']['sex']}</p><p>{$Lang['Sex'][$cat['id_sex']]}</p></div>
                        <div class='doubled-field'><p>{$Lang['Cards']['kittens']['age']}</p><p>{$cat['age']}{$Lang['Cards']['kittens']['month']}</p></div>
                        <div class='doubled-field'><p>{$Lang['Cards']['kittens']['mother']}</p><p>Grande Linci *LV {$Lang['Cats'][$cat['id_mother']]['name']}</p></div>
                        <div class='doubled-field'><p>{$Lang['Cards']['kittens']['father']}</p><p>Grande Linci *LV {$Lang['Cats'][$cat['id_father']]['name']}</p></div>
                        <div class='doubled-field'><p>{$Lang['Cards']['kittens']['castration']}</p><p>{$Lang['Kittens'][$cat['id']]['castration']}</p></div>
                        <div class='doubled-field'><p>{$Lang['Cards']['kittens']['selling']}</p><p>{$Lang['Kittens'][$cat['id']]['selling']}</p></div>
                        </div><div class='cat-btn-container' ><button class='btn btn-blue btn-md'><a href='javascript:PopUpShow({$cat['id']})'>{$Lang['Buttons']['buy_me']}</a></button></div></div></div>";
                }
                echo $card;
                ?>
            </div>
            <?php

            echo create_pagination($pagesCount, $currentPage, $filter, $alias);

            ?>

        </div>
    </div>
</div>

<?php require($_SERVER['DOCUMENT_ROOT'].'/core/layouts/pop-up/form.php');

