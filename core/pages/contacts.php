<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='contacts' LIMIT 1";
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

<div class="container">

    <div class="section section-contacts">
        <?php
        echo title($Lang['Pages'][$alias]['content']['title']);

        echo "<p class='section-content'>".$Lang['Pages'][$alias]['content']['subtitle']."</p>";

        $cards = "<div class='subsection-contacts'>";
        foreach ($Lang['Pages'][$alias]['content']['contact_cards'] as $card)
            $cards .= create_linkedcard($card['icon'], $card['title'], $card['text'], $card['link']);
        echo $cards."</div>";
        ?>

        <iframe class="map-container" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d139178.6403663988!2d23.96426849095085!3d56.97164918728929!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46eecfb0e5073ded%3A0x400cfcd68f2fe30!2z0KDQuNCz0LAsINCb0LDRgtCy0LjRjw!5e0!3m2!1sru!2sby!4v1708277369949!5m2!1sru!2sby" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="section section-photos">
        <?php
        $img = "<div class='images-container'>";
        foreach ($Photos[$alias] as $image){
            $img .= "<img src='{$image}.png'>";
        }
        echo $img."</div>";
        ?>
    </div>

</div>
<div class="bg"><img src="/assets/images/bg-left.webp"></div>
