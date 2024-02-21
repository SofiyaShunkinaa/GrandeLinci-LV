<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='home' LIMIT 1";
$db->run($query);
$db->row();

// COMPONENT VARIABLES
$id = $db->data['page_id'];
$alias = $db->data['page_alias'];

// GETTING DATA FOR EVENT SECTION
        $db->run("SELECT * FROM cats WHERE id=3 or id=4;");
$parentArray = array();
$db->row();
$parentArray[] = $db->data;
while ($row = $db->fetch()) {
    $parentArray[] = $row;
}

$db->run("SELECT * FROM kittens WHERE id_mother = 3 or id_father = 4 LIMIT 3;");
$catsArray = array();
$db->row();
$kittensArray[] = $db->data;
while ($row = $db->fetch()) {
    $kittensArray[] = $row;
}


// IF PAGE NOT EXISTS
if (!$id) {
header("HTTP/1.1 404 Not Found");
$component = "ОШИБКА 404! Данной страницы не существует";
}
$db->stop();
?>

<div class="app-head app-head-home">
    <div class="container">
        <div class="a-head">
            <div class="a-head__text">
                <h1><?php echo $Lang['Pages'][$alias]['main']['title'] ?></h1>
                <p><?php echo $Lang['Pages'][$alias]['main']['subtitle'] ?></p>
                <button class="btn btn-blue btn-lg btn-home"><a href="/?option=available_kittens"><?php echo $Lang['Buttons']['choose_kit'] ?></a></button>
            </div>
            <div class="a-head__img">
                <img src="<?php echo $Lang['Pages'][$alias]['main']['img_path'] ?>" alt="main_cat">
            </div>
        </div>
    </div>
</div>
<div class="app-main page-home">

    <div class="container">

        <div class="section section-welcome">
            <?php echo title($Lang['Pages'][$alias]['section_welcome']['title']) ?>
            <p class="section-content"><?php echo $Lang['Pages'][$alias]['section_welcome']['content'] ?></p>

            <section class="splide" aria-label="Splide">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide"><img src="/assets/images/cat2.png" alt="cat"></li>
                        <li class="splide__slide"><img src="/assets/images/cat3.png" alt="cat"></li>
                        <li class="splide__slide"><img src="/assets/images/cat4.png" alt="cat"></li>
                        <li class="splide__slide"><img src="/assets/images/cat5.png" alt="cat"></li>
                        <li class="splide__slide"><img src="/assets/images/cat6.png" alt="cat"></li>
                    </ul>
                </div>
            </section>

            <button class="btn btn-blue btn-md"><a href="?/option=about_us"><?php echo $Lang['Buttons']['learn_more'] ?></a></button>
        </div>

        <div class="section section-last-events">
            <?php echo title($Lang['Pages'][$alias]['section_events']['title']) ?>
            <p class="section-content"><?php echo $Lang['Pages'][$alias]['section_events']['litter_date'] ?></p>
            <p class="section-content section-content-2"><?php echo $Lang['Pages'][$alias]['section_events']['parents'] ?></p>

            <?php
            $section = "<div class='parent-section'>";
            $num = 0;
            foreach ($parentArray as $parent) {
                if(!$num) {
                    $section .= "<div class='parent-card col-6'><div class='parent-image' style='background-image: url({$parent['img_path']})'></div><div class='parent-name'><p>{$Lang['Cards']['kittens']['mother']}</p><p>Grande Linci *LV {$Lang['Cats'][$parent['id']]['name']}</p></div></div>";
                    $num++;
                }
                else{
                    $section .= "<div class='parent-card col-6'><div class='parent-image' style='background-image: url({$parent['img_path']})'></div><div class='parent-name'><p><p>{$Lang['Cards']['kittens']['father']}</p><p>Grande Linci *LV {$Lang['Cats'][$parent['id']]['name']}</p></div></div></div>";
                }
            }
            $section .= "<div class='kittens-container'>";
            foreach ($kittensArray as $kit){
                $section .= "<div class='cat-card kitten-card'><div class='col-6'><img src='{$kit['img_path']}' alt='kitten'></div>
                <div class='col-6 cats-content'><h4 class='cat-name'>{$Lang['Kittens'][$kit['id']]['name']}</h4><div class='undername-rect'></div>
                <h4 class='cat-price'>{$kit['price']}€</h4>
                <div class='cat-description'>
                <div class='doubled-field'><p>{$Lang['Cards']['kittens']['sex']}</p><p>{$Lang['Sex'][$kit['id_sex']]}</p></div>
                <div class='doubled-field'><p>{$Lang['Cards']['kittens']['age']}</p><p>{$kit['age']}{$Lang['Cards']['kittens']['month']}</p></div>
                <div class='doubled-field'><p>{$Lang['Cards']['kittens']['selling']}</p><p>{$Lang['Kittens'][$kit['id']]['selling']}</p></div>
                <div class='doubled-field'><p>{$Lang['Cards']['kittens']['castration']}</p><p>{$Lang['Kittens'][$kit['id']]['castration']}</p></div></div>
                <div class='cat-btn-container' ><button class='btn btn-blue btn-md'><a href='#'>{$Lang['Buttons']['buy_me']}</a></button></div></div></div>";
            }
            echo $section."</div>";
            ?>
            <button class="btn btn-blue btn-md"><a href="?/option=available_kittens"><?php echo $Lang['Buttons']['view_more'] ?></a></button>
        </div>

        <div class="section section-about-us">
            <?php echo title($Lang['Pages'][$alias]['section_about']['title']) ;

            $articles = "<div class='subsection-articles'>";
            $order = 0;
            foreach ($Lang['Pages'][$alias]['section_about']['article'] as $article){
                if($order==0) {
                    $articles .= "<div class='article-container col-6'><h3>{$article['title']}</h3>";
                    $articles .= "<p>{$article['content']}</p><img src='{$article['img_path']}'></div>";
                    $order++;
                }
                else{
                    $articles .= "<div class='article-container col-6'><img src='{$article['img_path']}'><h3>{$article['title']}</h3>";
                    $articles .= "<p>{$article['content']}</p></div>";
                }
            }
            echo $articles."</div>"
            ?>
        </div>



</div>
<div class="bg-1"><img src="/assets/images/bg-left.png"></div>
    <div class="bg-2"><img src="/assets/images/bg-left-2.png"></div>
    <div class="bg-3"><img src="/assets/images/trace-bg-1.png"></div>
    <div class="bg-4"><img src="/assets/images/trace-bg-4.png"></div>
</div>