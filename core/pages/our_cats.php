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

//if(isset($_GET['page'])){
//    $defPage = 1;
//    $_SESSION['page'] = $defPage;
//}
//else{
//    $_SESSION['page'] = $_GET['page'];
//}

$filter = null;
if(isset($_GET['filter'])){
    $filter = $_GET['filter'];
}
switch($filter){
    case "boys":
        $filteredQuery = $query_boys;
        $page = 1;
        break;
    case "girls":
        $filteredQuery = $query_girls;
        $page = 1;
        break;
    default:
        $filteredQuery = $query_all;
        $page = 1;
        break;
}


$pagesCount = $db->getNumberOfPages($filteredQuery, 4);
//$offset = ($page - 1)*4;
$db->run("SELECT * FROM ".$filteredQuery);
$db->row();
$catsArray = array();
while ($row = $db->fetch()) {
$catsArray[] = $row;
}
//var_dump($catsArray);
//." LIMIT 5 OFFSET ".$offset

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
                    <option value="<?php echo $Lang['sex_filter'][0][1]; ?>" <?php if($filter == $Lang['sex_filter'][0][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][0][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][1][1]; ?>" <?php if($filter == $Lang['sex_filter'][1][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][1][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][2][1]; ?>" <?php if($filter == $Lang['sex_filter'][2][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][2][0]; ?></option>
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

            <?php echo create_pagination($pagesCount, $page); ?>

        </div>
    </div>
</div>


