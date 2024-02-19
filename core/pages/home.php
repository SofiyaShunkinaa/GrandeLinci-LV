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

</div>
<div class="bg-1"><img src="/assets/images/bg-left.png"></div>
