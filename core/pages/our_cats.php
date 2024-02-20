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

//$db->run($query2);
//$db->row();
//$catsArray = array();
//while ($row = $db->fetch()) {
    //$catsArray[] = $row;
//}
$filter = null;
if(isset($_POST['filter'])){
    $filter = $_POST['filter'];
}
switch($filter){
    case "all":
        $filteredQuery = $query_all;
        break;
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


$db->getNumberOfPages($filteredQuery, 4);

// COMPONENT VARIABLES


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
        <div class="sex-filter-switcher dropdown">
            <form id="filter-form" method="post">
                <select name="filter" id="selector" onchange="this.form.submit()">
                    <option value="<?php echo $Lang['sex_filter'][0][1]; ?>" <?php if($filter == $Lang['sex_filter'][0][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][0][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][1][1]; ?>" <?php if($filter == $Lang['sex_filter'][1][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][1][0]; ?></option>
                    <option value="<?php echo $Lang['sex_filter'][2][1]; ?>" <?php if($filter == $Lang['sex_filter'][2][1]){echo "selected";}?>><?php echo $Lang['sex_filter'][2][0]; ?></option>
                </select>
            </form>
            <div id="result"></div>
        </div>
        <div class="cats-section">
            <?php
            //foreach ($catsArray as $cat)
                //echo $cat['name'];
                //$pagination =
            ?>
        </div>
    </div>
</div>


