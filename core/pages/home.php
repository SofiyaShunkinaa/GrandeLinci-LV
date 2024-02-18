<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='home' LIMIT 1";
$db->run($query);
$db->row();

// COMPONENT VARIABLES
$id = $db->data['page_id'];
$alias = $db->data['page_alias'];

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
                <button class="btn"><a href="/?option=available_kittens"></a></button>
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
        </div>

        <div class="section section-last-events">
            <?php echo title($Lang['Pages'][$alias]['section_events']['title']) ?>
            <p class="section-content"><?php echo $Lang['Pages'][$alias]['section_events']['litter_date'] ?></p>
            <p class="section-content section-content-2"><?php echo $Lang['Pages'][$alias]['section_events']['parents'] ?></p>

        </div>

        <div class="section section-about-us">
            <?php echo title($Lang['Pages'][$alias]['section_about']['title']) ;

            $articles = "<div class='subsection-articles'>";
            foreach ($Lang['Pages'][$alias]['section_about']['article'] as $article){
                $articles .= "<div class='article-container'><h3>{$article['title']}</h3>";
                $articles .= "<p>{$article['content']}</p><img src='{$article['img_path']}'></div>";
            }
            echo $articles."</div>"
            ?>
        </div>

    </div>

</div>
<div class="bg-1"><img src="/assets/images/bg-left.png"></div>
