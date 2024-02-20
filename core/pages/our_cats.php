<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='our_cats' LIMIT 1";
$db->run($query);
$db->row();

$id = $db->data['page_id'];
$alias = $db->data['page_alias'];

$query_all = 'cats';
$query_boys = 'cats WHERE id_sex = 1';
$query_girls = 'cats WHERE id_sex = 2';

// GETTING FILTER
$filter = null;
if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
}

//echo $_GET['page']."<br>";
//
//
//// PAGE CONTROLLER
//if(!isset($_GET['page']) or isset($_SESSION['previousPage']) and $_SESSION['previousPage'] != $filter){
//    $defPage = 1;
//    $_SESSION['CurrentPage'] = $defPage;
//    echo "first case";
//}
//else{
//    $_SESSION['CurrentPage'] = $_GET['page'];
//    echo "second case";
//}

$currentPage = isset($_GET['CurrentPage']) ? $_GET['page'] : 1;


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


$pagesCount = $db->getNumberOfPages($filteredQuery, 4);
$offset = ($_GET['page'] - 1)*4;
$db->run("SELECT * FROM ".$filteredQuery." LIMIT 5 OFFSET ".$offset.";");
$db->row();
$catsArray = array();
while ($row = $db->fetch()) {
$catsArray[] = $row;
}
//var_dump($catsArray);
//echo $_SESSION['CurrentPage'];
// IF PAGE NOT EXISTS
if (!$id) {
    header("HTTP/1.1 404 Not Found");
    $component = "ОШИБКА 404! Данной страницы не существует";
}
$db->stop();
?>

<div class="container">
    <div class="section section-cats">
        <?php echo title($Lang['Pages'][$alias]['content']['title']); ?>
        <p class="section-content"><?php echo $Lang['Pages'][$alias]['content']['subtitle'] ?></p>

        <div class="sex-filter-switcher ">
            <form id="filter-form" method="get">
                <select name="filter" class="select" id="selector" onchange="this.form.submit()">
                    <option value="<?php echo $Lang['sex_filter'][0][1]."&page=1"; ?>" <?php if($filter == $Lang['sex_filter'][0][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][0][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][1][1]."&page=1"; ?>" <?php if($filter == $Lang['sex_filter'][1][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][1][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][2][1]."&page=1"; ?>" <?php if($filter == $Lang['sex_filter'][2][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][2][0]; ?></option>
                </select>
            </form>
            <div id="result"></div>
        </div>

        <div class="cats-section">
            <div class="cats-container">
                <?php
                $card = "";
                foreach ($catsArray as $cat){
                    $card .= "<div class='cat-card'><div class='col-6'><img src='{$cat['img_path']}' alt='cat'></div>
                        <div class='col-6 cats-content'><h4 class='cat-name'>Grande Linci *LV {$Lang['Cats'][$cat['id']]['name']}</h4><div class='undername-rect'></div>
                        <div class='doubled-field'><p>{$Lang['Cards']['cats']['date_of_birth']}</p><p>{$cat['date_of_birth']}</p></div>";
                    if(isset($cat['id_pattern'])) {
                        $card .= "<div class='doubled-field' ><p >
                            {$Lang['Cards']['cats']['color']}</p ><p >
                            {$Lang['Colors'][$cat['id_color']]['char']}
                            {$Lang['Patterns'][$cat['id_pattern']]['code']} ({$Lang['Colors'][$cat['id_color']]['desc']}
                            {$Lang['Patterns'][$cat['id_pattern']]['desc']})</p ></div >";
                        }
                    else{
                        $card .= "<div class='doubled-field' ><p >
                            {$Lang['Cards']['cats']['color']}</p ><p >
                            {$Lang['Colors'][$cat['id_color']]['char']} ({$Lang['Colors'][$cat['id_color']]['desc']})</p ></div >";
                    }
                    $card .= "<p>{$Lang['Cats'][$cat['id']]['desc']}</p>
                        <div class='doubled-field'><p>{$Lang['Cards']['cats']['titles']}</p><p>{$Lang['Cats'][$cat['id']]['titles']}</p></div>
                        <div class='doubled-field'><p>{$Lang['Cards']['cats']['tests']}</p><p>{$Lang['Cats'][$cat['id']]['tests']}</p></div></div></div>";
                }
                echo $card;
                ?>
            </div>
            <?php
            //echo $_GET['filter'];
            preg_match('/^(.*?)(?=&)/', $filter, $matches);

                $substring = isset($substring) ? $matches[1] : "all";
                echo create_pagination($pagesCount, $_GET['page'], $filter);

             ?>

        </div>
    </div>
</div>


