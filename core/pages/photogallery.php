<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

/* PAGE COMPONENT */
$query = "SELECT * FROM pages WHERE page_alias='photogallery' LIMIT 1";
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
    <div class="section section-1">
        <?php echo title($Lang['Pages'][$alias]['content'][0]['title']) ?>

        <p class="section-content"><?php echo $Lang['Pages'][$alias]['content'][0]['subtitle'] ?></p>

        <div class="image-container">
            <?php
            foreach ($Photos[$alias]['sec1'] as $image){
                echo "<div><img src='{$image}.webp' alt='cat'></div>";
            }
            ?>
        </div>
    </div>

    <div class="section section-2">
        <?php echo title($Lang['Pages'][$alias]['content'][1]['title']) ?>

        <p class="section-content"><?php echo $Lang['Pages'][$alias]['content'][1]['subtitle'] ?></p>

        <div class="image-container">
            <?php
            foreach ($Photos[$alias]['sec2'] as $image){
                echo "<div><img src='{$image}.webp' alt='cat'></div>";
            }
            ?>
        </div>
    </div>

    <div class="section section-3">
        <?php echo title($Lang['Pages'][$alias]['content'][2]['title']) ?>

        <p class="section-content"><?php echo $Lang['Pages'][$alias]['content'][2]['subtitle'] ?></p>

        <div class="image-container">
            <?php
            foreach ($Photos[$alias]['sec3'] as $image){
                echo "<div><img src='{$image}.webp' alt='cat'></div>";
            }
            ?>
        </div>
    </div>

</div>
<div class="bg-1"><img src="/assets/images/bg-left.webp"></div>
<div class="bg-2"><img src="/assets/images/trace-bg-1.webp"></div>
<div class="bg-3"><img src="/assets/images/trace-bg-2.webp"></div>
<div class="bg-4"><img src="/assets/images/bg-right-1.webp"></div>
<div class="bg-5"><img src="/assets/images/bg-right-2.webp"></div>
